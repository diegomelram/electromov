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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $station->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $station->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="stations form content">
            <?= $this->Form->create($station) ?>
            <fieldset>
                <legend><?= __('Edit Station') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('latitude');
                    echo $this->Form->control('longitude');
                    echo $this->Form->control('capacity');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
