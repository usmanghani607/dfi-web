<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>
    <link rel="shortcut icon" href="images/favicon.png">

    <style>

    </style>
</head>

<body>
    <div id="listing-page" class="listing-page">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="top-filter-container">
                            <div class="listing-top">
                                <div>
                                    <ul class="breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li>Menswear</li>
                                    </ul>
                                </div>
                                <div class="item">
                                    <span class="item-name">Menswear -</span><span class="item-qty">38939 Items</span>
                                </div>
                                <div class="filter-text">
                                    <span class="filter-tx">Filters</span><span class="filterclear"><a href="">Clear All</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="top-main-container">
                            <!-- <div class="sorted">
                            <span class="sort-by">Sort by: </span><span class="high-low">Price: Low to High</span>
                        </div> -->
                            <div class="sorted">
                                <label for="sort-options" class="sort-by">Sort by: </label>
                                <select id="sort-options" class="sort-dropdown">
                                    <option value="low-to-high">Price: Low to High</option>
                                    <option value="high-to-low">Price: High to Low</option>
                                    <option value="new-arrivals">New Arrivals</option>
                                    <option value="best-sellers">Best Sellers</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-border"></div>
                    <div class="row">
                        <div class="filter-container">
                            <div class="cat-filter">
                                <div class="f-heading">
                                    <h4>Categories</h4>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Shirts</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Shirts</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Kurta</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Jackets</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Blazers</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Tunics</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Shirts</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Blazers</span><span class="item-q">(3729)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="brand-filter">
                                <div class="f-heading">
                                    <h4>Brand</h4>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Roadster</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Highlander</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">U.S. Polo Assn.</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Allen Solly</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Wrogn</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Mast & Harbour</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Tommy Hilfiger</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Louis Philippe</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item load">
                                        <a class="more" href="">+ 1502 more</a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="price-range-wrapper">
                                <div class="price-range-filter">
                                    <h4>Price Range</h4>
                                </div>
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="10000" value="10" step="100">
                                    <input type="range" class="range-max" min="0" max="10000" value="1000" step="100">
                                </div>
                                <div class="price-values">
                                    <span id="minValue" class="input-min">$10</span> - <span id="maxValue" class="input-max">$1000</span>
                                </div>
                                <div class="price-input" style="display: none;">
                                    <div class="field">
                                        <input type="number" class="input-min" value="10">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <input type="number" class="input-max" value="1000">
                                    </div>
                                </div>
                            </div> -->

                            <div class="price-range-wrapper">
                                <div class="price-range-filter">
                                    <h4>Price Range</h4>
                                </div>
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="10" max="1000" value="10" step="10">
                                    <input type="range" class="range-max" min="10" max="1000" value="1000" step="10">
                                </div>
                                <div class="price-values">
                                    <span id="minValue" class="input-min">$10</span> - <span id="maxValue" class="input-max">$1000</span>
                                </div>
                                <div class="price-input" style="display: none;">
                                    <div class="field">
                                        <input type="number" class="input-min" value="10" min="10" max="1000">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                        <input type="number" class="input-max" value="1000" min="10" max="1000">
                                    </div>
                                </div>
                            </div>

                            <div class="cloth-filter">
                                <div class="f-heading">
                                    <h4>Clothing Size</h4>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Xs</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Small</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Medium</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Large</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">XL</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">2 XL</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">3 XL</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">4 XL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="color-filter">
                                <div class="f-heading">
                                    <h4>Colors</h4>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Red</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Green</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Blue</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Black</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Yellow</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Voilet</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Purple</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">White</span><span class="item-q">(3729)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pattern-filter">
                                <div class="f-heading">
                                    <h4>Pattern</h4>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Chequered</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Chevron</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Floral</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Geometric</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Houndstooth</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Paisley</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Polka dots</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Solid</span><span class="item-q">(3729)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="material-filter">
                                <div class="f-heading">
                                    <h4>Material</h4>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Art Silk</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Cotton</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Georgette</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Linen</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Rayon</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Silk</span><span class="item-q">(3729)</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="checkbox"><span class="item-name">Velvet</span><span class="item-q">(3729)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="discount-filter">
                                <div class="f-heading">
                                    <h4>Discount Range</h4>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="10"><span class="item-name">10% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="20"><span class="item-name">20% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="30"><span class="item-name">30% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="40"><span class="item-name">40% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="50"><span class="item-name">50% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="60"><span class="item-name">60% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="70"><span class="item-name">70% and above</span>
                                    </div>
                                    <div class="filter-item">
                                        <input type="radio" name="discount" value="80"><span class="item-name">80% and above</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-container">
                            <div class="p-listing">
                                <div class="row">
                                    <div class="col p-card">
                                        <!-- <a style="background:#F7F7FA;" href="product-detail.php" class="category-item">
                                            <img src="images/001.png" alt="" class="img-fluid">
                                        </a> -->
                                        <a href="product-detail.php" class="category-item">
                                            <img src="images/001.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/002.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/003.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/004.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/005.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/006.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/007.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/008.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/009.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/010.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/011.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/012.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/013.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/014.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/015.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/016.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/014.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/017.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/018.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                        <div class="buy-offer">Buy 2 items and save extra $10</div>

                                    </div>
                                    <div class="col p-card">
                                        <a href="" class="category-item">
                                            <img src="images/019.png" alt="" class="img-fluid">
                                        </a>
                                        <div class="list-desc">
                                            <p class="p-cat">Thomas Scott</p>
                                            <p class="p-name">Men Kurta Pyjama</p>
                                            <span class="stars">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/star.svg" alt="" class="aa">
                                                <img src="images/drop.svg" alt="" class="bb">
                                                <span class="star-num">11</span>
                                            </span>
                                            <p class="p-size"><span class="size-tx">Size: </span><span class="size">S, M, L, XL, 2XL, 3XL</span></p>
                                        </div>
                                        <div class="offer">
                                            <span class="percent">20% off</span> <span class="real-price">$15.00</span> <span class="cut-price">$25.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");

        let priceGap = 1000;

        function updatePriceValues() {
            let minPrice = parseInt(priceInput[0].value),
                maxPrice = parseInt(priceInput[1].value);

            if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                rangeInput[0].value = minPrice;
                rangeInput[1].value = maxPrice;

                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";

                document.getElementById("minValue").textContent = `$${minPrice}`;
                document.getElementById("maxValue").textContent = `$${maxPrice}`;
            }
        }

        priceInput.forEach(input => {
            input.addEventListener("input", updatePriceValues);
        });

        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if ((maxVal - minVal) < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }

                updatePriceValues();
            });
        });

        updatePriceValues();
    </script> -->

    <script>
    const rangeInput = document.querySelectorAll(".range-input input"),
        priceInput = document.querySelectorAll(".price-input input"),
        range = document.querySelector(".slider .progress");

    let priceGap = 10; // Set the price gap to $10

    function updatePriceValues() {
        let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);

        if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
            rangeInput[0].value = minPrice;
            rangeInput[1].value = maxPrice;

            range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";

            document.getElementById("minValue").textContent = `$${minPrice}`;
            document.getElementById("maxValue").textContent = `$${maxPrice}`;
        }
    }

    priceInput.forEach(input => {
        input.addEventListener("input", updatePriceValues);
    });

    rangeInput.forEach(input => {
        input.addEventListener("input", e => {
            let minVal = parseInt(rangeInput[0].value),
                maxVal = parseInt(rangeInput[1].value);

            if ((maxVal - minVal) < priceGap) {
                if (e.target.className === "range-min") {
                    rangeInput[0].value = maxVal - priceGap; // Adjust min value
                } else {
                    rangeInput[1].value = minVal + priceGap; // Adjust max value
                }
            } else {
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }

            updatePriceValues();
        });
    });

    updatePriceValues(); // Initial call to set values at page load
</script>

</body>
<?php include 'footer.php'; ?>

</html>