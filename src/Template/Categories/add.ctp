<?php
$this->extend('/maine');
echo $this->Form->create($category)
?>
<fieldset>
    <legend><?= __('Add Category') ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?php $this->start('links') ?>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
