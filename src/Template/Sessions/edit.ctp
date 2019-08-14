<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Sessions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $session->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($session) ?>
<fieldset>
    <legend><?= __('Edit Actor') ?></legend>
    <?php
    echo $this->Form->control('hall_id');
    echo $this->Form->control('start');
    echo $this->Form->control('finish');
    echo $this->Form->control('film_id');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
