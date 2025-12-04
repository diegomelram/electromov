<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model $model
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Model'), ['action' => 'edit', $model->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Model'), ['action' => 'delete', $model->id], ['confirm' => __('Are you sure you want to delete # {0}?', $model->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Models'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Model'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="models view content">
            <h3><?= h($model->name) ?></h3>

            <?php if (!empty($model->image_path)): ?>
                <div class="image-display-container" style="text-align: center; margin-bottom: 20px;">
                    <h4>Imagen del Modelo</h4>
                    <?= $this->Html->image($model->image_path, [
                        'alt' => h($model->name),
                        'style' => 'max-width: 300px; height: 300px;' // Larger image styling
                    ]) ?>
                </div>
            <?php else: ?>
                <p>Ruta de Imagen: No definida</p>
            <?php endif; ?>
            
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($model->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($model->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= h($model->brand) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($model->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rate Per Minute') ?></th>
                    <td><?= $model->rate_per_minute === null ? '' : $this->Number->format($model->rate_per_minute) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($model->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($model->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Vehicles') ?></h4>
                <?php if (!empty($model->vehicles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Model Id') ?></th>
                            <th><?= __('Serial Number') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Battery Level') ?></th>
                            <th><?= __('Latitude') ?></th>
                            <th><?= __('Longitude') ?></th>
                            <th><?= __('Current Station Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($model->vehicles as $vehicle) : ?>
                        <tr>
                            <td><?= h($vehicle->id) ?></td>
                            <td><?= h($vehicle->model_id) ?></td>
                            <td><?= h($vehicle->serial_number) ?></td>
                            <td><?= h($vehicle->status) ?></td>
                            <td><?= h($vehicle->battery_level) ?></td>
                            <td><?= h($vehicle->latitude) ?></td>
                            <td><?= h($vehicle->longitude) ?></td>
                            <td><?= h($vehicle->current_station_id) ?></td>
                            <td><?= h($vehicle->created) ?></td>
                            <td><?= h($vehicle->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Vehicles', 'action' => 'view', $vehicle->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicles', 'action' => 'edit', $vehicle->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Vehicles', 'action' => 'delete', $vehicle->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>