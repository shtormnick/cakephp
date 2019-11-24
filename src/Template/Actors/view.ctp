<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Actor'), ['action' => 'edit', $actor->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Actor'), ['action' => 'delete', $actor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actor->id)]) ?> </li>
<li><?= $this->Html->link(__('List Actors'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Actor'), ['action' => 'add']) ?> </li>
<?php $this->end()?>


<h3><?= h($actor->first_name) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($actor->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($actor->first_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Surname') ?></th>
        <td><?= h($actor->last_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Birthday') ?></th>
        <td><?= h($actor->birthday) ?></td>
    </tr>
</table>

