<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $vehicles
 * @var string[]|\Cake\Collection\CollectionInterface $paymethods
 * @var string[]|\Cake\Collection\CollectionInterface $promotions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Trips'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="trips form content">
            <?= $this->Form->create($trip) ?>
            <fieldset>
                <legend><?= __('Edit Trip') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('vehicle_id', ['options' => $vehicles]);
                    echo $this->Form->control('start_station_id');
                    echo $this->Form->control('end_station_id');
                    echo $this->Form->control('paymethod_id', ['options' => $paymethods]);
                    echo $this->Form->control('promotion_id', ['options' => $promotions, 'empty' => true]);
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time', ['empty' => true]);
                    echo $this->Form->control('duration_minutes');
                    echo $this->Form->control('base_rate');
                    echo $this->Form->control('total_cost');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
