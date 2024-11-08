<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mindoro State University</title>
    <link rel="icon" type="image/png" href="{{asset('template/img/icon/favicon.ico')}}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/css/font-awesome.min.css')}}">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{asset('template/css/simple-line-icons.css')}}">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="{{asset('template/css/slick.cs')}}s">
    <link rel="stylesheet" href="{{asset('template/css/slick-theme.cs')}}s">
    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">
    <!-- Main CSS -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    <style>
        p {
            text-align: justify;
            text-justify: inter-word
        }
    </style>


    @yield('styles')
</head>

<body>


<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "107661790936244");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<<<<<<< HEAD
<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v17.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
=======
>>>>>>> origin/Rean


@yield('content')


<style>

    html {
        scroll-behavior: smooth;
    }

    button1 {


        position: fixed;
        right: 30px;
        z-index: 0;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #0e5705;
        color: white;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 3px;
        opacity: 80%;
        transition: bottom ease-in-out 0.3s;
    }

    button1 :hover {
        background-color: #255509;
    }

</style>

<button1 onclick="topFunction()" id="backToTop" title="Go to top" Top>
    <i class="fa fa-chevron-up"> </i>
</button1>
<script>
    //Get the button
    var button1 = document.getElementById("backToTop");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 20) {
            button1.style.bottom = "20px";
        } else {
            button1.style.bottom = "-60px";
        }

    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelectorAll('img').forEach(function (img) {
            img.onerror = function () {
                this.style.objectFit = 'cover';
                this.src = '/img/no-image-found.png'
            };
        })
    });
    // var image = document.querySelectorAll("img");
    // function errorImage(_this){
    //     _this.onerror = null;
    //     _this.src='/img/no-image-found.png'
    // }
    // for (var i = 0; i < image.length; i++){
    //     image[i].setAttribute('onerror',errorImage(this));
    //     image[i].style.objectFit = 'cover';
    // }
</script>
<!-- jQuery, Bootstrap JS. -->
<script src="{{asset('template/js/jquery.min.j')}}s"></script>
<script src="{{asset('template/js/tether.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<!-- Plugins -->
<script src="{{asset('template/js/slick.min.js')}}"></script>
<script src="{{asset('template/js/waypoints.min.js')}}"></script>
<script src="{{asset('template/js/counterup.min.j')}}s"></script>
<script src="{{asset('template/js/instafeed.min.js')}}"></script>
<script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('template/js/validate.js')}}"></script>
<script src="{{asset('template/js/tweetie.min.js')}}"></script>
<!-- Subscribe -->
<script src="{{asset('template/js/subscribe.js')}}"></script>
<!-- Script JS -->
<script src="{{asset('template/js/script.js')}}"></script>
@yield('script')
</body>

</html>
