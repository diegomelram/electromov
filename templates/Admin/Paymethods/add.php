<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymethod $paymethod
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Paymethods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paymethods form content">
            <?= $this->Form->create($paymethod) ?>
            <fieldset>
                <legend><?= __('Add Paymethod') ?></legend>
                <?php
                    echo $this->Form->control('cardholder_name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('provider_name');
                    echo $this->Form->control('card_number');
                    echo $this->Form->control('cvv');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
