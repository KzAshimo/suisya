        // 合計金額----------------------------------------------------------------
        const Total = document.getElementById("total");
        let total = localStorage.getItem("total") ? parseInt(localStorage.getItem("total"),10) : 0;

        Total.textContent = `￥${total}`;

        const buttons = document.querySelectorAll("button[data-price]");

        buttons.forEach(button => {
            button.addEventListener("click", () => {
                const price = parseInt(button.getAttribute("data-price"), 10);

                total += price;
                localStorage.setItem("total",total);
                Total.textContent = `￥${total}`;
            });
        });
        // -----------------------------------------------------------------------

        // 合計削除----------------------------------------------------------------
        const reset = document.getElementById("reset");

        reset.addEventListener("click",()=>{
            total = 0;
            localStorage.setItem("total",total);
            Total.textContent = `￥${total}`;
        });
        // -----------------------------------------------------------------------

        // 各カテゴリ収納----------------------------------------------------------
        const toggle = document.querySelectorAll("button[data-toggle]");

        toggle.forEach(button => {
            const toggleId = button.getAttribute("data-toggle");
            const targetDiv = document.getElementById(toggleId);

            if (targetDiv) {
                button.addEventListener("click", () => {
                    targetDiv.classList.toggle("hidden");
                });
            }
        });
        // ---------------------------------------------------------------------
