<?php
$this->extend('/maine');
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('List Ticket'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?> </li>
<?php $this->end()?>


<h3><?= h($ticket->ticket_id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($ticket->ticket_id) ?></td>
    </tr>
<!--    <tr>-->
<!--        <th scope="row">--><?//= __('Hall') ?><!--</th>-->
<!--        <td>--><?//= h($ticket->hall_id) ?><!--</td>-->
<!--    </tr>-->
    <tr>
        <th scope="row"><?= __('Price') ?></th>
        <td><?= h($ticket->price) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Sell time') ?></th>
        <td><?= h($ticket->sell_time) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Place') ?></th>
        <td><?= h($ticket->place_id) ?></td>
    </tr>

</table>

