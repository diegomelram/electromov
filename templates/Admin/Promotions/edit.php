<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promotion $promotion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $promotion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $promotion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Promotions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="promotions form content">
            <?= $this->Form->create($promotion) ?>
            <fieldset>
                <legend><?= __('Edit Promotion') ?></legend>
                <?php
                    echo $this->Form->control('code');
                    echo $this->Form->control('discount_percentage');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
