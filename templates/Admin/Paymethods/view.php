<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymethod $paymethod
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Paymethod'), ['action' => 'edit', $paymethod->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Paymethod'), ['action' => 'delete', $paymethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymethod->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Paymethods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Paymethod'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paymethods view content">
            <h3><?= h($paymethod->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cardholder Name') ?></th>
                    <td><?= h($paymethod->cardholder_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $paymethod->hasValue('user') ? $this->Html->link($paymethod->user->email, ['controller' => 'Users', 'action' => 'view', $paymethod->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Provider Name') ?></th>
                    <td><?= h($paymethod->provider_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Card Number') ?></th>
                    <td><?= h($paymethod->card_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cvv') ?></th>
                    <td><?= h($paymethod->cvv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($paymethod->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($paymethod->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($paymethod->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Trips') ?></h4>
                <?php if (!empty($paymethod->trips)) : ?>
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
                        <?php foreach ($paymethod->trips as $trip) : ?>
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