
<?php
$this->extend('/maine');
echo $this->Form->create($film)
?>

    <fieldset>
        <legend><?= __('Add Film') ?></legend>
        <?php
        echo $this->Form->control('title');
        echo $this->Form->control('description');
        echo $this->Form->control('release_year');
        echo $this->Form->control('actors._ids', ['options' => $actors]);
        echo $this->Form->control('producers._ids', ['options' => $producers]);
        echo $this->Form->control('categories._ids', ['options' => $categories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

<?php
$this->start('links')
?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('List Films'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
