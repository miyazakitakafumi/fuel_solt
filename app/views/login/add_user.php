
<div class="container">
<div class="row">
    
<?php if($messages): ?>
<div class="alert alert-warning">
    <?php echo $messages;?>
</div>    
<?php endif ?>

<form name="form1" method="post" action="">
<h2>ユーザー登録</h2>
    
<label for="username">ユーザー名</label>
<input type="text" id="username" name="username">
    
<br />
    
<label for="email">Eメール</label>
<input type="text" id="email" name="email">
    
<br />
 
<label for="password">パスワード</label>
<input type="text" id="password" name="password">
    
<br />

<input type="submit" value="登録">    

<br />

<?php
echo Html::anchor('login/index', 'ログイン画面');
?>

</form>

</div>
</div>