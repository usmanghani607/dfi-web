<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script src="js/common-script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        button.swal2-confirm.swal2-styled {
            background: #F05336 !important;
        }
    </style>

</head>

<body>
    <!-- <div class="topheader">
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="col">
                            <div class="logo_left">
                                <a href="/"><img src="images/logo.png" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div> -->
    <header class="clsInnerHeader">

        <a href="https://www.dev.goquicklly.com/" title="Quicklly.com" class="clsLogo">
            <img src="images/quicly-logo-black.png" alt="Quicklly - Indian Groceries, Food &amp; More">
        </a>

        <div class="clsShoppingIn">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Home</p><br>
            <span>1400 N Lake Shore</span>

        </div>
        <div class="clsAccountt showonlyonmob">
            <a href="quicklly-pass"><img src="images/qpasstop.svg"></a>
        </div>

        <div class="clsShopBySearch">
            <div class="clsFlex">
                <div class="clsSearchBox" id="searchnothide">
                    <form role="search" method="get" id="headersearchfrm" action="https://www.dev.goquicklly.com/search/">
                        <input type="text" placeholder="Search for products..." id="search_box" name="q" minlength="2" required="" autocomplete="off" onkeypress="return SearchInputValidation(event)">
                        <input type="hidden" name="filterstore" id="sfilterstore" value="">
                        <input type="hidden" name="filterdiscount" id="sfilterdiscount" value="">
                        <input type="hidden" name="section" id="ssection" value="all">
                        <input type="hidden" name="sortby" id="sortby" value="price-low-to-high">
                        <input type="submit" name="whatsget" id="whatsget" class="search-whatsget" disabled="disabled" style="display:none">
                        <button type="button" class="clsBtn clsSearchBtn" id="searchdeact"> </button>
                        <button type="button" class="clsBtn clsSearchBtn crossbtn" id="searchcrossbtn" style="display:none;"></button>

                    </form>
                    <style>
                        .clsAccountt.showonlyonmob {
                            display: none !important;
                        }

                        header .clsSearchBox .clsSearchBtn {
                            right: 1px;
                            width: 45px;
                            height: 35px;
                            border-top-left-radius: 0;
                            border-bottom-left-radius: 0;

                        }

                        span.notloggbbtt {
                            position: relative;
                            top: 10px;
                        }

                        header .clsShoppingIn,
                        header .clsShopByStore {
                            padding: 12px 20px 12px 20px;
                        }

                        header .clsShoppingIn,
                        header .clsShopByCat,
                        header .clsAccount,
                        header .clsCart2 {
                            padding: 12px 30px;
                        }

                        header .clsAccount,
                        header .clsShoppingIn {
                            border-right: 0px solid #fff;
                        }

                        header .clsSearchBox input[type=text] {
                            width: 100%;
                            border: 2px solid #53A552;
                            border-top-left-radius: 8px;
                            border-bottom-left-radius: 8px;
                            border-top-right-radius: 8px; 
                            border-bottom-right-radius: 8px;
                            font-size: 14px;
                            padding-left: 10px;
                        }

                        header .clsAccount.robtt:hover span {
                            background-image: none !important;
                        }

                        header .clsCart2 label,
                        header .clsCart2 span {
                            display: flex;
                            align-items: center;
                            justify-content: start;
                            font: normal normal normal 14px/20px Poppins;
                            letter-spacing: 0px;
                            color: #F7F7FA;
                            opacity: 1;
                            cursor: pointer;
                        }

                        header .clsCart2 label img {
                            width: 18px;
                            margin-right: 6px;
                        }

                        header p,
                        header .clsShoppingIn span,
                        .clsAccount.robtt a p {
                            font: normal normal 400 14px/20px Poppins;
                            letter-spacing: 0px;
                            color: #000000;
                        }

                        header .clsShoppingIn p,
                        header .clsAccount.robtt span {
                            font: normal normal 500 16px/18px Poppins;
                            letter-spacing: 0px;
                            color: #000000;
                        }

                        header .clsCart2 a {
                            display: flex;
                            width: 85px;
                            height: 33px;
                            background-image: none;
                            position: relative;
                            background: #53A551 0% 0% no-repeat padding-box !important;
                            border-radius: 6px;
                            opacity: 1;
                            padding: 6px;
                            cursor: pointer;
                        }

                        header .clsCart2 span {
                            position: relative;
                            width: auto;
                            height: auto;
                            color: #fff;
                            border-radius: 0;
                            text-align: center;
                            line-height: 19px;
                            right: 0;
                            top: 0;
                            margin-left: 5px;
                        }

                        .mobilefixedfooter,
                        .myaccountpopup,
                        .departmentpopup {
                            display: none;
                        }

                        .headerpopup {
                            min-height: 60px !important
                        }

                        p.subs_type {
                            font-size: 12px !important;
                            font-weight: 500;
                        }

                        .clsInnerCart .clsContent .clsCartProd .clsDetails p:nth-child(3),
                        .clsInnerCart .clsContent .clsCartProd .clsDetails p:nth-child(4) {
                            font-size: 11px;
                            margin-top: 10px;
                        }

                        .search_status {
                            display: inline-block;
                            word-wrap: break-word;
                            border: none;
                            right: 0;
                            width: 13%;
                            position: absolute;
                            padding-top: 10px;
                        }

                        .search_price {
                            display: inline-block;
                            word-wrap: break-word;
                            position: absolute;
                            padding-top: 5px;
                            width: 10%;
                            text-align: right;
                        }

                        .search_size {
                            display: inline-block;
                            word-wrap: break-word;
                            width: 10%;
                            padding-top: 5px;
                            text-align: center;
                        }

                        .search_status .clsProdAdd {
                            padding-top: 5px;
                            display: block;
                            width: 55px;
                            height: 30px;
                            line-height: 16px;
                            margin-top: 3px;
                            font-size: 13px;
                        }

                        .search_status .searchQty select {
                            width: 47px !important;
                        }


                        @media (min-width: 320px) and (max-width: 327px) {
                            .hideinmobile {
                                display: none;
                            }

                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                position: relative;
                                z-index: 9;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 23%;

                            }

                            a.search_productname {
                                font-size: 10px;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: normal;
                                border-right: none;
                                float: right;
                                position: absolute;
                                padding-top: 3px;
                                font-size: 10px;

                            }

                            .search_status .clsProdAdd {
                                position: relative;
                                top: 7px;
                                text-align: center
                            }

                            span .searchQty:last-child {
                                margin-left: 5px;
                            }

                            .search_status .searchQty select {
                                width: 45px !important;
                                padding: 3px;
                            }

                            .search_status .clsProdAdd {
                                margin-left: 28px;
                                margin-block: -6px;
                            }

                            .search_status,
                            span .searchQty:last-child {
                                width: 87px;
                            }

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 10px;
                                width: 12%;
                                text-align: left;
                                margin-left: 60px;
                                font-size: 10px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 16%;
                                padding-top: 10px;
                                text-align: left;
                                margin-bottom: 10px;
                                position: absolute;
                                margin-left: 12px;
                                font-size: 10px;
                            }

                            .maincatheadtitle,
                            h3 {
                                font-size: 14px !important;
                            }
                        }

                        @media (min-width: 327px) and (max-width: 360px) {
                            .hideinmobile {
                                display: none;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 24%;

                            }

                            a.search_productname {
                                font-size: 10px;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: normal;
                                border-right: none;
                                float: right;
                                position: absolute;
                                padding-top: 3px;
                                font-size: 10px;

                            }

                            .search_status .clsProdAdd {
                                position: relative;
                                top: 7px;
                                text-align: center
                            }

                            .search_status .searchQty select {
                                width: 45px !important;
                                padding: 3px;
                            }

                            .search_status .clsProdAdd {
                                margin-left: 28px;
                                margin-block: -6px;
                            }

                            .search_status,
                            span .searchQty:last-child {
                                width: 87px;
                            }

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 10px;
                                width: 12%;
                                text-align: left;
                                margin-left: 60px;
                                font-size: 10px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 16%;
                                padding-top: 10px;
                                text-align: left;
                                margin-bottom: 10px;
                                position: absolute;
                                margin-left: 12px;
                                font-size: 10px;
                            }

                            .maincatheadtitle,
                            h3 {
                                font-size: 14px !important;
                            }
                        }

                        @media (min-width: 327px) and (max-width: 350px) {
                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                position: relative;
                                z-index: 9;
                            }
                        }

                        @media (min-width: 350px) and (max-width: 360px) {
                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                position: relative;
                                z-index: 9;
                            }
                        }

                        @media (min-width: 360px) and (max-width: 420px) {
                            .hideinmobile {
                                display: none;
                            }

                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                position: relative;
                                z-index: 9;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 26%;
                                font-size: 10px;
                            }

                            a.search_productname {
                                font-size: 10px;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: normal;
                                border-right: none;
                                float: right;
                                position: absolute;
                                padding-top: 3px;
                                font-size: 10px;

                            }

                            .search_status .clsProdAdd {
                                position: relative;
                                top: 7px;
                                text-align: center
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                                padding: 3px;
                            }

                            .search_status .clsProdAdd {
                                margin-left: 25px;
                                margin-block: -6px;
                            }

                            .search_status,
                            span .searchQty:last-child {
                                width: 89px;
                            }

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 10px;
                                width: 12%;
                                text-align: right;
                                margin-left: 53px;
                                font-size: 10px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 16%;
                                padding-top: 10px;
                                text-align: left;
                                margin-left: 9px;
                                position: absolute;
                                font-size: 10px;
                            }
                        }

                        @media (min-width: 850px) and (max-width: 1050px) {
                            .headerpopup {
                                min-height: 92px !important
                            }
                        }

                        @media (min-width: 767px) and (max-width: 849px) {
                            .headerpopup {
                                min-height: 122px !important
                            }
                        }

                        @media (min-width: 320px) and (max-width: 766px) {
                            .headerpopup {
                                min-height: 101px !important
                            }

                            header .clsSearchBox input[type=text] {
                                border-top-left-radius: 8px;
                                border-bottom-left-radius: 8px;
                                background: #FFFFFF 0% 0% no-repeat padding-box;
                                border: 1px solid #E4E4E4;

                            }

                            .topsectionall.hidemob {
                                display: none;
                            }

                            a.clsLogo {
                                display: none !important;
                            }
                        }

                        @media (min-width: 380px) and (max-width: 500px) {
                            .hideinmobile {
                                display: none;
                            }

                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                position: absolute;
                                z-index: 9;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 30%;
                                font-size: 10px;
                            }

                            a.search_productname {
                                font-size: 10px;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: break-word;
                                border-right: none;
                                float: right;
                                width: 100px;
                                position: absolute;
                                padding-top: 0px;
                                font-size: 10px;
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                            }

                            .search_status .clsProdAdd {
                                margin-block: 4px;
                                margin-left: 21px;
                            }

                            .search_status,
                            span .searchQty:last-child {
                                width: 89px;
                            }

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 10px;
                                width: 12%;
                                text-align: left;
                                margin-left: 84px;
                                font-size: 10px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 14%;
                                padding-top: 10px;
                                text-align: left;
                                margin-left: 20px;
                                position: absolute;
                                font-size: 10px;
                            }

                        }

                        @media (min-width: 501px) and (max-width: 800px) {
                            .hideinmobile {
                                display: none;
                            }

                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                /* position: relative z-index:9; */
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 35%;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: break-word;
                                border-right: none;
                                float: right;
                                width: 100px;
                                position: absolute;
                                padding-top: 0px
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                            }

                            .search_status .clsProdAdd {
                                margin-left: 17px;
                            }

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 5px;
                                width: 10%;
                                text-align: left;
                                margin-left: 4px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 10%;
                                padding-top: 5px;
                                text-align: left;
                                width: 80px;
                                margin-left: 24px;
                            }

                        }

                        @media (min-width: 800px) and (max-width: 849px) {
                            .hideinmobile {
                                display: none;
                            }

                            .search-dropbox {
                                width: 100%;
                                margin-left: 0%;
                                position: relative;
                                z-index: 9;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 35%;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: break-word;
                                border-right: none;
                                right: -30px;
                                width: 100px;
                                position: absolute;
                                padding-top: 0px
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                            }

                            .search_status .clsProdAdd {}

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 5px;
                                width: 10%;
                                text-align: left;
                                margin-left: 48px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 15%;
                                padding-top: 5px;
                                text-align: left;
                            }

                        }

                        @media only screen and (max-width:849px) {
                            header .clsGbox {
                                padding-right: 1.1em;
                            }
                        }

                        @media (min-width:849px) and (max-width:1200px) {
                            header .clsGbox {
                                padding-right: 1.4em;
                            }
                        }

                        @media only screen and (min-width:1200px) {
                            header .clsGbox {
                                border-left: 1px solid #ddd;
                                padding: 0px 10px;
                                height: 100%;
                            }

                            header .clsReferbox {
                                border-left: 1px solid #ddd;
                                border-right: 1px solid #ddd;
                                padding: 0px 10px;
                                height: 100%;
                            }
                        }

                        @media(min-width:849px)and (max-width: 1024px) {
                            .search-dropbox {
                                width: 100%;

                                position: absolute;
                                z-index: 9;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 35%;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: break-word;
                                border-right: none;
                                right: 0;
                                width: 100px;
                                position: absolute;
                                padding-top: 0px
                            }

                            .search_status .clsProdAdd {
                                padding-top: 5px;
                                display: block;
                                width: 55px;
                                height: 30px;
                                line-height: 16px;
                                margin-top: 3px;
                                margin-left: 21px;
                                text-align: center;
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                            }

                            .search_status .clsProdAdd {}

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 5px;
                                width: 10%;
                                text-align: right;
                                margin-left: -11px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 15%;
                                padding-top: 5px;
                                text-align: right;
                                margin-left: -10px;
                            }

                        }

                        @media(min-width:1024px)and (max-width:1249px) {
                            .search-dropbox {
                                width: 100%;
                                position: absolute;
                                z-index: 9;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 35%;
                            }

                            .search_status {
                                display: inline-block;
                                word-wrap: break-word;
                                border-right: none;
                                right: 0;
                                width: 100px;
                                position: absolute;
                                padding-top: 0px
                            }

                            .search_status .clsProdAdd {
                                padding-top: 5px;
                                display: block;
                                width: 55px;
                                height: 30px;
                                line-height: 16px;
                                margin-top: 3px;
                                margin-left: 21px;
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                            }

                            .search_price {
                                display: inline-block;
                                word-wrap: break-word;
                                position: absolute;
                                padding-top: 5px;
                                width: 10%;
                                text-align: right;
                                margin-left: 29px;
                            }

                            .search_size {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 15%;
                                padding-top: 5px;
                                text-align: right;
                                margin-left: -10px;
                            }
                        }

                        @media(min-width:1250px) {
                            .search-dropbox {
                                width: 100%;
                                position: relative;
                                z-index: 1;
                            }

                            .search_product {
                                display: inline-block;
                                word-wrap: break-word;
                                width: 55%
                            }

                            .search_status .searchQty select {
                                width: 47px !important;
                            }

                            .search_status .clsProdAdd {}
                        }

                        @media (min-width: 480px) and (max-width: 767px) {
                            .search_status .searchQty select {
                                width: 47px !important;
                            }
                        }

                        header .clsGiftbox {
                            flex: .25;
                            text-align: right;
                        }

                        .giftImg {
                            padding-top: 1em;
                            width: 26px;
                        }

                        @media only screen and (max-width: 850px) {
                            header .clsGiftbox {
                                flex: unset;
                                position: absolute;
                                top: 0;
                                right: 55px;
                                height: 62px;
                            }
                        }

                        @media only screen and (max-width: 479px) {
                            #search_drop {
                                margin-top: 8px;
                            }
                        }

                        @media only screen and (max-width: 550px) {
                            .giftImg {
                                padding-top: .8em;
                                width: 24px;
                            }

                            header.clsInnerHeader {
                                display: flex !important;
                            }

                            header .clsGiftbox {
                                right: 55px;
                            }
                        }
                    </style>

                </div>
            </div>
        </div>

        <div class="clsAccount">
            <p>
            </p>
            <span class="notloggbbtt">Login</span>

            <div class="clsPopUp">
                <div class="clsContent">
                    <a href="javascript:void(0)" id="procedcheckoutBtn" class="clsBtn">Sign In</a>
                    <a href="javascript:void(0)" id="proceedregister" class="create-account">New customer? Create an account</a>
                </div>
            </div>
        </div>
        <div class="clsAccount robtt">
            <a href="javascript:void(0)" onclick="showloginpopup();">
                <p>Return</p>
                <span>&amp; Orders</span>
            </a>
        </div>

        <div class="clsCart2">
            <a href="javascript:void(0);" onclick="toggleInnerCart();"><label><img src="images/minicart.svg">Cart</label><span>0</span></a>
        </div>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $("#search_dropm").hide();
                $("#search_boxm").keyup(function() {
                    $("#search_dropm").show();
                    var search_string = $("#search_boxm").val();
                    if (search_string == '') {
                        html('');
                    } else {
                        postdata = {
                            'q': search_string
                        }
                        $.post("ajax-search.php", postdata, function(data) {
                            $("#search_dropm").html(data);

                        });
                    }
                });


            });

            function searchitm() {
                $('#headersearchfrmm').submit();

            }
        </script>
        <script>
            $(document).ready(function() {
                $('input#search_boxm').on('keyup', function() {
                    var charCount = $(this).val().replace(/\s/g, '').length;
                    if (charCount > 2) {
                        $("#searchdeactm").hide();
                        $("#searchbtnm").show();
                        $("#whatsgetm").removeAttr("disabled");
                    }
                    if (charCount <= 2) {
                        $("#searchdeactm").show();
                        $("#searchbtnm").hide();
                    }
                });
            });
            var isAddressSelected = false;

            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }


            function IsAlphaNumeric(e) {
                var specialKeys = new Array();
                specialKeys.push(8); //Backspace
                specialKeys.push(9); //Tab
                specialKeys.push(46); //Delete
                specialKeys.push(36); //Home
                specialKeys.push(35); //End
                specialKeys.push(37); //Left
                specialKeys.push(39); //Right

                var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
                var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || keyCode == 32 || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode) || keyCode == 13);
                document.getElementById("error").style.display = ret ? "none" : "inline";
                return ret;
            }

            function showloginpopup() {
                $("#procedcheckoutBtn").trigger('click');
            }

            function opensidemenu() {

                document.getElementById("allpagesmenu").style.width = "320px";
                $('.filter-overlay').show();


            }



            function closesidemenu() {
                $('.filter-overlay').hide();
                document.getElementById("allpagesmenu").style.width = "0px";
            }
        </script>
        <!-- desktop search ends -->


    </header>

    <div class="header-top">
        <div class="clsHead">
            <div class="container">
                <div class="topsectionimppage">
                    <div class="clsPgWidth clsBreadcrumb">
                        <div class="tophumbmmm" onclick="opensidemenu();"><img src="images/hambm.svg" alt="menu"></div>
                        <ul class="topmenuslider slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 90000px; transform: translate3d(0px, 0px, 0px);">
                                    <li class="slick-slide down slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0"><a href="indian-grocery-delivery/near-me-in-chicago-il-" title="Grocery" tabindex="0">Groceries</a></li>
                                    <li class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1"><a href="">Food</a></li>
                                    <li class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1"><a href="" class="active">Direct from India</a></li>
                                    <li class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1"><a href="">Fashion</a></li>
                                    <li class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1"><a href="">Bestseller</a></li>
                                    <li class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1"><a href="">Buy it again</a></li>
                                    <li class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1"><a href="">Same day delivery</a></li>
                                    <li class="slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1"><a href="">Keep shopping for</a></li>
                                    <li class="slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1"><a href="">Games</a></li>
                                    <li class="slick-slide" data-slick-index="9" aria-hidden="true" tabindex="-1"><a href="">Events</a></li>
                                    <li class="slick-slide" data-slick-index="10" aria-hidden="true" tabindex="-1"><a href="">QPay</a></li>
                                    <li class="slick-slide" data-slick-index="11" aria-hidden="true" tabindex="-1"><a href="">Gift Card</a></li>
                                    <li class="slick-slide" data-slick-index="12" aria-hidden="true" tabindex="-1"><a href="">Quicklly Pass</a></li>
                                    <li class="slick-slide" data-slick-index="13" aria-hidden="true" tabindex="-1"><a href="">Refer a Friend</a></li>
                                </div>
                            </div>
                        </ul>

                        <div class="modal" id="sideMenuModal" style="display: none;">
                            <div class="modal-content">
                                <div class="user-name">
                                <span class="u-name">Hello Sanjay</span><span class="close" onclick="closeSideMenu()"><img class="md-close" src="images/md-close.svg" alt="Close" /></span>
                                </div>
                                <div class="aa">
                                    <h2>Shop by Category</h2>
                                    <ul>
                                        <li><a href="#">Groceries</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Nation wide</a></li>
                                        <li><a href="#">Direct from India</a></li>
                                        <li><a href="#">Astrology (Shubh Puja)</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Moments</a></li>
                                        <li><a href="#">Just By Quicklly Meals</a></li>
                                    </ul>
                                </div>
                                <div class="b-border"></div>
                                <div class="aa">
                                    <h2>Programs & Features</h2>
                                    <ul>
                                        <li><a href="#">QPay</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Recipe</a></li>
                                        <li><a href="#">Quicklly Pass</a></li>
                                        <li><a href="#">Gift Card</a></li>
                                    </ul>
                                </div>
                                <div class="b-border"></div>
                                <div class="aa">
                                    <h2>Account & Settings</h2>
                                    <ul>
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">Sign out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function opensidemenu() {
            const modal = document.getElementById('sideMenuModal');
            modal.style.display = 'block'; 
            setTimeout(() => {
                modal.classList.add('active'); 
            }, 10);
        }

        function closeSideMenu() {
            const modal = document.getElementById('sideMenuModal');
            modal.classList.remove('active'); 
            setTimeout(() => {
                modal.style.display = 'none'; 
            }, 300);
        }

        window.onclick = function(event) {
            const modal = document.getElementById('sideMenuModal');
            if (event.target === modal) {
                closeSideMenu();
            }
        };
    </script>

</body>

</html>