<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Station> $stations
 */
?>
<div class="stations index content">
    <?= $this->Html->link(__('New Station'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('latitude') ?></th>
                    <th><?= $this->Paginator->sort('longitude') ?></th>
                    <th><?= $this->Paginator->sort('capacity') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stations as $station): ?>
                <tr>
                    <td><?= $this->Number->format($station->id) ?></td>
                    <td><?= h($station->name) ?></td>
                    <td><?= $this->Number->format($station->latitude) ?></td>
                    <td><?= $this->Number->format($station->longitude) ?></td>
                    <td><?= $station->capacity === null ? '' : $this->Number->format($station->capacity) ?></td>
                    <td><?= h($station->created) ?></td>
                    <td><?= h($station->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $station->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $station->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $station->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $station->id),
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

<?php debug($stations) ?>