<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $place->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Places'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($place) ?>
<fieldset>
    <legend><?= __('Edit Places') ?></legend>
    <?php
    echo $this->Form->control('number');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
