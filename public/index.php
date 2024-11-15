<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ここはお問い合わせフォーム</title>
</head>
<body>
  <h1>お問い合わせ</h1>

   <?php 
  if (isset($successMessage)) { 
    echo $successMessage;
  } elseif (isset($errorMessage)) {
    echo $errorMessage;
  }
  ?>

    
  <form action="form.php" method="POST">
      <label for="name">名前:</lavel>>br>
      <input type="text" id="name" name="name" required><br>

      <label for="mail_address">メールアドレス:</lavel>>br>
      <input type="text" id="mail_address" name="mail_address" required><br>

      <label for="message">メッセージ:</lavel>>br>
      <input type="text" id="message" name="message" required><br>

      <input type="submit" value="送信">
  </form>
</body>
</html>
