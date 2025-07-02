<?php
$productID = $_GET['id'] ?? null;

// echo "$productID";

if (!$productID && isset($_SERVER['REQUEST_URI'])) {
    $parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    if (isset($parts[2]) && is_numeric($parts[2])) {
        $productID = $parts[2];
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">

    <style>
        #loader-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #fff; display: none; z-index: 9998; }
        #loader { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; }

        .might-like-section .p-listing .slick-prev, .slick-next { background: none; border: none; padding: 0; width: 45px; height: 45px; position: absolute; top: 50%; transform: translateY(-50%); z-index: 10; }
        .might-like-section .p-listing .slick-prev { left: -15px; }
        .might-like-section .p-listing .slick-next { right: -15px; }
        .might-like-section .p-listing .slick-prev img, .slick-next img { width: 100%; height: auto; position: relative; bottom: 70px; }
        .might-like-section .p-listing .similar-slider .slick-slide { padding: 0 12px; box-sizing: border-box; }
        .might-like-section .p-listing .similar-slider { margin: 0 -12px; }
        .might-like-section .p-listing .similar-slider .slick-prev, .slick-next { display: block !important; }
        .might-like-section .p-listing .similar-slider .slick-prev::before, .slick-next::before { display: none; }


    </style>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const productId = "<?= $productID ?>";

            // Get zipcode from cookies
            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }

            const zipcode = getCookie("zipcode") || "60610";

            // Show loader
            document.getElementById("loader-overlay").style.display = "block";

            fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-detail", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    zipcode: zipcode,
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("loader-overlay").style.display = "none";

                if (!data.success) return;

                // Update product name, prices, discount
                document.querySelector(".cart-right-text .head h4").textContent = data.productName;
                document.querySelector(".dis-price").textContent = `$${data.lstSizes[0]?.salePrice || ""}`;
                document.querySelector(".original-price").textContent = `$${data.lstSizes[0]?.mrpPrice || ""}`;
                document.querySelector(".discount-badge")?.remove(); // Remove if static

                // Update stock quantity
                // const stockSpan = document.querySelector(".stack-status span");
                // if (stockSpan && data.lstSizes?.[0]?.inventoryQuantity !== undefined) {
                //     stockSpan.textContent = data.lstSizes[0].inventoryQuantity;
                // }

                const stockSpan = document.querySelector(".stack-status span");
                const stockWrapper = document.querySelector(".stack-status");
                const quantity = data.lstSizes?.[0]?.inventoryQuantity;

                if (stockSpan && stockWrapper) {
                    if (quantity && quantity > 0) {
                        stockSpan.textContent = quantity;
                        stockWrapper.style.display = "block";
                    } else {
                        stockWrapper.style.display = "none";
                    }
                }

                // Update product category
                // const categoryLink = document.querySelector("#flush-collapseTwo .accordion-body.detail a");
                // if (categoryLink) {
                //     const type = data.productType || "Uncategorized";
                //     categoryLink.textContent = type;
                //     // categoryLink.href = `/only-luxury/prod-listing?category=${encodeURIComponent(type)}`;
                //     categoryLink.href = `/only-luxury/prod-listing`;

                // }

                const categoryItem = document.querySelector("#flush-collapseTwo").closest(".accordion-item");
                const categoryLink = document.querySelector("#flush-collapseTwo .accordion-body.detail a");
                const type = data.productType?.trim();

                if (type) {
                    categoryLink.textContent = type;
                    categoryLink.href = "/only-luxury/prod-listing";
                } else {
                    if (categoryItem) {
                        categoryItem.style.display = "none";
                    }
                }

                // Update main image
                // const mainImage = document.querySelector(".main-image");
                const photoUrl = data.photos?.[0]?.photo || "images/dummy.jpg";
                // mainImage.src = photoUrl;
                // mainImage.setAttribute("data-photo", photoUrl);

                const mainImgContainer = document.querySelector(".main-img");
                    mainImgContainer.innerHTML = ""; 

                    const mainImage = document.createElement("img");
                    mainImage.src = photoUrl;
                    mainImage.alt = data.productName || "Product Image";
                    mainImage.className = "main-image";
                    mainImage.setAttribute("data-photo", photoUrl);

                    mainImgContainer.appendChild(mainImage);

                    // Re-append magnifier if needed
                    const magnifierDiv = document.createElement("div");
                    magnifierDiv.className = "magnifier";
                    mainImgContainer.appendChild(magnifierDiv);


                // Update thumbnails
                const cartSide = document.querySelector(".cart-side");
                cartSide.innerHTML = "";
                (data.photos || []).forEach(photo => {
                    const thumb = document.createElement("img");
                    thumb.src = photo.photo;
                    thumb.alt = "";
                    thumb.className = "cart-image";
                    thumb.onclick = function () {
                        document.querySelector(".main-image").src = photo.photo;
                        document.querySelectorAll(".cart-image").forEach(i => i.classList.remove("highlighted"));
                        this.classList.add("highlighted");
                    };
                    cartSide.appendChild(thumb);
                });
                document.querySelector(".cart-image")?.classList.add("highlighted");

                // Update accordion content
                // document.querySelector(".accordion-body.detail").textContent = data.description || "No description available.";

                const descItem = document.querySelector("#flush-collapseOne").closest(".accordion-item");
                const descBody = document.querySelector("#flush-collapseOne .accordion-body.detail");

                const description = data.description?.trim();

                if (description) {
                    descBody.textContent = description;
                } else {
                    if (descItem) {
                        descItem.style.display = "none";
                    }
                }

            })
            .catch(error => {
                console.error("Error loading product detail:", error);
                document.getElementById("loader-overlay").style.display = "none";
            });
        });
    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const productId = "<?= $productID ?>";

            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }

            const zipcode = getCookie("zipcode") || "60610";
            document.getElementById("loader-overlay").style.display = "block";

            fetch("https://devrestapi.goquicklly.com/only-luxury/get-product-detail", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    zipcode: zipcode,
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("loader-overlay").style.display = "none";
                if (!data.success) return;

                // --- Main product details ---
                document.querySelector(".cart-right-text .head h4").textContent = data.productName;
                document.querySelector(".dis-price").textContent = `$${data.lstSizes[0]?.salePrice || ""}`;
                document.querySelector(".original-price").textContent = `$${data.lstSizes[0]?.mrpPrice || ""}`;
                document.querySelector(".discount-badge")?.remove();

                const stockSpan = document.querySelector(".stack-status span");
                const stockWrapper = document.querySelector(".stack-status");
                const quantity = data.lstSizes?.[0]?.inventoryQuantity;
                if (stockSpan && stockWrapper) {
                    if (quantity && quantity > 0) {
                        stockSpan.textContent = quantity;
                        stockWrapper.style.display = "block";
                    } else {
                        stockWrapper.style.display = "none";
                    }
                }

                const categoryItem = document.querySelector("#flush-collapseTwo").closest(".accordion-item");
                const categoryLink = document.querySelector("#flush-collapseTwo .accordion-body.detail a");
                const type = data.productType?.trim();
                if (type) {
                    categoryLink.textContent = type;
                    categoryLink.href = "/only-luxury/prod-listing";
                } else if (categoryItem) {
                    categoryItem.style.display = "none";
                }

                const mainImgContainer = document.querySelector(".main-img");
                mainImgContainer.innerHTML = "";
                const mainImage = document.createElement("img");
                const photoUrl = data.photos?.[0]?.photo || "images/dummy.jpg";
                mainImage.src = photoUrl;
                mainImage.alt = data.productName || "Product Image";
                mainImage.className = "main-image";
                mainImage.setAttribute("data-photo", photoUrl);
                mainImgContainer.appendChild(mainImage);
                const magnifierDiv = document.createElement("div");
                magnifierDiv.className = "magnifier";
                mainImgContainer.appendChild(magnifierDiv);

                // const mainImgContainer = document.querySelector(".main-img");
                // mainImgContainer.innerHTML = "";
                // const photoUrl = data.photos?.[0]?.photo || "images/dummy.jpg";
                // const discount = data.lstSizes?.[0]?.discount || "";
                // if (discount) {
                //     const badge = document.createElement("span");
                //     badge.className = "discount-badge";
                //     badge.textContent = discount;
                //     mainImgContainer.appendChild(badge);
                // }
                // const mainImage = document.createElement("img");
                // mainImage.src = photoUrl;
                // mainImage.alt = data.productName || "Product Image";
                // mainImage.className = "main-image";
                // mainImage.setAttribute("data-photo", photoUrl);
                // mainImgContainer.appendChild(mainImage);

                // const magnifierDiv = document.createElement("div");
                // magnifierDiv.className = "magnifier";
                // mainImgContainer.appendChild(magnifierDiv);


                const cartSide = document.querySelector(".cart-side");
                cartSide.innerHTML = "";
                (data.photos || []).forEach(photo => {
                    const thumb = document.createElement("img");
                    thumb.src = photo.photo;
                    thumb.alt = "";
                    thumb.className = "cart-image";
                    thumb.onclick = function () {
                        document.querySelector(".main-image").src = photo.photo;
                        document.querySelectorAll(".cart-image").forEach(i => i.classList.remove("highlighted"));
                        this.classList.add("highlighted");
                    };
                    cartSide.appendChild(thumb);
                });
                document.querySelector(".cart-image")?.classList.add("highlighted");

                const descItem = document.querySelector("#flush-collapseOne").closest(".accordion-item");
                const descBody = document.querySelector("#flush-collapseOne .accordion-body.detail");
                const description = data.description?.trim();
                if (description) {
                    descBody.textContent = description;
                } else if (descItem) {
                    descItem.style.display = "none";
                }

                // --- Fetch similar products ---
                if (data.productType) {
                    fetch("https://devrestapi.goquicklly.com/only-luxury/get-similar-products", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({
                            product_id: productId,
                            category: data.productType
                        })
                    })
                    .then(res => res.json())
                        .then(similar => {
                            const mightLikeSection = document.querySelector(".might-like-section");
                            if (similar.success && similar.lstProd?.length > 0) {
                                renderSimilarProducts(similar.lstProd);
                                if (mightLikeSection) mightLikeSection.style.display = "block";
                            } else {
                                if (mightLikeSection) mightLikeSection.style.display = "none";
                            }
                        })
                    .catch(err => console.error("Similar product fetch error:", err));
                }
            })
            .catch(error => {
                console.error("Error loading product detail:", error);
                document.getElementById("loader-overlay").style.display = "none";
            });

            // function renderSimilarProducts(products) {
            //     const container = document.querySelector(".might-like-section .p-listing .row");
            //     if (!container || !products || !products.length) return;
            //     container.innerHTML = ""; // Clear existing

            //     products.forEach(prod => {
            //         const img = prod.photos?.[0]?.photo || "images/dummy.jpg";
            //         const name = prod.productName || "No Name";
            //         const productID = prod.productID;
            //         const price = prod.lstSizes?.[0]?.salePrice || "0.00";
            //         const mrp = prod.lstSizes?.[0]?.mrpPrice || "0.00";
            //         const discount = prod.lstSizes?.[0]?.discount || "";

            //         const html = `
            //             <div class="col-md-3">
            //                 <div class="cart">
            //                     <div class="image-wrap">
            //                         <a href="prod-details.php?id=${productID}">
            //                             <img src="${img}" alt="${name}" loading="lazy">
            //                         </a>
            //                         <span class="discount-badge">${discount}</span>
            //                     </div>
            //                     <p class="prod-name">${name}</p>
            //                     <div class="desc">
            //                         <p>
            //                             <span class="dis-price">$${price}</span>
            //                             <span class="original-price">$${mrp}</span>
            //                         </p>
            //                     </div>
            //                     <div class="add-cart-container">
            //                         <a href="#" class="add-btn">
            //                             <div class="add-cart-btn">Add to Cart</div>
            //                         </a>
            //                     </div>
            //                 </div>
            //             </div>
            //         `;
            //         container.insertAdjacentHTML("beforeend", html);
            //     });
            // }

            function renderSimilarProducts(products) {
                const container = document.querySelector(".similar-slider");
                if (!container || !products || !products.length) return;
                container.innerHTML = ""; // Clear existing content

                products.forEach(prod => {
                    const img = prod.photos?.[0]?.photo || "images/dummy.jpg";
                    // const name = prod.productName || "No Name";
                    let name = prod.productName || "No Name";
                    if (name.length > 30) {
                        name = name.slice(0, 30) + "...";
                    }

                    const productID = prod.productID;
                    const price = prod.lstSizes?.[0]?.salePrice || "0.00";
                    const mrp = prod.lstSizes?.[0]?.mrpPrice || "0.00";
                    const discount = prod.lstSizes?.[0]?.discount || "";

                    const html = `
                        <div class="slider-item">
                            <div class="cart">
                                <div class="image-wrap">
                                    <a href="/only-luxury/prod-details/${productID}">
                                        <img src="${img}" alt="${name}" loading="lazy">
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
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML("beforeend", html);
                });

                // Reinitialize slick
                if ($(container).hasClass('slick-initialized')) {
                    $(container).slick('unslick');
                }

                $(container).slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    infinite: true,
                    prevArrow: `<button type="button" class="slick-prev"><img src="../images/like-left.png" alt="Prev"></button>`,
                    nextArrow: `<button type="button" class="slick-next"><img src="../images/like-right.png" alt="Next"></button>`,
                    responsive: [
                        { breakpoint: 992, settings: { slidesToShow: 3 } },
                        { breakpoint: 768, settings: { slidesToShow: 2 } },
                        { breakpoint: 480, settings: { slidesToShow: 1 } }
                    ]
                });
            }


        });
    </script>



</head>

<body>
    
    <div id="AddToCartPage" class="AddToCartPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="">
                            <div class="p-detail">
                                <div>
                                    <ul class="breadcrumb">
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href=""></a></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="sticky-wrapper">
                            <div class="cart-side">
                            </div>
                            <div class="main-img">
                                <div class="magnifier"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 order-s">
                        <div class="cart-right-text">
                            <div class="head">
                                <h4></h4>
                                 <p>
                                    <span class="dis-price"></span>
                                    <span class="original-price"></span>
                                 </p>
                            </div>
                            <div class="stack-status">
                                <p><span></span> in Stock, Ready to Ship</p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="deliver">
                                <span class="deliver-heading">Deliver to</span>
                                <span class="add"><a href="">Change Address</a></span>
                            </div>
                            <div class="address">
                                <span><img src="images/place-icon.png" alt=""></span><span class="address-heading">Karan Shah</span>
                                <div class="loc"><a href="">1400 N Lake Shore, Chicago, IL, USA</a></div>
                            </div>
                            <!-- <div class="delv">
                                <span><img src="images/van.png" alt=""></span><span class="del-nam">Delivery on Friday, January 31</span>
                            </div> --><br>
                            <div class="cart-border"></div>

                            <div class="accordion accordion-flush desc" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Product Description
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail"></div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Product Category
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail"><a href="" class="q-color" target="_blank"></a></div>
                                    </div>
                                </div>
                                <!-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Product Specifications
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse show" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">
                                            <p><span class="product-bol">Fabric:</span><span class="pro-text">Pure Handloom Cotton</span></p>
                                            <p><span class="product-bol">Color:</span><span class="pro-text">Rich Red</span></p>
                                            <p><span class="product-bol">Design:</span><span class="pro-text">Traditional Paithani Weave featuring Radha Krishna Pallu</span></p>
                                            <p><span class="product-bol">Workmanship:</span><span class="pro-text">Handcrafted with intricate Zari work</span></p>
                                            <p><span class="product-bol">Occasion:</span><span class="pro-text">Perfect for Festive and Ceremonial Gatherings</span></p>
                                            <p><span class="product-bol">Blouse:</span><span class="pro-text">Unstitched, in a complementing Silk Blend</span></p>
                                            <p><span class="product-bol">Blouse Design:</span><span class="pro-text">Elegant Geometric Pattern</span></p>
                                            <p><span class="product-bol">Size & Fit:</span><span class="pro-text">Saree - 5.5 meters; Blouse - 0.80 meters.</span></p>
                                            <p><span class="product-bol">Care Instructions:</span><span class="pro-text">Dry clean recommended to maintain its elegance</span></p>
                                            <p><span class="product-bol">Note:</span><span class="pro-text">Slight variations in color and design may occur, adding to the unique charm of this piece</span></p>

                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                            Shipping & Returns
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse show" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">Policy: Enjoy a seamless shopping experience with our straightforward shipping and return policies. We offer easy returns within 48 hours in the original condition, ensuring your satisfaction is paramount. For detailed information on our policies and convenient pick-up service, please refer to our comprehensive <a href="" class="q-color">Shipping and Return Policy</a>.</div>
                                    </div>
                                </div> -->
                                <!-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                            Style & Fit Tips
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse show" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">Accessorize this beautiful Indian cotton saree with gold jewelry to add a dash of elegance to the outfit.</div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-1"></div> -->
                    <!-- <div class="col-md-5 order-s">
                        <div class="cart-right-text">
                            <div class="head">
                                <h4>COACH Quilted Leather Mini Tabby Sho Brass Maple</h4>
                                 <p>
                                    <span class="dis-price">$128.00</span>
                                    <span class="original-price">$375.00</span>
                                 </p>
                            </div>
                            <div class="stack-status">
                                <p><span>1</span> in Stock, Ready to Ship</p>
                            </div>
                            <div class="add-cart-container">
                                <a href="#" class="add-btn">
                                    <div class="add-cart-btn">Add to Cart</div>
                                </a>
                            </div>
                            <div class="deliver">
                                <span class="deliver-heading">Deliver to</span>
                                <span class="add"><a href="">Change Address</a></span>
                            </div>
                            <div class="address">
                                <span><img src="images/place-icon.png" alt=""></span><span class="address-heading">Karan Shah</span>
                                <div class="loc"><a href="">1400 N Lake Shore, Chicago, IL, USA</a></div>
                            </div>
                            <div class="delv">
                                <span><img src="images/van.png" alt=""></span><span class="del-nam">Delivery on Friday, January 31</span>
                            </div>
                            <div class="cart-border"></div>

                            <div class="accordion accordion-flush desc" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Product Description
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">Immerse yourself in the timeless beauty of Indian tradition with our Authentic Red Handloom Cotton Paithani Saree. This exquisite piece, featuring the revered Radha Krishna design on the pallu, is a testament to India’s rich cultural heritage and artisanal craftsmanship. Handwoven with intricate Zari work, this saree embodies the perfect blend of tradition and style. The vibrant red hue and pure cotton fabric make it a stunning choice for festive and ceremonial gatherings. Buy Indian saree online from our exclusive collection of paithani sarees and add a piece of cultural richness to your wardrobe.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Product Category
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail"><a href="" class="q-color">Bags & Purse</a></div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Product Specifications
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse show" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">
                                            <p><span class="product-bol">Fabric:</span><span class="pro-text">Pure Handloom Cotton</span></p>
                                            <p><span class="product-bol">Color:</span><span class="pro-text">Rich Red</span></p>
                                            <p><span class="product-bol">Design:</span><span class="pro-text">Traditional Paithani Weave featuring Radha Krishna Pallu</span></p>
                                            <p><span class="product-bol">Workmanship:</span><span class="pro-text">Handcrafted with intricate Zari work</span></p>
                                            <p><span class="product-bol">Occasion:</span><span class="pro-text">Perfect for Festive and Ceremonial Gatherings</span></p>
                                            <p><span class="product-bol">Blouse:</span><span class="pro-text">Unstitched, in a complementing Silk Blend</span></p>
                                            <p><span class="product-bol">Blouse Design:</span><span class="pro-text">Elegant Geometric Pattern</span></p>
                                            <p><span class="product-bol">Size & Fit:</span><span class="pro-text">Saree - 5.5 meters; Blouse - 0.80 meters.</span></p>
                                            <p><span class="product-bol">Care Instructions:</span><span class="pro-text">Dry clean recommended to maintain its elegance</span></p>
                                            <p><span class="product-bol">Note:</span><span class="pro-text">Slight variations in color and design may occur, adding to the unique charm of this piece</span></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                            Shipping & Returns
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse show" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">Policy: Enjoy a seamless shopping experience with our straightforward shipping and return policies. We offer easy returns within 48 hours in the original condition, ensuring your satisfaction is paramount. For detailed information on our policies and convenient pick-up service, please refer to our comprehensive <a href="" class="q-color">Shipping and Return Policy</a>.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed desc-heading" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                            Style & Fit Tips
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse show" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body detail">Accessorize this beautiful Indian cotton saree with gold jewelry to add a dash of elegance to the outfit.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="might-like-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        You Might Also Like
                    </div>
                </div>
                <div class="p-listing">
                    <div class="row">
                        <div class="similar-slider">
                            <div class="col-md-3">
                                <div class="cart">
                                    <div class="image-wrap">
                                        <img src="../images/bag-2.png" alt="A-EMELIAH">
                                        <span class="discount-badge">50% Off</span>
                                    </div>
                                    <p class="prod-name">A-EMELIAH</p>
                                    <div class="desc">
                                        <p>
                                            <span class="dis-price">$39.00</span>
                                            <span class="original-price">$78.00</span>
                                        </p>
                                    </div>
                                    <div class="add-cart-container">
                                        <a href="#" class="add-btn">
                                            <div class="add-cart-btn">Add to Cart</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="cart">
                                    <div class="image-wrap">
                                        <img src="../images/bag-3.png" alt="A-EMELIAH">
                                        <span class="discount-badge">50% Off</span>
                                    </div>
                                    <p class="prod-name">A-EMELIAH</p>
                                    <div class="desc">
                                        <p>
                                            <span class="dis-price">$39.00</span>
                                            <span class="original-price">$78.00</span>
                                        </p>
                                    </div>
                                    <div class="add-cart-container">
                                        <a href="#" class="add-btn">
                                            <div class="add-cart-btn">Add to Cart</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="cart">
                                    <div class="image-wrap">
                                        <img src="../images/bag-2.png" alt="A-EMELIAH">
                                        <span class="discount-badge">50% Off</span>
                                    </div>
                                    <p class="prod-name">A-EMELIAH</p>
                                    <div class="desc">
                                        <p>
                                            <span class="dis-price">$39.00</span>
                                            <span class="original-price">$78.00</span>
                                        </p>
                                    </div>
                                    <div class="add-cart-container">
                                        <a href="#" class="add-btn">
                                            <div class="add-cart-btn">Add to Cart</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="cart">
                                    <div class="image-wrap">
                                        <img src="../images/bag-3.png" alt="A-EMELIAH">
                                        <span class="discount-badge">50% Off</span>
                                    </div>
                                    <p class="prod-name">A-EMELIAH</p>
                                    <div class="desc">
                                        <p>
                                            <span class="dis-price">$39.00</span>
                                            <span class="original-price">$78.00</span>
                                        </p>
                                    </div>
                                    <div class="add-cart-container">
                                        <a href="#" class="add-btn">
                                            <div class="add-cart-btn">Add to Cart</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="cart">
                                    <div class="image-wrap">
                                        <img src="../images/bag-2.png" alt="A-EMELIAH">
                                        <span class="discount-badge">50% Off</span>
                                    </div>
                                    <p class="prod-name">A-EMELIAH</p>
                                    <div class="desc">
                                        <p>
                                            <span class="dis-price">$39.00</span>
                                            <span class="original-price">$78.00</span>
                                        </p>
                                    </div>
                                    <div class="add-cart-container">
                                        <a href="#" class="add-btn">
                                            <div class="add-cart-btn">Add to Cart</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <div class="might-like-section" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">You Might Also Like</div>
                </div>
                <div class="p-listing">
                    <div class="similar-slider"></div>
                </div>
            </div>
        </div>
    </div>


    <div id="loader-overlay">
        <div id="loader">
            <img src="<?= $baseURL ?>images/Quicklly-Logo_300X200.gif" alt="Loading...">
        </div>
    </div>

    <!-- <script>
        $(document).ready(function() {
            $(".cart-side .cart-image").click(function() {
                var clickedImageSrc = $(this).attr("src");
                $(".main-img .main-image").attr("src", clickedImageSrc);
                $(".cart-side .cart-image").removeClass("highlighted");
                $(this).addClass("highlighted");
            });
        });
    </script> -->

    <script>
        $(document).ready(function () {
            var firstImage = $(".cart-side .cart-image").first();
            var firstSrc = firstImage.attr("src");
            $(".main-img .main-image").attr("src", firstSrc);
            firstImage.addClass("highlighted");

            $(".cart-side .cart-image").click(function () {
                var clickedImageSrc = $(this).attr("src");
                $(".main-img .main-image").attr("src", clickedImageSrc);
                $(".cart-side .cart-image").removeClass("highlighted");
                $(this).addClass("highlighted");
            });
        });
    </script>


    <script>
        const mainImage = document.querySelector('.main-image');
        const magnifier = document.querySelector('.magnifier');

        mainImage.addEventListener('mousemove', (e) => {
            const {
                left,
                top,
                width,
                height
            } = mainImage.getBoundingClientRect();


            const magnifierSize = 300;
            const offset = magnifierSize / 2;


            magnifier.style.left = `${e.clientX - left - offset}px`;
            magnifier.style.top = `${e.clientY - top - offset}px`;


            magnifier.style.backgroundImage = `url(${mainImage.src})`;
            magnifier.style.backgroundSize = `${width * 2}px ${height * 2}px`;
            magnifier.style.backgroundPosition = `-${(e.clientX - left) * 2 - offset}px -${(e.clientY - top) * 2 - offset}px`;
        });

        mainImage.addEventListener('mouseenter', () => {
            magnifier.classList.add('magnified');
        });

        mainImage.addEventListener('mouseleave', () => {
            magnifier.classList.remove('magnified');
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function bindAddToCart(buttonWrapper) {
                buttonWrapper.innerHTML = `
                    <a href="#" class="add-btn">
                        <div class="add-cart-btn">Add to Cart</div>
                    </a>
                `;

                const newAddBtn = buttonWrapper.querySelector(".add-btn");
                newAddBtn.addEventListener("click", function (e) {
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

                minus.addEventListener("click", function () {
                    let qty = parseInt(value.textContent);
                    if (qty > 1) {
                        value.textContent = qty - 1;
                    } else {
                        bindAddToCart(buttonWrapper);
                    }
                });

                plus.addEventListener("click", function () {
                    let qty = parseInt(value.textContent);
                    value.textContent = qty + 1;
                });
            }

            document.querySelectorAll(".add-cart-container").forEach(function (container) {
                const addBtn = container.querySelector(".add-btn");
                if (addBtn) {
                    addBtn.addEventListener("click", function (e) {
                        e.preventDefault();
                        showQuantityControl(container);
                    });
                }
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function(){
            $('.similar-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });

    </script> -->

    <!-- <script>
        $(document).ready(function(){
            $('.similar-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                infinite: true,
                prevArrow: `<button type="button" class="slick-prev">
                                <img src="../images/like-left.png" alt="Previous">
                            </button>`,
                nextArrow: `<button type="button" class="slick-next">
                                <img src="../images/like-right.png" alt="Next">
                            </button>`,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 3 }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2 }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        });
    </script> -->

</body>
<?php include 'footer.php'; ?>

</html>