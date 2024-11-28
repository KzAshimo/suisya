<?php
header('Content-Type: application/json; charset=UTF-8');

header("Access-Control-Allow-Origin: *");

class Product
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

// データ作成
$beer = [
    new Product("中ジョッキ", 700),
    new Product("小ジョッキ", 500),
    new Product("瓶ビール中瓶", 700),
    new Product("ノンアルコールビール", 500),
];
$shochu = [new Product("雲海", 850)];
$wine = [new Product("ワイン", 1500)];
$softDrink = [
    new Product("ウーロン茶", 300),
    new Product("オレンジジュース", 300),
    new Product("三ツ矢サイダー", 300),
];
$local = [
    new Product("出羽燦々", 3400),
    new Product("出羽の里", 3300),
    new Product("大吟醸", 1900),
];

// JSONでレスポンス
$response = [
    "beer" => $beer,
    "shochu" => $shochu,
    "wine" => $wine,
    "softDrink" => $softDrink,
    "local" => $local,
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
