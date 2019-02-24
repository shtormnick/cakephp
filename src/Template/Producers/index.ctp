<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>

<div class="bookmarks index large-9 medium-8 columns content">
    <h3><?= __('Producers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($producers as $producer): ?>
        <tr>
            <td><?= $this->Number->format($producer->id) ?></td>
            <td><?= h($producer->first_name) ?></td>
            <td><?= h($producer->last_name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $producer->id]) ?>
                <?= $this->Html->link(__('Add'), ['action' => 'add', $producer->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $producer->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $producer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producer->id)]) ?>

            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>