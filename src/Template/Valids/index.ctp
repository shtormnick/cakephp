<?php
   if($errors){
      foreach($errors as $error)
      foreach($error as $msg)

      echo '<font color = "red">'.$msg.'</font>l';
} else {
echo "No errors.";
}

echo $this->Form->create("Logins",array('url'=>'/validation'));
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('Submit');
echo $this->Form->end();
?>