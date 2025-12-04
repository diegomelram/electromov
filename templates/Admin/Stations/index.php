<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Station> $stations
 */
?>

<link rel="stylesheet" href="/css/index.css">
<div class="header">
    <h2 class="title">Estaciones Registradas</h2>

    <?= $this->Html->link(
        'Nueva Estación',
        ['action' => 'add'],
        ['class' => 'add-btn']
    ) ?>
</div>

<div class="grid">
    <?php foreach ($stations as $station): ?>
        <div class="card">
            <div class="card-header">
                <h3 class="name"><?= h($station->name) ?></h3>
                <span class="id">ID #<?= $station->id ?></span>
            </div>

            <div class="info">
                <p><strong>Latitud:</strong> <?= $station->latitude ?></p>
                <p><strong>Longitud:</strong> <?= $station->longitude ?></p>
                <p><strong>Capacidad:</strong> <?= $station->capacity ?></p>
            </div>

            <div class="meta">
                <small>Creado: <?= $station->created->format('Y-m-d') ?></small><br>
                <small>Modificado: <?= $station->modified->format('Y-m-d') ?></small>
            </div>

            <div class="actions">
                <?= $this->Html->link('Ver', ['action' => 'view', $station->id], ['class' => 'btn-view-s']) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $station->id], ['class' => 'btn-edit-s']) ?>
                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $station->id],
                    [
                        'confirm' => "¿Eliminar estación '{$station->name}'?",
                        'class' => 'btn-delete-s'
                    ]
                ) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
