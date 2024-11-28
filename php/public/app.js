document.addEventListener("DOMContentLoaded", async () => {
    const productsContainer = document.getElementById("products-container");
    const totalElement = document.getElementById("total");
    const resetButton = document.getElementById("reset");
    let total = 0;

    // APIからデータを取得
    async function fetchProducts() {
        try {
            const response = await fetch("/api/index.php"); // PHPのAPIエンドポイント
            const data = await response.json(); // データをJSONとして取得
            renderProducts(data);
        } catch (error) {
            console.error("データの取得に失敗しました", error);
        }
    }

    // 商品リストをレンダリング
    function renderProducts(categories) {
        productsContainer.innerHTML = "";

        // categoriesはオブジェクト形式なので、Object.keys()でカテゴリをループ
        Object.keys(categories).forEach(categoryKey => {
            const category = categories[categoryKey];  // カテゴリごとのデータを取得
            const categoryDiv = document.createElement("div");
            categoryDiv.classList.add("items-start", "bg-gray-100", "p-4", "rounded-lg", "shadow-sm", "hover:shadow-md", "transition");

            const button = document.createElement("button");
            button.textContent = categoryKey;  // カテゴリ名（例: "beer", "shochu"）を表示
            button.type = "button";
            button.classList.add("text-lg", "md:text-xl", "font-bold", "px-2", "py-1", "rounded", "mb-3", "md:mb-0", "md:mr-4", "w-full", "text-center");

            const productListDiv = document.createElement("div");
            productListDiv.classList.add("hidden");
            productListDiv.id = categoryKey;  // IDをカテゴリ名に

            // 商品リストをレンダリング
            category.forEach(product => {
                const productDiv = document.createElement("div");
                productDiv.classList.add("my-4");

                const flexDiv = document.createElement("div");
                flexDiv.classList.add("flex", "items-center", "justify-between", "w-full");

                const productButton = document.createElement("button");
                productButton.textContent = product.name;
                productButton.dataset.price = product.price;
                productButton.classList.add("px-3", "py-2", "rounded", "font-bold", "active:translate-y-2", "transition-transform");

                const priceP = document.createElement("p");
                priceP.textContent = `￥${product.price}`;
                priceP.classList.add("text-lg", "font-bold", "text-gray-700");

                flexDiv.appendChild(productButton);
                flexDiv.appendChild(priceP);
                productDiv.appendChild(flexDiv);
                productListDiv.appendChild(productDiv);

                // 商品ボタンのクリックイベント
                productButton.addEventListener("click", () => {
                    total += parseInt(product.price, 10);
                    totalElement.textContent = `￥${total}`;
                });
            });

            // カテゴリボタンがクリックされた時の処理
            button.addEventListener("click", () => {
                // 商品リストの表示・非表示を切り替え
                const isHidden = productListDiv.classList.contains("hidden");
                if (isHidden) {
                    productListDiv.classList.remove("hidden");
                } else {
                    productListDiv.classList.add("hidden");
                }
            });

            categoryDiv.appendChild(button);
            categoryDiv.appendChild(productListDiv);
            productsContainer.appendChild(categoryDiv);
        });
    }

    // 合計金額をリセット
    resetButton.addEventListener("click", () => {
        total = 0;
        totalElement.textContent = "￥0";
    });

    // 初期化
    fetchProducts();
});
