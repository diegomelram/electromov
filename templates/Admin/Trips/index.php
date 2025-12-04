<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Trip> $trips
 */
?>

<link rel="stylesheet" href="/css/index2.css">

<div class="page-header">
    <h2 class="title">Gestión de Viajes</h2>

    <div class="actions-top">
        <?= $this->Html->link(
            ' Agregar Viaje',
            ['action' => 'add'],
            ['class' => 'btn-add']
        ) ?>
    </div>
</div>

<div class="grid-trips">
    <?php foreach ($trips as $trip): ?>
        <div class="trip-card">

            <h3>Viaje #<?= $trip->id ?></h3>

            <p><strong>Usuario:</strong>
                <?= $trip->hasValue('user') ? $trip->user->email : '—' ?>
            </p>

            <p><strong>Vehículo:</strong>
                <?= $trip->hasValue('vehicle') ? $trip->vehicle->serial_number : '—' ?>
            </p>

            <p><strong>Inicio:</strong> <?= $trip->start_station_id ?></p>
            <p><strong>Fin:</strong> <?= $trip->end_station_id ?? '—' ?></p>

            <p><strong>Costo:</strong> $<?= $trip->total_cost ?? '0.00' ?></p>

            <p><strong>Estado:</strong>
                <span class="status <?= strtolower($trip->status) ?>">
                    <?= h($trip->status) ?>
                </span>
            </p>

            <div class="card-actions">
                <a href="#trip-<?= $trip->id ?>" class="btn-details">Ver detalles →</a>
            </div>

        </div>


        <!-- PANEL LATERAL SIN JS -->
        <div id="trip-<?= $trip->id ?>" class="side-panel">
            <a href="#" class="close-panel">✖</a>
            <h2>Detalles del Viaje #<?= $trip->id ?></h2>

            <div class="panel-content">
                <p><strong>Usuario:</strong>
                    <?= $trip->hasValue('user') ? $trip->user->email : '—' ?>
                </p>

                <p><strong>Vehículo:</strong>
                    <?= $trip->hasValue('vehicle') ? $trip->vehicle->serial_number : '—' ?>
                </p>

                <p><strong>Inicio:</strong> <?= $trip->start_station_id ?></p>
                <p><strong>Fin:</strong> <?= $trip->end_station_id ?? '—' ?></p>

                <p><strong>Salida:</strong> <?= h($trip->start_time) ?></p>
                <p><strong>Llegada:</strong> <?= h($trip->end_time) ?></p>

                <p><strong>Costo Total:</strong> $<?= $trip->total_cost ?? '0.00' ?></p>

                <p><strong>Estado:</strong>
                    <span class="status <?= strtolower($trip->status) ?>">
                        <?= h($trip->status) ?>
                    </span>
                </p>

                <hr>

                <div class="panel-buttons">
                    <?= $this->Html->link('👁 Ver', ['action' => 'view', $trip->id], ['class' => 'btn-view']) ?>
                    <?= $this->Html->link('✏️ Editar', ['action' => 'edit', $trip->id], ['class' => 'btn-edit']) ?>
                    <?= $this->Form->postLink(
                        '🗑 Eliminar',
                        ['action' => 'delete', $trip->id],
                        [
                            'confirm' => "¿Eliminar el viaje #{$trip->id}?",
                            'class'   => 'btn-delete'
                        ]
                    ) ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>
