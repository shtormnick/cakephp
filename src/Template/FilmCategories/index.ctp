
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Film with category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Producers'), ['controller' => 'Producers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producer'), ['controller' => 'Producers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="film_category index large-9 medium-8 columns content">
    <h3><?= __('Films with actors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($film_categories as $film_category): ?>
        <tr>
            <td><?= $this->Number->format($film_actor->id) ?></td>
            <td><?= $film_category->has('film_category') ? $this->Html->link($film_category->category->id, ['controller' => 'Actors', 'action' => 'view', $film_category->category->id]) : '' ?></td>
            <td><?= h($film_category->film_id) ?></td>
            <td><?= h($film_category->category_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $film_category->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film_category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film_category->id)]) ?>
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
