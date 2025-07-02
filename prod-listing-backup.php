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

</style>

<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const zipcode = "60610"; 
        let fullProductList = []; 

        fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ zipcode: zipcode })
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
                                <img src="${cat.imgUrl}" alt="${cat.catName}">
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

                            renderProducts(filtered);
                        });
                    });

                    if (allCategoryItems.length > 0) {
                        allCategoryItems[0].classList.add("selected");
                        const defaultCat = allCategoryItems[0].getAttribute("data-cat");
                        const filtered = defaultCat.toLowerCase() === "all"
                            ? fullProductList
                            : fullProductList.filter(p => p.productType?.toLowerCase() === defaultCat.toLowerCase());
                        renderProducts(filtered);
                        return; 
                    }
                }
            }

            renderProducts(fullProductList);
        })
        .catch(error => {
            console.error("Failed to load product data:", error);
        });

        function renderProducts(products) {
            const productList = document.getElementById("productList");
            if (productList) {
                productList.innerHTML = "";

                if (!products.length) {
                    productList.innerHTML = "<p>No products found.</p>";
                    return;
                }

                products.forEach(prod => {
                    const imgSrc = prod.photos?.[0]?.photo || "images/default.png";
                    const name = prod.productName || "";
                    const slug = prod.productSlug || "#";
                    const price = prod.lstSizes?.[0]?.salePrice || "";
                    const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                    const discount = prod.lstSizes?.[0]?.discount || "";

                    const html = `
                        <div class="col-md-3">
                            <div class="cart">
                                <div class="image-wrap">
                                    <img src="${imgSrc}" alt="${name}">
                                    <span class="discount-badge">${discount}</span>
                                </div>
                                <p class="prod-name">${name}</p>
                                <div class="desc">
                                    <p>
                                        <span class="dis-price">$${price}</span>
                                        <span class="original-price">$${mrp}</span>
                                    </p>
                                </div>
                                <div class="add-cart-btn">
                                    <a href="#">Add to Cart</a>
                                </div>
                                <div class="view-p">
                                    <a href="/product/${slug}">View Product</a>
                                </div>
                            </div>
                        </div>
                    `;
                    productList.insertAdjacentHTML("beforeend", html);
                });
            }
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
        let fullProductList = [];
        let currentIndex = 0;
        const batchSize = 50;
        let loadingMore = false;

        const loader = document.getElementById("loader-overlay");

        fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ zipcode: zipcode })
        })
            .then(response => response.json())
            .then(data => {
                if (!data.success) return;

                fullProductList = data.lstProd || [];

                setupCategories(data.lstCategory || []);

                loadNextBatch(); // First batch
                loader.classList.add("hidden");
            })
            .catch(error => {
                console.error("Failed to load product data:", error);
                loader.classList.add("hidden");
            });

        function setupCategories(categories) {
            const categoryContainer = document.getElementById("prodCategory");
            if (!categoryContainer) return;

            categoryContainer.innerHTML = "";

            categories.forEach(cat => {
                const catHTML = `
                    <div class="category-item" data-cat="${cat.catName}">
                        <img src="${cat.imgUrl}" alt="${cat.catName}">
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
                    const filtered = selectedCat.toLowerCase() === "all" ?
                        fullProductList :
                        fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                    currentIndex = 0;
                    document.getElementById("productList").innerHTML = "";
                    fullProductList = filtered;
                    loadNextBatch();
                });
            });

            if (allCategoryItems.length > 0) {
                allCategoryItems[0].classList.add("selected");
            }
        }

        function loadNextBatch() {
            if (loadingMore || currentIndex >= fullProductList.length) return;
            loadingMore = true;
            loader.classList.remove("hidden");

            setTimeout(() => {
                const productsToShow = fullProductList.slice(currentIndex, currentIndex + batchSize);
                renderProducts(productsToShow);
                currentIndex += batchSize;
                loader.classList.add("hidden");
                loadingMore = false;
            }, 500); // Simulated delay
        }

        function renderProducts(products) {
            const productList = document.getElementById("productList");
            if (!productList || !products.length) return;

            products.forEach(prod => {
                const imgSrc = prod.photos?.[0]?.photo || "images/dummy.jpg";
                const name = prod.productName || "";
                const slug = prod.productSlug || "#";
                const price = prod.lstSizes?.[0]?.salePrice || "";
                const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                const discount = prod.lstSizes?.[0]?.discount || "";

                const html = `
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <img src="${imgSrc}" alt="${name}">
                                <span class="discount-badge">${discount}</span>
                            </div>
                            <p class="prod-name">${name}</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$${price}</span>
                                    <span class="original-price">$${mrp}</span>
                                </p>
                            </div>
                            <div class="add-cart-btn">
                                <a href="#">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML("beforeend", html);
            });
        }

        // Auto load next batch on scroll near bottom
        window.addEventListener("scroll", function () {
            const scrollY = window.scrollY || window.pageYOffset;
            const windowHeight = window.innerHeight;
            const fullHeight = document.documentElement.scrollHeight;

            if (scrollY + windowHeight + 100 >= fullHeight) {
                loadNextBatch();
            }
        });
    });
</script> -->

<!-- <script>

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener("DOMContentLoaded", function() {
        const zipcode = getCookie("zipcode") || "60611";
        let fullProductList = [];

        const loader = document.getElementById("loader-overlay");

        fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    zipcode: zipcode
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
                                <img src="${cat.imgUrl}" alt="${cat.catName}">
                                <p>${cat.catName}</p>
                            </div>
                        `;
                            categoryContainer.insertAdjacentHTML("beforeend", catHTML);
                        });

                        const allCategoryItems = categoryContainer.querySelectorAll(".category-item");

                        allCategoryItems.forEach(item => {
                            item.addEventListener("click", function() {
                                allCategoryItems.forEach(i => i.classList.remove("selected"));
                                this.classList.add("selected");

                                const selectedCat = this.getAttribute("data-cat");
                                const filtered = selectedCat.toLowerCase() === "all" ?
                                    fullProductList :
                                    fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                                renderProducts(filtered);
                            });
                        });

                        if (allCategoryItems.length > 0) {
                            allCategoryItems[0].classList.add("selected");
                            const defaultCat = allCategoryItems[0].getAttribute("data-cat");
                            const filtered = defaultCat.toLowerCase() === "all" ?
                                fullProductList :
                                fullProductList.filter(p => p.productType?.toLowerCase() === defaultCat.toLowerCase());

                            renderProducts(filtered);
                            loader.classList.add("hidden");
                            return;
                        }
                    }
                }

                renderProducts(fullProductList);
                loader.classList.add("hidden");
            })
            .catch(error => {
                console.error("Failed to load product data:", error);
                loader.classList.add("hidden");
            });

        function renderProducts(products) {
            const productList = document.getElementById("productList");
            if (productList) {
                productList.innerHTML = "";

                if (!products.length) {
                    productList.innerHTML = "<p>No products found.</p>";
                    return;
                }

                products.forEach(prod => {
                    const imgSrc = prod.photos?.[0]?.photo || "images/dummy.jpg";
                    // const name = prod.productName || "";
                    let name = prod.productName || "";
                    if (name.length > 40) {
                        name = name.slice(0, 37) + "..."; 
                    }

                    const slug = prod.productSlug || "#";
                    const price = prod.lstSizes?.[0]?.salePrice || "";
                    const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                    const discount = prod.lstSizes?.[0]?.discount || "";

                    const html = `
                        <div class="col-md-3">
                            <div class="cart">
                                <div class="image-wrap">
                                    <img src="${imgSrc}" alt="${name}">
                                    <span class="discount-badge">${discount}</span>
                                </div>
                                <p class="prod-name">${name}</p>
                                <div class="desc">
                                    <p>
                                        <span class="dis-price">$${price}</span>
                                        <span class="original-price">$${mrp}</span>
                                    </p>
                                </div>
                                <div class="add-cart-btn">
                                    <a href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    `;
                    productList.insertAdjacentHTML("beforeend", html);
                });
            }
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
        let fullProductList = [];

        const loader = document.getElementById("loader-overlay");

        fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-list", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ zipcode: zipcode })
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
                                <img src="${cat.imgUrl}" loading="lazy" alt="${cat.catName}" onload="this.closest('.category-item').classList.add('loaded')" onerror="this.onerror=null; this.src='images/dummy.jpg'; this.closest('.category-item').classList.add('loaded')">
                                <p>${cat.catName}</p>
                            </div>
                        `;
                        categoryContainer.insertAdjacentHTML("beforeend", catHTML);
                    });

                    const allCategoryItems = categoryContainer.querySelectorAll(".category-item");

                    allCategoryItems.forEach(item => {
                        // item.addEventListener("click", function () {
                        //     allCategoryItems.forEach(i => i.classList.remove("selected"));
                        //     this.classList.add("selected");

                        //     const selectedCat = this.getAttribute("data-cat");
                        //     const filtered = selectedCat.toLowerCase() === "all"
                        //         ? fullProductList
                        //         : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                        //     renderProducts(filtered);
                        // });
                        item.addEventListener("click", function () {
                            allCategoryItems.forEach(i => i.classList.remove("selected"));
                            this.classList.add("selected");

                            loader.classList.remove("hidden"); 

                            const selectedCat = this.getAttribute("data-cat");
                            const filtered = selectedCat.toLowerCase() === "all"
                                ? fullProductList
                                : fullProductList.filter(p => p.productType?.toLowerCase() === selectedCat.toLowerCase());

                            setTimeout(() => {
                                renderProducts(filtered);
                                loader.classList.add("hidden"); 
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
                        loader.classList.add("hidden");
                        return;
                    }
                }
            }

            renderProducts(fullProductList);
            loader.classList.add("hidden");
        })
        .catch(error => {
            console.error("Failed to load product data:", error);
            loader.classList.add("hidden");
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
                                <img src="${imgSrc}" alt="${name}" loading="lazy">
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
                                <a href="prod-details">View Product</a>
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

                const html = `
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <img src="${imgSrc}" alt="${name}" loading="lazy">
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
                                <a href="prod-details">View Product</a>
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
</script>




<body>

    <div id="main-loader-overlay" class="loader-overlay hidden">
        <img src="images/Quicklly-Logo_300X200.gif" alt="Loading..." />
    </div>

    <!-- Category Filter Loader -->
    <div id="category-loader-overlay" class="loader-overlay hidden">
        <img src="images/loading.gif" alt="Loading..." class="gif-loader" />
    </div>

    <div id="prod-listing-page" class="prod-listing-page">

        <div class="product-heading">
            <div class="container">
                <div class="row">
                    <p>Products</p>
                    <div class="prod-category" id="prodCategory">
                        <!-- <div class="category-item">
                            <img src="images/cat-1.png" alt="">
                            <p>All</p>
                        </div>
                        <div class="category-item">
                            <img src="images/cat-1.png" alt="">
                            <p>Handbag</p>
                        </div>
                        <div class="category-item">
                            <img src="images/cat-3.png" alt="">
                            <p>All</p>
                        </div>
                        <div class="category-item">
                            <img src="images/cat-4.png" alt="">
                            <p>All</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="cat-product">
            <div class="container">
                <div class="row" id="productList">
                <!-- <div class="row">
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <img src="https://cdn.shopify.com/s/files/1/0714/3984/3507/files/Product-119.jpg?v=1750005207" alt="A-EMELIAH">
                                <span class="discount-badge">50% Off</span>
                            </div>
                            <p class="prod-name">A-EMELIAH</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$39.00</span>
                                    <span class="original-price">$78.00</span>
                                    <a href="#">+10 more</a>
                                    <span class="dot first"></span>
                                    <span class="dot sec"></span>
                                    <span class="dot third"></span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="/product/a-emeliah">View Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <img src="https://cdn.shopify.com/s/files/1/0714/3984/3507/files/Product-106.jpg?v=1750004809" alt="A-JAE">
                                <span class="discount-badge">50% Off</span>
                            </div>
                            <p class="prod-name">A-JAE</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$49.00</span>
                                    <span class="original-price">$98.00</span>
                                    <a href="#">+10 more</a>
                                    <span class="dot first"></span>
                                    <span class="dot sec"></span>
                                    <span class="dot third"></span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="/product/a-jae">View Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <img src="https://cdn.shopify.com/s/files/1/0714/3984/3507/files/Product-120.jpg?v=1750005234" alt="A-MORISEN">
                                <span class="discount-badge">50% Off</span>
                            </div>
                            <p class="prod-name">A-MORISEN</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$39.00</span>
                                    <span class="original-price">$78.00</span>
                                    <a href="#">+10 more</a>
                                    <span class="dot first"></span>
                                    <span class="dot sec"></span>
                                    <span class="dot third"></span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="/product/a-morisen">View Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart">
                            <div class="image-wrap">
                                <img src="https://cdn.shopify.com/s/files/1/0714/3984/3507/files/Product-107.jpg?v=1750004849" alt="ANIMAL PRINT CRYS EN">
                                <span class="discount-badge">50% Off</span>
                            </div>
                            <p class="prod-name">ANIMAL PRINT CRYS EN</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$49.00</span>
                                    <span class="original-price">$98.00</span>
                                    <a href="#">+10 more</a>
                                    <span class="dot first"></span>
                                    <span class="dot sec"></span>
                                    <span class="dot third"></span>
                                </p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="view-p">
                                <a href="/product/animal-print-crys-en">View Product</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div id="loader-overlay" class="hidden">Loading more products...</div>
            </div>
        </div>
    </div>


</body>

</html>