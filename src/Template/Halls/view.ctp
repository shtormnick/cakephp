<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Hall'), ['action' => 'edit', $hall->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Hall'), ['action' => 'delete', $hall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hall->id)]) ?> </li>
<li><?= $this->Html->link(__('List of Halls'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Hall'), ['action' => 'add']) ?> </li>
<?php $this->end()?>


<h3><?= h($hall->title) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($hall->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($hall->name) ?></td>
    </tr>
</table>

