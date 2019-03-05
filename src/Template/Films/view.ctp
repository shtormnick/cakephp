<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id)]) ?> </li>
<li><?= $this->Html->link(__('List Films'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Film'), ['action' => 'add']) ?> </li>
<?php $this->end() ?>


<h3><?= h($film->title) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($film->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Title') ?></th>
        <td><?= h($film->title) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Description') ?></th>
        <td><?= h($film->description) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Release Year') ?></th>
        <td><?= h($film->release_year) ?></td>
    </tr>
</table>

