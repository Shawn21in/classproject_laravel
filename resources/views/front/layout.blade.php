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

    @if(Request::is("product","product/detail/*"))
    <link href="/css/front/product/jquery.bxslider.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/front/product/web_product.css">
    <link rel="stylesheet" href="/css/front/product/product.css">
    <!-- 關於好茶 CSS-->
    <link rel="stylesheet" href="/css/front/product/product_int.css">
    <link rel="stylesheet" href="/css/front/product/video.css"><!--ScrollWatch滾動淡入-->
    @endif
    
    
    @if(Request::is("product/list/*"))
    <link href="/css/front/product/effects.min.css" rel="stylesheet">
    <link href="/css/front/product/style.css" rel="stylesheet"><!--ScrollWatch滾動淡入-->
    @endif
    <style>
      .fade_in {
      /* opacity: 0; *//*這是透明度*/
      transition: opacity 2s;
      }
      .fade_in.scroll-watch-in-view {
      opacity: 1;
      }
    </style>

</head>
<!-- 下面這行路徑抓不到可以防止這個網頁被下載 -->
<iframe src="" frameborder="0"></iframe>
<!-- 下面這行可以禁止按右鍵 -->
<!-- oncontextmenu="window.event.returnValue=false" -->
<body >
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
                        @if(!empty(session()->get("type_layer1")))
                        <ul class="dropdown-menu">
                            @foreach(session()->get("type_layer1") as $data)
                            <li><a href="/product/list/{{ $data->id }}">{{ "$data->type_layer1_name	" }}</a></li>
                            @endforeach
                        </ul>
                        @endif
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
    @if(Request::is("product","product/detail/*"))
    <script src="/js/front/product/jquery-2.1.3.min.js"></script>
    <script src="/js/front/product/jquery.bxslider.js"></script>
    <script type="text/javascript" src="/js/front/product/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="/js/front/product/web_product.js"></script>
    @endif

    @if(Request::is("product/type_layer1/*"))
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="product/productlist/js/jquery.lazyload.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
      $("img").lazyload({
      effect: "fadeIn"
      });
      });
    </script>
    @endif
  </body>
</body>

</html>