<?php
$selectedCategory = $_GET['category'] ?? 'all';
?>



<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<style>

    .loader-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loader-overlay.hidden {
        display: none;
    }

    .gif-loader {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }
    .hidden { display: none !important; }

</style>

<!-- <script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener("DOMContentLoaded", function () {
        const zipcode = getCookie("zipcode") || "60611";
        let fullProductList = [];

        const mainLoader = document.getElementById("main-loader-overlay");
        const categoryLoader = document.getElementById("category-loader-overlay");

        mainLoader.classList.remove("hidden");

        fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            // body: JSON.stringify({ zipcode: zipcode })
                body: JSON.stringify({
                zipcode: zipcode,
                page: "1",            
                per_page: "50",      
                search: ""         
            })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) return;
            fullProductList = data.lstProd || [];

            if (data.lstCategory) {
                const categoryContainer = document.getElementById("prodCategory");
                if (categoryContainer) {
                    categoryContainer.innerHTML = "";

                    data.lstCategory.forEach(cat => {
                        const catHTML = `
                            <div class="category-item" data-cat="${cat.catName}">
                                <img src="${cat.imgUrl}" loading="lazy" alt="${cat.catName}" 
                                     onload="this.closest('.category-item').classList.add('loaded')" 
                                     onerror="this.onerror=null; this.src='images/dummy.jpg'; this.closest('.category-item').classList.add('loaded')">
                                <p>${cat.catName}</p>
                            </div>
                        `;
                        categoryContainer.insertAdjacentHTML("beforeend", catHTML);
                    });

                    const allCategoryItems = categoryContainer.querySelectorAll(".category-item");

                    allCategoryItems.forEach(item => {
                        item.addEventListener("click", function () {
                            allCategoryItems.forEach(i => i.classList.remove("selected"));
                            this.classList.add("selected");

                            categoryLoader.classList.remove("hidden");

                            const selectedCat = this.getAttribute("data-cat");
                            const filtered = selectedCat.toLowerCase() === "all"
                                ? fullProductList
                                : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                            setTimeout(() => {
                                renderProducts(filtered);
                                categoryLoader.classList.add("hidden");
                            }, 100);
                        });
                    });

                    if (allCategoryItems.length > 0) {
                        allCategoryItems[0].classList.add("selected");
                        const defaultCat = allCategoryItems[0].getAttribute("data-cat");
                        const filtered = defaultCat.toLowerCase() === "all"
                            ? fullProductList
                            : fullProductList.filter(p => p.productType?.toLowerCase() === defaultCat.toLowerCase());

                        renderProducts(filtered);
                        mainLoader.classList.add("hidden");
                        return;
                    }
                }
            }

            renderProducts(fullProductList);
            mainLoader.classList.add("hidden");
        })
        .catch(error => {
            console.error("Failed to load product data:", error);
            mainLoader.classList.add("hidden");
        });

        function renderProducts(products) {
            const productList = document.getElementById("productList");
            if (!productList) return;

            productList.innerHTML = "";

            if (!products.length) {
                productList.innerHTML = "<p>No products found.</p>";
                return;
            }

            products.forEach(prod => {
                const imgSrc = prod.photos?.[0]?.photo || "images/dummy.jpg";
                let name = prod.productName || "";
                if (name.length > 30) name = name.slice(0, 30) + "...";
                const slug = prod.productSlug || "#";
                const price = prod.lstSizes?.[0]?.salePrice || "";
                const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                const discount = prod.lstSizes?.[0]?.discount || "";

                const productID = prod.productID || "";

                const html = `
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <a href="prod-details/${prod.productID}">
                                    <img src="${imgSrc}" alt="${name}" loading="lazy">
                                </a>
                                <span class="discount-badge">${discount}</span>
                            </div>
                            <p class="prod-name">${name}</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$${price}</span>
                                    <span class="original-price">$${mrp}</span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="prod-details/${productID}">View Product</a>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML("beforeend", html);
            });

            bindAddToCartButtons();
        }

        function bindAddToCartButtons() {
            document.querySelectorAll(".add-cart-container .add-btn").forEach(function (addBtn) {
                addBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    const container = this.closest(".add-cart-container");
                    showQuantityControl(container);
                });
            });
        }

        function showQuantityControl(container) {
            container.innerHTML = `
                <div class="add-cart-btn compact-padding">
                    <div class="quantity-control">
                        <button class="qty-btn minus">−</button>
                        <span class="qty-value">1</span>
                        <button class="qty-btn plus">+</button>
                    </div>
                </div>
            `;

            const minus = container.querySelector(".minus");
            const plus = container.querySelector(".plus");
            const value = container.querySelector(".qty-value");

            minus.addEventListener("click", function () {
                let qty = parseInt(value.textContent) - 1;
                if (qty >= 1) {
                    value.textContent = qty;
                } else {
                    bindBackToAddCart(container);
                }
            });

            plus.addEventListener("click", function () {
                let qty = parseInt(value.textContent);
                value.textContent = qty + 1;
            });
        }

        function bindBackToAddCart(container) {
            container.innerHTML = `
                <a href="#" class="add-btn">
                    <div class="add-cart-btn original-padding">Add to Cart</div>
                </a>
            `;
            bindAddToCartButtons();
        }
    });
</script> -->

<!-- <script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`); 
        if (parts.length === 2) return parts.pop().split(';').shift(); 
        return null;
    }

    document.addEventListener("DOMContentLoaded", function () {
        const zipcode = getCookie("zipcode") || "60611";
        let currentPage = 1;
        const perPage = 50;
        let isLoading = false;
        let allLoaded = false;
        let fullProductList = [];

        const mainLoader = document.getElementById("main-loader-overlay");
        const scrollLoader = document.getElementById("scroll-loader-overlay"); 
        mainLoader.classList.remove("hidden");

        function loadProducts() {
            if (isLoading || allLoaded) return;
            isLoading = true;
            if (currentPage > 1) scrollLoader.classList.remove("hidden");

            fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    zipcode: zipcode,
                    page: currentPage.toString(),
                    per_page: perPage.toString(),
                    search: ""
                })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success || !data.lstProd || data.lstProd.length === 0) {
                    allLoaded = true;
                    return;
                }

                if (currentPage === 1) {
                    setupCategories(data.lstCategory, data.lstProd);
                }

                renderProducts(data.lstProd);
                currentPage++;
            })
            .catch(error => {
                console.error("Failed to load product data:", error);
            })
            .finally(() => {
                isLoading = false;
                mainLoader.classList.add("hidden");
                scrollLoader.classList.add("hidden");
            });
        }

        function setupCategories(categories, initialList) {
            fullProductList = initialList;
            const categoryContainer = document.getElementById("prodCategory");
            if (!categoryContainer || !categories) return;

            categoryContainer.innerHTML = "";
            categories.forEach(cat => {
                const catHTML = `
                    <div class="category-item" data-cat="${cat.catName}">
                        <img src="${cat.imgUrl}" loading="lazy" alt="${cat.catName}" 
                             onload="this.closest('.category-item').classList.add('loaded')" 
                             onerror="this.onerror=null; this.src='images/dummy.jpg'; this.closest('.category-item').classList.add('loaded')">
                        <p>${cat.catName}</p>
                    </div>
                `;
                categoryContainer.insertAdjacentHTML("beforeend", catHTML);
            });

            const allCategoryItems = categoryContainer.querySelectorAll(".category-item");
            allCategoryItems.forEach(item => {
                item.addEventListener("click", function () {
                    allCategoryItems.forEach(i => i.classList.remove("selected"));
                    this.classList.add("selected");

                    const selectedCat = this.getAttribute("data-cat");
                    const filtered = selectedCat.toLowerCase() === "all"
                        ? fullProductList
                        : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                    document.getElementById("productList").innerHTML = "";
                    renderProducts(filtered);
                    allLoaded = true; // disable infinite scroll on category filter
                });
            });

            if (allCategoryItems.length > 0) {
                allCategoryItems[0].classList.add("selected");
            }
        }

        function renderProducts(products) {
            const productList = document.getElementById("productList");
            if (!productList) return;

            products.forEach(prod => {
                const imgSrc = prod.photos?.[0]?.photo || "images/dummy.jpg";
                let name = prod.productName || "";
                if (name.length > 30) name = name.slice(0, 30) + "...";
                const price = prod.lstSizes?.[0]?.salePrice || "";
                const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                const discount = prod.lstSizes?.[0]?.discount || "";
                const productID = prod.productID || "";

                const html = `
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <a href="prod-details/${productID}">
                                    <img src="${imgSrc}" alt="${name}" loading="lazy">
                                </a>
                                <span class="discount-badge">${discount}</span>
                            </div>
                            <p class="prod-name">${name}</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$${price}</span>
                                    <span class="original-price">$${mrp}</span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="prod-details/${productID}">View Product</a>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML("beforeend", html);
            });

            bindAddToCartButtons();
        }

        function bindAddToCartButtons() {
            document.querySelectorAll(".add-cart-container .add-btn").forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.preventDefault();
                    const container = this.closest(".add-cart-container");
                    container.innerHTML = `
                        <div class="add-cart-btn compact-padding">
                            <div class="quantity-control">
                                <button class="qty-btn minus">−</button>
                                <span class="qty-value">1</span>
                                <button class="qty-btn plus">+</button>
                            </div>
                        </div>
                    `;
                    const minus = container.querySelector(".minus");
                    const plus = container.querySelector(".plus");
                    const value = container.querySelector(".qty-value");

                    minus.addEventListener("click", function () {
                        let qty = parseInt(value.textContent) - 1;
                        if (qty >= 1) value.textContent = qty;
                        else bindBackToAddCart(container);
                    });

                    plus.addEventListener("click", function () {
                        value.textContent = parseInt(value.textContent) + 1;
                    });
                });
            });
        }

        function bindBackToAddCart(container) {
            container.innerHTML = `
                <a href="#" class="add-btn">
                    <div class="add-cart-btn original-padding">Add to Cart</div>
                </a>
            `;
            bindAddToCartButtons();
        }

        // Infinite Scroll Listener
        window.addEventListener("scroll", () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 300) {
                loadProducts();
            }
        });

        // Initial Load
        loadProducts();
    });
</script> -->

<script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener("DOMContentLoaded", function () {
        const zipcode = getCookie("zipcode") || "60611";
        let fullProductList = [];
        let displayPage = 1;
        const renderPerPage = 50;
        let isLoading = false;
        let allLoaded = false;

        const mainLoader = document.getElementById("main-loader-overlay");
        const scrollLoader = document.getElementById("scroll-loader-overlay");

        mainLoader.classList.remove("hidden");

        function loadAllProducts() {
            fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    zipcode: zipcode,
                    page: "1",
                    per_page: "1000",
                    search: ""
                })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success || !data.lstProd) return;
                fullProductList = data.lstProd;
                setupCategories(data.lstCategory, fullProductList);
                renderNextBatch();
            })
            .catch(error => {
                console.error("Failed to load product data:", error);
            })
            .finally(() => {
                mainLoader.classList.add("hidden");
            });
        }

        function setupCategories(categories, initialList) {
            const categoryContainer = document.getElementById("prodCategory");
            if (!categoryContainer || !categories) return;
            categoryContainer.innerHTML = "";

            categories.forEach(cat => {
                const catHTML = `
                    <div class="category-item" data-cat="${cat.catName}">
                        <img src="${cat.imgUrl}" loading="lazy" alt="${cat.catName}"
                             onload="this.closest('.category-item').classList.add('loaded')"
                             onerror="this.onerror=null; this.src='images/dummy.jpg'; this.closest('.category-item').classList.add('loaded')">
                        <p>${cat.catName}</p>
                    </div>
                `;
                categoryContainer.insertAdjacentHTML("beforeend", catHTML);
            });

            // categories.forEach(cat => {
            //     const catDiv = document.createElement("div");
            //     catDiv.className = "category-item";
            //     catDiv.setAttribute("data-cat", cat.catName);

            //     const img = document.createElement("img");
            //     img.src = cat.imgUrl;
            //     img.alt = cat.catName;
            //     img.loading = "lazy";
            //     img.onerror = function () {
            //         this.onerror = null;
            //         this.src = "images/dummy.jpg";
            //         this.closest(".category-item").classList.add("loaded");
            //         p.style.display = "block";
            //     };
            //     img.onload = function () {
            //         this.closest(".category-item").classList.add("loaded");
            //         p.style.display = "block";
            //     };

            //     const p = document.createElement("p");
            //     p.textContent = cat.catName;
            //     p.style.display = "none";

            //     catDiv.appendChild(img);
            //     catDiv.appendChild(p);
            //     categoryContainer.appendChild(catDiv);
            // });

            const allCategoryItems = categoryContainer.querySelectorAll(".category-item");
            allCategoryItems.forEach(item => {
                item.addEventListener("click", function () {
                    allCategoryItems.forEach(i => i.classList.remove("selected"));
                    this.classList.add("selected");

                    const selectedCat = this.getAttribute("data-cat");
                    const filtered = selectedCat.toLowerCase() === "all"
                        ? fullProductList
                        : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                    allLoaded = true;
                    displayPage = 1;
                    renderProducts(filtered); // overwrite product list
                });
            });

            if (allCategoryItems.length > 0) {
                allCategoryItems[0].classList.add("selected");
            }
        }

        function renderNextBatch() {
            const start = (displayPage - 1) * renderPerPage;
            const end = displayPage * renderPerPage;
            const nextBatch = fullProductList.slice(start, end);

            if (nextBatch.length === 0) {
                allLoaded = true;
                return;
            }

            renderProducts(nextBatch, true); // append = true
            displayPage++;
        }

        function renderProducts(products, append = false) {
            const productList = document.getElementById("productList");
            if (!productList) return;

            scrollLoader.classList.remove("hidden");

            if (!append) productList.innerHTML = "";

            if (!products.length) {
                if (!append) productList.innerHTML = "<p>No products found.</p>";
                scrollLoader.classList.add("hidden");
                return;
            }

            products.forEach(prod => {
                const imgSrc = prod.photos?.[0]?.photo || "images/dummy.jpg";
                let name = prod.productName || "";
                if (name.length > 30) name = name.slice(0, 30) + "...";
                const price = prod.lstSizes?.[0]?.salePrice || "";
                const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                const discount = prod.lstSizes?.[0]?.discount || "";
                const productID = prod.productID || "";

                const html = `
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <a href="prod-details/${productID}">
                                    <img src="${imgSrc}" alt="${name}" loading="lazy">
                                </a>
                                <span class="discount-badge">${discount}</span>
                            </div>
                            <p class="prod-name">${name}</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$${price}</span>
                                    <span class="original-price">$${mrp}</span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="prod-details/${productID}">View Product</a>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML("beforeend", html);
            });

            bindAddToCartButtons();
            scrollLoader.classList.add("hidden");
        }

        // function bindAddToCartButtons() {
        //     document.querySelectorAll(".add-cart-container .add-btn").forEach(btn => {
        //         btn.addEventListener("click", function (e) {
        //             e.preventDefault();
        //             const container = this.closest(".add-cart-container");
        //             container.innerHTML = `
        //                 <div class="add-cart-btn compact-padding">
        //                     <div class="quantity-control">
        //                         <button class="qty-btn minus">−</button>
        //                         <span class="qty-value">1</span>
        //                         <button class="qty-btn plus">+</button>
        //                     </div>
        //                 </div>
        //             `;
        //             const minus = container.querySelector(".minus");
        //             const plus = container.querySelector(".plus");
        //             const value = container.querySelector(".qty-value");

        //             minus.addEventListener("click", function () {
        //                 let qty = parseInt(value.textContent) - 1;
        //                 if (qty >= 1) value.textContent = qty;
        //                 else bindBackToAddCart(container);
        //             });

        //             plus.addEventListener("click", function () {
        //                 value.textContent = parseInt(value.textContent) + 1;
        //             });
        //         });
        //     });
        // }

        function bindAddToCartButtons() {
            document.querySelectorAll(".add-cart-container .add-btn").forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.preventDefault();

                    const container = this.closest(".add-cart-container");
                    const productCard = container.closest(".cart");
                    const productId = productCard.querySelector(".view-p a").getAttribute("href").split("/").pop();
                    const productData = fullProductList.find(p => p.productID === productId);
                    const maxQty = productData?.lstSizes?.[0]?.inventoryQuantity || 99;

                    container.innerHTML = `
                        <div class="add-cart-btn compact-padding">
                            <div class="quantity-control">
                                <button class="qty-btn minus">−</button>
                                <span class="qty-value">1</span>
                                <button class="qty-btn plus">+</button>
                            </div>
                        </div>
                    `;

                    const minus = container.querySelector(".minus");
                    const plus = container.querySelector(".plus");
                    const value = container.querySelector(".qty-value");

                    minus.addEventListener("click", function () {
                        let qty = parseInt(value.textContent) - 1;
                        if (qty >= 1) value.textContent = qty;
                        else bindBackToAddCart(container);
                    });

                    plus.addEventListener("click", function () {
                        let qty = parseInt(value.textContent);
                        if (qty < maxQty) {
                            value.textContent = qty + 1;
                        }
                    });
                });
            });
        }


        function bindBackToAddCart(container) {
            container.innerHTML = `
                <a href="#" class="add-btn">
                    <div class="add-cart-btn original-padding">Add to Cart</div>
                </a>
            `;
            bindAddToCartButtons();
        }

        window.addEventListener("scroll", () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 300) {
                if (!allLoaded && !isLoading) {
                    isLoading = true;
                    setTimeout(() => {
                        renderNextBatch();
                        isLoading = false;
                    }, 200);
                }
            }
        });

        loadAllProducts();
    });
</script>


<!-- <script>
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener("DOMContentLoaded", function () {
        const zipcode = getCookie("zipcode") || "60610";
        let fullProductList = [];
        const selectedCategory = new URLSearchParams(window.location.search).get("category")?.toLowerCase() || "all";

        const mainLoader = document.getElementById("main-loader-overlay");
        const categoryLoader = document.getElementById("category-loader-overlay");

        mainLoader.classList.remove("hidden");

        fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ zipcode: zipcode })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) return;
            fullProductList = data.lstProd || [];

            const categoryContainer = document.getElementById("prodCategory");
            if (categoryContainer && data.lstCategory) {
                categoryContainer.innerHTML = "";

                data.lstCategory.forEach(cat => {
                    const catName = cat.catName;
                    const isSelected = catName.toLowerCase() === selectedCategory;

                    const catHTML = `
                        <div class="category-item ${isSelected ? "selected" : ""}" data-cat="${catName}">
                            <img src="${cat.imgUrl}" loading="lazy" alt="${catName}" 
                                onload="this.closest('.category-item').classList.add('loaded')"
                                onerror="this.onerror=null; this.src='images/dummy.jpg'; this.closest('.category-item').classList.add('loaded')">
                            <p>${catName}</p>
                        </div>
                    `;
                    categoryContainer.insertAdjacentHTML("beforeend", catHTML);
                });

                categoryContainer.querySelectorAll(".category-item").forEach(item => {
                    item.addEventListener("click", function () {
                        categoryContainer.querySelectorAll(".category-item").forEach(i => i.classList.remove("selected"));
                        this.classList.add("selected");
                        categoryLoader.classList.remove("hidden");

                        const selectedCat = this.getAttribute("data-cat");
                        const filtered = selectedCat.toLowerCase() === "all"
                            ? fullProductList
                            : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                        setTimeout(() => {
                            renderProducts(filtered);
                            categoryLoader.classList.add("hidden");
                        }, 100);
                    });
                });
            }

            const filteredProducts = selectedCategory === "all"
                ? fullProductList
                : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCategory);

            renderProducts(filteredProducts);
            mainLoader.classList.add("hidden");
        })
        .catch(error => {
            console.error("Failed to load product data:", error);
            mainLoader.classList.add("hidden");
        });

        function renderProducts(products) {
            const productList = document.getElementById("productList");
            if (!productList) return;

            productList.innerHTML = "";

            if (!products.length) {
                productList.innerHTML = "<p>No products found.</p>";
                return;
            }

            products.forEach(prod => {
                const imgSrc = prod.photos?.[0]?.photo || "images/dummy.jpg";
                let name = prod.productName || "";
                if (name.length > 30) name = name.slice(0, 30) + "...";
                const slug = prod.productSlug || "#";
                const price = prod.lstSizes?.[0]?.salePrice || "";
                const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                const discount = prod.lstSizes?.[0]?.discount || "";

                const html = `
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <a href="prod-details/${prod.productID}">
                                    <img src="${imgSrc}" alt="${name}" loading="lazy">
                                </a>
                                <span class="discount-badge">${discount}</span>
                            </div>
                            <p class="prod-name">${name}</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$${price}</span>
                                    <span class="original-price">$${mrp}</span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="prod-details/${prod.productID}">View Product</a>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML("beforeend", html);
            });

            bindAddToCartButtons();
        }

        function bindAddToCartButtons() {
            document.querySelectorAll(".add-cart-container .add-btn").forEach(function (addBtn) {
                addBtn.addEventListener("click", function (e) {
                    e.preventDefault();
                    const container = this.closest(".add-cart-container");
                    showQuantityControl(container);
                });
            });
        }

        function showQuantityControl(container) {
            container.innerHTML = `
                <div class="add-cart-btn compact-padding">
                    <div class="quantity-control">
                        <button class="qty-btn minus">−</button>
                        <span class="qty-value">1</span>
                        <button class="qty-btn plus">+</button>
                    </div>
                </div>
            `;

            const minus = container.querySelector(".minus");
            const plus = container.querySelector(".plus");
            const value = container.querySelector(".qty-value");

            minus.addEventListener("click", function () {
                let qty = parseInt(value.textContent) - 1;
                if (qty >= 1) {
                    value.textContent = qty;
                } else {
                    bindBackToAddCart(container);
                }
            });

            plus.addEventListener("click", function () {
                let qty = parseInt(value.textContent);
                value.textContent = qty + 1;
            });
        }

        function bindBackToAddCart(container) {
            container.innerHTML = `
                <a href="#" class="add-btn">
                    <div class="add-cart-btn original-padding">Add to Cart</div>
                </a>
            `;
            bindAddToCartButtons();
        }
    });
</script> -->


<body>

    <div id="scroll-loader-overlay" class="hidden text-center my-4">
        <img src="images/loading.gif" alt="Loading..." class="gif-loader" />
    </div>


    <div id="main-loader-overlay" class="loader-overlay hidden">
        <img src="images/Quicklly-Logo_300X200.gif" alt="Loading..." />
    </div>

    <div id="category-loader-overlay" class="loader-overlay hidden">
        <img src="images/loading.gif" alt="Loading..." class="gif-loader" />
    </div>

    <div id="prod-listing-page" class="prod-listing-page">

        <div class="product-heading">
            <div class="container">
                <div class="row">
                    <p>Products</p>
                    <div class="prod-category" id="prodCategory">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="cat-product">
            <div class="container">
                <div class="row" id="productList">
               
                <div id="loader-overlay" class="hidden">Loading more products...</div>
            </div>
        </div>
    </div>


</body>

</html>