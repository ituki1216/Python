<?php

session_start();

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
<?php if($POST['csrf'] === $SESSION['csrfToken']); ?>
<form action="POST" method="input.php">

氏名
<?php echo h($_POST['your_name']); ?>  <!-- userがtopPageで情報を入力して確認画面を押すとpage1に推移して戻る、送信するの画面が表示されます -->
<br>
メールアドレス
<?php echo h($_POST['email']); ?>
<br>
ホームページ
<?php echo h($_POST['url']); ?>
<br>
性別
<?php
  if($_POST['gender'] === '0'){ echo '男性'; }
  if($_POST['gender'] === '1'){ echo '女性'; }
  ?>
年齢
<?php 
  if($_POST['age'] === '1'){echo '~19歳'; }
  if($_POST['age'] === '2'){echo '~19歳'; }
  if($_POST['age'] === '3'){echo '~19歳'; }
  if($_POST['age'] === '4'){echo '~19歳'; }
  if($_POST['age'] === '5'){echo '~19歳'; }
?>
お問い合わせ内容
<?php echo h($_POST['contact']); ?>
<br>

<input type="submit" name="back" value="戻る">
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
<input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
<input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
<input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
<input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
<input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">

</form>

<?php endif; ?>


<?php if($pageFlag === 2 ): ?>
<?php if($POST['csrf'] === $SESSION['csrfToken']): ?>

送信が完了しました

<?php unset($SESSION['csrfToken']); ?>
<?php endif; ?>
<?php endif; ?>


<?php if($pageFlag === 0 ): ?> <!-- pageが0なので初期表示の場合の画面であり、userが情報を入力する初期画面になっている --> 
<?php 
if(!isset($_SESSION['csrfToken'])){
    $csrfToken = echo bin2hex(random_bytes(32));
    $_SESSION['csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken']
?>

<form action="POST" method="input.php">指名
<input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name'])}; ?>">
<br>
メールアドレス
<input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email'])}; ?>">
<br>
ホームページ
<input type="url" name="url" value="<?php if(!empty($_POST['url'])){echo h($_POST['url'])}; ?>">
性別
<input type="radio" name="gender" value="0">男性
<input type="radio" name="gender" value="1">女性
<br>
<select name="age">
    <option value="1">1~19歳</option>
    <option value="2">20~24歳</option>
    <option value="3">25~29歳</option>
    <option value="4">30~45歳</option>
    <option value="5">46~70歳</option>
    <option value="6">71~1000歳</option>
</select>
<br>
お問い合わせ内容
<textarea name="contact">
<?php if(!empty($_POST['contact'])){echo h($_POST['contact'])}; ?>
</textarea>
<br>
<input type="checkbox" name="cautions[]" value="1">注意事項にチェックする
<br>


<input type="submit" value="確認する" name="btn_confirm" value="確認する">
<input type="hidden" name="csrf" value="<?php echo $token; ?>">
</form>

<?php endif; ?>

</body>
</html>