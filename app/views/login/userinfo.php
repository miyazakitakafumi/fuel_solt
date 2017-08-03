<div class="container">
<div class="row">

<h3>ユーザー情報一覧</h3>

<ul>
<?php foreach( $userinfo as $key=>$val){ ?>
    <li><?php echo $key; ?> : <?php echo $val; ?></li>
<?php } ?>
</ul>
        
<?php
echo Html::anchor('login/logout', 'ログアウト');
?>
    
</div>
</div>