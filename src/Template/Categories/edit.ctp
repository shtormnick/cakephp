<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $category->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>

<?= $this->Form->create($category) ?>
<fieldset>
    <legend><?= __('Edit Category') ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
