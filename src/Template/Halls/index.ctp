<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>

<div class="halls index large-9 medium-8 columns content">
    <h3><?= __('Halls') ?></h3>
    <div class="search index large-4 medium-3 column content">
        <?= $this->Form->create("",['type'=>'get']) ?>
        <?= $this->Form->control('keyword', ['default'=> $this->request->query('keyword')]); ?>
        <button>Search</button>
        <?= $this->Form->end() ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($halls as $hall): ?>
            <tr>
                <td><?= $this->Number->format($hall->id) ?></td>
                <td><?= h($hall->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hall->id]) ?>
                    <?= $this->Html->link(__('Add'), ['action' => 'add', $hall->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hall->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hall->id)]) ?>

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