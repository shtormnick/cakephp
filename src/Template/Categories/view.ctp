<?php
$this->extend('/maine');
$this->start('links')
?>

<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
<li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
<?php $this->end() ?>

<h3><?= h($category->title) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($category->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($category->name) ?></td>
    </tr>
</table>

</div>