<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Trip> $trips
 */
?>
<div class="trips index content">
    <?= $this->Html->link(__('New Trip'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trips') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                    <th><?= $this->Paginator->sort('start_station_id') ?></th>
                    <th><?= $this->Paginator->sort('end_station_id') ?></th>
                    <th><?= $this->Paginator->sort('paymethod_id') ?></th>
                    <th><?= $this->Paginator->sort('promotion_id') ?></th>
                    <th><?= $this->Paginator->sort('start_time') ?></th>
                    <th><?= $this->Paginator->sort('end_time') ?></th>
                    <th><?= $this->Paginator->sort('duration_minutes') ?></th>
                    <th><?= $this->Paginator->sort('base_rate') ?></th>
                    <th><?= $this->Paginator->sort('total_cost') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trips as $trip): ?>
                <tr>
                    <td><?= $this->Number->format($trip->id) ?></td>
                    <td><?= $trip->hasValue('user') ? $this->Html->link($trip->user->email, ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
                    <td><?= $trip->hasValue('vehicle') ? $this->Html->link($trip->vehicle->serial_number, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
                    <td><?= $this->Number->format($trip->start_station_id) ?></td>
                    <td><?= $trip->end_station_id === null ? '' : $this->Number->format($trip->end_station_id) ?></td>
                    <td><?= $trip->hasValue('paymethod') ? $this->Html->link($trip->paymethod->id, ['controller' => 'Paymethods', 'action' => 'view', $trip->paymethod->id]) : '' ?></td>
                    <td><?= $trip->hasValue('promotion') ? $this->Html->link($trip->promotion->code, ['controller' => 'Promotions', 'action' => 'view', $trip->promotion->id]) : '' ?></td>
                    <td><?= h($trip->start_time) ?></td>
                    <td><?= h($trip->end_time) ?></td>
                    <td><?= $trip->duration_minutes === null ? '' : $this->Number->format($trip->duration_minutes) ?></td>
                    <td><?= $this->Number->format($trip->base_rate) ?></td>
                    <td><?= $trip->total_cost === null ? '' : $this->Number->format($trip->total_cost) ?></td>
                    <td><?= h($trip->status) ?></td>
                    <td><?= h($trip->created) ?></td>
                    <td><?= h($trip->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trip->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trip->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $trip->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $trip->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>