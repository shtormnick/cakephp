<?php
   echo $this->Form->create("Localizations",array('url'=>'/locale'));
echo $this->Form->radio("locale",[
['value'=>'Eng','text'=>'English'],
['value'=>'Rus','text'=>'Russian'],
['value'=>'Ukr','text'=>'Ukrainian'],
]);
echo $this->Form->button('Change Language');
echo $this->Form->end();
?>
<?php echo __('msg'); ?>