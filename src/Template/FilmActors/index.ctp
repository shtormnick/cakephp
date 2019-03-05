
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Film with actor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actors'), ['controller' => 'Actors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Producers'), ['controller' => 'Producers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producer'), ['controller' => 'Producers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="film_actors index large-9 medium-8 columns content">
    <h3><?= __('Films with actors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($film_actors as $film_actor): ?>
        <tr>
            <td><?= $this->Number->format($film_actor->id) ?></td>
            <td><?= $film_actor->has('film_actor') ? $this->Html->link($film_actor->actor->id, ['controller' => 'Actors', 'action' => 'view', $film_actor->actor->id]) : '' ?></td>
            <td><?= h($film_actor->film_id) ?></td>
            <td><?= h($film_actor->actor_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $film_actor->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film_actor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $film_actor->id)]) ?>
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
