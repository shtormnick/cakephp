<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $hall->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $hall->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List of Halls'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($hall) ?>
<fieldset>
    <legend><?= __('Edit Hall') ?></legend>
    <?php
    echo $this->Form->control('name');

    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
