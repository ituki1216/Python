<?php

if(!empty(echo $_GET)){
    var_dump($_GET);
}
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<head></head>
<body>
<form action="POST" method="input.php">指名
<input type="text" name="your_name">

<br>
<input type="checkbox" name="sports[]" value="卓球">卓球
<input type="checkbox" name="sports[]" value="水泳">水泳
<input type="checkbox" name="sports[]" value="粘土">粘土


<input type="submit" value="送信">

</form>
</body>

</html>