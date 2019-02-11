<?php
   echo $this->Form->create("Logins",array('url'=>'/login'));
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('Submit');
echo $this->Form->end();
?>