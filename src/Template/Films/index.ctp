<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>

<div class="films index large-9 medium-8 columns content">
    <h3><?= __('Films') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('description') ?></th>
            <th scope="col"><?= $this->Paginator->sort('release_year') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($films as $film): ?>
        <tr>
            <td><?= $this->Number->format($film->id) ?></td>
            <td><?= h($film->title) ?></td>
            <td><?= h($film->description) ?></td>
            <td><?= h($film->release_year) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $film->id]) ?>
                <?= $this->Html->link(__('Add'), ['action' => 'add', $film->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id)]) ?>

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