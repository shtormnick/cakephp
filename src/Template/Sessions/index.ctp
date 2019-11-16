<?php $this->start('script'); ?>
<script src="https://unpkg.com/simple-jscalendar@1.4.3/source/jsCalendar.min.js" integrity="sha384-JqNLUzAxpw7zEu6rKS/TNPZ5ayCWPUY601zaig7cUEVfL+pBoLcDiIEkWHjl07Ot" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/simple-jscalendar@1.4.3/source/jsCalendar.min.css" integrity="sha384-+OB2CadpqXIt7AheMhNaVI99xKH8j8b+bHC8P5m2tkpFopGBklD3IRvYjPekeWIJ" crossorigin="anonymous">
<?php $this->end(); ?>

<div class="sessions index large-9 medium-8 columns content">
    <h3><?= __('Session') ?></h3>
<div class = "content">

    <div id="my-calendar">
        <script type="text/javascript">
            // Get the element
            var element = document.getElementById("my-calendar");
            // Create the calendar
            var myCalendar = jsCalendar.new(element);
            // Add events
            myCalendar.onDateClick(function(event, date){
                console.log(date.getDate());
                console.log(date.getFullYear());
                console.log(date.getMonth());
                window.location.href ="?year="+date.getFullYear()+"&month="+date.getMonth()+"&day="+date.getDate();
            });
        </script>
    </div>

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
            <th scope="col"><?= $this->Paginator->sort('hall_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('start') ?></th>
            <th scope="col"><?= $this->Paginator->sort('finish') ?></th>
            <th scope="col"><?= $this->Paginator->sort('film_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= $this->Number->format($session->id) ?></td>
                <td><?= h($session->hall_id) ?></td>
                <td><?= h($session->start) ?></td>
                <td><?= h($session->finish) ?></td>
                <td><?= h($session->film_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $session->id]) ?>
                    <?= $this->Html->link(__('Add'), ['action' => 'add', $session->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $session->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?>

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
</div>
