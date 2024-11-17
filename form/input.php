<?php

// クリックじゃっキングの対策 php var 
header('X-FRAME-POTIONS:DENY');

if(!empty($_POST)){ // もしuserが送信したデータが空でなければvar_dumpを使って型と値を表示する
    echo'<pre>';
    var_dump($_POST);
    echo'<pre>';
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); // 攻撃対策てきな？
}

$pageFlag = 0; // 変数pageFlagを初期化します

if(!empty($_POST['btn_confirm'])){ // もしuserが送信したデータが空ではなく、なおかつ確認するボタンをクリックしたらpageを1にします
    $pageFlag = 1;
}

if(!empty($_POST['btn_confirm'])){ // もしuserが送信したデータが空ではなく、尚且つ確認buttonが押されたら1と合わせてpageFlag2も表示します
    $pageFlag = 2;
}

?>

<!DOCTYPE html>
<meta charset="UTF-8">
<head>むずい</head>
<body>


<?php if($pageFlag === 1 ): ?> <!-- pageFlag1は確認画面です -->
<form action="POST" method="input.php">

氏名
<?php echo h($_POST['your_name']); ?>  <!-- userがtopPageで情報を入力して確認画面を押すとpage1に推移して戻る、送信するの画面が表示されます -->
<br>
メールアドレス
<?php echo h($_POST['email']); ?>
<br>
<input type="submit" name="back" value="戻る">
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
<input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
</form>

<?php endif; ?>

<?php if($pageFlag === 2 ): ?>
送信が完了しました
<?php endif; ?>

<?php if($pageFlag === 0 ): ?> <!-- pageが0なので初期表示の場合の画面であり、userが情報を入力する初期画面になっている --> 

<form action="POST" method="input.php">指名
<input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name'])}; ?>">
<br>
メールアドレス
<input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email'])}; ?>">
<br>
<input type="submit" value="確認する" name="btn_confirm">
</form>
<?php endif; ?>

</body>
</html>