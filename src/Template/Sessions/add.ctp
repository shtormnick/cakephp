<?php
$this->extend('/maine');
echo $this->Form->create($session)
?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
        echo $this->Form->control('hall_id');
        echo $this->Form->control('start');
        echo $this->Form->control('finish');
        echo $this->Form->control('film_id');
        ?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?php
$this->start('links')
?>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
