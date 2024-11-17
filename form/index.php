<?php

session_start();
require 'validation.php';

// クリックジャッキング対策
header('X-FRAME-OPTIONS: DENY');

// POSTデータが送信された場合
if (!empty($_POST)) {
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// pageFlagの初期化
$pageFlag = 0;
$error = validation($_POST);

// 確認画面を表示する条件
if (!empty($_POST['btn_confirm']) && empty($error)) {
    $pageFlag = 1;
}

// 送信完了画面の表示
if (!empty($_POST['btn_submit'])) {
    $pageFlag = 2;
}

// CSRFトークンの生成（セッションに保存）
if (!isset($_SESSION['csrfToken'])) {
    $_SESSION['csrfToken'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrfToken'];

?>

<!DOCTYPE html>
<meta charset="UTF-8">
<head>
    <title>フォーム</title>
</head>
<body>

<?php if ($pageFlag === 1): ?>
    <!-- 確認画面 -->
    <form action="" method="POST">
        <p>氏名: <?php echo h($_POST['your_name']); ?></p>
        <p>メール: <?php echo h($_POST['email']); ?></p>
        <p>ホームページ: <?php echo h($_POST['url']); ?></p>
        <p>性別: <?php echo $_POST['gender'] === '0' ? '男性' : '女性'; ?></p>
        <p>年齢: <?php echo $_POST['age']; ?></p>
        <p>お問い合わせ内容: <?php echo h($_POST['contact']); ?></p>

        <input type="submit" name="back" value="戻る">
        <input type="submit" name="btn_submit" value="送信する">

        <!-- ユーザー情報を再送信 -->
        <input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']); ?>">
        <input type="hidden" name="email" value="<?php echo h($_POST['email']); ?>">
        <input type="hidden" name="url" value="<?php echo h($_POST['url']); ?>">
        <input type="hidden" name="gender" value="<?php echo h($_POST['gender']); ?>">
        <input type="hidden" name="age" value="<?php echo h($_POST['age']); ?>">
        <input type="hidden" name="csrf" value="<?php echo h($token); ?>">
    </form>
<?php endif; ?>


<?php if ($pageFlag === 2): ?>
    <!-- 送信完了画面 -->
    <?php if ($_POST['csrf'] === $_SESSION['csrfToken']): ?>
        <p>送信が完了しました。</p>
    <?php endif; ?>
<?php endif; ?>


<?php if ($pageFlag === 0): ?>
    <!-- 入力フォーム -->
    <form action="" method="POST">
        <label>氏名: <input type="text" name="your_name" value="<?php echo h($_POST['your_name'] ?? ''); ?>"></label><br>
        <label>メール: <input type="email" name="email" value="<?php echo h($_POST['email'] ?? ''); ?>"></label><br>
        <label>ホームページ: <input type="url" name="url" value="<?php echo h($_POST['url'] ?? ''); ?>"></label><br>

        <label>性別:
            <input type="radio" name="gender" value="0" <?php echo isset($_POST['gender']) && $_POST['gender'] === '0' ? 'checked' : ''; ?>>男性
            <input type="radio" name="gender" value="1" <?php echo isset($_POST['gender']) && $_POST['gender'] === '1' ? 'checked' : ''; ?>>女性
        </label><br>

        <label>年齢:
            <select name="age">
                <option value="1" <?php echo isset($_POST['age']) && $_POST['age'] === '1' ? 'selected' : ''; ?>>1~19歳</option>
                <option value="2" <?php echo isset($_POST['age']) && $_POST['age'] === '2' ? 'selected' : ''; ?>>20~24歳</option>
                <option value="3" <?php echo isset($_POST['age']) && $_POST['age'] === '3' ? 'selected' : ''; ?>>25~29歳</option>
                <option value="4" <?php echo isset($_POST['age']) && $_POST['age'] === '4' ? 'selected' : ''; ?>>30~45歳</option>
                <option value="5" <?php echo isset($_POST['age']) && $_POST['age'] === '5' ? 'selected' : ''; ?>>46~70歳</option>
                <option value="6" <?php echo isset($_POST['age']) && $_POST['age'] === '6' ? 'selected' : ''; ?>>71~1000歳</option>
            </select>
        </label><br>

        <label>お問い合わせ内容:
            <textarea name="contact"><?php echo h($_POST['contact'] ?? ''); ?></textarea>
        </label><br>

        <label>
            <input type="checkbox" name="cautions[]" value="1" <?php echo isset($_POST['cautions']) && in_array('1', $_POST['cautions']) ? 'checked' : ''; ?>> 注意事項にチェックする
        </label><br>

        <input type="submit" value="確認する" name="btn_confirm">
        <input type="hidden" name="csrf" value="<?php echo h($token); ?>">
    </form>
<?php endif; ?>

</body>
</html>
