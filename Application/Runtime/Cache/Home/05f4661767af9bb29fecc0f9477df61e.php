<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/hugong/Public/css/register.css">
</head>
<body>
    <div class="left">
        <span class="h1">养老护工网</span>
        <br>
        <span class="register">订制您的私人护工</span>
    </div>
    <div class="right">
        <form action="http://127.0.0.1:8080/hugong/index.php/Home/User/signup" method="post">
            <div id="mobile">
                <span class="iconfont icon-mobile"></span>
                <input type="text" placeholder="手机号" id="phone" name="phone">
                <button id="get">
                    免费获取验证码
                </button>
            </div>
            <div id="vertify">
                <span class="iconfont icon-vertify"></span>
                <input type="text" placeholder="验证码" id="verti" name="verti">
                <div class="container" id="verticontainer"></div>
            </div>
            <div id="pass">
                <span class="iconfont icon-pass"></span>
                <input type="password" placeholder="密码" id="password" name="pass">
                <div class="container" id="passcontainer">
                    <div class="tips">
                        密码要求8-16位
                    </div>
                </div>
            </div>
            <button>注册</button>
        </form>
    </div>
    <script src="/hugong/Public/js/register.js"></script>
</body>
</html>