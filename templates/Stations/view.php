<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>
<link rel="stylesheet" href="/css/estilazo.css">
        <div class="stations view content">
            <h3> Vehículos disponibles en <?= h($station->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($station->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacity') ?></th>
                    <td><?= $station->capacity === null ? '' : $this->Number->format($station->capacity) ?></td>
                </tr>
            
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($station->address)); ?>
                </blockquote>
            </div>
        </div>

<section>
        <div class="model-section">
            <h2>Vehículos disponibles</h2>
            <p>Elige tu vehículo ideal y muévete por la ciudad.</p>
        </div>
            <div class="model-cards-container">
            <?php foreach ($availableVehicles as $vehicle): ?>
                <div class="vehicle-card">
                    <?php if (!empty($vehicle->model->image_path)): ?>
                        <?= $this->Html->image($vehicle->model->image_path, ['class' => 'vehicle-img']) ?>
                    <?php endif; ?>
                    
                    <h4><?= h($vehicle->model->name) ?></h4>
                    <p>Batería: <?= h($vehicle->battery_level) ?>%</p>
                    <p>Tarifa: $<?= $this->Number->format($vehicle->model->rate_per_minute) ?> / min</p>
                    
                    <?= $this->Html->link('Rentar Ahora', 
                        ['controller' => 'Trips', 'action' => 'add', $vehicle->id], 
                        ['class' => 'button']
                    ) ?>
                </div>
            <?php endforeach; ?>
            </div>
    </section>
