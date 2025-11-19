<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Model> $models
 */
?>
<div class="models index content">
    <?= $this->Html->link(__('New Model'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Models') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('brand') ?></th>
                    <th><?= $this->Paginator->sort('rate_per_minute') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($models as $model): ?>
                <tr>
                    <td><?= $this->Number->format($model->id) ?></td>
                    <td><?= h($model->name) ?></td>
                    <td><?= h($model->type) ?></td>
                    <td><?= h($model->brand) ?></td>
                    <td><?= $model->rate_per_minute === null ? '' : $this->Number->format($model->rate_per_minute) ?></td>
                    <td><?= h($model->created) ?></td>
                    <td><?= h($model->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $model->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $model->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $model->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $model->id),
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