<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>全端班第二期第二個專案</title>
    <meta name="description" content="本專案使用的技術包含Larevel( middleware, model, view, Controller, API, migration, Export), Vue3cli, Jquery, ajax, mysql">
    <meta name="keywords" content="php,laravel,bootstrap,vue,mysql,MVC,XAMPP"><!--header的CSS-->

    <link href="/css/front/commons/header/fonts/FontAwesome/font-awesome.css" rel="stylesheet">
    <link href="/css/front/commons/header/bootstrap.min.css" rel="stylesheet">
    <link href="/css/front/commons/header/animate.css" rel="stylesheet">
    <link href="/css/front/commons/header/bootsnav.css" rel="stylesheet">
    <link href="/css/front/commons/header/overwrite.css" rel="stylesheet">
    <link href="/css/front/commons/header/style.css" rel="stylesheet">
    <link href="/css/front/commons/header/skins/color.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <style type="text/css">
        @import url(http://fonts.googleapis.com/earlyaccess/cwtexhei.css);
    </style>
    <!--if lt IE 9
    script(src='commons/header/js/html5shiv.min.js')
    script(src='commons/header/js/respond.min.js')
    
    --><!--GotoTop的CSS-->
    <link rel="stylesheet" type="text/css" href="/css/front/commons/gototop/style.css"><!--footer的CSS-->
    <link rel="stylesheet" type="text/css" href="/css/front/commons/footer/footer.css">
    <!-- 每頁title的CSS-->
    <link rel="stylesheet" type="text/css" href="/css/front/commons/else/title.css">
    @if(Request::is("/"))
    <!-- 首頁AD的CSS-->
    <link href="/css/front/index/effects.min.css" rel="stylesheet">
    <link href="/css/front/index/index.css" rel="stylesheet">
    <!-- video的CSS-->
    <link href="/css/front/index/video.css" rel="stylesheet">
    @endif
</head>

<body oncontextmenu="window.event.returnValue=false">
    <!-- Start Navigation-->
    <nav class="navbar navbar-default bootsnav">
        <!-- Start Top Search-->
        <div class="top-search">
            <div class="container">
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" placeholder="Search Products" class="form-control"><span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search-->
        <div class="container">
            <!-- Start Atribute Navigation-->
            <div class="attr-nav lang_bar">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation-->
            <!-- Start Header Navigation-->
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-menu" class="navbar-toggle"><i class="fa fa-bars"></i></button><a href="index.html" class="navbar-brand"><img src="/images/icon/tea.svg" alt="" class="logo"></a>
            </div>
            <!-- End Header Navigation-->
            <!-- Collect the nav links, forms, and other content for toggling-->
            <div id="navbar-menu" class="collapse navbar-collapse">
                <ul data-in="fadeInDown" data-out="fadeOutUp" class="nav navbar-nav navbar-right">
                    <li><a href="about.html"><span class="nav_img">
                        <img src="/images/i-con/icon_about.svg" alt=""></span>
                            <p class="nav_p">關於</p>
                        </a></li>
                    <li><a href="news.html"><span class="nav_img">
                        <img src="/images/i-con/news_icon.svg" alt=""></span>
                            <p class="nav_p">最新消息</p>
                        </a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="nav_img">
                        <img src="/images/i-con/icon_product.svg" alt=""></span>
                            <p class="nav_p">好茶</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="productlist_1.html">四角茶包</a></li>
                            <li><a href="productlist_2.html">原葉茶包</a></li>
                            <li><a href="productlist_3.html">嚴選茶葉</a></li>
                        </ul>
                    </li>
                    <li><a href="knowl.html"><span class="nav_img">
                        <img src="/images/i-con/icon_knowl.svg" alt=""></span>
                            <p class="nav_p">品茶知識</p>
                        </a></li>
                    <li><a href="contact.html"><span class="nav_img">
                        <img src="/images/i-con/icon_contact.svg" alt=""></span>
                            <p class="nav_p">聯絡我們</p>
                        </a></li>
                </ul>
                <ul class="lang_bar">
                    <li class="lang"><a href="#">中文/</a></li>
                    <li class="lang"><a href="#">En/</a></li>
                    <li class="lang"><a href="#">日本語</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse-->
        </div>
    </nav>
    <!-- End Navigation-->
    @yield("content")
    <div class="footer">
        <div class="icon">
            <ul>
                <li><a href="#"><img src="/images/footer/icon/icon_fb.svg"></a></li>
                <li><a href="#"><img src="/images/footer/icon/icon_line.svg"></a></li>
                <li><a href="#"><img src="/images/footer/icon/icon_ig.svg"></a></li>
                <li><a href="#"><img src="/images/footer/icon/icon_twitter.svg"></a></li>
            </ul>
        </div>
        <div class="nav">
            <ul>
                <li><a href="/about">關於</a></li>
                <li><a href="/news">最新消息</a></li>
                <li><a href="/product">好茶</a></li>
                <li><a href="/knowl">品茶知識</a></li>
                <li><a href="/contact">聯絡我們</a></li>
            </ul>
        </div>
        <div class="logo"><a href="index.html"><img src="commons/footer/img/logo.svg" alt=""></a></div>
        <div class="info">
            <div class="line"><a href="" target="_blank">A . </a><br> <a href="tel:+">T . +</a><br> F . <br></div>
        </div>
        <div class="copyright"><a href="copyright.html">智慧財產權聲明</a> © 2017 . All Rights Reserved </div>
    </div>
    <!-- Scroll to Top button selector-->
    <div><a class="to-top"><img src="commons/gototop/img/gototop.svg" alt=""></a></div>
    <!--header的JS-->
    <script>
        window.jQuery || document.write('<script src="/js/front/commons/header/jquery-1.11.0.min.js "><\/script>')
    </script>
    <script src="/js/front/commons/header/bootstrap.min.js "></script>
    <script src="/js/front/commons/header/bootsnav_2.js "></script>
    <!--GotoTop的JS-->
    <script src="/js/front/commons/gototop/jquery.toTop.min.js"></script>
    <script>
        jQuery(function($) {
            // Plugin activation (basic)
            // $('.to-top').toTop();
            // Plugin activation with options
            $('.to-top').toTop({
                //options with default values
                autohide: true, //boolean 'true' or 'false'
                offset: 250, //numeric value (as pixels) for scrolling length from top to hide automatically
                speed: 650, //numeric value (as mili-seconds) for duration
                right: 20, //numeric value (as pixels) for position from right
                bottom: 60 //numeric value (as pixels) for position from bottom
            });
        });
    </script>
</body>

</html>