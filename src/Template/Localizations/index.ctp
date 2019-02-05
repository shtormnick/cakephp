<?php
   echo $this->Form->create("Localizations",array('url'=>'/locale'));
echo $this->Form->radio("locale",[
['value'=>'en_US','text'=>'English'],
['value'=>'ru_RU','text'=>'Russian'],
['value'=>'ua_UA','text'=>'Ukrainian'],
]);
echo $this->Form->button('Change Language');
echo $this->Form->end();
?>
<?php echo __('msg'); ?>