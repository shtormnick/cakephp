<?php
$this->extend('/maine');
echo $this->Form->create($actor)
?>
    <fieldset>
        <legend><?= __('Add Actor') ?></legend>
        <?php
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('birthday');
        ?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?php
$this->start('links')
?>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Actors'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>