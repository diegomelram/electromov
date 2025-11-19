<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vehicle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehicles view content">
            <h3><?= h($vehicle->serial_number) ?></h3>
            <table>
                <tr>
                    <th><?= __('Model') ?></th>
                    <td><?= $vehicle->hasValue('model') ? $this->Html->link($vehicle->model->name, ['controller' => 'Models', 'action' => 'view', $vehicle->model->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Serial Number') ?></th>
                    <td><?= h($vehicle->serial_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($vehicle->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vehicle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Battery Level') ?></th>
                    <td><?= $this->Number->format($vehicle->battery_level) ?></td>
                </tr>
                <tr>
                    <th><?= __('Latitude') ?></th>
                    <td><?= $vehicle->latitude === null ? '' : $this->Number->format($vehicle->latitude) ?></td>
                </tr>
                <tr>
                    <th><?= __('Longitude') ?></th>
                    <td><?= $vehicle->longitude === null ? '' : $this->Number->format($vehicle->longitude) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Station Id') ?></th>
                    <td><?= $vehicle->current_station_id === null ? '' : $this->Number->format($vehicle->current_station_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($vehicle->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($vehicle->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Trips') ?></h4>
                <?php if (!empty($vehicle->trips)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Vehicle Id') ?></th>
                            <th><?= __('Start Station Id') ?></th>
                            <th><?= __('End Station Id') ?></th>
                            <th><?= __('Paymethod Id') ?></th>
                            <th><?= __('Promotion Id') ?></th>
                            <th><?= __('Start Time') ?></th>
                            <th><?= __('End Time') ?></th>
                            <th><?= __('Duration Minutes') ?></th>
                            <th><?= __('Base Rate') ?></th>
                            <th><?= __('Total Cost') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($vehicle->trips as $trip) : ?>
                        <tr>
                            <td><?= h($trip->id) ?></td>
                            <td><?= h($trip->user_id) ?></td>
                            <td><?= h($trip->vehicle_id) ?></td>
                            <td><?= h($trip->start_station_id) ?></td>
                            <td><?= h($trip->end_station_id) ?></td>
                            <td><?= h($trip->paymethod_id) ?></td>
                            <td><?= h($trip->promotion_id) ?></td>
                            <td><?= h($trip->start_time) ?></td>
                            <td><?= h($trip->end_time) ?></td>
                            <td><?= h($trip->duration_minutes) ?></td>
                            <td><?= h($trip->base_rate) ?></td>
                            <td><?= h($trip->total_cost) ?></td>
                            <td><?= h($trip->status) ?></td>
                            <td><?= h($trip->created) ?></td>
                            <td><?= h($trip->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trip->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trip->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Trips', 'action' => 'delete', $trip->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $trip->id),
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