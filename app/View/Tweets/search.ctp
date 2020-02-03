<h1>検索</h1>
 <?php

 echo $this->Form->create('Search',array('url'=>'find'));
 echo $this->Form->input('username');
 echo $this->Form->end('検索');

 ?>
