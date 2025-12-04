<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promotion> $promotions
 */
?>

<link rel="stylesheet" href="/css/index.css">

<div class="header">
    <h2 class="title">Promociones Registradas</h2>

    <?= $this->Html->link(
        'Nueva Promoción',
        ['action' => 'add'],
        ['class' => 'add-btn']
    ) ?>
</div>

<div class="grid">
    <?php foreach ($promotions as $promotion): ?>
        <div class="card">

            <div class="card-header">
                <h3 class="name"><?= h($promotion->code) ?></h3>
                <span class="id">ID #<?= $promotion->id ?></span>
            </div>

            <div class="info">
                <p><strong>Descuento:</strong> <?= $promotion->discount_percentage ?>%</p>
                <p><strong>Estado:</strong> <?= h($promotion->status) ?></p>
            </div>

            <div class="meta">
                <small>Creado: <?= $promotion->created->format('Y-m-d') ?></small><br>
                <small>Modificado: <?= $promotion->modified->format('Y-m-d') ?></small>
            </div>

            <div class="actions">
                <?= $this->Html->link('Ver', ['action' => 'view', $promotion->id], ['class' => 'btn-view-s']) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $promotion->id], ['class' => 'btn-edit-s']) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $promotion->id],
                    [
                        'confirm' => "¿Eliminar promoción '{$promotion->code}'?",
                        'class' => 'btn-delete-s'
                    ]
                ) ?>
            </div>

        </div>
    <?php endforeach; ?>
</div>
