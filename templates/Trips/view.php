<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trips'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trip'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trips view content">
            <h3><?= h($trip->status) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $trip->hasValue('user') ? $this->Html->link($trip->user->email, ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle') ?></th>
                    <td><?= $trip->hasValue('vehicle') ? $this->Html->link($trip->vehicle->serial_number, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Paymethod') ?></th>
                    <td><?= $trip->hasValue('paymethod') ? $this->Html->link($trip->paymethod->id, ['controller' => 'Paymethods', 'action' => 'view', $trip->paymethod->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Promotion') ?></th>
                    <td><?= $trip->hasValue('promotion') ? $this->Html->link($trip->promotion->code, ['controller' => 'Promotions', 'action' => 'view', $trip->promotion->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($trip->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trip->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Station Id') ?></th>
                    <td><?= $this->Number->format($trip->start_station_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Station Id') ?></th>
                    <td><?= $trip->end_station_id === null ? '' : $this->Number->format($trip->end_station_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration Minutes') ?></th>
                    <td><?= $trip->duration_minutes === null ? '' : $this->Number->format($trip->duration_minutes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Base Rate') ?></th>
                    <td><?= $this->Number->format($trip->base_rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Cost') ?></th>
                    <td><?= $trip->total_cost === null ? '' : $this->Number->format($trip->total_cost) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($trip->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($trip->end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($trip->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($trip->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>