<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Station $station
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Station'), ['action' => 'edit', $station->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Station'), ['action' => 'delete', $station->id], ['confirm' => __('Are you sure you want to delete # {0}?', $station->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Station'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="stations view content">
            <h3><?= h($station->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($station->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($station->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Latitude') ?></th>
                    <td><?= $this->Number->format($station->latitude) ?></td>
                </tr>
                <tr>
                    <th><?= __('Longitude') ?></th>
                    <td><?= $this->Number->format($station->longitude) ?></td>
                </tr>
                <tr>
                    <th><?= __('Capacity') ?></th>
                    <td><?= $station->capacity === null ? '' : $this->Number->format($station->capacity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($station->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($station->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($station->address)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>