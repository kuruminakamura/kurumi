
<?php echo 'ログインユーザ' . $auth['username']; ?>
<?php echo $this->Form->create('Tweet'); ?>
<?php echo $this->Form->hidden('user_id', array('value' => ($auth['id']))); ?>
<?php echo $this->Form->input('tweet'); ?>
<!-- <?php echo $this->Form->extends('tweet',array('action' => 'index') ); ?> -->


<?php echo $this->Form->end('登録'); ?>

<h2 class="text">tweet</h2>
<table>
	<th>tweet</th>
	<th>created</th>

<?php foreach ($Tweets as $tweet): ?>
<?php if($auth['id'] == $tweet['Tweet']['user_id']){ ?>
	<tr>
		<td><?php echo $tweet['Tweet']['tweet']; ?></td>
		<td><?php echo $tweet['Tweet']['created']; ?></td>
		<td><?php echo $this->Form->postLink('delete',
			array('action' => 'delete', $tweet['Tweet']['id']),
			array('class' => 'user_id')); ?></td>
	</tr>

 <!-- <h3>検索結果</h3>
 -->
    <table>
       
<?php }?>

<?php endforeach; ?>
</table>

<!-- <h1>フォロー</h1>

<?php echo $this->Form->input('username'); ?>
 <?php echo $this->Form->input('user_ID'); ?>   
<?php echo $this->Form->end('フォローする'); ?>
<?php echo $this->Form->end('検索'); ?>

<?php echo 'フォローしました。';?>
 -->
<?php echo $this->Html->link("検索",array('action'=>'search')); ?>

<?php echo $this->Html->link ("ログアウト",array('action'=>'../users/logout')); ?>
