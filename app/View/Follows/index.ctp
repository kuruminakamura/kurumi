<!-- 

<?php else: ?>
フォローしました。
<?php endif; ?>
 <br/>

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
        $is_followed = false;
        foreach ($follows as $searchcheck){
            // 自分自身ならスルー
            if($data['User']['username'] == $username['username']) {
            // フォローしていたらフラグを立てる
            } else if($data['User']['username'] == $searchcheck['Follow']['follower']) {
                $is_followed = true;
            }
        }
        if($is_followed) {
            echo $this->Form->create('Follow');
            echo $this->Form->hidden('follower',array('value'=>$data['User']['username']));
            echo $this->Form->submit('unfollow', ['name' => 'unfollow']);
            echo $this->Form->end();
        } else {
            echo $this->Form->create('Follow');
            echo $this->Form->hidden('follower',array('value'=>$data['User']['username']));
            echo $this->Form->submit('follow', ['name' => 'follow']);
            echo $this->Form->end();
        }
        echo("<br>");
    endif;
}



<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('user_ID'); ?>   
<?php echo $this->Form->end('フォローする'); ?>
<?php echo $this->Form->end('検索'); ?>

<?php echo 'フォローしました。';?>

<?php 
    echo $this->Html->link ("検索画面に戻る",array('action'=>'../tweets/search'));
?>
<br/>

<!-- ユーザー名や名前で検索<br />
 --><?php echo $this->Session->flash();
// debug($flash) ?>


 -->