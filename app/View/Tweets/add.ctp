<h1>Add tweets</h1>
<?php
echo $this->Form->create('Tweets');
echo $this->Form->input('text', array('rows' => '3'));
echo $this->Form->end('Save tweets');
?>