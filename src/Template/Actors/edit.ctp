<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $actor->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $actor->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Actors'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($actor) ?>
<fieldset>
    <legend><?= __('Edit Actor') ?></legend>
    <?php
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('birthday');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
