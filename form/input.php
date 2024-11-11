<?php

if(!empty(echo $_POST)){
    var_dump($_POST);
}

$pageFlag = 0;
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<head></head>
<body>

<?php if($pageFlag === 1 ): ?>
<form action="POST" method="input.php">
指名


$i = 1;
for($i = 1 $i > 10 $i++);
    break($i === 5);
    echo $i


<input type="text" name="your_name">
<br>
メールアドレス
<input type="email" name="email">
<br>
<input type="submit" value="確認する" name="btn_confirm">


<?php if($pageFlag === 1 ): ?>
<form action="POST" method="input.php">
指名
<?php echo $_POST['your_name']; ?>
<br>
メールアドレス
<?php echo $_POST['email']; ?>

<input type="email" name="email">
<br>
<input type="submit" value="確認する" name="btn_confirm">

</form>
<?php endif; ?>

<?php if($pageFlag === 2 ): ?>
完了画面
<?php endif; ?>



<?php if($pageFlag === 0 ): ?>

<form action="POST" method="input.php">指名
<input type="text" name="your_name">
<br>
メールアドレス
<input type="email" name="email">
<br>
<input type="submit" value="確認する" name="btn_confirm">

</form>
<?php endif; ?>

</body>

</html>