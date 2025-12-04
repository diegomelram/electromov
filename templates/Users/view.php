<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
            <h4 class="heading"><?= __('Mi perfil') ?></h4>
            <?= $this->Html->link(__('Editar usuario'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Full Name') ?></th>
                    <td><?= h($user->full_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sex') ?></th>
                    <td><?= h($user->sex) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= $user->age === null ? '' : $this->Number->format($user->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Birth') ?></th>
                    <td><?= h($user->date_birth) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->address)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Paymethods') ?></h4>
                <?php if (!empty($user->paymethods)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Cardholder Name') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Provider Name') ?></th>
                            <th><?= __('Card Number') ?></th>
                            <th><?= __('Cvv') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->paymethods as $paymethod) : ?>
                        <tr>
                            <td><?= h($paymethod->id) ?></td>
                            <td><?= h($paymethod->cardholder_name) ?></td>
                            <td><?= h($paymethod->user_id) ?></td>
                            <td><?= h($paymethod->provider_name) ?></td>
                            <td><?= h($paymethod->card_number) ?></td>
                            <td><?= h($paymethod->cvv) ?></td>
                            <td><?= h($paymethod->created) ?></td>
                            <td><?= h($paymethod->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Paymethods', 'action' => 'view', $paymethod->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Paymethods', 'action' => 'edit', $paymethod->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Paymethods', 'action' => 'delete', $paymethod->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $paymethod->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Trips') ?></h4>
                <?php if (!empty($user->trips)) : ?>
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
                            <th class="actions"><?= __('Ver viaje') ?></th>
                        </tr>
                        <?php foreach ($user->trips as $trip) : ?>
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
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trip->id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
