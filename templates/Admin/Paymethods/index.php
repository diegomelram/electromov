<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paymethod> $paymethods
 */
?>
<div class="paymethods index content">
    <?= $this->Html->link(__('New Paymethod'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Paymethods') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cardholder_name') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('provider_name') ?></th>
                    <th><?= $this->Paginator->sort('card_number') ?></th>
                    <th><?= $this->Paginator->sort('cvv') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paymethods as $paymethod): ?>
                <tr>
                    <td><?= $this->Number->format($paymethod->id) ?></td>
                    <td><?= h($paymethod->cardholder_name) ?></td>
                    <td><?= $paymethod->hasValue('user') ? $this->Html->link($paymethod->user->email, ['controller' => 'Users', 'action' => 'view', $paymethod->user->id]) : '' ?></td>
                    <td><?= h($paymethod->provider_name) ?></td>
                    <td><?= h($paymethod->card_number) ?></td>
                    <td><?= h($paymethod->cvv) ?></td>
                    <td><?= h($paymethod->created) ?></td>
                    <td><?= h($paymethod->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paymethod->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymethod->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $paymethod->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $paymethod->id),
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