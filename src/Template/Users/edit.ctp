<?php
$this->extend('/maine');
$this->start('links')
?>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $user->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
        )
        ?></li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
        echo $this->Form->control('username');
        echo $this->Form->control('role', [
            'options' => ['admin' => 'Admin', 'moderator' => 'Moderator' , 'cashier' => 'Cashier']
        ]) ?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>