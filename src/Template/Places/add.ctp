<?php
$this->extend('/maine');
echo $this->Form->create($place)
?>
    <fieldset>
        <legend><?= __('Add Place') ?></legend>
        <?php
        echo $this->Form->control('Number');
        ?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?php
$this->start('links')
?>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Place'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>