<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db_config.php';
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//$file = basename(file_get_contents($url)); // to get file
$currenturl = pathinfo($url, PATHINFO_FILENAME).".".pathinfo($url, PATHINFO_EXTENSION); // to get extension
$loginpage = array("login.php");
if(in_array($currenturl, $loginpage))
{
    if(isset($_SESSION['mlmrole']))
    {
        header("location:index");
    }
}
if(isset($_SESSION['mlmrole']))
{
    $rurl=$_SESSION['mlmrole']."/";
}
$ip = get_userip();
$date= date("Y/m/d");
if(isset($_SESSION['mlmid']))
{
    $uid=$_SESSION['mlmid'];
    $result=mysqli_query($db, "SELECT * FROM cart where uid='$uid' and transaction_id IS null");
    $ur=mysqli_fetch_assoc(mysqli_query($db,"SELECT balance FROM `user_id` where uid='$uid'"));
    $cr=mysqli_fetch_assoc(mysqli_query($db,"SELECT sum(pv) as totalpv FROM `checkout` where uid='$uid'"));
    $totalpv=$cr['totalpv'];
    $result=mysqli_query($db, "SELECT * FROM cart where uid='$uid' ");

$numproducts=mysqli_num_rows($result);
}

    
?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from secretsliving.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Feb 2022 08:33:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>Secrets Living &#8211; For A Better Life</title>
<link rel='dns-prefetch' href='http://s.w.org/' />
<link rel="alternate" type="application/rss+xml" title="Secrets Living &raquo; Feed" href="feed/index.html" />
<link rel="alternate" type="application/rss+xml" title="Secrets Living &raquo; Comments Feed" href="comments/feed/index.html" />
        <script type="text/javascript">
            window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/secretsliving.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.3.11"}};
            !function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
        </script>
        <style type="text/css">
img.wp-smiley,
img.emoji {
    display: inline !important;
    border: none !important;
    box-shadow: none !important;
    height: 1em !important;
    width: 1em !important;
    margin: 0 .07em !important;
    vertical-align: -0.1em !important;
    background: none !important;
    padding: 0 !important;
}
</style>
    <link rel='stylesheet' id='wp-block-library-css'  href='wp-includes/css/dist/block-library/style.min1697.css?ver=5.3.11' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/stylesb62d.css?ver=5.1.6' type='text/css' media='all' />
<link rel='stylesheet' id='generate-style-grid-css'  href='wp-content/themes/generatepress/css/unsemantic-grid.min605a.css?ver=2.2.2' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='wp-content/plugins/contact-form-7/includes/css/stylesb62d.css?ver=5.1.6' type='text/css' media='all' />


<!--=== All Plugins CSS ===-->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!--=== All Vendor CSS ===-->
    <link href="assets/css/vendor.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/css/style.css" rel="stylesheet">
<style id='generate-style-inline-css' type='text/css'>


  
body{background-color:#ffffff;color:#3a3a3a;}a, a:visited{color:#1e73be;}a:hover, a:focus, a:active{color:#000000;}body .grid-container{max-width:1000px;}.site-header .header-image{width:190px;}body, button, input, select, textarea{font-family:-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";}.entry-content > [class*="wp-block-"]:not(:last-child){margin-bottom:1.5em;}.main-navigation .main-nav ul ul li a{font-size:14px;}@media (max-width:768px){.main-title{font-size:30px;}h1{font-size:30px;}h2{font-size:25px;}}.top-bar{background-color:#636363;color:#ffffff;}.top-bar a,.top-bar a:visited{color:#ffffff;}.top-bar a:hover{color:#303030;}.site-header{background-color:#ffffff;color:#3a3a3a;}.site-header a,.site-header a:visited{color:#3a3a3a;}.main-title a,.main-title a:hover,.main-title a:visited{color:#222222;}.site-description{color:#757575;}.main-navigation,.main-navigation ul ul{background-color:#222222;}.main-navigation .main-nav ul li a,.menu-toggle{color:#ffffff;}.main-navigation .main-nav ul li:hover > a,.main-navigation .main-nav ul li:focus > a, .main-navigation .main-nav ul li.sfHover > a{color:#ffffff;background-color:#3f3f3f;}button.menu-toggle:hover,button.menu-toggle:focus,.main-navigation .mobile-bar-items a,.main-navigation .mobile-bar-items a:hover,.main-navigation .mobile-bar-items a:focus{color:#ffffff;}.main-navigation .main-nav ul li[class*="current-menu-"] > a{color:#ffffff;background-color:#3f3f3f;}.main-navigation .main-nav ul li[class*="current-menu-"] > a:hover,.main-navigation .main-nav ul li[class*="current-menu-"].sfHover > a{color:#ffffff;background-color:#3f3f3f;}.navigation-search input[type="search"],.navigation-search input[type="search"]:active{color:#3f3f3f;background-color:#3f3f3f;}.navigation-search input[type="search"]:focus{color:#ffffff;background-color:#3f3f3f;}.main-navigation ul ul{background-color:#3f3f3f;}.main-navigation .main-nav ul ul li a{color:#ffffff;}.main-navigation .main-nav ul ul li:hover > a,.main-navigation .main-nav ul ul li:focus > a,.main-navigation .main-nav ul ul li.sfHover > a{color:#ffffff;background-color:#4f4f4f;}.main-navigation .main-nav ul ul li[class*="current-menu-"] > a{color:#ffffff;background-color:#4f4f4f;}.main-navigation .main-nav ul ul li[class*="current-menu-"] > a:hover,.main-navigation .main-nav ul ul li[class*="current-menu-"].sfHover > a{color:#ffffff;background-color:#4f4f4f;}.separate-containers .inside-article, .separate-containers .comments-area, .separate-containers .page-header, .one-container .container, .separate-containers .paging-navigation, .inside-page-header{background-color:#ffffff;}.entry-meta{color:#595959;}.entry-meta a,.entry-meta a:visited{color:#595959;}.entry-meta a:hover{color:#1e73be;}.sidebar .widget{background-color:#ffffff;}.sidebar .widget .widget-title{color:#000000;}.footer-widgets{background-color:#ffffff;}.footer-widgets .widget-title{color:#000000;}.site-info{color:#ffffff;background-color:#800000;}.site-info a,.site-info a:visited{color:#ffffff;}.site-info a:hover{color:#606060;}.footer-bar .widget_nav_menu .current-menu-item a{color:#606060;}input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="search"],input[type="tel"],input[type="number"],textarea,select{color:#666666;background-color:#fafafa;border-color:#cccccc;}input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="search"]:focus,input[type="tel"]:focus,input[type="number"]:focus,textarea:focus,select:focus{color:#666666;background-color:#ffffff;border-color:#bfbfbf;}button,html input[type="button"],input[type="reset"],input[type="submit"],a.button,a.button:visited,a.wp-block-button__link:not(.has-background){color:#ffffff;background-color:#666666;}button:hover,html input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,a.button:hover,button:focus,html input[type="button"]:focus,input[type="reset"]:focus,input[type="submit"]:focus,a.button:focus,a.wp-block-button__link:not(.has-background):active,a.wp-block-button__link:not(.has-background):focus,a.wp-block-button__link:not(.has-background):hover{color:#ffffff;background-color:#3f3f3f;}.generate-back-to-top,.generate-back-to-top:visited{background-color:rgba( 0,0,0,0.4 );color:#ffffff;}.generate-back-to-top:hover,.generate-back-to-top:focus{background-color:rgba( 0,0,0,0.6 );color:#ffffff;}.inside-header{padding:0px;}.separate-containers .inside-article, .separate-containers .comments-area, .separate-containers .page-header, .separate-containers .paging-navigation, .one-container .site-content, .inside-page-header{padding:0px;}.entry-content .alignwide, body:not(.no-sidebar) .entry-content .alignfull{margin-left:-0px;width:calc(100% + 0px);max-width:calc(100% + 0px);}@media (max-width:768px){.separate-containers .inside-article, .separate-containers .comments-area, .separate-containers .page-header, .separate-containers .paging-navigation, .one-container .site-content, .inside-page-header{padding:0px;}.entry-content .alignwide, body:not(.no-sidebar) .entry-content .alignfull{margin-left:-0px;width:calc(100% + 0px);max-width:calc(100% + 0px);}}.one-container.right-sidebar .site-main,.one-container.both-right .site-main{margin-right:0px;}.one-container.left-sidebar .site-main,.one-container.both-left .site-main{margin-left:0px;}.one-container.both-sidebars .site-main{margin:0px;}.separate-containers .widget, .separate-containers .site-main > *, .separate-containers .page-header, .widget-area .main-navigation{margin-bottom:0px;}.right-sidebar.separate-containers .site-main{margin:0px;}.left-sidebar.separate-containers .site-main{margin:0px;}.both-sidebars.separate-containers .site-main{margin:0px;}.both-right.separate-containers .site-main{margin:0px;}.both-right.separate-containers .inside-left-sidebar{margin-right:0px;}.both-right.separate-containers .inside-right-sidebar{margin-left:0px;}.both-left.separate-containers .site-main{margin:0px;}.both-left.separate-containers .inside-left-sidebar{margin-right:0px;}.both-left.separate-containers .inside-right-sidebar{margin-left:0px;}.separate-containers .site-main{margin-top:0px;margin-bottom:0px;}.separate-containers .page-header-image, .separate-containers .page-header-contained, .separate-containers .page-header-image-single, .separate-containers .page-header-content-single{margin-top:0px;}.separate-containers .inside-right-sidebar, .separate-containers .inside-left-sidebar{margin-top:0px;margin-bottom:0px;}.rtl .menu-item-has-children .dropdown-menu-toggle{padding-left:20px;}.rtl .main-navigation .main-nav ul li.menu-item-has-children > a{padding-right:20px;}.one-container .sidebar .widget{padding:0px;}/* End cached CSS */.page .entry-content{margin-top:0px;}.entry-content > .alignwide:first-child, .entry-content > .alignfull:first-child{margin-top:-0px;}
@media screen and (max-width: 600px) {
.elementor2
{
    margin-left: 176px;width:100%;
}
}
</style>
<link rel='stylesheet' id='generate-mobile-style-css'  href='wp-content/themes/generatepress/css/mobile.min605a.css?ver=2.2.2' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-css'  href='wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min21f9.css?ver=5.11.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-animations-css'  href='wp-content/plugins/elementor/assets/lib/animations/animations.min2072.css?ver=3.2.5' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-legacy-css'  href='wp-content/plugins/elementor/assets/css/frontend-legacy.min2072.css?ver=3.2.5' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css'  href='wp-content/plugins/elementor/assets/css/frontend.min2072.css?ver=3.2.5' type='text/css' media='all' />
<style id='elementor-frontend-inline-css' type='text/css'>
@font-face{font-family:eicons;src:url(wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons0b93.eot?5.10.0);src:url(https://secretsliving.com/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.eot?5.10.0#iefix) format("embedded-opentype"),url(https://secretsliving.com/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.woff2?5.10.0) format("woff2"),url(https://secretsliving.com/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.woff?5.10.0) format("woff"),url(https://secretsliving.com/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.ttf?5.10.0) format("truetype"),url(https://secretsliving.com/wp-content/plugins/elementor/assets/lib/eicons/fonts/eicons.svg?5.10.0#eicon) format("svg");font-weight:400;font-style:normal}
</style>
<link rel='stylesheet' id='elementor-post-2928-css'  href='wp-content/uploads/elementor/css/post-2928d40c.css?ver=1630633783' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-pro-css'  href='wp-content/plugins/elementor-pro/assets/css/frontend.min3d36.css?ver=3.3.1' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-5-all-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min2072.css?ver=3.2.5' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-4-shim-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min2072.css?ver=3.2.5' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-global-css'  href='wp-content/uploads/elementor/css/globala2b8.css?ver=1630633784' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-7-css'  href='wp-content/uploads/elementor/css/post-77f81.css?ver=1630633786' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-905-css'  href='wp-content/uploads/elementor/css/post-9057f81.css?ver=1630633786' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-2085-css'  href='wp-content/uploads/elementor/css/post-20857f81.css?ver=1630633786' type='text/css' media='all' />
<link rel='stylesheet' id='recent-posts-widget-with-thumbnails-public-style-css'  href='wp-content/plugins/recent-posts-widget-with-thumbnails/public42a0.css?ver=7.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='wp-includes/css/dashicons.min1697.css?ver=5.3.11' type='text/css' media='all' />
<link rel='stylesheet' id='zoom-instagram-widget-css'  href='wp-content/plugins/instagram-widget-by-wpzoom/css/instagram-widgetef6d.css?ver=1.8.2' type='text/css' media='all' />
<link rel='stylesheet' id='tablepress-default-css'  href='wp-content/plugins/tablepress/css/default.min2c00.css?ver=1.9.2' type='text/css' media='all' />
<link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Raleway%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7COpen+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=auto&amp;ver=5.3.11' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-shared-0-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min9e0b.css?ver=5.15.1' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-solid-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min9e0b.css?ver=5.15.1' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-regular-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/regular.min9e0b.css?ver=5.15.1' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-brands-css'  href='wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min9e0b.css?ver=5.15.1' type='text/css' media='all' />
<script type='text/javascript'>
/* <![CDATA[ */
var SDT_DATA = {"ajaxurl":"https:\/\/secretsliving.com\/wp-admin\/admin-ajax.php","siteUrl":"https:\/\/secretsliving.com\/","pluginsUrl":"https:\/\/secretsliving.com\/wp-content\/plugins","isAdmin":""};
/* ]]> */
</script>
<script type='text/javascript' src='wp-includes/js/jquery/jquery4a5f.js?ver=1.12.4-wp'></script>
<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
<script type='text/javascript' src='wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min2072.js?ver=3.2.5'></script>
<link rel='https://api.w.org/' href='wp-json/index.html' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.html?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 5.3.11" />
<link rel="canonical" href="index.html" />
<link rel='shortlink' href='index.html' />
<link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embedcd99.json?url=https%3A%2F%2Fsecretsliving.com%2F" />
<link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed8116?url=https%3A%2F%2Fsecretsliving.com%2F&amp;format=xml" />
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="icon" href="wp-content/uploads/2019/01/cropped-Secrets-Living-Logo-Official-1-32x32.png" sizes="32x32" />
<link rel="icon" href="wp-content/uploads/2019/01/cropped-Secrets-Living-Logo-Official-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="wp-content/uploads/2019/01/cropped-Secrets-Living-Logo-Official-1-180x180.png" />
<meta name="msapplication-TileImage" content="https://secretsliving.com/wp-content/uploads/2019/01/cropped-Secrets-Living-Logo-Official-1-270x270.png" />
<style>
    #hovr:hover
    {
        color:black;
    }
     #hovr
    {
        background:#ffff;
        color: #800000;
    }
    .mini-cart-wrap button .notification
    {
        background-color:#800000;
        color: #fffff;
    }
    .mini-cart-wrap button .notification:hover
    {
        background-color:black;
        color: #fffff;
    }
</style>
</head>

<body data-rsssl=1 class="home page-template-default page page-id-7 wp-custom-logo wp-embed-responsive no-sidebar nav-below-header fluid-header separate-containers active-footer-widgets-0 nav-aligned-center header-aligned-center dropdown-hover elementor-default elementor-kit-2928 elementor-page elementor-page-7" itemtype="https://schema.org/WebPage" itemscope>
    <a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>     <div data-elementor-type="header" data-elementor-id="905" class="elementor elementor-905 elementor-location-header" data-elementor-settings="[]">
        <div class="elementor-section-wrap">
                    <header class="elementor-section elementor-top-section elementor-element elementor-element-6a456f90 elementor-section-content-middle elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="6a456f90" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-74ea1775" data-id="74ea1775" data-element_type="column">
            <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-51eafab3 elementor-widget elementor-widget-theme-site-logo elementor-widget-image" data-id="51eafab3" data-element_type="widget" data-widget_type="theme-site-logo.default">
                <div class="elementor-widget-container">
                                <div class="elementor-image">
                                                    <a href="index">
                            <img width="1080" height="857" src="wp-content/uploads/2019/01/Secrets-Living-Logo-Official-e1552356194309.png" class="attachment-full size-full" alt="Secrets Living Logo Official" />                             </a>
                                                        </div>
                        </div>
                </div>
                        </div>
                    </div>
        </div>
                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-161d1501" data-id="161d1501" data-element_type="column">
            <div class="elementor-column-wrap elementor-element-populated">
                            <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-713f74f4 elementor-shape-circle e-grid-align-right e-grid-align-center elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="713f74f4" data-element_type="widget" data-widget_type="social-icons.default">
                <div class="elementor-widget-container">
                    <div class="elementor-social-icons-wrapper elementor-grid">
                            <div class="elementor-grid-item">
                    <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-animation-grow elementor-repeater-item-5b1b321" href="https://www.facebook.com/SecretsLivingOfficial/" target="_blank">
                        <span class="elementor-screen-only">Facebook</span>
                                                    <i class="fa fa-facebook"></i>
                                            </a>
                </div>
                            <div class="elementor-grid-item">
                    <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-animation-grow elementor-repeater-item-a6c08e0" href="https://www.instagram.com/secretsliving/" target="_blank">
                        <span class="elementor-screen-only">Instagram</span>
                                                    <i class="fa fa-instagram"></i>
                                            </a>
                </div>
                            <div class="elementor-grid-item">
                    <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-animation-grow elementor-repeater-item-062ed20" href="https://www.youtube.com/channel/UChIioAkjz26FvBvRAzHHxdQ?view_as=subscriber" target="_blank">
                        <span class="elementor-screen-only">Youtube</span>
                                                    <i class="fa fa-youtube"></i>
                                            </a>
                </div>
                            <div class="elementor-grid-item">
                    <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-grow elementor-repeater-item-c7c7d1e" href="https://twitter.com/SecretsLivingHQ" target="_blank">
                        <span class="elementor-screen-only">Twitter</span>
                                                    <i class="fa fa-twitter"></i>
                                            </a>
                </div>
                            <div class="elementor-grid-item">
                    <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-animation-grow elementor-repeater-item-ff2bf4d" href="https://www.linkedin.com/in/secretslivingofficial/" target="_blank">
                        <span class="elementor-screen-only">Linkedin</span>
                                                    <i class="fa fa-linkedin"></i>
                                            </a>
                </div>
                    </div>
                </div>
                </div>
                        </div>
                    </div>
        </div>
                                </div>
                    </div>
        </header>
        <nav class="elementor-section elementor-top-section elementor-element elementor-element-7e3ae2e9 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7e3ae2e9" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0}">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-40737de3" data-id="40737de3" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-24225f4d elementor-nav-menu__align-justify elementor-nav-menu--stretch elementor-nav-menu--dropdown-tablet elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger elementor-widget elementor-widget-nav-menu" data-id="24225f4d" data-element_type="widget" data-settings="{&quot;full_width&quot;:&quot;stretch&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;layout&quot;:&quot;horizontal&quot;,&quot;submenu_icon&quot;:{&quot;value&quot;:&quot;fas fa-caret-down&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;toggle&quot;:&quot;burger&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;sticky_offset&quot;:0,&quot;sticky_effects_offset&quot;:0}" data-widget_type="nav-menu.default">
                            <div class="elementor-widget-container">
                                <nav migration_allowed="1" migrated="0" role="navigation" class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-background e--animation-sweep-down">
                                    <ul id="menu-1-24225f4d" class="elementor-nav-menu">
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54">
                                            <a href="about/index.html" class="elementor-item">ABOUT</a>
                                        </li>
                                       <!--  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52"><a href="products/index.html" class="elementor-item">PRODUCTS</a>
                                            <ul class="sub-menu elementor-nav-menu--dropdown">
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-919"><a href="products/sl-supplements/index.html" class="elementor-sub-item">SL Supplements</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-918"><a href="products/adam-supplement/index.html" class="elementor-sub-item">Adam Supplements</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-916"><a href="products/miracle-ee-foundation/index.html" class="elementor-sub-item">Miracle ee foundation</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-917"><a href="products/facial-mist/index.html" class="elementor-sub-item">Facial Mist</a></li>
                                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3028"><a href="sl-cafe-kopi-kunyit-hitam/index.html" class="elementor-sub-item">SL CAFE – Kopi Kunyit Hitam</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="blog/index.html" class="elementor-item">BLOG</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="business-opportunity/index.html" class="elementor-item">BUSINESS OPPORTUNITY</a></li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48"><a href="contact-us/index.html" class="elementor-item">CONTACT US</a></li>
                                        <?php if(isset($_SESSION['mlmrole'])==''){ ?>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a href="login.php" class="elementor-item">MEMBER LOGIN</a></li>
                                        <?php } else{?>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a href="logout.php" class="elementor-item">Log out</a></li>
                                             <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a href="product.php" class="elementor-item">All Product</a></li>
                                        
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525">
                                            <div class="mini-cart-wrap" style="padding-left: 40px;width:100px;">
                                                <button id="hovr" onclick="RedirectTourl('cart');"><i class="ion-bag"></i>
                                                    <span class="notification cartcount"><?=$numproducts?></span>
                                                </button>
                 
                                             </div>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </nav>
                                <div class="elementor-menu-toggle" role="button" tabindex="0" aria-label="Menu Toggle" aria-expanded="false" >
                                <div class="elementor1" >
                                    <i class="eicon-menu-bar" aria-hidden="true" role="presentation" onclick="shownew()" ></i>
                                    <span class="elementor-screen-only">Menu</span>
                                </div>
                                <div class="elementor2" >
                                    <?php if(isset($_SESSION['mlmrole'])){ ?>
                                            <div class="mini-cart-wrap" style="padding-left: 40px;width:100px;">
                                                <button id="hovr" onclick="RedirectTourl('cart');"><i class="ion-bag"></i>
                                                    <span class="notification cartcount"><?=$numproducts?></span>
                                                </button>
                 
                                             </div>
                                        <?php }?>
                                </div>
                                </div>
                                
                                <nav class="elementor-nav-menu--dropdown " role="navigation" aria-hidden="true" style="display:none;">
                                    <ul id="menu-2-24225f4d" class="elementor-nav-menu">
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54">
                                            <a href="about/index.html" class="elementor-item" tabindex="-1">ABOUT</a>
                                        </li>
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52"><a href="products/index.html" class="elementor-item" tabindex="-1">PRODUCTS</a>
                                        <ul class="sub-menu elementor-nav-menu--dropdown">
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-919"><a href="products/sl-supplements/index.html" class="elementor-sub-item" tabindex="-1">SL Supplements</a></li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-918"><a href="products/adam-supplement/index.html" class="elementor-sub-item" tabindex="-1">Adam Supplements</a></li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-916"><a href="products/miracle-ee-foundation/index.html" class="elementor-sub-item" tabindex="-1">Miracle ee foundation</a></li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-917"><a href="products/facial-mist/index.html" class="elementor-sub-item" tabindex="-1">Facial Mist</a></li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3028"><a href="sl-cafe-kopi-kunyit-hitam/index.html" class="elementor-sub-item" tabindex="-1">SL CAFE – Kopi Kunyit Hitam</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="blog/index.html" class="elementor-item" tabindex="-1">BLOG</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="business-opportunity/index.html" class="elementor-item" tabindex="-1">BUSINESS OPPORTUNITY</a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48"><a href="contact-us/index.html" class="elementor-item" tabindex="-1">CONTACT US</a></li>
                                    <?php if(isset($_SESSION['mlmrole'])==''){ ?>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a href="login.php" class="elementor-item">MEMBER LOGIN</a></li>
                                        <?php } else{?>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a href="logout.php" class="elementor-item">Log out</a></li>
                                             <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525"><a href="product.php" class="elementor-item">All Product</a></li>
                                        
                                        <!-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2525">
                                            <div class="mini-cart-wrap" style="padding-left: 40px;width:100px;">
                                                <button id="hovr" onclick="RedirectTourl('cart');"><i class="ion-bag"></i>
                                                    <span class="notification cartcount"><?=$numproducts?></span>
                                                </button>
                 
                                             </div>
                                        </li> -->
                                        <?php }?>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</nav>
<script>
   function shownew(){
        $('.elementor-nav-menu--dropdown ').toggle();
    }
    
</script>