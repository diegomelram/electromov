
<link rel="stylesheet" href="/css/index2.css">
<div class="cards-header">
    <h3>Vehicles</h3>
    <?= $this->Html->link(__('New Vehicle'), ['action' => 'add'], ['class' => 'btn-add']) ?>
</div>

<div class="cards-grid">
    <?php foreach ($vehicles as $vehicle): ?>
    <div class="card vehicle-card">

        <div class="card-title">
            <?= h($vehicle->serial_number) ?>
        </div>

        <div class="card-body two-columns">

            <div class="col">
                <p><strong>ID:</strong> <?= $vehicle->id ?></p>
                <p><strong>Model:</strong>
                    <?= $vehicle->hasValue('model')
                        ? $this->Html->link($vehicle->model->name, ['controller' => 'Models', 'action' => 'view', $vehicle->model->id])
                        : '—'
                    ?>
                </p>
                <p><strong>Status:</strong> <?= h($vehicle->status) ?></p>
                <p><strong>Battery:</strong> <?= $vehicle->battery_level ?>%</p>
            </div>

            <div class="col">
                <p><strong>Latitude:</strong> <?= $vehicle->latitude ?? '—' ?></p>
                <p><strong>Longitude:</strong> <?= $vehicle->longitude ?? '—' ?></p>
                <p><strong>Current Station:</strong> <?= $vehicle->current_station_id ?? '—' ?></p>
                <p><strong>Created:</strong> <?= h($vehicle->created) ?></p>
                <p><strong>Modified:</strong> <?= h($vehicle->modified) ?></p>
            </div>
        </div>

        <div class="card-actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id], ['class' => 'btn-view']) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id], ['class' => 'btn-edit']) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], [
                'method' => 'delete',
                'class' => 'btn-delete',
                'confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id),
            ]) ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
