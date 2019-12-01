<?php $this->start('script'); ?>
<!--<script src="https://unpkg.com/simple-jscalendar@1.4.3/source/jsCalendar.min.js" integrity="sha384-JqNLUzAxpw7zEu6rKS/TNPZ5ayCWPUY601zaig7cUEVfL+pBoLcDiIEkWHjl07Ot" crossorigin="anonymous"></script>-->
<!--<link rel="stylesheet" href="https://unpkg.com/simple-jscalendar@1.4.3/source/jsCalendar.min.css" integrity="sha384-+OB2CadpqXIt7AheMhNaVI99xKH8j8b+bHC8P5m2tkpFopGBklD3IRvYjPekeWIJ" crossorigin="anonymous">-->
<?php $this->end(); ?>

<div class="sessions index large-9 medium-8 columns content">
    <h3><?= __('Ticket') ?></h3>
<div class = "content">

<!--    <div id="my-calendar">-->
<!--        <script type="text/javascript">-->
<!--            // Get the element-->
<!--            var element = document.getElementById("my-calendar");-->
<!--            // Create the calendar-->
<!--            var myCalendar = jsCalendar.new(element);-->
<!--            // Add events-->
<!--            myCalendar.onDateClick(function(event, date){-->
<!--                console.log(date.getDate());-->
<!--                console.log(date.getFullYear());-->
<!--                console.log(date.getMonth());-->
<!--                window.location.href ="?year="+date.getFullYear()+"&month="+date.getMonth()+"&day="+date.getDate();-->
<!--            });-->
<!--        </script>-->
<!--    </div>-->

    <div class="search index large-4 medium-3 column content">
        <?= $this->Form->create("",['type'=>'get']) ?>
        <?= $this->Form->control('keyword', ['default'=> $this->request->query('keyword')]); ?>
        <button>Search</button>
        <?= $this->Form->end() ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('sell_time') ?></th>
            <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('place_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?= $this->Number->format($ticket->ticket_id) ?></td>
                <td><?= h($ticket->price) ?></td>
                <td><?= h($ticket->sell_time) ?></td>
                <td><?= h($ticket->session_id) ?></td>
                <td><?= h($ticket->place_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->ticket_id]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
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

