<!DOCTYPE html>
<html>
<link rel="icon" href="/admin/logo.png">
<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .bgimg {
        background-image: url('/admin/forestbridge.jpg');
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        color: white;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
    }

    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }

    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
    }

    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    hr {
        margin: auto;
        width: 40%;
    }
    .cross-fade {
        display: inline-block;
        padding: 16px 28px;
        border: 2px rgba(147, 255, 145, 0.5) solid;
        text-align: center;
        text-decoration: none;
        color: #93ff91;
        position: relative;
        overflow: hidden;
        transition: color 0.75s ease-in-out;
        z-index: 1;
        border-radius: 0px;
    }
    .cross-fade:before, .cross-fade:after {
        content: "";
        position: absolute;
        top: 0;
        left: -25%;
        width: 150%;
        height: 100%;
        background: rgba(102, 102, 102, 0.5);
        transition: transform 0.75s ease-in-out;
        z-index: -1;
    }
    .cross-fade:before {
        transform: translate3d(100%, 0, 0) skew(20deg);
        transform-origin: 0 0;
    }
    .cross-fade:after {
        transform: translate3d(-100%, 0, 0) skew(20deg);
        transform-origin: 100% 100%;
    }
    .cross-fade:hover {
        color: white;
    }
    .cross-fade:hover:before, .cross-fade:hover:after {
        transform: translate3d(0, 0, 0) skew(20deg);
    }
</style>
<body>

<div class="bgimg">
    <div class="topleft" >
        <img src="/admin/logo.png" width="100">
    </div>
    <div class="middle">
        <h1>خوش آمدید</h1>
        <hr>
        <br>
        @if(Auth::check())
            <a href="{{ asset('admin/dashboard') }}" class="cross-fade">داشبورد</a>
        @else
            <a href="{{ asset('login') }}" class="cross-fade" style="border-radius: 10%">ورود</a><br>
            <a href="{{ asset('register') }}" class="cross-fade" style="border-radius: 10%">ثبت نام</a>
        @endif
    </div>
</div>

</body>
</html>
