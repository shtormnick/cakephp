<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $producer->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $producer->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Producers'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>

<?= $this->Form->create($producer) ?>
<fieldset>
    <legend><?= __('Edit producer') ?></legend>
    <?php
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('birthday');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
