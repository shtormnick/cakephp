<?php
$this->extend('/maine');
echo $this->Form->create($ticket)
?>
    <fieldset>
        <legend><?= __('Add Ticket') ?></legend>
        <?php
        echo $this->Form->control('session_id', ['type' => 'hidden', 'required' => true, 'value' => $session->id]);
        echo $this->Form->control('price', [ 'required' => true, 'value' => $session->price]);
        echo $this->Form->control('place_id', [ 'required' => true, 'options' => $places]);
        ?>
    </fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

<?php
$this->start('links')
?>
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
