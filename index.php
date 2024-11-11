<?php 

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

?>