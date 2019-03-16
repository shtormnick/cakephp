<?php
$this->extend('/maine');
$this->start('links');
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $film->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $film->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Films'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>


<?= $this->Form->create($film) ?>
<fieldset>
    <legend><?= __('Edit Film') ?></legend>
    <?php
    echo $this->Form->control('title');
    echo $this->Form->control('description');
    echo $this->Form->control('release_year');
    echo $this->Form->control('actors._ids', ['options' => $actors]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

