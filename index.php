<?php 

// === 型も等しい

$test = 123;
$test = '123やめます';
$test_1 = "わ"
$test_2 = $test . $test_1

// データ型の検索
var_dump($test)

// 変わらない文字・数
const MAX = 'そうですね';

// 0から始まるしってます
$array = [1, 2, 3];

$array_2 = [
    ['あ', 'い', 'う'],
    ['え', 'お', 'か']
]

echo $array = [1];

echo $array_2 = [1][2];

$array_member = [
    "name" => '山中',
    'height' => '190'
    'sei' => 'man'
];

echo $array_member['sei'];
$array_member_2 = [
    '山中' => [
        'height' => 180,
        'hobby' => "LOL",
        'sei' => "man"
    ], 
    '坂本' => [
        'height' => 120,
        'hobby' => "toi",
        'sei' => "girl"
    ]
];

$array_member_3 = [
    "1組" => [
        '一樹' => [
            'height' => 200
            'hobby' => 'サッカー'
        ],
        '山中' => [
            'height' => 5000
            'hobby' => '寝る'
        ];
    ];
    "2組" => [
        '太郎' => [
            'height' => 122
            'hobby' => "game"
        ], "和中"
    ];
];


echo $array_member_2['山中']['hobby']
echo $array_member_3['太郎']['hobby']

$height = 100;
if ($height === 100){
    echo "身長は" . $height . "cmです"
}else{
    echo "身長は" . $height . "cmではありません"
}

$signal = 'red';

if ($signal === 'red'){
    echo 'とまれ'
}else if ($signal === "yellow"){
    echo '一旦停止'
}else{
    echo '進め'
};

$test = "1";

if(!empty($test)){
    echo '変数の値は空ではなかったようです';
}else{
    echo '変数は空です'
}

$signal_1 = 'red';
$signal_2 = 'blue';

if ($signal_1 === 'red' & $signal_2 === 'blue'){
    echo '赤と青らしい？ですよ';
}

$member = [
    'name' => '寿司',
    'height' => 10,
    'hobby' => 'eat'
];

// value飲み
foreach($member as $member){
    foreach($member as $key => $value){
        echo  echo $member;
    }
};

// キーも表示する場合
foreach($member as $key => $value){
    echo $key . 'は' . $value . 'です';
}

for($i = 0; $i < 10; $i++){
    if($i === 5){
        //break
        continue;
    }
    echo $i;
}

$i = 0;
while($i < 5){
    echo $il
    $i++;
}

// for 繰り返す数が決まっていたら
// while 繰り返す数が決まっていなかったら

do{echo $i}
while($i < 5);

$date = 1;

switch($date){
    case $date === 1:
        echo '1です'
        break;
    case $date === 2:
        echo '2です'
        break;
    case $date === 3:
        echo '3です'
        break;
    default:
    echo "1でも2でも3でもありません";

}

if($date === 1){
    echo '1'
}

$signal = 'red';

if ($signal === 'red'){
    echo 'とまれ'
}else if ($signal === "yellow"){
    echo '一旦停止'
}else{
    echo '進め'
};

function Home(){
    echo 'おかえりなさい';
}

Home();

$comment = 'コメント2'
function getComment($string){
    echo $string;
}

getComment('$comment3');

function getNumberOfComment(){
    return 5;
}

function sumPrice($int1, $int2){
    $int3 = $int1 + $int2;
    return $int3
}

$total = sumPrice(3, 5);
echo $total




































?>