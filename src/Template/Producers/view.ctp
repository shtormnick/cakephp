<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Producer'), ['action' => 'edit', $producer->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Producer'), ['action' => 'delete', $producer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producer->id)]) ?> </li>
<li><?= $this->Html->link(__('List Producers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Producer'), ['action' => 'add']) ?> </li>
<?php $this->end() ?>


<h3><?= h($producer->title) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($producer->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($producer->first_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Surname') ?></th>
        <td><?= h($producer->last_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Birthday') ?></th>
        <td><?= h($producer->birthday) ?></td>
    </tr>
</table>


