<?php
$this->extend('/maine');
echo $this->Form->create($ticket)
?>
    <fieldset>
        <legend><?= __('Add Ticket') ?></legend>
        <?php
        echo $this->Form->control('session_id', ['type' => 'hidden', 'required' => true, 'value' => $session->id]);
        echo $this->Form->control('price', ['type' => 'hidden', 'required' => true, 'value' => $session->price]);
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
