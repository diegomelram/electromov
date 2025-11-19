<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 * @var string[]|\Cake\Collection\CollectionInterface $models
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehicles form content">
            <?= $this->Form->create($vehicle) ?>
            <fieldset>
                <legend><?= __('Edit Vehicle') ?></legend>
                <?php
                    echo $this->Form->control('model_id', ['options' => $models]);
                    echo $this->Form->control('serial_number');
                    echo $this->Form->control('status');
                    echo $this->Form->control('battery_level');
                    echo $this->Form->control('latitude');
                    echo $this->Form->control('longitude');
                    echo $this->Form->control('current_station_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
