<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 * @var \Cake\Collection\CollectionInterface|string[] $models
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehicles form content">
            <?= $this->Form->create($vehicle) ?>
            <fieldset>
                <legend><?= __('Add Vehicle') ?></legend>
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
