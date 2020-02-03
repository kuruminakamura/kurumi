<!-- <?php echo $searchname; ?>
<?php if($searchname==NULL):?> -->
検索結果
<?php else: ?>
の検索結果
<?php endif; ?>
 <br/>
<?php
 echo $this->Form->create('Search');
 echo $this->Form->input('名前',array('label'=>'')); 
 echo $this->Form->end('検索');
 ?>

ユーザー名や名前で検索<br />
<?php echo $this->Session->flash(); ?>
 <?php 
 foreach ($userdata as $data){
     if(empty($data)):
     echo print(h("データが見つかりませんでした。"));
     else:
    echo $this->HTML->link($data['User']['username'],array('action'=>'mypage'));   
    echo("<br>");
    echo nl2br($data['joinTweet'][0]['tweet']);
    echo("<br>");
    echo($data['joinTweet'][0]['tweettime']);
    echo("<br>");
    //if($follows !=NULL):
    $count = 0;
    foreach ($follows as $searchcheck){

    if(($searchcheck['Follow']['follower']==$data['User']['username'] || ($data['User']['username'] == $username['username']))):
    $count++;
    //if(($searchcheck['Follow']['follower']==$data['User']['username'])):
    else:
    //if($data['User']['username']==$searchcheck['Follow']['follow']):

    endif;

    if($count == 0):
    echo $this->Form->create('Follow');
    echo $this->Form->hidden('follow',array('value'=>$username['username']));
    echo $this->Form->hidden('follower',array('value'=>$data['User']['username']));
     echo $this->Form->end('follow');
     $count++;
    endif;
 }
    echo("<br>");
    endif;
   }
    ?>