<?php 
echo '読み込み用' 

$globalVariable = 'グローバル変数';

function checkScope(){
    $localVariable = 'ローカル変数';
    echo $$localVariable
}

echo $globalVariable;

?>