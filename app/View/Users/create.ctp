<h1>新規登録</h1>

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username'); ?>    
<?php echo $this->Form->input('mail'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->input('password確認'); ?>
<?php echo $this->Form->end('登録'); ?>

