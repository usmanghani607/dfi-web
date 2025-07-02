<?php $baseURL = "/only-luxury/"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= $baseURL ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $baseURL ?>css/style.css" rel="stylesheet">
    <link href="<?= $baseURL ?>css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= $baseURL ?>images/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= $baseURL ?>js/global-search.js"></script>


    <style>
        button.swal2-confirm.swal2-styled {
            background: #F05336 !important;
        }
        .search-page { display: none; }
        .no-results { text-align: center; padding: 40px 0; color: #666; }
        .no-results p { margin-bottom: 10px; }

        .load-more-container { text-align: center; margin: 20px 0; }
        .btn-load-more { padding: 10px 30px; background: #53A551; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-load-more:hover { background: #1e8c37; }
        .btn-load-more:disabled { background: #cccccc; cursor: not-allowed; }
        .load-btn { margin: 10px auto; background: #53A551; border: transparent; }
        .load-btn:hover { background: #1e8c37; } 
        .spinner-border { width: 3rem; height: 3rem; color: #53A551 !important; }
        .loader { text-align: center; }

        /* #SearchloaderOverlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255,255,255,0.8); z-index: 9999; display: flex; justify-content: center; align-items: center; } */
        #SearchloaderOverlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: #fff; z-index: 9999; display: flex; justify-content: center; align-items: center; }
        #SearchloaderCenter { text-align: center; }
        #SearchloaderCenter img {  height: auto; }

        .input-error { border: 1px solid red !important; }
        .field-error {
        color: red;
        font-size: 12px;
        margin-top: 4px; }

    </style>


</head>

<body>
    <header class="clsInnerHeader">

        <a href="http://localhost/dfi-web" title="Quicklly.com" class="clsLogo">
            <img src="<?= $baseURL ?>images/quicly-logo-black.png" alt="Quicklly - Indian Groceries, Food &amp; More">
        </a>

        <div class="clsShoppingIn">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Home</p><br>
            <span></span>
        </div>
        <div class="clsAccountt showonlyonmob">
            <a href="quicklly-pass"><img src="images/qpasstop.svg"></a>
        </div>

        <div class="clsShopBySearch">
            <div class="clsFlex">
                <div class="clsSearchBox" id="searchnothide">
                    <!-- <form role="search" method="get" id="headersearchfrm" action="https://www.dev.goquicklly.com/search/">
                        <input type="text" placeholder="Search for products..." id="search_box" name="q" minlength="2" required="" autocomplete="off" onkeypress="return SearchInputValidation(event)">
                        <input type="hidden" name="filterstore" id="sfilterstore" value="">
                        <input type="hidden" name="filterdiscount" id="sfilterdiscount" value="">
                        <input type="hidden" name="section" id="ssection" value="all">
                        <input type="hidden" name="sortby" id="sortby" value="price-low-to-high">
                        <input type="submit" name="whatsget" id="whatsget" class="search-whatsget" disabled="disabled" style="display:none">
                        <button type="button" class="clsBtn clsSearchBtn" id="searchdeact"> </button>
                        <button type="button" class="clsBtn clsSearchBtn crossbtn" id="searchcrossbtn" style="display:none;"></button>
                    </form> -->

                    <form role="search" method="" id="headersearchfrm" action="">
                        <input type="text" placeholder="Search for products..." id="search_box" name="q" minlength="2" required="" autocomplete="off">
                        <input type="submit" name="whatsget" id="whatsget" class="search-whatsget" disabled="disabled" style="display:none">
                        <button type="button" class="clsBtn clsSearchBtn" id="searchdeact"> </button>
                        <button type="button" class="clsBtn clsSearchBtn crossbtn" id="searchcrossbtn" style="display:none;"></button>
                    </form>

                    <style>
                        .modal-backdrop {
                            z-index: 1 !important;
                        }

                        header .modal {
                            background-color: rgb(255 255 255 / 85%);
                        }

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
                            outline: none;
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
            <p></p>
            <span></span>
            <span class="notloggbbtt">Login</span>
            <div class="clsPopUp signin">
                <div class="clsContent">
                    <a href="javascript:void(0)" id="procedcheckoutBtn" class="clsBtn">Sign In</a>
                    <a href="javascript:void(0)" id="proceedregister" class="create-account">New customer? Create an account</a>
                </div>
            </div>
            <div class="clsPopUp logout-detail">
                <div class="clsContent">
                    <ul>
                        <li><a href="my-account" style="color: #000000;">My Account</a></li>
                        <li><a href="javascript:void(0)" id="logout" style="color: #000000;">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="clsAccount robtt">
            <a href="javascript:void(0)" onclick="showloginpopup();">
                <p>Return</p>
                <span>&amp; Orders</span>
            </a>
        </div> -->

        <div class="clsCart2">
            <a href="javascript:void(0);" onclick="toggleInnerCart();"><label><img src="<?= $baseURL ?>images/minicart.svg">Cart</label><span>0</span></a>
        </div>

        <!-- <div class="clsMiniCart active" id="minicart">
            <div class="clsInnerCart">
                <div class="clsHead basket">
                    <p class="clsCart3">
                        <carttype class="maincarthead">Quicklly Cart</carttype> <a href="javascript:void(0);" onclick="toggleInnerCart();"><span style="font-size: 20px; padding-right: 13px;color: #000;padding-bottom: 10px;">x</span></a>
                    </p>
                </div>

                <div class="clsContent">
                    <div class="allcartwrapper">
                        <div class="clsCompleteCartshef" style="background-color:#FAFAFA"></div>
                        <div class="btn-margin shefbtnproee">
                            <input type="hidden" id="netamtshef" value="0">
                            <a href="javascript:void(0)" class="clsBtn" id="lnkshefcheckout" style="display: none;" onclick="return proceedtoshefcheckout();">Checkout with Shef $0.00</a>
                        </div>
                        <div class="clsHead basket tempcarthead" style="display:none">
                            <p class="clsCart3">
                                <carttype>Quicklly Cart</carttype> <label><img src="<?= $baseURL ?>images/delivery-icon.svg" width="27" alt="Delivery Van">
                                    Free Delivery Over $30 </label>
                            </p>
                        </div>
                        <div class="clsCompleteCart" style="background-color:#FAFAFA">
                            <div id="cartStoreProd">
                                <div class="clsCartStores" style="display: none;">
                                    <div class="clsCartStoreTemp">
                                        <div class="clsCartStore" id="dd-100">
                                            <img src="https://www.dev.goquicklly.com/seller/upload_images/store/thumb/ff.png" class="storeimg" loading="lazy">

                                            <div class="clsStoreData">
                                                <p class="clsMinOrderAmt">Fresh Farms
                                                    <span class="price">$0.69</span>
                                                </p>
                                                <p class="totalorderamountbystore" style=""> Minimum Order Value: $30</p>
                                            </div>
                                        </div>
                                        <div class="totalwarningmsg">Add <font color="green">$27.73</font> to reach the order minimum of $30</div>
                                    </div>
                                </div>
                                <div class="clsCartProds">
                                    <div class="clsCartProd">
                                        <img src="https://www.dev.goquicklly.com/upload_images/product/thumb/1639675659-maggi-chicken-stock.jpg" alt="MAGGI CHICKEN STOCK">
                                        <div class="clsDetails">
                                            <div class="flex-child" style="flex:2.5">
                                                <p class="prodName"> MAGGI CHICKEN STOCK </p>
                                                <p>
                                                    <span class="price priceVal">$0.69</span>
                                                </p>
                                                <p class="remove-cart">
                                                    <a href="javascript:void(0)" class="removeprodss" title="Remove">
                                                        <img src="images/trash_icon.png" title="Remove" style="width:16px;height:16px">
                                                    </a>
                                                    <a href="javascript:void(0)" class="removeprodss" title="Remove">Remove</a>
                                                </p>
                                                <p class="subs_type"></p>
                                                <p></p>
                                            </div>
                                            <div class="qtyDetails flex-child">
                                                <p>
                                                    <span class="price priceVal1 dynamic-price">$0.69</span>
                                                    <span class="setqty cart_grocery">
                                                        <a href="javascript:void(0)" class="minussqtys">-</a>
                                                        <span class="qty">1</span>
                                                        <a href="javascript:void(0)" class="plussqtys">+</a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="clsCartEmpty btn-margin" id="lblCartEmpty" style="display: none;">Your cart is empty </p>
                    <p class="minicart-min-delivery-msg btn-margin" id="fdBtn" style="display: none;">
                        <img src="images/delivery_van.png" width="27" alt="Delivery Van" loading="lazy">
                        Free Delivery Over $30
                    </p>
                    <div class="btn-margin">
                        <input type="hidden" id="netamt" value="2.27">
                        <a href="before-you-checkout" class="clsBtn" id="lnkProceedToCheckout" style="" onclick="return checkFoodPopUp();">Checkout with Quicklly $0.69</a>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="clsMiniCart active" id="minicart" style="display: none;">
            <div class="clsInnerCart">
                <div class="clsHead basket">
                    <p class="clsCart3">
                        <carttype class="maincarthead">Quicklly Cart</carttype> <a href="javascript:void(0);" onclick="toggleInnerCart();"><span style="font-size: 20px; padding-right: 13px;color: #000;padding-bottom: 10px;">x</span></a>
                    </p>
                </div>

                <div class="clsContent">
                    <div class="allcartwrapper">
                        <div class="clsCompleteCartshef" style="background-color:#FAFAFA"></div>
                        <div class="btn-margin shefbtnproee">
                            <input type="hidden" id="netamtshef" value="0">
                            <a href="javascript:void(0)" class="clsBtn" id="lnkshefcheckout" style="display: none;" onclick="return proceedtoshefcheckout();">Checkout with Shef $0.00</a>
                        </div>
                        <div class="clsHead basket tempcarthead" style="display:none">
                            <p class="clsCart3">
                                <carttype>Quicklly Cart</carttype> <label><img src="<?= $baseURL ?>images/delivery-icon.svg" width="27" alt="Delivery Van">
                                    Free Delivery Over $30 </label>
                            </p>
                        </div>
                        <div class="clsCompleteCart" style="background-color:#FAFAFA">
                            <div id="cartStoreProd">
                                <div class="clsCartProds">
                                    <div class="clsCartProd">
                                        <img src="" alt="">
                                        <div class="clsDetails">
                                            <div class="flex-child" style="flex:2.5">
                                                <p class="prodName"></p>
                                                <p>
                                                    <span class="price priceVal"></span>
                                                </p>
                                                <p class="remove-cart">
                                                    <a href="javascript:void(0)" class="removeprodss" title="Remove">
                                                    </a>
                                                    <a href="javascript:void(0)" class="removeprodss" title="Remove"></a>
                                                </p>
                                                <p class="subs_type"></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="clsCartEmpty btn-margin" id="lblCartEmpty" style="display: none;">Your cart is empty </p>
                    <div class="btn-margin">
                        <input type="hidden" id="netamt" value="2.27">
                        <a href="before-you-checkout" class="clsBtn" id="lnkProceedToCheckout" style="display: none;">Checkout with Quicklly $0.00</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal loginModal" id="signupformmodal" role="dialog" aria-labelledby="signupformmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close modal-togglebtn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body sinupformmdl">
                        <div class="sinupformmdl-wrapper">
                            <div class="col-lg-12 cst-fromrow-50">
                                <div class="form-leftsidewrappr">
                                    <div class="signupBtnSec">
                                        <p class="signupSecPara"><span class="signupcntBtn" data-loginpanel="signuppanel">Need an Account? Signup</span></p>
                                        <p class="signupSecPara" id="gustusrlogin"><span class="guestcntBtn" data-loginpanel="loginpanelguess">Continue as a Guest</span></p>
                                        <p class="signupSecPara"><span class="usercntBtn" data-loginpanel="loginpanellogin">UserLogin</span></p>
                                    </div>
                                    <div id="loginpanellogin">
                                        <div id="error"></div>
                                        <div id="login-success" style="color: green; display: none;">Successfully Login</div>
                                        <form id="apiformprodct" name="loginfrm" method="POST" novalidate="novalidate">
                                            <div class="panel panel-default">
                                                <span class="frmheading">Log In</span>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="formfield-wrapper">
                                                            <label for="signinEmail" class="">Email :</label>
                                                            <input type="email" class="form-control form-field" name="user_email" id="user_email" value="" placeholder="Email Address" required="">
                                                        </div>
                                                        <div class="formfield-wrapper">
                                                            <label for="siginPassword" class="">Password :</label>
                                                            <input type="password" class="form-control form-field" placeholder="Password" name="user_password" id="password" required="">
                                                        </div>
                                                        <div class="formfield-wrapper" align="right">
                                                            <span><a href="forgot-password" style="color:#0066CC; font-weight:400">Forgot Password?</a></span>
                                                        </div>
                                                        <div class="formfield-wrapper">
                                                            <span>By logging in, you agree to our <a href="https://www.dev.goquicklly.com/privacy-policy" title="Privacy Policy"><strong>Privacy Policy</strong></a>
                                                                and <strong><a href="https://www.dev.goquicklly.com/term-&amp;-condition" title="Terms &amp; Conditions">Terms &amp; Conditions</a>.</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group signUpprdtcsubbtn-wrappr"> <!-- Submit button !-->
                                                <input type="submit" name="btn-login" id="btn-login" value="LOG IN" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- login ends guest user start-->
                                    <div id="loginpanelguess" style="display: none;">
                                        <div class="shipppngwrapr">
                                            <span class="frmheading">Shipping Address</span>
                                            <div id="gstregerror"></div>
                                            <form class="shipponaddrss" id="frmGuestAddress" name="addressGuest" novalidate="novalidate" method="POST" autocomplete="off" role="presentation">
                                                <input type="hidden" name="guestuser" value="yes">
                                                <input type="hidden" maxlength="2" size="1" name="chk_verify_sts_gst" id="chk_verify_sts_gst" value="0">
                                                <input type="hidden" name="chk_event_flagg" id="chk_event_flagg" value="0">
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100 onlycharacterwithspace" type="alphanumeric" id="fname" name="fname" placeholder="First Name" value="" required="">
                                                </div>
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100 onlycharacterwithspace" type="alphanumeric" id="lname" name="lname" placeholder="Last Name" value="">
                                                </div>
                                                <div class="cst-fromrow ffttshowh">
                                                    <input id="autocomplete2" class="inpt-w100 complete-address pac-target-input" type="search" autocomplete="off" name="full_address" value="" placeholder="Enter your address" required="">
                                                </div>
                                                <div class="cst-fromrow ffttshowh">
                                                    <input class="inpt-w100" type="search" name="apt" id="apt_no2" placeholder="Apartment, Suite, Building (Optional)" value="">
                                                    <input type="hidden" name="latitude" id="latitude2" value="">
                                                    <input type="hidden" name="longitude" id="longitude2" value="">
                                                </div>
                                                <div class="cst-fromrow showfieldforinvalidaddress">
                                                    <div class="cst-fromrow" style="display: none;">
                                                        <input type="text" class="inpt-w100 pincodereadonly" placeholder="Pincode" name="pincodereadonly" id="pincodereadonly2" value="" readonly="">
                                                    </div>
                                                    <div id="showpartwise2" style="display:none;">
                                                        <div class="cst-fromrow showpartwise">
                                                            <div class="cst-fromrow">
                                                                <input class="inpt-w100" type="text" name="street_address" id="street_number2" value="" placeholder="Street name" required="">
                                                            </div>
                                                            <div class="cst-fromrow">
                                                                <input class="inpt-w100" type="text" name="city" id="locality2" value="" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="cst-fromrow showpartwise">
                                                            <div class="cst-fromrow">
                                                                <input class="inpt-w100" type="text" name="state" id="administrative_area_level_12" value="" placeholder="State" required="">
                                                            </div>
                                                            <div class="cst-fromrow">
                                                                <input type="text" class="inpt-w100" name="pincode" id="postal_code2" value="" placeholder="Pincode" onkeypress="return IsAlphaNumeric(event)" maxlength="10" minlength="4" pattern=".{4,10}" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cst-fromrow">
                                                    <select name="country_code" id="country_code" class="inpt-w100" required="">
                                                        <option value="" disabled="" selected="" hidden="">Select Country Code</option>
                                                        <option value="+1">+1 - USA</option>
                                                        <option value="+1">+1 - Canada</option>
                                                        <option value="+91">+91 - India</option>
                                                    </select>
                                                </div>
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100" type="text" name="mobile" id="mobilegst" maxlength="10" minlength="10" onkeypress="return isNumberKey(event, this)" placeholder="Phone (ex:333-545-6789)" value="" required="">
                                                </div>
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100" type="email" name="email" id="emlgst" placeholder="Email Address" value="" required="">
                                                </div>
                                                <div class="form-group signUpprdtcsubbtn-wrappr"> <!-- Submit button !-->
                                                    <button type="submit" id="shippingUpprdtcsubbtn" data-sitekey="" data-callback="onSubmitRecaptcha" class=" g-recaptcha1 btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Guest ends register starts-->
                                    <div id="signuppanel" style="display:none; z-index:2">
                                        <div class="shipppngwrapr">
                                            <span class="frmheading">Register with us</span>
                                            <div id="regerror" style="background:green; padding:5px; color:#fff; text-align: center; font-size: 14px; display:none;">
                                            </div>
                                            <form class="shipponaddrss" name="addressGuest" id="reg-form" novalidate="novalidate" autocomplete="off" role="presentation">
                                                <input type="hidden" name="signupuser" value="yes">
                                                <input type="hidden" maxlength="2" size="1" name="chk_verify_sts" id="chk_verify_sts" value="0">
                                                <input type="hidden" name="chk_event_flag" id="chk_event_flag" value="0">
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100 onlycharacterwithspace" type="text" name="fname" id="firstname" placeholder="First Name" value="" required="">
                                                </div>
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100 onlycharacterwithspace" type="text" id="lastname" name="lname" placeholder="Last Name" value="">
                                                </div>
                                                <div class="cst-fromrow ffttshowh">
                                                    <input class="inpt-w100 complete-address pac-target-input" id="autocomplete" autocomplete="off" type="search" name="full_address" onfocus="geolocate()" value="" placeholder="Enter your address" required="">
                                                </div>
                                                <div class="cst-fromrow ffttshowh">
                                                    <input class="inpt-w100" type="search" name="apt" id="apt_no" placeholder="Apartment, Suite, Building (Optional)" value="">
                                                    <input type="hidden" name="latitude" id="latitude" value="">
                                                    <input type="hidden" name="longitude" id="longitude" value="">
                                                </div>
                                                <div class="cst-fromrow showfieldforinvalidaddress">
                                                    <div class="cst-fromrow" style="display: none;">
                                                        <input type="text" class="inpt-w100 pincodereadonly" placeholder="Pincode" name="pincodereadonly" id="pincodereadonly" value="" readonly="">
                                                    </div>
                                                    <div id="showpartwise" style="display:none;">
                                                        <div class="cst-fromrow showpartwise">
                                                            <div class="cst-fromrow">
                                                                <input class="inpt-w100" type="text" name="street_address" id="street_number" value="" placeholder="Street name" required="">
                                                            </div>
                                                            <div class="cst-fromrow">
                                                                <input class="inpt-w100" type="text" name="city" id="locality" value="" placeholder="City">
                                                            </div>
                                                        </div>
                                                        <div class="cst-fromrow showpartwise">
                                                            <div class="cst-fromrow">
                                                                <input class="inpt-w100" type="text" name="state" id="administrative_area_level_1" value="" placeholder="State" required="">
                                                            </div>
                                                            <div class="cst-fromrow">
                                                                <input type="text" class="inpt-w100" name="pincode" id="postal_code" value="" placeholder="Pincode" onkeypress="return IsAlphaNumeric(event)" maxlength="10" minlength="4" pattern=".{4,10}" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cst-fromrow">
                                                    <select name="country_code" id="country_code_signup" class="inpt-w100" required="">
                                                        <option value="" disabled="" selected="" hidden="">Select Country Code</option>
                                                        <option value="+1">+1 - USA</option>
                                                        <option value="+1">+1 - Canada</option>
                                                        <option value="+91">+91 - India</option>
                                                    </select>
                                                </div>
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100" type="text" name="mobile" id="mobile" maxlength="10" minlength="10" onkeypress="return isNumberKey(event, this)" placeholder="Phone (ex:333-545-6789)" value="" required="">
                                                </div>
                                                <div class="cst-fromrow">
                                                    <input class="inpt-w100" type="email" name="email" id="email" placeholder="Email Address" value="" required="">
                                                </div>
                                                <div class="cst-fromrow cst-fromrow-50">
                                                    <input class="inpt-w100" type="password" name="password" id="password_p" placeholder="Password" value="" required="">
                                                </div>
                                                <!-- <div class="cst-fromrow cst-fromrow-50">
                                                    <input class="inpt-w100" type="password" name="confpassword" id="confpassword" placeholder="Confirm Password" value="" required="">
                                                </div> -->
                                                <div class="form-group signUpprdtcsubbtn-wrappr"> <!-- Submit button !-->
                                                    <!-- <input type="submit" name="btn-reg" id="btn-reg" value="Register" data-sitekey="6LdsnYkaAAAAANxKtW6Zr8qHphwL5WvQCCp8sBLU" data-callback="onSubmitRecaptchaRegister" class=" g-recaptcha1 btn  btn-primary"> -->
                                                    <input type="submit" name="btn-reg" id="btn-reg" value="Register" class="g-recaptcha1 btn  btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- register ends-->
                                    <!--Verification process start-->
                                    <div id="acc_verify_btn" style="display:none; z-index:2">
                                        <div id="shipppngwrapr">
                                            <div id="dialog">
                                                <span class="frmheading_vr">OTP verification</span>
                                                <div id="vrshowmsg" class="frmheading_vr2"><br></div>
                                                <div id="vrferror" class="frmheading_vr3">Please enter your OTP here</div>
                                                <div id="form" class="frmheading_vr4">
                                                    <form class="vrfy_otp_cd" name="vrfy_otp_cd_frm" id="vrfy_otp_cd_frm" novalidate="novalidate" autocomplete="off" role="presentation">
                                                        <input type="hidden" name="chk_qcphn" id="chk_qcphn" value="">
                                                        <input type="hidden" name="chk_qceml" id="chk_qceml" value="">
                                                        <input type="hidden" name="chk_qcctr_cd" id="chk_qcctr_cd" value="">
                                                        <input type="hidden" name="chk_verifycd" id="chk_verifycd" value="">
                                                        <input type="hidden" name="frm_action_type" id="frm_action_type" value="">
                                                        <input type="hidden" maxlength="2" size="1" name="chk_verifyc" id="chk_verifyc" value="0">
                                                        <input type="hidden" name="chk_event_flag" id="chk_event_flagn" value="0">
                                                        <input class="vr_inpt" type="text" name="vrcode1" id="vrcode1" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}">
                                                        <input class="vr_inpt" type="text" name="vrcode2" id="vrcode2" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}">
                                                        <input class="vr_inpt" type="text" name="vrcode3" id="vrcode3" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}">
                                                        <input class="vr_inpt" type="text" name="vrcode4" id="vrcode4" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}">
                                                        <input class="vr_inpt" type="text" name="vrcode5" id="vrcode5" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}">
                                                        <div>
                                                            <p class="vr_btn" id="vr_btn"></p>
                                                            <!--<p id="notice">Resend new code in 60 seconds</p>
                                                                <p class="vr_btn" id="vr_btn">Didn't receive a code? Resend code</p><br />-->
                                                        </div>
                                                        <div class="form-group signUpprdtcsubbtn-wrappr">
                                                            <!-- Submit button !-->
                                                            <br>
                                                            <input type="submit" name="btn_verify" id="btn_verify" value="Verify" class="btn btn-primary verify_otp_code">
                                                            <!--<button id="btn_verify" value="btn_verify" name="btn_verify" class="btn btn-primary">Verify</button>-->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div id="error1"></div>
                                        <form id="accverifyfrm" name="accverifyfrm" method="POST">
                                            <div class="panel panel-default" style="display:none; z-index:2">
                                                <span class="frmheading">Enter verification code</span>
                                                <div class="panel-body">
                                                    <div class="form-group row">
                                                        
                                                        We have just sent verification code to your email
                                                        <div class="formfield-wrapper">
                                                            <label for="siginPassword" class="col-form-label">Verification Code
                                                                :</label>
                                                            <input type="password" class="form-control form-field" placeholder="Verification Code" name="verify_code" id="verify_code">
                                                        </div>
                                                        <div class="formfield-wrapper" align="right">
                                                            <span><a href="forgot-password" style="color:#0066CC; font-weight:500">Send the code
                                                                    again</a></span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group signUpprdtcsubbtn-wrappr" style="display:none; z-index:2">
                                                <input type="submit" name="btn-verify" id="btn-verify" value="Verify" class="btn btn-primary">
                                            </div>
                                        </form> -->
                                    </div>
                                    <!--End Verification-->

                                    <!-- forget password -->

                                    <!-- <div id="changePasswordPanel" style="display: none;">
                                        <div id="error"></div>
                                        <div id="password-change-success" style="color: green; display: none;">Password Changed Successfully</div>
                                        <form id="changePasswordForm" name="changePasswordForm" method="POST" novalidate="novalidate">
                                            <div class="panel panel-default">
                                                <span class="frmheading">Change Password</span>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="formfield-wrapper">
                                                            <label for="changeEmail" class="">Email Address :</label>
                                                            <input type="email" class="form-control form-field" name="user_email" id="change_email" value="" placeholder="Enter your Email Address" required="">
                                                        </div>
                                                        <div class="formfield-wrapper">
                                                            <label for="newPassword" class="">New Password :</label>
                                                            <input type="password" class="form-control form-field" placeholder="Enter New Password" name="user_new_password" id="new_password" required="">
                                                        </div>
                                                        <div class="formfield-wrapper">
                                                            <label for="confirmPassword" class="">Confirm New Password :</label>
                                                            <input type="password" class="form-control form-field" placeholder="Confirm New Password" name="user_confirm_password" id="confirm_password" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group submit-button-wrap"> 
                                                <input type="submit" name="btn-change-password" id="btn-change-password" value="Change Password" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div> -->

                                </div>
                            </div>
                            <!-- <div class="col-lg-6 cst-fromrow-50">
                                <div class="loginpopup-warrper loginpopup-img">
                                    <img class="loginpopup-img" loading="lazy" src="images/loginimg.png" alt="Login Here">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Password Modal -->
        <div class="modal loginModal" id="changePasswordModal" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close modal-togglebtn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body sinupformmdl">
                        <div class="sinupformmdl-wrapper">
                            <div class="col-lg-6 cst-fromrow-50">
                                <div class="form-leftsidewrappr">
                                    <div id="changePasswordPanel">
                                        <div id="error"></div>
                                        <div id="password-change-success" style="color: green; display: none;">Password Changed Successfully</div>
                                        <form id="changePasswordForm" name="changePasswordForm" method="POST" novalidate="novalidate">
                                            <div class="panel panel-default">
                                                <span class="frmheading">Change Password</span>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="formfield-wrapper">
                                                            <label for="changeEmail" class="">Email Address :</label>
                                                            <input type="email" class="form-control form-field" name="user_email" id="change_email" value="" placeholder="Enter your Email Address" required="">
                                                        </div>
                                                        <div class="formfield-wrapper">
                                                            <label for="newPassword" class="">New Password :</label>
                                                            <input type="password" class="form-control form-field" placeholder="Enter New Password" name="user_new_password" id="new_password" required="">
                                                        </div>
                                                        <div class="formfield-wrapper">
                                                            <label for="confirmPassword" class="">Confirm New Password :</label>
                                                            <input type="password" class="form-control form-field" placeholder="Confirm New Password" name="user_confirm_password" id="confirm_password" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group submit-button-wrap">
                                                <input type="submit" name="btn-change-password" id="btn-change-password" value="Change Password" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 cst-fromrow-50">
                                <div class="loginpopup-warrper loginpopup-img">
                                    <img class="loginpopup-img" loading="lazy" src="images/loginimg.png" alt="Change Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>

    <script>
        function toggleInnerCart() {
            const innerCart = document.querySelector('.clsInnerCart');
            
            if (innerCart.style.display === "none" || innerCart.style.display === "") {
                innerCart.style.display = "block";  
            } else {
                innerCart.style.display = "none";  
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const innerCart = document.querySelector('.clsInnerCart');
            innerCart.style.display = "none";  
        });

    </script>

<!-- remove cart -->
    <script>
        $(document).on('click', '.removeprodss', function () {
            $(this).closest('.clsCartProd').remove();

            if ($('.clsCartProd').length === 0) {
                $('#lblCartEmpty').show(); 
                $('#cartStoreProd').hide(); 
                $('#lnkProceedToCheckout').hide(); 
            }
        });

    </script>

<!-- dynamic data in cart -->
    <!-- <script>
        $(document).ready(function () {
            
            // $('#addToCartBtn').on('click', function () {
            //     const productName = $('.head h4').text().trim();
            //     const productPriceText = $('.pri').text().trim(); 
            //     const productPrice = parseFloat(productPriceText.replace('$', '')) || 0;
            //     const productImage = $('.main-image').attr('src');

            //     const cartItem = `
            //         <div class="clsCartProd">
            //             <img src="${productImage}" alt="${productName}">
            //             <div class="clsDetails">
            //                 <div class="flex-child" style="flex:2.5">
            //                     <p class="prodName">${productName}</p>
            //                     <p><span class="price priceVal">$${productPrice.toFixed(2)}</span></p>
            //                     <p class="remove-cart">
            //                         <a href="javascript:void(0)" class="removeprodss" title="Remove">
            //                             <img src="<?= $baseURL ?>images/trash_icon.png" title="Remove" style="width:16px;height:16px">
            //                         </a>
            //                         <a href="javascript:void(0)" class="removeprodss" title="Remove">Remove</a>
            //                     </p>
            //                 </div>
            //                 <div class="qtyDetails flex-child">
            //                     <p>
            //                         <span class="price priceVal1 dynamic-price">$${productPrice.toFixed(2)}</span>
            //                         <span class="setqty cart_grocery">
            //                             <a href="javascript:void(0)" class="minussqtys">-</a>
            //                             <span class="qty">1</span>
            //                             <a href="javascript:void(0)" class="plussqtys">+</a>
            //                         </span>
            //                         <input type="hidden" class="unit-price" value="${productPrice.toFixed(2)}">
            //                     </p>
            //                 </div>
            //             </div>
            //         </div>
            //     `;

            //     $('.clsCartProds').append(cartItem);
            //     $('#cartStoreProd, #fdBtn, #lnkProceedToCheckout').show();
            //     $('#lblCartEmpty').hide();
            //     updateCartTotal();
            // });

            $('#addToCartBtn').on('click', function () {
                const productName = $('.head h4').text().trim();
                const productPriceText = $('.pri').text().trim(); 
                const productPrice = parseFloat(productPriceText.replace('$', '')) || 0;
                const productImage = $('.main-image').attr('src');

                // Get product ID from URL query param
                const pathname = window.location.pathname;
                const pid = pathname.substring(pathname.lastIndexOf('/') + 1);


                // Store in sessionStorage
                sessionStorage.setItem("product_name", productName);
                sessionStorage.setItem("pid", pid);

                // Cart item HTML
                const cartItem = `
                    <div class="clsCartProd">
                        <img src="${productImage}" alt="${productName}">
                        <div class="clsDetails">
                            <div class="flex-child" style="flex:2.5">
                                <p class="prodName">${productName}</p>
                                <p><span class="price priceVal">$${productPrice.toFixed(2)}</span></p>
                                <p class="remove-cart">
                                    <a href="javascript:void(0)" class="removeprodss" title="Remove">
                                        <img src="<?= $baseURL ?>images/trash_icon.png" title="Remove" style="width:16px;height:16px">
                                    </a>
                                    <a href="javascript:void(0)" class="removeprodss" title="Remove">Remove</a>
                                </p>
                            </div>
                            <div class="qtyDetails flex-child">
                                <p>
                                    <span class="price priceVal1 dynamic-price">$${productPrice.toFixed(2)}</span>
                                    <span class="setqty cart_grocery">
                                        <a href="javascript:void(0)" class="minussqtys">-</a>
                                        <span class="qty">1</span>
                                        <a href="javascript:void(0)" class="plussqtys">+</a>
                                    </span>
                                    <input type="hidden" class="unit-price" value="${productPrice.toFixed(2)}">
                                </p>
                            </div>
                        </div>
                    </div>
                `;

                $('.clsCartProds').append(cartItem);
                $('#cartStoreProd, #fdBtn, #lnkProceedToCheckout').show();
                $('#lblCartEmpty').hide();
                updateCartTotal();
            });


            $(document).on('click', '.plussqtys', function () {
                const qtyEl = $(this).siblings('.qty');
                let currentQty = parseInt(qtyEl.text());

                if (currentQty < 20) {
                    currentQty++;
                    qtyEl.text(currentQty);
                    updateItemPrice($(this).closest('.clsCartProd'), currentQty);
                    updateCartTotal();
                } else {
                    alert("You can't add more than 20 items.");
                }
            });

            $(document).on('click', '.minussqtys', function () {
                const qtyEl = $(this).siblings('.qty');
                let currentQty = parseInt(qtyEl.text());

                if (currentQty > 1) {
                    currentQty--;
                    qtyEl.text(currentQty);
                    updateItemPrice($(this).closest('.clsCartProd'), currentQty);
                    updateCartTotal();
                }
            });

            function updateItemPrice(itemEl, qty) {
                const unitPrice = parseFloat(itemEl.find('.unit-price').val());
                const itemTotal = unitPrice * qty;
                itemEl.find('.dynamic-price').text(`$${itemTotal.toFixed(2)}`);
            }

            function updateCartTotal() {
                let total = 0;

                $('.clsCartProd').each(function () {
                    const qtyText = $(this).find('.qty').text().trim();
                    const priceVal = $(this).find('.unit-price').val();

                    const qty = parseInt(qtyText);
                    const unitPrice = parseFloat(priceVal);

                    if (!isNaN(qty) && !isNaN(unitPrice)) {
                        total += qty * unitPrice;
                    }
                });

                const formattedTotal = isNaN(total) ? '$0.00' : '$' + total.toFixed(2);
                $('#lnkProceedToCheckout').text('Checkout with Quicklly ' + formattedTotal);
            }


        });
    </script> -->



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const logoutLink = document.getElementById("logout");

            if (logoutLink) {
                logoutLink.addEventListener("click", function () {
                    
                    sessionStorage.removeItem("uid");
                    sessionStorage.removeItem("firstName");
                    sessionStorage.removeItem("user_logged_in");
                    window.location.href = "http://localhost/dfi-web";
                });
            }
        });
    </script>

    <script>
        var guestAutocomplete;

        function initGuestAutocomplete() {
            const input = document.getElementById("autocomplete2");
            if (!input || input.dataset.autocomplete === "attached") return;

            guestAutocomplete = new google.maps.places.Autocomplete(input, {
                types: ["geocode"],
                componentRestrictions: { country: ["us"] }
            });

            guestAutocomplete.addListener("place_changed", () => {
                const place = guestAutocomplete.getPlace();
                if (!place.geometry || !place.address_components) return;

                document.getElementById("autocomplete2").value = place.formatted_address || "";

                let street = '', city = '', state = '', zipcode = '';

                place.address_components.forEach(component => {
                    const types = component.types;
                    if (types.includes("route")) {
                        street = component.long_name;
                    }
                    if (types.includes("street_number")) {
                        street = component.long_name + " " + street;
                    }
                    if (types.includes("locality")) {
                        city = component.long_name;
                    }
                    if (types.includes("administrative_area_level_1")) {
                        state = component.long_name;
                    }
                    if (types.includes("postal_code")) {
                        zipcode = component.long_name;
                    }
                });

                // Set lat/lng
                if (place.geometry.location) {
                    document.getElementById("latitude2").value = place.geometry.location.lat();
                    document.getElementById("longitude2").value = place.geometry.location.lng();
                }

                // Fallback: Get zipcode from lat/lng if missing
                if (!zipcode && place.geometry.location) {
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ location: place.geometry.location }, (results, status) => {
                        if (status === "OK" && results.length > 0) {
                            for (let result of results) {
                                for (let comp of result.address_components) {
                                    if (comp.types.includes("postal_code")) {
                                        zipcode = comp.long_name;

                                        // Fill it after reverse geocode
                                        document.getElementById("postal_code2").value = zipcode;
                                        document.getElementById("pincodereadonly2").value = zipcode;
                                        break;
                                    }
                                }
                                if (zipcode) break;
                            }
                        }
                    });
                }

                // Fill fields immediately (even if fallback runs later)
                document.getElementById("street_number2").value = street;
                document.getElementById("locality2").value = city;
                document.getElementById("administrative_area_level_12").value = state;
                document.getElementById("postal_code2").value = zipcode;
                document.getElementById("pincodereadonly2").value = zipcode;

                // Show additional address fields
                const extraFields = document.getElementById("showpartwise2");
                if (extraFields) extraFields.style.display = "block";
            });


            input.addEventListener("input", function () {
                const value = this.value.trim();
                const partwiseSection = document.getElementById("showpartwise2");

                if (value === "") {
                    document.getElementById("locality2").value = "";
                    document.getElementById("administrative_area_level_12").value = "";
                    document.getElementById("street_number2").value = "";
                    document.getElementById("postal_code2").value = "";
                    document.getElementById("pincodereadonly2").value = "";
                    document.getElementById("latitude2").value = "";
                    document.getElementById("longitude2").value = "";

                    if (partwiseSection) partwiseSection.style.display = "none";
                }
            });

            input.dataset.autocomplete = "attached";
        }

        function geolocateGuest() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const circle = new google.maps.Circle({
                        center: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        },
                        radius: position.coords.accuracy
                    });
                    guestAutocomplete.setBounds(circle.getBounds());
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            initGuestAutocomplete();
        });
    </script>

    <script>
        var signupAutocomplete;

        function initSignupAutocomplete() {
            const input = document.getElementById("autocomplete");
            if (!input || input.dataset.autocomplete === "attached") return;

            signupAutocomplete = new google.maps.places.Autocomplete(input, {
                types: ["geocode"],
                componentRestrictions: { country: ["us"] }
            });

            signupAutocomplete.addListener("place_changed", () => {
                const place = signupAutocomplete.getPlace();
                if (!place.geometry || !place.address_components) return;

                document.getElementById("autocomplete").value = place.formatted_address || "";

                let street = '', city = '', state = '', zipcode = '';

                place.address_components.forEach(component => {
                    const types = component.types;
                    if (types.includes("route")) {
                        street = component.long_name;
                    }
                    if (types.includes("street_number")) {
                        street = component.long_name + " " + street;
                    }
                    if (types.includes("locality")) {
                        city = component.long_name;
                    }
                    if (types.includes("administrative_area_level_1")) {
                        state = component.long_name;
                    }
                    if (types.includes("postal_code")) {
                        zipcode = component.long_name;
                    }
                });

                if (place.geometry.location) {
                    document.getElementById("latitude").value = place.geometry.location.lat();
                    document.getElementById("longitude").value = place.geometry.location.lng();
                }

                if (!zipcode && place.geometry.location) {
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ location: place.geometry.location }, (results, status) => {
                        if (status === "OK" && results.length > 0) {
                            for (let result of results) {
                                for (let comp of result.address_components) {
                                    if (comp.types.includes("postal_code")) {
                                        zipcode = comp.long_name;
                                        document.getElementById("postal_code").value = zipcode;
                                        document.getElementById("pincodereadonly").value = zipcode;
                                        break;
                                    }
                                }
                                if (zipcode) break;
                            }
                        }
                    });
                }

                document.getElementById("street_number").value = street;
                document.getElementById("locality").value = city;
                document.getElementById("administrative_area_level_1").value = state;
                document.getElementById("postal_code").value = zipcode;
                document.getElementById("pincodereadonly").value = zipcode;

                const extraFields = document.getElementById("showpartwise");
                if (extraFields) extraFields.style.display = "block";
            });

            input.addEventListener("input", function () {
                const value = this.value.trim();
                const partwiseSection = document.getElementById("showpartwise");

                if (value === "") {
                    document.getElementById("locality").value = "";
                    document.getElementById("administrative_area_level_1").value = "";
                    document.getElementById("street_number").value = "";
                    document.getElementById("postal_code").value = "";
                    document.getElementById("pincodereadonly").value = "";
                    document.getElementById("latitude").value = "";
                    document.getElementById("longitude").value = "";

                    if (partwiseSection) partwiseSection.style.display = "none";
                }
            });

            input.dataset.autocomplete = "attached";
        }

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const circle = new google.maps.Circle({
                        center: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        },
                        radius: position.coords.accuracy
                    });
                    signupAutocomplete.setBounds(circle.getBounds());
                });
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            initSignupAutocomplete();
        });
    </script>
    
<!-- guest login -->
 
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const guestForm = document.getElementById("frmGuestAddress");
            const errorContainer = document.getElementById("gstregerror");
            let otpVerified = false;

            const requiredFields = [
                { id: "fname", name: "First Name" },
                { id: "autocomplete2", name: "Address" },
                { id: "street_number2", name: "Street Name" },
                { id: "administrative_area_level_12", name: "State" },
                { id: "postal_code2", name: "Pincode" },
                { id: "mobilegst", name: "Mobile" },
                { id: "emlgst", name: "Email" }
            ];

            requiredFields.forEach(field => {
                const input = document.getElementById(field.id);
                if (input) {
                    input.addEventListener("input", function () {
                        input.classList.remove("input-error");
                        const existingError = input.parentNode.querySelector(".field-error");
                        if (existingError) existingError.remove();
                    });
                }
            });

            async function validateEmailPhoneUniqueness(email, phone) {
                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/user/check-email-phone", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ email, phone })
                    });
                    return await res.json();
                } catch (err) {
                    console.error("API validation error:", err);
                    return { dupEmail: false, dupPhone: false, success: true };
                }
            }

            async function sendOtp(countryCode, phone, email, firstName, lastName) {
                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/common/send-otp", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ countryCode, mobile: phone, email, firstName, lastName })
                    });
                    const result = await res.json();

                    if (result.success) {
                        document.getElementById("acc_verify_btn").style.display = "block";
                        document.getElementById("loginpanelguess").style.display = "none";

                        const msgEl = document.getElementById("vrshowmsg");
                        msgEl.innerHTML = "OTP sent successfully. Check your sms for OTP.";
                        msgEl.style.color = "#fff";
                        msgEl.style.background = "green";
                        msgEl.style.padding = "7px";

                        setTimeout(() => {
                            msgEl.innerHTML = "";
                            msgEl.style.background = "";
                            msgEl.style.padding = "";
                        }, 7000);

                        document.getElementById("chk_verifycd").value = result.tag || "";
                        return true;
                    } else {
                        errorContainer.innerHTML = `<div class="field-error">Failed to send OTP: ${result.message || "Unknown error"}</div>`;
                        return false;
                    }
                } catch (err) {
                    console.error("OTP send error:", err);
                    errorContainer.innerHTML = `<div class="field-error">Failed to send OTP. Please try again.</div>`;
                    return false;
                }
            }

            guestForm.addEventListener("submit", async function (e) {
                e.preventDefault();

                if (otpVerified) {
                    await registerGuest();
                    return;
                }

                errorContainer.innerHTML = "";
                guestForm.querySelectorAll(".field-error").forEach(el => el.remove());

                let hasError = false;

                requiredFields.forEach(field => {
                    const input = document.getElementById(field.id);
                    const value = input ? input.value.trim() : "";

                    if (!input || value === "") {
                        if (input) {
                            input.classList.add("input-error");
                            const errorDiv = document.createElement("div");
                            errorDiv.className = "field-error";
                            errorDiv.textContent = `${field.name} is required.`;
                            input.parentNode.appendChild(errorDiv);
                        }
                        hasError = true;
                    }

                    if (field.id === "mobilegst" && value.length > 0 && value.length < 10) {
                        input.classList.add("input-error");
                        const errorDiv = document.createElement("div");
                        errorDiv.className = "field-error";
                        errorDiv.textContent = "Please enter at least 10 characters.";
                        input.parentNode.appendChild(errorDiv);
                        hasError = true;
                    }
                });

                if (hasError) return;

                const phone = document.getElementById("mobilegst").value.trim();
                const email = document.getElementById("emlgst").value.trim();
                const fname = document.getElementById("fname").value.trim();
                // const lname = document.getElementById("lname")?.value.trim() || "";
                const lname = document.getElementById("lname").value.trim();
                const countryCode = document.getElementById("country_code").value;

                const validation = await validateEmailPhoneUniqueness(email, phone);

                [document.getElementById("mobilegst"), document.getElementById("emlgst")].forEach(input => {
                    input.classList.remove("input-error");
                    const err = input.parentNode.querySelector(".field-error");
                    if (err) err.remove();
                });

                if (validation.dupPhone) {
                    const phoneInput = document.getElementById("mobilegst");
                    phoneInput.classList.add("input-error");
                    const errorDiv = document.createElement("div");
                    errorDiv.className = "field-error";
                    errorDiv.textContent = "This phone number already exists.";
                    phoneInput.parentNode.appendChild(errorDiv);
                    return;
                }

                if (validation.dupEmail) {
                    const emailInput = document.getElementById("emlgst");
                    emailInput.classList.add("input-error");
                    const errorDiv = document.createElement("div");
                    errorDiv.className = "field-error";
                    errorDiv.textContent = "This email address already exists.";
                    emailInput.parentNode.appendChild(errorDiv);
                    return;
                }

                const otpSent = await sendOtp(countryCode, phone, email, fname, lname);

                if (otpSent) {
                    document.getElementById("chk_qcphn").value = phone;
                    document.getElementById("chk_qceml").value = email;
                    document.getElementById("chk_qcctr_cd").value = countryCode;
                }
            });

            async function registerGuest() {
                const payload = {
                    firstName: document.getElementById("fname").value.trim(),
                    lastName: document.getElementById("lname")?.value.trim() || "",
                    email: document.getElementById("emlgst").value.trim(),
                    phone: document.getElementById("mobilegst").value.trim(),
                    addr: document.getElementById("autocomplete2").value.trim(),
                    apartment: document.getElementById("apt_no2").value.trim(),
                    latitude: document.getElementById("latitude2").value.trim(),
                    longitude: document.getElementById("longitude2").value.trim(),
                    city: document.getElementById("locality2").value.trim(),
                    state: document.getElementById("administrative_area_level_12").value.trim(),
                    zip: document.getElementById("postal_code2").value.trim(),
                    streetAddr1: document.getElementById("street_number2").value.trim(),
                    streetAddr2: "",
                    callFrom: "WEB"
                };

                console.log("Data being sent to API:", payload);

                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/user/add-guest-visit", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(payload)
                    });

                    const result = await res.json();
                    if (result.success) {
                        errorContainer.innerHTML = '<div class="field-success">Guest user has been registered successfully!</div>';
                        guestForm.reset();

                        setTimeout(() => {
                            errorContainer.innerHTML = "";
                            $('#signupformmodal').modal('hide');
                        }, 5000); 
                    } else {
                        errorContainer.innerHTML = `<div class="field-error">Registration failed: ${result.message || "Try again later."}</div>`;
                    }
                } catch (err) {
                    console.error("Registration error:", err);
                    errorContainer.innerHTML = '<div class="field-error">Failed to register. Try again.</div>';
                }
            }


            document.getElementById("vrfy_otp_cd_frm").addEventListener("submit", async function (e) {
                e.preventDefault();

                const otp = ["vrcode1", "vrcode2", "vrcode3", "vrcode4", "vrcode5"]
                    .map(id => document.getElementById(id)?.value || "").join("");

                const mobile = document.getElementById("chk_qcphn").value;
                const email = document.getElementById("chk_qceml").value;
                const tag = document.getElementById("chk_verifycd").value;

                if (otp.length !== 5) {
                    alert("Please enter a valid 5-digit OTP.");
                    return;
                }

                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/common/verify-otp", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ mobile, email, otp, tag })
                    });

                    const result = await res.json();
                    const msgEl = document.getElementById("vrshowmsg");

                    if (result.success) {
                        otpVerified = true;
                        msgEl.innerHTML = "OTP verified successfully!";
                        msgEl.style.background = "green";
                        msgEl.style.color = "#fff";
                        msgEl.style.padding = "7px";

                        setTimeout(() => {
                            document.getElementById("acc_verify_btn").style.display = "none";
                            document.getElementById("loginpanelguess").style.display = "block";
                            msgEl.innerHTML = "";
                            msgEl.style.background = "";
                            msgEl.style.padding = "";
                        }, 2500);
                    } else {
                        alert("OTP verification failed: " + (result.message || "Try again."));
                    }
                } catch (err) {
                    console.error("OTP verification error:", err);
                    alert("OTP verification failed. Try again.");
                }
            });

            ["vrcode1", "vrcode2", "vrcode3", "vrcode4", "vrcode5"].forEach((id, idx, arr) => {
                const input = document.getElementById(id);
                if (input) {
                    input.addEventListener("input", function () {
                        if (this.value.length === 1 && idx < arr.length - 1) {
                            document.getElementById(arr[idx + 1]).focus();
                        }
                    });
                    input.addEventListener("keydown", function (e) {
                        if (e.key === "Backspace" && this.value === "" && idx > 0) {
                            document.getElementById(arr[idx - 1]).focus();
                        }
                    });
                }
            });
        });
    </script>

<!-- signup -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const signupForm = document.getElementById("reg-form");
            const regErrorContainer = document.getElementById("regerror");
            let signupOtpVerified = false;

            const signupFields = [
                { id: "firstname", name: "First Name" },
                { id: "autocomplete", name: "Address" },
                { id: "street_number", name: "Street Name" },
                { id: "administrative_area_level_1", name: "State" },
                { id: "postal_code", name: "Pincode" },
                { id: "country_code_signup", name: "Country Code" },
                { id: "mobile", name: "Mobile" },
                { id: "email", name: "Email" },
                { id: "password_p", name: "Password" }
            ];

            signupFields.forEach(field => {
                const input = document.getElementById(field.id);
                if (input) {
                    input.addEventListener("input", function () {
                        input.classList.remove("input-error");
                        const errEl = input.parentNode.querySelector(".field-error");
                        if (errEl) errEl.remove();
                    });
                }
            });

            async function checkUniqueness(email, phone) {
                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/user/check-email-phone", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ email, phone })
                    });
                    return await res.json();
                } catch (e) {
                    console.error("Uniqueness check failed:", e);
                    return { success: true, dupEmail: false, dupPhone: false };
                }
            }

            async function sendSignupOtp(countryCode, phone, email, firstName, lastName) {
                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/common/send-otp", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ countryCode, mobile: phone, email, firstName, lastName })
                    });
                    const result = await res.json();

                    if (result.success) {
                        document.getElementById("acc_verify_btn").style.display = "block";
                        document.getElementById("signuppanel").style.display = "none";

                        const msgEl = document.getElementById("vrshowmsg");
                        msgEl.innerHTML = result.msg || "OTP sent successfully. Check your sms for OTP.";
                        msgEl.style.color = "#fff";
                        msgEl.style.background = "green";
                        msgEl.style.padding = "7px";

                        setTimeout(() => {
                            msgEl.innerHTML = "";
                            msgEl.style.background = "";
                            msgEl.style.padding = "";
                        }, 7000);

                        document.getElementById("chk_qcphn").value = phone;
                        document.getElementById("chk_qceml").value = email;
                        document.getElementById("chk_qcctr_cd").value = countryCode;
                        document.getElementById("chk_verifycd").value = result.tag || "";

                        return true;
                    } else {
                        regErrorContainer.innerHTML = `<div class="field-error">Failed to send OTP: ${result.message || "Unknown error"}</div>`;
                        return false;
                    }
                } catch (err) {
                    console.error("OTP send error:", err);
                    regErrorContainer.innerHTML = `<div class="field-error">Failed to send OTP. Please try again.</div>`;
                    return false;
                }
            }


            signupForm.addEventListener("submit", async function (e) {
                e.preventDefault();

                if (signupOtpVerified) {
                    const payload = {
                        addr: "",
                        apartment: document.getElementById("apt_no").value,
                        city: document.getElementById("locality").value,
                        email: document.getElementById("email").value,
                        firstName: document.getElementById("firstname").value,
                        lastName: document.getElementById("lastname")?.value,
                        pass: document.getElementById("password_p").value,
                        phone: document.getElementById("mobile").value,
                        state: document.getElementById("administrative_area_level_1").value,
                        streetAddr1: document.getElementById("street_number").value,
                        streetAddr2: "",
                        zip: document.getElementById("postal_code").value,
                        token: "",
                        apiKey: "UEjYnQ9yN7D3NCHEoGBMDq8lDUpKio",
                        callFrom: "WEB"
                    };

                    const regMsgEl = document.getElementById("regerror");

                    try {
                        const res = await fetch("https://devrestapi.goquicklly.com/user/signup", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(payload)
                        });

                        const data = await res.json();

                        regMsgEl.innerHTML = data.msg || "Signup complete.";
                        regMsgEl.style.background = data.success ? "green" : "red";
                        regMsgEl.style.color = "#fff";
                        regMsgEl.style.padding = "7px";
                        regMsgEl.style.display = "block";

                        setTimeout(() => {
                            regMsgEl.style.display = "none";
                            regMsgEl.innerHTML = "";
                        }, 5000);

                        if (data.success) {
                            setTimeout(() => {
                                document.getElementById("signuppanel").style.display = "none";
                                document.getElementById("loginpanellogin").style.display = "block";
                            }, 3000);
                        }

                    } catch (err) {
                        console.error("Signup API error:", err);
                        regMsgEl.innerHTML = "Signup failed. Please try again.";
                        regMsgEl.style.background = "red";
                        regMsgEl.style.color = "#fff";
                        regMsgEl.style.padding = "7px";
                        regMsgEl.style.display = "block";

                        setTimeout(() => {
                            regMsgEl.style.display = "none";
                            regMsgEl.innerHTML = "";
                        }, 5000);
                    }

                    return;
                }


                regErrorContainer.innerHTML = "";
                signupForm.querySelectorAll(".field-error").forEach(el => el.remove());

                let hasError = false;
                signupFields.forEach(f => {
                    const input = document.getElementById(f.id);
                    const val = input?.value.trim();
                    if (!val) {
                        input.classList.add("input-error");
                        const err = document.createElement("div");
                        err.className = "field-error";
                        err.textContent = `${f.name} is required.`;
                        input.parentNode.appendChild(err);
                        hasError = true;
                    }
                    if (f.id === "mobile" && val && val.length < 10) {
                        input.classList.add("input-error");
                        const err = document.createElement("div");
                        err.className = "field-error";
                        err.textContent = "Please enter at least 10 characters.";
                        input.parentNode.appendChild(err);
                        hasError = true;
                    }
                });

                if (hasError) return;

                const email = document.getElementById("email").value.trim();
                const phone = document.getElementById("mobile").value.trim();
                const fname = document.getElementById("firstname").value.trim();
                // const lname = document.getElementById("lname").value.trim();
                const lname = document.getElementById("lastname")?.value.trim();
                const countryCode = document.getElementById("country_code_signup").value;

                const check = await checkUniqueness(email, phone);
                if (check.dupEmail || check.dupPhone) {
                    if (check.dupEmail) {
                        const el = document.getElementById("email");
                        el.classList.add("input-error");
                        const err = document.createElement("div");
                        err.className = "field-error";
                        err.textContent = "This email already exists.";
                        el.parentNode.appendChild(err);
                    }
                    if (check.dupPhone) {
                        const el = document.getElementById("mobile");
                        el.classList.add("input-error");
                        const err = document.createElement("div");
                        err.className = "field-error";
                        err.textContent = "This phone number already exists.";
                        el.parentNode.appendChild(err);
                    }
                    return;
                }

                await sendSignupOtp(countryCode, phone, email, fname, lname);
            });

            document.querySelector(".verify_otp_code").addEventListener("click", async function (e) {
                e.preventDefault();

                const otp = ["vrcode1", "vrcode2", "vrcode3", "vrcode4", "vrcode5"]
                    .map(id => document.getElementById(id)?.value || "").join("");

                const mobile = document.getElementById("chk_qcphn").value;
                const email = document.getElementById("chk_qceml").value;
                const tag = document.getElementById("chk_verifycd").value;

                const msgEl = document.getElementById("vrshowmsg");

                if (otp.length !== 5) {
                    msgEl.innerHTML = "Enter complete 5-digit OTP.";
                    msgEl.style.color = "#fff";
                    msgEl.style.background = "red";
                    msgEl.style.padding = "7px";
                    return;
                }

                try {
                    const res = await fetch("https://devrestapi.goquicklly.com/common/verify-otp", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ mobile, email, otp, tag })
                    });

                    const result = await res.json();

                    msgEl.innerHTML = result.msg || "No message returned";
                    msgEl.style.color = "#fff";
                    msgEl.style.background = result.success ? "green" : "red";
                    msgEl.style.padding = "7px";

                    if (result.success) {
                        signupOtpVerified = true;
                        setTimeout(() => {
                            document.getElementById("acc_verify_btn").style.display = "none";
                            document.getElementById("signuppanel").style.display = "block";
                            msgEl.innerHTML = "";
                            msgEl.style.background = "";
                            msgEl.style.padding = "";
                        }, 2500);
                    }
                } catch (err) {
                    console.error("OTP verification error:", err);
                    msgEl.innerHTML = "OTP verification failed. Try again.";
                    msgEl.style.color = "#fff";
                    msgEl.style.background = "red";
                    msgEl.style.padding = "7px";
                }
            });


        });
    </script>

    <!-- <script>
        document.getElementById("accverifyfrm").addEventListener("submit", function (e) {
            e.preventDefault(); 
            return false;
        });
    </script> -->


    <!-- <script>
        $(document).ready(function() {
            $('#procedcheckoutBtn').on('click', function() {
                $('#signupformmodal').modal('show');
                $('.usercntBtn').closest('p').hide();
            });

            $('.signupcntBtn').on('click', function () {
                $('#loginpanellogin').hide();     // Hide login panel
                $('#signuppanel').show();         // Show signup panel
            });

            $('.guestcntBtn').on('click', function () {
                $('#loginpanellogin').hide();
                $('#signuppanel').hide(); // Optional: hide signup if open
                $('#loginpanelguess').show();
            });

            $('.signupcntBtn').on('click', function () {
                $('#loginpanelguess').hide();     
                $('#signuppanel').show();         
            });

              $('#procedcheckoutBtn').on('click', function() {
                $('#signupformmodal').modal('show');     
                $('#loginpanellogin').show();            
                $('#signuppanel').hide();                
            });

            $('#proceedregister').on('click', function() {
                $('#signupformmodal').modal('show');     
                $('#loginpanellogin').hide();            
                $('#signuppanel').show();                
            });

        });

        $(document).on('click', '.modal-togglebtn', function () {
            $(this).closest('.modal').modal('hide');
        });

    </script> -->

    <script>
        $(document).ready(function() {
            // Open the modal and show guest and user login options
            $('#procedcheckoutBtn').on('click', function() {
                $('#signupformmodal').modal('show');
                // Show "Need an Account? Signup" and "Continue as a Guest"
                $('#gustusrlogin').show();
                $('#loginpanellogin').show();
                $('#signuppanel').hide();
                $('#loginpanelguess').hide(); // Ensure guest panel is hidden
                $('.signupcntBtn').closest('p').show();
                $('.usercntBtn').closest('p').hide();
            });

            $('.signupcntBtn').on('click', function () {
                // Hide login panel and guest panel, then show signup panel
                $('#loginpanellogin').hide();     // Hide login panel
                $('#loginpanelguess').hide();     // Hide guest panel
                $('#signuppanel').show();         // Show signup panel

                // Hide signup option and show login and guest options
                $('.signupcntBtn').closest('p').hide(); // Hide "Signup" option
                $('.usercntBtn').closest('p').show();  // Show "User Login" option
                $('#gustusrlogin').closest('p').show(); // Show "Continue as a Guest" option
            });

            $('.usercntBtn').on('click', function () {
                // Hide signup and guest panels, then show login panel
                $('#signuppanel').hide();         // Hide signup panel
                $('#loginpanelguess').hide();     // Hide guest panel
                $('#loginpanellogin').show();     // Show login panel

                // Show "Signup" option and hide "User Login" and "Guest" options
                $('.signupcntBtn').closest('p').show(); // Show "Signup" option
                $('.usercntBtn').closest('p').hide();  // Hide "User Login" option
                $('#gustusrlogin').closest('p').show(); // Hide "Continue as a Guest" option
            });

            $('.guestcntBtn').on('click', function () {
                // Hide login and signup panels, then show guest panel
                $('#loginpanellogin').hide();     // Hide login panel
                $('#signuppanel').hide();         // Hide signup panel
                $('#loginpanelguess').show();     // Show guest panel

                // Show "Signup" and "User Login" options, and hide guest login option
                $('.signupcntBtn').closest('p').show(); // Show "Signup" option
                $('.usercntBtn').closest('p').show();  // Show "User Login" option
                $('#gustusrlogin').closest('p').hide(); // Hide "Continue as a Guest" option
            });


            // Show the login modal and show the login panel by default
            $('#procedcheckoutBtn').on('click', function() {
                $('#signupformmodal').modal('show');
                $('#loginpanellogin').show();
                $('#signuppanel').hide();
                $('#loginpanelguess').hide(); // Ensure guest panel is hidden
            });

            // Show the registration panel when "New customer? Create an account" is clicked
            $('#proceedregister').on('click', function() {
                $('#signupformmodal').modal('show');
                $('#loginpanellogin').hide();
                $('#signuppanel').show();
                $('#loginpanelguess').hide(); // Ensure guest panel is hidden
            });
        });

        // Close modal when modal-togglebtn is clicked
        $(document).on('click', '.modal-togglebtn', function () {
            $(this).closest('.modal').modal('hide');
        });

    </script>


    <script>
        $(document).ready(function() {
            
            $('a[href="forgot-password"]').on('click', function(e) {
                e.preventDefault(); 
                $('#signupformmodal').modal('hide'); 
                $('#changePasswordModal').modal('show'); 
            });
            
            $(document).on('click', '.modal-togglebtn', function() {
                $(this).closest('.modal').modal('hide'); 
            });
        });

    </script>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const loginForm = document.getElementById("apiformprodct");

            if (loginForm) {
                loginForm.addEventListener("submit", async function (e) {
                    e.preventDefault();

                    const email = document.getElementById("user_email").value.trim();
                    const password = document.getElementById("password").value.trim();

                    if (!email || !password) {
                        document.getElementById("error").innerText = "Please enter both email and password.";
                        return;
                    }

                    const loginData = {
                        email: email,
                        pass: password,
                        callFrom: "WEB"
                    };

                    try {
                        const response = await fetch("https://devrestapi.goquicklly.com/user/signin", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify(loginData)
                        });

                        const result = await response.json();

                        if (result.success) {
                            
                            sessionStorage.setItem("user_logged_in", "true");
                            sessionStorage.setItem("firstName", result.firstName || "");
                            sessionStorage.setItem("uid", result.uid || "");

                            setTimeout(function() {
                                
                                const successMessageDiv = document.getElementById("login-success");
                                successMessageDiv.textContent = "Login Successful!";
                                successMessageDiv.style.display = "block"; 

                                setTimeout(function() {
                                    $('#signupformmodal').modal('hide'); 
                                }, 2000); 
                            }, 500); 

                            document.getElementById("error").style.display = "none";

                            updateAccountUI(result.firstName);
                        } else {
                            
                            document.getElementById("error").innerText = result.msg || "Login failed.";
                        }
                    } catch (err) {
                        console.error("Login Error:", err);
                        document.getElementById("error").innerText = "Something went wrong. Try again.";
                    }
                });
            }

            // On page load: update UI if logged in
            const isLoggedIn = sessionStorage.getItem("user_logged_in");
            const firstName = sessionStorage.getItem("firstName");
            if (isLoggedIn === "true" && firstName) {
                updateAccountUI(firstName);
            }

            function updateAccountUI(name) {
                const helloPara = document.querySelector(".clsAccount p");
                const accountSpan = document.querySelector(".clsAccount span");
                const loginButton = document.querySelector(".clsAccount .notloggbbtt");
                const popupBox = document.querySelector(".clsAccount .clsPopUp");
                const logoutBox = document.querySelector(".clsAccount .logout-detail");

                if (helloPara) helloPara.textContent = `Hello, ${name}`;
                if (accountSpan) accountSpan.textContent = "Account";
                if (loginButton) loginButton.style.display = "none";
                if (popupBox) popupBox.style.display = "none";
                if (logoutBox) logoutBox.classList.add("active");
            }
        });

    </script> -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const loginForm = document.getElementById("apiformprodct");

            if (loginForm) {
                loginForm.addEventListener("submit", async function (e) {
                    e.preventDefault();

                    const emailInput = document.getElementById("user_email");
                    const passwordInput = document.getElementById("password");

                    const email = emailInput.value.trim();
                    const password = passwordInput.value.trim();

                    let hasError = false;

                    const errorElement = document.getElementById("error");
                    errorElement.style.display = "none";
                    errorElement.innerText = "";

                    if (!email) {
                        hasError = true;
                        showError(emailInput, "Email is required.");
                    } else {
                        removeError(emailInput);
                    }

                    if (!password) {
                        hasError = true;
                        showError(passwordInput, "Password is required.");
                    } else {
                        removeError(passwordInput);
                    }

                    if (hasError) return; 

                    const loginData = {
                        email: email,
                        pass: password,
                        callFrom: "WEB"
                    };

                    try {
                        const response = await fetch("https://devrestapi.goquicklly.com/user/signin", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify(loginData)
                        });

                        const result = await response.json();

                        if (result.success) {
                            sessionStorage.setItem("user_logged_in", "true");
                            sessionStorage.setItem("firstName", result.firstName || "");
                            sessionStorage.setItem("uid", result.uid || "");

                            setTimeout(function () {
                                const successMessageDiv = document.getElementById("login-success");
                                successMessageDiv.textContent = "Login Successful!";
                                successMessageDiv.style.display = "block";

                                setTimeout(function () {
                                    $('#signupformmodal').modal('hide');
                                }, 2000);
                            }, 500);

                            errorElement.style.display = "none";
                            updateAccountUI(result.firstName);
                        } else {
                            errorElement.innerText = result.msg || "Login failed.";
                            errorElement.style.display = "block"; 
                        }
                    } catch (err) {
                        console.error("Login Error:", err);
                        errorElement.innerText = "Something went wrong. Try again.";
                        errorElement.style.display = "block"; 
                    }
                });

                const emailInput = document.getElementById("user_email");
                const passwordInput = document.getElementById("password");

                emailInput.addEventListener("input", function () {
                    if (emailInput.value.trim()) {
                        removeError(emailInput);
                    }
                });

                passwordInput.addEventListener("input", function () {
                    if (passwordInput.value.trim()) {
                        removeError(passwordInput);
                    }
                });
            }

            const isLoggedIn = sessionStorage.getItem("user_logged_in");
            const firstName = sessionStorage.getItem("firstName");
            if (isLoggedIn === "true" && firstName) {
                updateAccountUI(firstName);
            }

            function updateAccountUI(name) {
                const helloPara = document.querySelector(".clsAccount p");
                const accountSpan = document.querySelector(".clsAccount span");
                const loginButton = document.querySelector(".clsAccount .notloggbbtt");
                const popupBox = document.querySelector(".clsAccount .clsPopUp");
                const logoutBox = document.querySelector(".clsAccount .logout-detail");

                if (helloPara) helloPara.textContent = `Hello, ${name}`;
                if (accountSpan) accountSpan.textContent = "Account";
                if (loginButton) loginButton.style.display = "none";
                if (popupBox) popupBox.style.display = "none";
                if (logoutBox) logoutBox.classList.add("active");
            }

            function showError(input, message) {
                input.classList.add("input-error");
                const errorDiv = document.createElement("div");
                errorDiv.className = "field-error";
                errorDiv.textContent = message;
                input.parentNode.appendChild(errorDiv);
            }

            function removeError(input) {
                input.classList.remove("input-error");
                const errorDiv = input.parentNode.querySelector(".field-error");
                if (errorDiv) errorDiv.remove();
            }
        });
    </script>


    <!-- <script type="text/javascript">
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
    </script> -->

    <!-- <script>
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

        // function showloginpopup() {
        //     $("#procedcheckoutBtn").trigger('click');
        // }

        function opensidemenu() {

            document.getElementById("allpagesmenu").style.width = "320px";
            $('.filter-overlay').show();


        }



        function closesidemenu() {
            $('.filter-overlay').hide();
            document.getElementById("allpagesmenu").style.width = "0px";
        }
    </script> -->
    <!-- desktop search ends -->

    </header>

    <div class="header-top">
        <!-- <div class="clsHead">
            <div class="container">
                <div class="topsectionimppage">
                    <div class="clsPgWidth clsBreadcrumb">
                        <div class="tophumbmmm" onclick="opensidemenu();"><img src="<?= $baseURL ?>images/hambm.svg" alt="menu"></div>
                        <ul class="topmenuslider slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 90000px; transform: translate3d(0px, 0px, 0px);">
                                    <li class="slick-slide down slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0"><a href="https://www.dev.goquicklly.com/indian-grocery-delivery/near-me-in-chicago-il" title="Grocery" tabindex="0">Groceries</a></li>
                                    <li class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1"><a href="#">Food</a></li>
                                    <li class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1"><a href="https://dev.goquicklly.com/dfi-web/" class="active">Direct from India</a></li>
                                    <li class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1"><a href="#">Fashion</a></li>
                                    <li class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1"><a href="#">Bestseller</a></li>
                                    <li class="slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1"><a href="https://www.dev.goquicklly.com/past-products">Buy it again</a></li>
                                    <li class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1"><a href="#">Same day delivery</a></li>
                                    <li class="slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1"><a href="#">Keep shopping for</a></li>
                                    <li class="slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1"><a href="#">Games</a></li>
                                    <li class="slick-slide" data-slick-index="9" aria-hidden="true" tabindex="-1"><a href="https://dev.goquicklly.com/events-web/">Events</a></li>
                                    <li class="slick-slide" data-slick-index="10" aria-hidden="true" tabindex="-1"><a href="#">QPay</a></li>
                                    <li class="slick-slide" data-slick-index="11" aria-hidden="true" tabindex="-1"><a href="https://www.dev.goquicklly.com/moments/personalised-gift-basket">Gift Card</a></li>
                                    <li class="slick-slide" data-slick-index="12" aria-hidden="true" tabindex="-1"><a href="https://www.dev.goquicklly.com/quicklly-pass">Quicklly Pass</a></li>
                                    <li class="slick-slide" data-slick-index="13" aria-hidden="true" tabindex="-1"><a href="https://www.dev.goquicklly.com/refer-a-friend">Refer a Friend</a></li>
                                </div>
                            </div>
                        </ul>

                        <div class="modal" id="sideMenuModal" style="display: none;">
                            <div class="modal-content">
                                <div class="user-name">
                                    <span class="u-name">Hello Sanjay</span><span class="close" onclick="closeSideMenu()"><img class="md-close" src="<?= $baseURL ?>images/md-close.svg" alt="Close" /></span>
                                </div>
                                <div class="aa">
                                    <h2>Shop by Category</h2>
                                    <ul>
                                        <li><a href="https://dev.goquicklly.com/dfi-web/">Direct from India</a></li>
                                        <li><a href="https://www.dev.goquicklly.com/indian-grocery-delivery/near-me-in-chicago-il">Groceries</a></li>
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Nation wide</a></li>
                                        <li><a href="#">Astrology (Shubh Puja)</a></li>
                                        <li><a href="https://dev.goquicklly.com/events-web/">Events</a></li>
                                        <li><a href="#">Moments</a></li>
                                        <li><a href="#">Just By Quicklly Meals</a></li>
                                    </ul>
                                </div>
                                <div class="b-border"></div>
                                <div class="aa">
                                    <h2>Programs & Features</h2>
                                    <ul>
                                        <li><a href="#">QPay</a></li>
                                        <li><a href="https://dev.goquicklly.com/events-web/">Events</a></li>
                                        <li><a href="#">Recipe</a></li>
                                        <li><a href="https://www.dev.goquicklly.com/quicklly-pass">Quicklly Pass</a></li>
                                        <li><a href="https://www.dev.goquicklly.com/moments/personalised-gift-basket">Gift Card</a></li>
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
        </div> -->
    </div>

    <div class="address-zip-modal">
        <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addressModalLabel">Choose address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return false;">
                            <div class="search-input" style="position: relative;">
                                <input id="autocomplete10" type="text" class="form-control" autocomplete="off" name="full_address" placeholder="Add a new address">
                                <div id="suggestions" class="googlesuggestion"></div>
                                <div class="formstepone">
                                    <div id="savedaddresslist">
                                        <h3>Saved address</h3>
                                        <ul>
                                            <li class="myssadd">
                                                <div class="mainwrapadd" onclick="selectaddress(this);">
                                                    <div class="addressimg">
                                                        <img src="<?= $baseURL ?>images/greenmapicon.svg">
                                                    </div>
                                                    <div class="addressmain">
                                                        <h4></h4>
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="addressaction">
                                                    <a href="javascript:void(0);" class="clsedit" onclick="clseditaddress(this);" title="Edit">Edit</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="formsteptwo" style="display:none;">
                                    <div class="cls-address street">
                                        <input type="text" name="streetAddr1" id="street-address" placeholder="Street Address">
                                    </div>
                                    <div class="cls-address apt">
                                        <input type="text" name="apt" id="apt10" placeholder="Apt, floor, suite, etc (optional)">
                                    </div>
                                    <div class="cls-address address-label">
                                        <input type="text" name="addresslabel" id="addresslabel" placeholder="Address label (optional)">
                                    </div>
                                    <div class="cls-address-container">
                                        <div class="cls-address city">
                                            <input type="text" id="city" placeholder="City">
                                        </div>
                                        <div class="cls-address state">
                                            <input type="text" id="state" placeholder="State/Province">
                                        </div>
                                    </div>
                                    <div class="cls-address zip">
                                        <input type="text" id="zip" placeholder="Zipcode/Pincode">
                                    </div>
                                    <div class="cls-address-save">
                                        <button id="saveAddressBtn" type="submit">Save Address</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img id="address-loader" src="<?= $baseURL ?>images/loading.png" alt="Loading..." style="display:none;">

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const savedAddress = getCookie("savedAddress");  

            if (!savedAddress || savedAddress === "undefined" || savedAddress.trim() === "") {
                const savedHeading = document.querySelector("#savedaddresslist h3");
                const savedList = document.querySelector("#savedaddresslist ul");

                if (savedHeading) savedHeading.style.display = "none";
                if (savedList) savedList.style.display = "none";
            }
        });
    </script> -->


    <!-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const saveAddressBtn = document.getElementById('saveAddressBtn');

            saveAddressBtn.addEventListener('click', function (e) {
                e.preventDefault(); 

                const uid = sessionStorage.getItem("uid");

                if (!uid) {
                    console.error("User ID (uid) is not available in sessionStorage.");
                    return;
                }

                const streetAddress = document.getElementById('street-address').value;
                const apt = document.getElementById('apt10').value;
                const addressLabel = document.getElementById('addresslabel').value;
                const city = document.getElementById('city').value;
                const state = document.getElementById('state').value;
                const zip = document.getElementById('zip').value;

                const updateProfileData = {
                    uid: uid,
                    streetAddr1: streetAddress,
                    streetAddr2: apt,
                    addressLabel: addressLabel,
                    city: city,
                    state: state,
                    zip: zip
                };

                fetch("https://devrestapi.goquicklly.com/user/update-profile", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(updateProfileData),
                })
                .then(response => response.json())
                .then(data => {
                    const messageDiv = document.querySelector('.message'); 

                    if (data.success) {
                        messageDiv.innerHTML = "<span style='color:green;'>Address updated successfully.</span>";
                        
                        const modal = document.getElementById("addressModal");
                        modal.style.display = "none";

                        setTimeout(() => {
                            // location.reload(); 
                        }, 2000); 
                    } else {
                        messageDiv.innerHTML = `<span style='color:red;'>Error: ${data.msg}</span>`;
                    }

                    setTimeout(() => {
                        messageDiv.innerHTML = '';
                    }, 5000); 

                })
                .catch(error => {
                    console.error("Error updating profile:", error);
                    const messageDiv = document.querySelector('.message');
                    messageDiv.innerHTML = "<span style='color:red;'>An error occurred. Please try again.</span>";

                    setTimeout(() => {
                        messageDiv.innerHTML = '';
                    }, 5000); 
                });
            });
        });

    </script> -->
    
    <script>
        // function opensidemenu() {
        //     const modal = document.getElementById('sideMenuModal');
        //     modal.style.display = 'block';
        //     setTimeout(() => {
        //         modal.classList.add('active');
        //     }, 10);
        // }

        // function closeSideMenu() {
        //     const modal = document.getElementById('sideMenuModal');
        //     modal.classList.remove('active');
        //     setTimeout(() => {
        //         modal.style.display = 'none';
        //     }, 300);
        // }

        // window.onclick = function(event) {
        //     const modal = document.getElementById('sideMenuModal');
        //     if (event.target === modal) {
        //         closeSideMenu();
        //     }
        // };

        $('.clsShoppingIn').on('click', function() {
            $('#addressModal').modal('show');
        });

        $(document).on('click', '.cart-change-address a', function(e) {
            e.preventDefault();
            $('#addressModal').modal('show');
        });


    </script>

    <script>
        let autocomplete, input;

        function initAutocomplete() {
            // For autocomplete10
            input = document.getElementById("autocomplete10");
            autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode'],
                componentRestrictions: {
                    country: 'us'
                }
            });

            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (place.geometry) {
                    console.log('Selected Place:', place);
                    document.getElementById('autocomplete10').value = place.formatted_address;
                    updateAddressMain(place);
                    hideDropdown();
                }
            });

            input.addEventListener('input', function() {
                const query = input.value;
                if (query.length > 0) {
                    getAutocompleteSuggestions(query);
                } else {
                    hideDropdown();
                }
            });

            const streetInput = document.getElementById("street-address");

            streetInput.addEventListener("input", function () {
                input = streetInput; 
                const query = input.value;
                if (query.length > 0) {
                    getAutocompleteSuggestions(query);
                } else {
                    hideDropdown();
                }
            });


            streetAutocomplete.addListener('place_changed', function() {
                const place = streetAutocomplete.getPlace();
                if (place.geometry) {
                    document.getElementById('street-address').value = place.formatted_address;
                    updateAddressMain(place); 
                }
            });
        }

        function getAutocompleteSuggestions(query) {
            const service = new google.maps.places.AutocompleteService();
            service.getQueryPredictions({
                input: query,
                componentRestrictions: {
                    country: 'us'
                }
            }, function(predictions, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    showDropdown(predictions);
                } else {
                    hideDropdown();
                }
            });
        }

        function showDropdown(predictions) {
            const dropdown = document.getElementById("suggestions");
            dropdown.innerHTML = '';
            predictions.forEach(function(prediction) {
                const div = document.createElement("div");
                div.classList.add("autocomplete-item");

                const img = document.createElement("img");
                img.src = "<?= $baseURL ?>images/map-light-icon.svg";
                img.alt = "Location Icon";
                img.classList.add("autocomplete-img");

                const span = document.createElement("span");
                span.textContent = prediction.description;

                div.appendChild(img);
                div.appendChild(span);

                div.onclick = function() {
                    input.value = prediction.description;

                    const placesService = new google.maps.places.PlacesService(document.createElement('div'));
                    placesService.getDetails({
                        placeId: prediction.place_id,
                        fields: ['address_components', 'formatted_address', 'name', 'types', 'geometry']
                    }, async function(place, status) {
                        if (status === google.maps.places.PlacesServiceStatus.OK) {
                            let street = '',
                                city = '',
                                state = '',
                                stateCode = '',
                                zipcode = '';

                            if (place.address_components) {
                                place.address_components.forEach(component => {
                                    if (component.types.includes('street_number')) {
                                        street = component.long_name;
                                    }
                                    if (component.types.includes('route')) {
                                        street = street ? `${street} ${component.long_name}` : component.long_name;
                                    }

                                    if (component.types.includes('locality')) {
                                        city = component.long_name;
                                    } else if (component.types.includes('postal_town') && !city) {
                                        city = component.long_name;
                                    }

                                    if (component.types.includes('administrative_area_level_1')) {
                                        state = component.long_name;
                                        stateCode = component.short_name;
                                    }

                                    if (component.types.includes('postal_code')) {
                                        zipcode = component.long_name;
                                    }
                                });
                            }

                            if ((!zipcode || zipcode === '') && city && place.geometry) {
                                try {
                                    const geocoder = new google.maps.Geocoder();

                                    const response = await new Promise((resolve, reject) => {
                                        geocoder.geocode({
                                            location: place.geometry.location
                                        }, (results, status) => {
                                            if (status === 'OK') resolve(results);
                                            else reject(status);
                                        });
                                    });

                                    for (let result of response) {
                                        for (let component of result.address_components) {
                                            if (component.types.includes('postal_code')) {
                                                zipcode = component.long_name;
                                                break;
                                            }
                                        }
                                        if (zipcode) break;
                                    }
                                } catch (e) {
                                    console.log('Zip code lookup error:', e);
                                }
                            }

                            if (!street && place.name && !place.name.match(/, [A-Z]{2}, USA$/)) {
                                street = place.name;
                            }

                            if (place.types && place.types.includes('route')) {
                                street = place.name;
                                const addressParts = place.formatted_address.split(', ');
                                if (addressParts.length >= 2) {
                                    city = city || addressParts[addressParts.length - 3];
                                }
                            }

                            document.getElementById("street-address").value = street || '';
                            document.getElementById("city").value = city || '';
                            document.getElementById("state").value = stateCode || state || '';
                            document.getElementById("zip").value = zipcode || '';

                            console.log('Address Details:', {
                                street: street,
                                city: city,
                                state: state,
                                stateCode: stateCode,
                                zipcode: zipcode,
                                formatted_address: place.formatted_address,
                                types: place.types
                            });

                            document.querySelector(".formstepone").style.display = 'none';
                            document.querySelector(".formsteptwo").style.display = 'block';
                            document.querySelector(".formsteptwo").style.marginLeft = '25px';
                            document.querySelector(".formsteptwo").style.width = '90%';

                            document.getElementById("autocomplete10").style.display = 'none';
                        } else {
                            console.error('Place details request failed:', status);
                        }
                    });

                    hideDropdown();
                };

                dropdown.appendChild(div);
            });
            dropdown.style.display = 'block';
        }

        function hideDropdown() {
            const dropdown = document.getElementById("suggestions");
            dropdown.style.display = 'none';
        }

        function updateAddressMain(place) {
            const addressMain = document.querySelector(".addressmain");
            const formStepOne = document.querySelector(".formstepone");
            const formStepTwo = document.querySelector(".formsteptwo");

            if (formStepOne) {
                formStepOne.style.display = 'none';
            }

            if (formStepTwo) {
                formStepTwo.style.display = 'block';
                formStepTwo.style.padding = '10px 25px 0px 25px';
            }

            if (addressMain) {
                addressMain.innerHTML = `<h4>${place.description}</h4>`;
            }

            const street = place.formatted_address || '';
            let city = '',
                state = '',
                pincode = '';
            if (place.address_components) {
                const cityComponent = place.address_components.find(component => component.types.includes("locality"));
                const stateComponent = place.address_components.find(component => component.types.includes("administrative_area_level_1"));
                const pincodeComponent = place.address_components.find(component => component.types.includes("postal_code"));

                city = cityComponent ? cityComponent.long_name : '';
                state = stateComponent ? stateComponent.long_name : '';
                pincode = pincodeComponent ? pincodeComponent.long_name : '';
            }

            document.getElementById("street-address").value = street;
            document.querySelector(".cls-address.city input").value = city;
            document.querySelector(".cls-address.state input").value = state;
            document.querySelector(".cls-address.zip input").value = pincode;
        }

        $('#addressModal').on('show.bs.modal', function() {

            document.getElementById('autocomplete10').style.display = 'block';
            document.querySelector('.formstepone').style.display = 'block';
            document.querySelector('.formsteptwo').style.display = 'none';
        });

        $('#addressModal').on('shown.bs.modal', function() {
            initAutocomplete();
        });

        $('#addressModal').on('hidden.bs.modal', function() {
            document.getElementById('autocomplete10').value = '';
        });
    </script>

    <script>
        function setCookie(name, value, days) {
            const expires = new Date(Date.now() + days * 864e5).toUTCString();
            document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return decodeURIComponent(parts.pop().split(';').shift());
        }

        document.getElementById('saveAddressBtn').addEventListener('click', function() {
            const street = document.getElementById("street-address").value;
            const city = document.getElementById("city").value;
            const state = document.getElementById("state").value;
            const zip = document.getElementById("zip").value;

            const addressData = {
                street: street,
                city: city,
                state: state,
                zip: zip
            };

            setCookie("savedAddress", JSON.stringify(addressData), 7);

            const loader = document.getElementById("address-loader");
            if (loader) loader.style.display = 'block';

            setTimeout(() => {
                location.reload();
            }, 500);

        });

        window.addEventListener('DOMContentLoaded', function() {
            const saved = getCookie("savedAddress");
            if (saved) {
                try {
                    const data = JSON.parse(saved);
                    const addressText = `${data.street}, ${data.city}, ${data.state} ${data.zip}`;

                    document.getElementById("street-address").value = data.street || '';
                    document.getElementById("city").value = data.city || '';
                    document.getElementById("state").value = data.state || '';
                    document.getElementById("zip").value = data.zip || '';

                    const addressMain = document.querySelector(".addressmain");
                    // if (addressMain) {
                    //     addressMain.innerHTML = `<h4>${addressText}</h4>`;
                    // }
                    if (addressMain) {
                        addressMain.innerHTML = `
                            <h4>${data.street || ''}</h4>
                            <p>${data.zip || ''}, ${data.city || ''}, ${data.state || ''}</p>
                        `;
                    }


                    const shoppingSpan = document.querySelector(".clsShoppingIn span");
                    if (shoppingSpan) {
                        shoppingSpan.textContent = data.street || '';
                    }

                    console.log("Prefilled from cookie & updated shopping span:", addressText);
                } catch (e) {
                    console.warn("Failed to parse saved address cookie");
                }
            }
        });

        function clseditaddress(el) {
            const addressBox = el.closest('.myssadd');
            const street = addressBox.querySelector('.addressmain h4')?.textContent.trim() || '';
            const cityStateZip = addressBox.querySelector('.addressmain p')?.textContent.trim() || '';

            let zip = '',
                city = '',
                state = '';
            const parts = cityStateZip.split(',').map(part => part.trim());
            if (parts.length === 3) {
                [zip, city, state] = parts;
            }

            document.getElementById("street-address").value = street;
            document.getElementById("zip").value = zip;
            document.getElementById("city").value = city;
            document.getElementById("state").value = state;

            suggestions.classList.add('edit-margin');

            document.querySelector(".formstepone").style.display = 'none';
            document.getElementById("autocomplete10").style.display = 'none';
            const formStepTwo = document.querySelector(".formsteptwo");

            enableStreetWatcher();

            formStepTwo.style.display = 'block';
            formStepTwo.style.marginLeft = '25px';
            formStepTwo.style.width = '90%';
        }
    </script>

    <script>

        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('suggestions');
            const autocompleteInput = document.getElementById('autocomplete10');
            const streetInput = document.getElementById('street-address');

            if (!dropdown.contains(event.target) && event.target !== autocompleteInput && event.target !== streetInput) {
                dropdown.style.display = 'none';
            }
        });

        function enableStreetWatcher() {
        const streetInput = document.getElementById("street-address");
            streetInput.addEventListener("input", function () {
                if (streetInput.value.trim() === "") {
                    document.getElementById("apt10").value = "";
                    document.getElementById("addresslabel").value = "";
                    document.getElementById("city").value = "";
                    document.getElementById("state").value = "";
                    document.getElementById("zip").value = "";
                }
            });
        }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7FCoN0eNTNGEsX6d-BUW-Uh1SiVzn2f0&libraries=places"></script>


 

</body>

</html>