


<?php// echo $searchname; ?>
<?php// if($searchname==NULL):?>
<?php// else: ?>
検索結果
<?php// endif; ?>
 <br/>
<?php
 //echo $this->Form->create('Search');
 // echo $this->Form->input('名前',array('label'=>'')); 

// foreach ($users as $data){
//      if(empty($data)):
//      echo print(h("データが見つかりませんでした。"));
//      else:
//     echo $data['User']['username'];
    // echo $this->HTML->link($data['User']['username'],array('action'=>'mypage'));   
    // echo("<br>");
    // echo nl2br($data['joinTweet'][0]['tweet']);
    // echo("<br>");
    // echo($data['joinTweet'][0]['tweettime']);
    // echo("<br>");
    //if($follows !=NULL):
 //    $count = 0;
 //    foreach ($follows as $searchcheck){

 //    if(($searchcheck['Follow']['follower']==$data['User']['username'] || ($data['User']['username'] == $username['username']))):
 //    $count++;
 //    //if(($searchcheck['Follow']['follower']==$data['User']['username'])):
 //    else:
 //    //if($data['User']['username']==$searchcheck['Follow']['follow']):

 //    endif;

 //    if($count == 0):
 //    echo $this->Form->create('Follow');
 //    echo $this->Form->hidden('follow',array('value'=>$username['username']));
 //    echo $this->Form->hidden('follower',array('value'=>$data['User']['username']));
 //     echo $this->Form->end('follow');
 //     $count++;
 //    endif;
 // }
 //    echo("<br>");
     // endif;

 //   }

 // echo $this->Form->end('検索');
 ?>

  <?php foreach ($users as $key => $user): ?>

        <tr>
            <td><?php echo $user['User']['username'] ?></td>
           
            <td>
                <?php
                echo $this->Form->create('Follow');
                echo $this->Form->hidden('follow_id',array('value' => $user['User']['id']));
                echo $this->Form->hidden('user_id',array('value' => AuthComponent::user('id')));
                echo $this->Form->hidden('searchname',array('value' => $searchname));
                echo $this->Form->end('フォロー');
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

<?php 
    echo $this->Html->link ("検索画面に戻る",array('action'=>'../tweets/search'));
?>
<br/>

<!-- ユーザー名や名前で検索<br />
 --><?php echo $this->Session->flash();
// debug($flash) ?>
 <?php 
 
    ?>