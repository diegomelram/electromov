<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
        <div class="signup">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Regístrate') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                    echo $this->Form->control('full_name');
                    /*echo $this->Form->control('admin');*/
                    echo $this->Form->control('sex');
                    echo $this->Form->control('age');
                    echo $this->Form->control('date_birth', ['empty' => true]);
                    echo $this->Form->control('address');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>

