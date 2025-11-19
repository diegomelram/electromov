<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Promotion> $promotions
 */
?>
<div class="promotions index content">
    <?= $this->Html->link(__('New Promotion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Promotions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('discount_percentage') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promotions as $promotion): ?>
                <tr>
                    <td><?= $this->Number->format($promotion->id) ?></td>
                    <td><?= h($promotion->code) ?></td>
                    <td><?= $this->Number->format($promotion->discount_percentage) ?></td>
                    <td><?= h($promotion->status) ?></td>
                    <td><?= h($promotion->created) ?></td>
                    <td><?= h($promotion->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $promotion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotion->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $promotion->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $promotion->id),
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