<?php
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
// 以下飲み物リスト---------------------------------
$beer = [ //ビール---------------------------
    new Product("中ジョッキ", 700),
    new Product("小ジョッキ", 500),
    new Product("瓶ビール中瓶", 700),
    new Product("ノンアルコールビール", 500)
];

$shochu = [new Product("雲海", 850)]; //焼酎----

$wine = [new Product("ワイン", 1500)]; //ワイン---

$softDrink = [ //ソフトドリンク---------------
    new Product("ウーロン茶", 300),
    new Product("オレンジジュース", 300),
    new Product("三ツ矢サイダー", 300)
];

$local = [ //地酒----------------------------
    new Product("出羽燦々", 3400),
    new Product("出羽の里", 3300),
    new Product("大吟醸", 1900),
    new Product("三法師", 1500),
    new Product("桜花生吟醸", 1400),
    new Product("純米吟醸", 1200),
    new Product("一路", 1500),
    new Product("雪漫々", 1500),
    new Product("雄町", 800),
    new Product("欄酒(大)", 900),
    new Product("欄酒(小)", 450)
];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文管理システム</title>
    <link href="../public/styles.css" rel="stylesheet">
    <script src="app.js" defer></script>
</head>

<body class="font-sans bg-gray-50 text-gray-900 m-6">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <h1 class="text-3xl text-center md:text-4xl">OrganizerForm</h1>
    </header>

    <main class="max-w-full md:max-w-3xl mx-4 md:mx-auto mt-8">
        <!-- 現在の金額 -->
        <section class="mb-6">
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-xl md:text-2xl font-semibold mb-2">現在の金額</h2>
                <p id="total" class="text-lg md:text-xl font-bold text-blue-600">￥0</p>
                <button id="reset" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">削除</button>
            </div>
        </section>

        <!-- 飲み物fフォーム -->
        <section class="bg-white shadow rounded-lg p-4">
            <h2 class="text-xl md:text-2xl font-semibold border-b pb-2 mb-4">飲み物</h2>
            <!-- 商品フォーム -->
            <div class="space-y-4 md:grid md:grid-cols-2 gap-4">

                <!-- 以下使いまわし -->
                <!-- ビール -->
                <div class="items-start bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                    <button type="button" data-toggle="beer"
                        class="text-lg md:text-xl font-bold bg-yellow-300 px-2 py-1 rounded mb-3 md:mb-0 md:mr-4 w-full text-center">ビール(KIRIN)</button>
                    <div class="hidden" id="beer">
                        <?php

                        foreach ($beer as $product) {
                            echo "<div class = my-4>";
                            echo "<div class='flex items-center justify-between w-full'>";
                            echo "<button data-price='{$product->price}' class='bg-yellow-300 text-black px-3 py-2 rounded font-bold active:translate-y-2 transition-transform '>{$product->name}</button>";
                            echo "<p class='text-lg font-bold text-gray-700'>￥{$product->price}</p>";
                            echo "</div></div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- 焼酎 -->
                <div class="items-start bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                    <button type="button" data-toggle="shochu"
                        class="text-lg md:text-xl font-bold bg-purple-300 px-2 py-1 rounded mb-3 md:mb-0 md:mr-4 w-full text-center">焼酎</button>
                    <div class="hidden" id="shochu">
                        <?php

                        foreach ($shochu as $product) {
                            echo "<div class = my-4>";
                            echo "<div class='flex items-center justify-between w-full'>";
                            echo "<button data-price='{$product->price}' class='bg-purple-300 text-black px-3 py-2 rounded font-bold active:translate-y-2 transition-transform '>{$product->name}</button>";
                            echo "<p class='text-lg font-bold text-gray-700'>￥{$product->price}</p>";
                            echo "</div></div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- ワイン -->
                <div class="items-start bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                    <button type="button" data-toggle="wine"
                        class="text-lg md:text-xl font-bold bg-pink-300 px-2 py-1 rounded mb-3 md:mb-0 md:mr-4 w-full text-center">焼酎</button>
                    <div class="hidden" id="wine">
                        <?php

                        foreach ($wine as $product) {
                            echo "<div class = my-4>";
                            echo "<div class='flex items-center justify-between w-full'>";
                            echo "<button data-price='{$product->price}' class='bg-pink-300 text-black px-3 py-2 rounded font-bold active:translate-y-2 transition-transform '>{$product->name}</button>";
                            echo "<p class='text-lg font-bold text-gray-700'>￥{$product->price}</p>";
                            echo "</div></div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- ソフトドリンク -->
                <div class="items-start bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                    <button type="button" data-toggle="softDrink"
                        class="text-lg md:text-xl font-bold bg-sky-300 px-2 py-1 rounded mb-3 md:mb-0 md:mr-4 w-full text-center">ソフトドリンク</button>
                    <div class="hidden" id="softDrink">
                        <?php

                        foreach ($softDrink as $product) {
                            echo "<div class = my-4>";
                            echo "<div class='flex items-center justify-between w-full'>";
                            echo "<button data-price='{$product->price}' class='bg-sky-300 text-black px-3 py-2 rounded font-bold active:translate-y-2 transition-transform '>{$product->name}</button>";
                            echo "<p class='text-lg font-bold text-gray-700'>￥{$product->price}</p>";
                            echo "</div></div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- 地酒 -->
                <div class="items-start bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                    <button type="button" data-toggle="local"
                        class="text-lg md:text-xl font-bold bg-green-300 px-2 py-1 rounded mb-3 md:mb-0 md:mr-4 w-full text-center">焼酎</button>
                    <div class="hidden" id="local">
                        <?php

                        foreach ($local as $product) {
                            echo "<div class = my-4>";
                            echo "<div class='flex items-center justify-between w-full'>";
                            echo "<button data-price='{$product->price}' class='bg-green-300 text-black px-3 py-2 rounded font-bold active:translate-y-2 transition-transform '>{$product->name}</button>";
                            echo "<p class='text-lg font-bold text-gray-700'>￥{$product->price}</p>";
                            echo "</div></div>";
                        }
                        ?>
                    </div>
                </div>



        </section>


    </main>
    <footer class="text-center py-4 mt-8 text-gray-500 text-sm">
        &copy; 2024 Organizer hanawa ashimo
    </footer>

</body>

</html>