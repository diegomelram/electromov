<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Model> $models
 */
?>

<link rel="stylesheet" href="/css/index.css">
<div class="header">
    <h2 class="-title">Modelos Registrados</h2>

    <?= $this->Html->link(
        'Nuevo Modelo',
        ['action' => 'add'],
        ['class' => 'add-btn']
    ) ?>
</div>

<div class="grid">
    <?php foreach ($models as $model): ?>
        <div class="card">
            <div class="card-header">
                <h3 class="name"><?= h($model->name) ?></h3>
                <span class="id">ID #<?= $model->id ?></span>
            </div>

            <div class="info">
                <p><strong>Tipo:</strong> <?= h($model->type) ?></p>
                <p><strong>Marca:</strong> <?= h($model->brand) ?></p>
                <p><strong>Tarifa por minuto:</strong> 
                    <?= $model->rate_per_minute === null 
                        ? 'N/A' 
                        : '$' . $this->Number->format($model->rate_per_minute) ?>
                </p>
            </div>

            <div class="meta">
                <small>Creado: <?= $model->created->format('Y-m-d') ?></small><br>
                <small>Modificado: <?= $model->modified->format('Y-m-d') ?></small>
            </div>

            <div class="actions">
                <?= $this->Html->link('Ver', ['action' => 'view', $model->id], ['class' => 'btn-view-s']) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $model->id], ['class' => 'btn-edit-s']) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $model->id],
                    [
                        'confirm' => "¿Eliminar modelo '{$model->name}'?",
                        'class' => 'btn-delete-s'
                    ]
                ) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
