<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehicle> $vehicles
 */
?>
<div class="vehicles index content">
    <?= $this->Html->link(__('New Vehicle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vehicles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('serial_number') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('battery_level') ?></th>
                    <th><?= $this->Paginator->sort('latitude') ?></th>
                    <th><?= $this->Paginator->sort('longitude') ?></th>
                    <th><?= $this->Paginator->sort('current_station_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?= $this->Number->format($vehicle->id) ?></td>
                    <td><?= $vehicle->hasValue('model') ? $this->Html->link($vehicle->model->name, ['controller' => 'Models', 'action' => 'view', $vehicle->model->id]) : '' ?></td>
                    <td><?= h($vehicle->serial_number) ?></td>
                    <td><?= h($vehicle->status) ?></td>
                    <td><?= $this->Number->format($vehicle->battery_level) ?></td>
                    <td><?= $vehicle->latitude === null ? '' : $this->Number->format($vehicle->latitude) ?></td>
                    <td><?= $vehicle->longitude === null ? '' : $this->Number->format($vehicle->longitude) ?></td>
                    <td><?= $vehicle->current_station_id === null ? '' : $this->Number->format($vehicle->current_station_id) ?></td>
                    <td><?= h($vehicle->created) ?></td>
                    <td><?= h($vehicle->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $vehicle->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id),
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