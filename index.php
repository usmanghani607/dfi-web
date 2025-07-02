<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">

    <style>
    </style>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            function getCookie(name) {
                const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? match[2] : null;
            }

            function bindAddToCart(buttonWrapper) {
                buttonWrapper.innerHTML = `
                    <a href="" class="add-btn">
                        <div class="add-cart-btn original-padding">Add to Cart</div>
                    </a>
                `;
                const newAddBtn = buttonWrapper.querySelector(".add-btn");
                newAddBtn.addEventListener("click", function(e) {
                    e.preventDefault();
                    showQuantityControl(buttonWrapper);
                });
            }

            function showQuantityControl(buttonWrapper) {
                buttonWrapper.innerHTML = `
                    <div class="add-cart-btn compact-padding">
                        <div class="quantity-control">
                            <button class="qty-btn minus">−</button>
                            <span class="qty-value">1</span>
                            <button class="qty-btn plus">+</button>
                        </div>
                    </div>
                `;

                const minus = buttonWrapper.querySelector(".minus");
                const plus = buttonWrapper.querySelector(".plus");
                const value = buttonWrapper.querySelector(".qty-value");

                minus.addEventListener("click", function() {
                    let qty = parseInt(value.textContent);
                    if (qty > 1) {
                        value.textContent = qty - 1;
                    } else {
                        bindAddToCart(buttonWrapper);
                    }
                });

                plus.addEventListener("click", function() {
                    let qty = parseInt(value.textContent);
                    value.textContent = qty + 1;
                });
            }


            const zipcode = getCookie('zipcode') || '60611';

            fetch("https://devrestapi.goquicklly.com/only-luxury/get-home-data", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        zipcode
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) return;

                    if (loader) loader.style.display = "none";

                    const bannerUrl = window.innerWidth <= 768 ? data.bannerMobile : data.bannerDesktop;
                    const bannerImg = document.getElementById("dynamicBanner");
                    if (bannerImg) {
                        bannerImg.onload = function() {
                            bannerImg.style.display = "block";
                        };
                        bannerImg.src = bannerUrl;
                    }

                    function renderProductList(list, containerId) {
                        const container = document.getElementById(containerId);
                        if (!container) return;
                        container.innerHTML = "";

                        list.forEach(prod => {
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
                                        <a href="/only-luxury/prod-details/${prod.productID}">
                                            <img src="${imgSrc}" alt="${name}">
                                            <span class="discount-badge">${discount}</span>
                                        </a>
                                    </div>
                                    <p class="prod-name">${name}</p>
                                    <div class="desc">
                                        <p>
                                            <span class="dis-price">$${price}</span>
                                            <span class="original-price">$${mrp}</span>
                                        </p>
                                    </div>
                                    <div class="add-cart-container">
                                        <a href="" class="add-btn">
                                            <div class="add-cart-btn">Add to Cart</div>
                                        </a>
                                    </div>
                                    <div class="view-p">
                                        <a href="/only-luxury/prod-details/${prod.productID}">View Product</a>
                                    </div>
                                </div>
                            </div>
                        `;
                            container.insertAdjacentHTML("beforeend", html);
                        });

                        document.querySelectorAll(`#${containerId} .add-cart-container`).forEach(container => {
                            const addBtn = container.querySelector(".add-btn");
                            if (addBtn) {
                                addBtn.addEventListener("click", function(e) {
                                    e.preventDefault();
                                    showQuantityControl(container);
                                });
                            }
                        });
                    }

                    if (data.lstProdTrendingStyle) {
                        document.getElementById("trendingTitle").textContent = data.lstProdTrendingStyle.title;
                        document.getElementById("trendingSubTitle").textContent = data.lstProdTrendingStyle.subTitle;
                        renderProductList(data.lstProdTrendingStyle.lstProds, "productList");
                    }

                    if (data.lstProdStyleSeasons) {
                        document.getElementById("styleSeasonsTitle").textContent = data.lstProdStyleSeasons.title;
                        document.getElementById("styleSeasonsSubtitle").textContent = data.lstProdStyleSeasons.subTitle;
                        renderProductList(data.lstProdStyleSeasons.lstProds, "styleSeasonList");
                    }

                    if (data.lstSlider && Array.isArray(data.lstSlider)) {
                        const sliderContainer = document.getElementById("dynamicSlider");
                        if (!sliderContainer) return;

                        sliderContainer.innerHTML = "";
                        data.lstSlider.forEach(prod => {
                            const imgSrc = prod.photos?.[0]?.photo || "images/default.png";
                            const name = prod.productName || "";
                            const salePrice = prod.lstSizes?.[0]?.salePrice || "";
                            const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                            const discount = prod.lstSizes?.[0]?.discount || "";

                            const slideHTML = `
                            <div class="cart">
                                <div class="image-wrap">
                                    <a href="prod-listing">
                                        <img src="${imgSrc}" alt="${name}">
                                        <span class="discount-badge">${discount}</span>
                                    </a>
                                </div>
                                <p class="prod-name">${name}</p>
                                <div class="desc">
                                    <p>
                                        <span class="dis-price">$${salePrice}</span>
                                        <span class="original-price">$${mrp}</span>
                                    </p>
                                </div>
                                <div class="add-cart-container">
                                    <a href="" class="add-btn">
                                        <div class="add-cart-btn">Add to Cart</div>
                                    </a>
                                </div>
                            </div>
                        `;
                            sliderContainer.insertAdjacentHTML("beforeend", slideHTML);
                        });

                        document.querySelectorAll("#dynamicSlider .add-cart-container").forEach(container => {
                            const addBtn = container.querySelector(".add-btn");
                            if (addBtn) {
                                addBtn.addEventListener("click", function(e) {
                                    e.preventDefault();
                                    showQuantityControl(container);
                                });
                            }
                        });

                        $('#dynamicSlider').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            prevArrow: '<button class="nav-btn left-btn">Previous</button>',
                            nextArrow: '<button class="nav-btn right-btn">Next</button>',
                            infinite: true,
                            responsive: [{
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 2
                                    }
                                },
                                {
                                    breakpoint: 576,
                                    settings: {
                                        slidesToShow: 1
                                    }
                                }
                            ]
                        });
                    }

                })
                .catch(error => {
                    console.error("Data fetch error:", error);
                    if (loader) loader.style.display = "none";
                });
        });
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function getCookie(name) {
                const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? match[2] : null;
            }

            function bindAddToCart(buttonWrapper, maxQty) {
                buttonWrapper.innerHTML = `
                    <a href="" class="add-btn">
                        <div class="add-cart-btn original-padding">Add to Cart</div>
                    </a>
                `;
                const newAddBtn = buttonWrapper.querySelector(".add-btn");
                newAddBtn.addEventListener("click", function(e) {
                    e.preventDefault();
                    showQuantityControl(buttonWrapper, maxQty);
                });
            }

            function showQuantityControl(buttonWrapper, maxQty = 10) {
                buttonWrapper.innerHTML = `
                    <div class="add-cart-btn compact-padding">
                        <div class="quantity-control">
                            <button class="qty-btn minus">−</button>
                            <span class="qty-value">1</span>
                            <button class="qty-btn plus">+</button>
                        </div>
                    </div>
                `;

                const minus = buttonWrapper.querySelector(".minus");
                const plus = buttonWrapper.querySelector(".plus");
                const value = buttonWrapper.querySelector(".qty-value");

                minus.addEventListener("click", function() {
                    let qty = parseInt(value.textContent);
                    if (qty > 1) {
                        value.textContent = qty - 1;
                    } else {
                        bindAddToCart(buttonWrapper, maxQty);
                    }
                });

                plus.addEventListener("click", function() {
                    let qty = parseInt(value.textContent);
                    if (qty < maxQty) {
                        value.textContent = qty + 1;
                    }
                });
            }

            const zipcode = getCookie('zipcode') || '60611';

            fetch("https://devrestapi.goquicklly.com/only-luxury/get-home-data", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ zipcode })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) return;

                if (loader) loader.style.display = "none";

                const bannerUrl = window.innerWidth <= 768 ? data.bannerMobile : data.bannerDesktop;
                const bannerImg = document.getElementById("dynamicBanner");
                if (bannerImg) {
                    bannerImg.onload = function() {
                        bannerImg.style.display = "block";
                    };
                    bannerImg.src = bannerUrl;
                }

                function renderProductList(list, containerId) {
                    const container = document.getElementById(containerId);
                    if (!container) return;
                    container.innerHTML = "";

                    list.forEach(prod => {
                        const imgSrc = prod.photos?.[0]?.photo || "images/default.png";
                        const name = prod.productName || "";
                        const slug = prod.productSlug || "#";
                        const price = prod.lstSizes?.[0]?.salePrice || "";
                        const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                        const discount = prod.lstSizes?.[0]?.discount || "";
                        const inventoryQty = parseInt(prod.lstSizes?.[0]?.inventoryQuantity || 10);

                        const html = `
                        <div class="col-md-3">
                            <div class="cart">
                                <div class="image-wrap">
                                    <a href="/only-luxury/prod-details/${prod.productID}">
                                        <img src="${imgSrc}" alt="${name}">
                                        <span class="discount-badge">${discount}</span>
                                    </a>
                                </div>
                                <p class="prod-name">${name}</p>
                                <div class="desc">
                                    <p>
                                        <span class="dis-price">$${price}</span>
                                        <span class="original-price">$${mrp}</span>
                                    </p>
                                </div>
                                <div class="add-cart-container"></div>
                                <div class="view-p">
                                    <a href="/only-luxury/prod-details/${prod.productID}">View Product</a>
                                </div>
                            </div>
                        </div>
                        `;
                        container.insertAdjacentHTML("beforeend", html);

                        const btnWrapper = container.lastElementChild.querySelector(".add-cart-container");
                        bindAddToCart(btnWrapper, inventoryQty);
                    });
                }

                if (data.lstProdTrendingStyle) {
                    document.getElementById("trendingTitle").textContent = data.lstProdTrendingStyle.title;
                    document.getElementById("trendingSubTitle").textContent = data.lstProdTrendingStyle.subTitle;
                    renderProductList(data.lstProdTrendingStyle.lstProds, "productList");
                }

                if (data.lstProdStyleSeasons) {
                    document.getElementById("styleSeasonsTitle").textContent = data.lstProdStyleSeasons.title;
                    document.getElementById("styleSeasonsSubtitle").textContent = data.lstProdStyleSeasons.subTitle;
                    renderProductList(data.lstProdStyleSeasons.lstProds, "styleSeasonList");
                }

                if (data.lstSlider && Array.isArray(data.lstSlider)) {
                    const sliderContainer = document.getElementById("dynamicSlider");
                    if (!sliderContainer) return;

                    sliderContainer.innerHTML = "";
                    data.lstSlider.forEach(prod => {
                        const imgSrc = prod.photos?.[0]?.photo || "images/default.png";
                        const name = prod.productName || "";
                        const salePrice = prod.lstSizes?.[0]?.salePrice || "";
                        const mrp = prod.lstSizes?.[0]?.mrpPrice || "";
                        const discount = prod.lstSizes?.[0]?.discount || "";
                        const inventoryQty = parseInt(prod.lstSizes?.[0]?.inventoryQuantity || 10);

                        const slideHTML = `
                        <div class="cart">
                            <div class="image-wrap">
                                <a href="/only-luxury/prod-details/${prod.productID}">
                                    <img src="${imgSrc}" alt="${name}">
                                    <span class="discount-badge">${discount}</span>
                                </a>
                            </div>
                            <p class="prod-name">${name}</p>
                            <div class="desc">
                                <p>
                                    <span class="dis-price">$${salePrice}</span>
                                    <span class="original-price">$${mrp}</span>
                                </p>
                            </div>
                            <div class="add-cart-container"></div>
                        </div>
                        `;
                        sliderContainer.insertAdjacentHTML("beforeend", slideHTML);

                        const btnWrapper = sliderContainer.lastElementChild.querySelector(".add-cart-container");
                        bindAddToCart(btnWrapper, inventoryQty);
                    });

                    $('#dynamicSlider').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        prevArrow: '<button class="nav-btn left-btn">Previous</button>',
                        nextArrow: '<button class="nav-btn right-btn">Next</button>',
                        infinite: true,
                        responsive: [
                            { breakpoint: 992, settings: { slidesToShow: 2 }},
                            { breakpoint: 576, settings: { slidesToShow: 1 }}
                        ]
                    });
                }
            })
            .catch(error => {
                console.error("Data fetch error:", error);
                if (loader) loader.style.display = "none";
            });
        });
    </script>


</head>

<body>

    <div id="loader" style="display: none; text-align: center; padding: 20px;">
        <img src="images/loading.gif" alt="Loading..." style="width: 60px;">
    </div>


    <div id="index-page" class="index-page">
        <div class="banner-slider">
            <a href="prod-listing">
                <img id="dynamicBanner" src="" alt="Only Luxury Banner" style="display: none;" />
            </a>
        </div>

        <div class="trending-heading">
            <div class="container">
                <div class="row">
                    <h3 id="trendingTitle"></h3>
                    <p id="trendingSubTitle"></p>
                </div>
            </div>
        </div>

        <div class="cat-product">
            <div class="container">
                <div class="row" id="productList">
                </div>
                <div class="view-catalog">
                    <a href="prod-listing" class="catalog-btn">View Catalog</a>
                </div>

            </div>
        </div>

        <div class="cat-collection">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="images/collection-1.png" alt="" class="img-above">
                        <div class="text-overlay-above">
                            <h3>Crafted for the Connoisseur</h3>
                            <p>Love a structured tote or a classic sholder bag? You'll <br>find a curated collection from heritage houses & modern labrls-effortlessly versatile, eternally elegant.</p>
                            <!-- <button>SHOP NOW</button> -->
                            <a href="prod-listing" class="shop-btn">SHOP NOW</a>
                        </div>
                        <div class="image-block">
                            <img src="images/collection-2.png" alt="" class="img-below">
                            <div class="text-overlay-below">
                                <h3>Luxury Essentials, Beautifully Curated</h3>
                                <p>The finest in bags, beauty, fragrance—selected from the world’s most iconic names.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="black-coll">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="black-bg">
                            <div class="heading">
                                <h3 id="styleSeasonsTitle"></h3>
                                <p id="styleSeasonsSubtitle"></p>
                            </div>
                            <div class="row cart-slider" id="styleSeasonList">

                            </div>

                            <div class="explor-btn">
                                <a href="prod-listing">Explore All</a>
                            </div>
                            <div class="image-area">
                                <div class="row">
                                    <div class="col-md-6 col-left">
                                        <img src="images/coll.png" alt="">
                                    </div>
                                    <div class="col-md-6 col-right">
                                        <img src="images/colle.png" alt="">
                                    </div>
                                    <div class="col-md-12 full-image">
                                        <img src="images/collec.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="image-slider">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="images/bages.png" alt="">
                                    </div>
                                    <!-- <div class="col-md-6 bag-slide">
                                        <button class="nav-btn left-btn">Previous</button>
                                        <div class="cart">
                                            <div class="image-wrap">
                                                <img src="images/bag-3.png" alt="">
                                                <span class="discount-badge">10% Off</span>
                                            </div>
                                            <p class="prod-name">COACH Polished Pebble Leather Willow Black</p>
                                            <div class="desc">
                                                <p>
                                                    <span class="dis-price">$128.00</span>
                                                    <span class="original-price">$375.00</span>
                                                </p>
                                            </div>
                                            <div class="add-cart-btn">
                                                <a href="">Add to Cart</a>
                                            </div>
                                        </div>
                                        <button class="nav-btn right-btn">Next</button>
                                    </div> -->

                                    <div class="col-md-6">
                                        <!-- <div class="bag-slider-wrapper">
                                            <div class="bag-slider">
                                                <div class="cart">
                                                    <div class="image-wrap">
                                                        <img src="images/bag-2.png" alt="">
                                                        <span class="discount-badge">10% Off</span>
                                                    </div>
                                                    <p class="prod-name">COACH Polished Pebble Leather Willow Black</p>
                                                    <div class="desc">
                                                        <p><span class="dis-price">$128.00</span> <span class="original-price">$375.00</span></p>
                                                    </div>
                                                    <div class="add-cart-btn"><a href="">Add to Cart</a></div>
                                                </div>
                                                <div class="cart">
                                                    <div class="image-wrap">
                                                        <img src="images/bag-3.png" alt="">
                                                        <span class="discount-badge">20% Off</span>
                                                    </div>
                                                    <p class="prod-name">COACH Polished Pebble Leather Willow Black</p>
                                                    <div class="desc">
                                                        <p><span class="dis-price">$150.00</span> <span class="original-price">$300.00</span></p>
                                                    </div>
                                                    <div class="add-cart-btn"><a href="">Add to Cart</a></div>
                                                </div>
                                                <div class="cart">
                                                    <div class="image-wrap">
                                                        <img src="images/bag-2.png" alt="">
                                                        <span class="discount-badge">30% Off</span>
                                                    </div>
                                                    <p class="prod-name">COACH Polished Pebble Leather Willow Black</p>
                                                    <div class="desc">
                                                        <p><span class="dis-price">$99.00</span> <span class="original-price">$199.00</span></p>
                                                    </div>
                                                    <div class="add-cart-btn"><a href="">Add to Cart</a></div>
                                                </div>
                                                <div class="cart">
                                                    <div class="image-wrap">
                                                        <img src="images/bag-3.png" alt="">
                                                        <span class="discount-badge">15% Off</span>
                                                    </div>
                                                    <p class="prod-name">COACH Polished Pebble Leather Willow Black</p>
                                                    <div class="desc">
                                                        <p><span class="dis-price">$180.00</span> <span class="original-price">$220.00</span></p>
                                                    </div>
                                                    <div class="add-cart-btn"><a href="">Add to Cart</a></div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="bag-slider-wrapper">
                                            <div class="bag-slider" id="dynamicSlider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="three-bag">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-first">
                        <img src="images/decor-1.png" alt="">
                        <p>COACH Quilted Leather Mini<br> Tabby Sho Brass Maple</p>
                    </div>
                    <div class="col-md-4 col-sec">
                        <img src="images/decor-2.png" alt="">
                        <p>COACH Quilted Leather Mini<br> Tabby Sho Brass Maple</p>
                    </div>
                    <div class="col-md-4 col-third">
                        <img src="images/decor-3.png" alt="">
                        <p>COACH Quilted Leather Mini<br> Tabby Sho Brass Maple</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="two-bag">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-first">
                        <img src="images/12.png" alt="">
                        <div class="image-text">
                            <img src="images/bag-3.png" alt="">
                            <div class="text-block">
                                <h3>COACH Quilted Leather Mini Tabby Sho <br> Brass Maple</h3>
                                <p>
                                    <span class="dis-price">$128.00</span>
                                    <span class="original-price">$375.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sec">
                        <img src="images/13.png" alt="">
                        <div class="image-text">
                            <img src="images/bag-3.png" alt="">
                            <div class="text-block">
                                <h3>COACH Quilted Leather Mini Tabby Sho <br> Brass Maple</h3>
                                <p>
                                    <span class="dis-price">$128.00</span>
                                    <span class="original-price">$375.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lastdiv">
            <div class="container">
                <div class="row">
                    <div class="heading">
                        <h3>Uncover Iconic Pieces</h3>
                        <p>Shop our collection, curated for fashion connoisseurs who prefer the extraordinary in everyday style.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 f-cls">
                        <img src="images/09.png" alt="">
                    </div>
                    <div class="col-md-4 s-cls">
                        <img src="images/090.png" alt="">
                    </div>
                    <div class="col-md-4 t-cls">
                        <img src="images/0900.png" alt="">
                    </div>
                </div>
            </div>
        </div>


    </div>


</body>
<?php include 'footer.php'; ?>

</html>