<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Place'), ['action' => 'edit', $place->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Place'), ['action' => 'delete', $place->id], ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]) ?> </li>
<li><?= $this->Html->link(__('List Place'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Place'), ['action' => 'add']) ?> </li>
<?php $this->end()?>


<h3><?= h($place->title) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($place->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Number') ?></th>
        <td><?= h($place->number) ?></td>
    </tr>

</table>

