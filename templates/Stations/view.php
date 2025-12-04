<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>

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
            <?php foreach ($vehicleModels as $model): ?>
                <div class="model-card">
                    <h3><?= h($model->name) ?></h3>
                    <?php if (!empty($model->image_path)): ?>
                        <?= $this->Html->image($model->image_path, [
                            'alt' => 'Imagen de ' . h($model->name), 
                            'class' => 'model-img',
                            'style' => 'max-width: 200px; height: 200px;' // Optional styling
                        ]) ?>
                    <?php else: ?>
                        <?= $this->Html->image('placeholder.png', ['alt' => 'Sin imagen', 'class' => 'model-img']) ?>
                    <?php endif; ?>
                    <p class="model-type">Tipo: <strong><?= h(ucfirst($model->type)) ?></strong></p>
                    <p class="model-brand">Marca: <?= h($model->brand) ?></p>
                    
                    <div class="price-box">
                        Tarifa Fija: 
                        <span class="rate-per-minute">
                            $<?= h(number_format($model->rate_per_minute, 2)) ?> / Minuto
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php pj($vehicleModels) ?>
    </section>
