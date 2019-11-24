<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Ticket') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $ticket->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($ticket) ?>
<fieldset>
    <legend><?= __('Edit Ticket') ?></legend>
    <?php
    echo $this->Form->control('ticket_id');
    echo $this->Form->control('price');
    echo $this->Form->control('sell_time');
    echo $this->Form->control('session_id');
    echo $this->Form->control('place_id');
//    echo $this->Form->control('film_id', ['options' => $film]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
