<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
<?php $this->end()?>


<h3><?= h($session->title) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($session->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Hall') ?></th>
        <td><?= h($session->hall_id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Film') ?></th>
        <td><?= h($session->film_id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Start time') ?></th>
        <td><?= h($session->start) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Finish time') ?></th>
        <td><?= h($session->finish) ?></td>
    </tr>

</table>

