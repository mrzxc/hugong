<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/hugong/Public/css/detail.css">
</head>
<body>
    <header>
        <div>
            <div class="left">
                <a href="">
                    护工登记
                </a>
                <a href="">
                    护工分布
                </a>
                <a href="">
                    护工快报
                </a>
                <a href="">
                    如何找护工?
                </a>
                <a href="">
                    护工工资计算器
                </a>
            <span class="strong">
                服务热线 123456789
            </span>
            </div>
            <div class="right">
                <a href="">
                    注册
                </a>
                <a href="">
                    登录
                </a>
                <a href="">
                    联系我们
                </a>
                <a href="">
                    我的账户
                </a>
            </div>
        </div>
    </header>
    <div id="main">
        <div class="left">
            <img src="/hugong/Public/img/person.jpg" alt="">
        </div>
        <div class="right">
            <h3>
                张阿姨
            </h3>
            <div class="detail">
                39岁 住家 照顾能自理老人
                <span class="time">
                    更新时间: 2016-05-12 19:37:13
                </span>
             </div>
            <div class="light">
                <div class="area">
                    所在地区: <span class="areadetail">西青</span>
                </div>
                <div class="comment">
                    评价星级:
                    <span class="grey">
                        <span class="star45"></span>
                    </span>
                </div>
                <div class="price">
                    期望工资: <strong>4000元</strong>
                </div>
            </div>
            <div class="intro">
                <span>
                    自我介绍:
                    <span class="introdetail">
                        阿姨住辛寨子，白班住家都可以，住家家务辅带孩子
                    </span>
                </span>
                <button class="appoint">
                    我要预约
                </button>
            </div>
        </div>
    </div>
    <div id="info">
        <ul>
            <li class="spe">
                基本信息
            </li>
        </ul>
        <div class="baseinfo">
            <h2>
                基本信息
            </h2>
            <ul>
                <li>
                    <div class="title">
                        身份证号
                    </div>
                    <div class="content">
                        <?php echo ($certificate); ?>
                    </div>
                </li>
                <li>
                    <div class="title">
                        手机号码
                    </div>
                    <div class="content">
                        <?php echo ($phone); ?>
                    </div>
                </li>
                <li>
                    <div class="title">
                        类  　  型
                    </div>
                    <div class="content">
                        <?php echo ($type); ?>:<?php echo ($ability); ?>
                    </div>
                </li>
                <li>
                    <div class="title">
                        民  　  族
                    </div>
                    <div class="content">
                        汉族
                    </div>
                </li>
                <li>
                    <div class="title">
                        年  　  龄
                    </div>
                    <div class="content">
                        <?php echo ($age); ?>
                    </div>
                </li>
                <li>
                    <div class="title">
                        星  　  座
                    </div>
                    <div class="content">
                        <?php echo ($Zodiac); ?>
                    </div>
                </li>
                <li>
                    <div class="title">
                        籍  　  贯
                    </div>
                    <div class="content">
                        辽宁省
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>