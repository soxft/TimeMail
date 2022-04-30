<!DOCTYPE html>
<!--
xcsoft版权所有 | 盗版必究
http://blog.xsot.cn
V2.2
2020/01/26
V2.3_beta20200823
2020/08/23
-->
<?php require_once "config.php"; ?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="description" content="TimeMail时光邮局 - 给未来写封信" />
  <meta name="keywords" content="TimeMail,时光邮局,给未来写封信,xcsoft,星辰日记,php,xc-blog,soxft" />
  <title><?php echo TITLE ?></title>
  <link href="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-y/mdui/0.4.2/css/mdui.min.css" type="text/css" rel="stylesheet" />
  <script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-y/mdui/0.4.2/js/mdui.min.js" type="application/javascript"></script>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" media="screen" />
  <style>
    a {
      text-decoration:none
    }
    a:hover {
      text-decoration:none
    }
  </style>
</head>
<!-- header baota-->
<header class="mdui-appbar mdui-appbar-fixed">
  <body oncontextmenu = "return false" onselectstart = "return false" oncopy = "return false" background="/img/background.png" class="mdui-drawer-body-left mdui-appbar-with-toolbar">
    <div class="mdui-toolbar mdui-color-theme">
      <span class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#main-drawer'}">
        <i class="mdui-icon material-icons">menu</i>
      </span>
      <a href="" class="mdui-typo-title">TimeMail</a>
    </header>
    <div class="mdui-drawer" id="main-drawer">
      <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 68px;">
        <div class="mdui-list">
          <a href="/" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">filter_none</i>
            &emsp;主页
          </a>
          <a href="./write.php" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">mail_outline</i>
            &emsp;写信
          </a>
          <a href="./status.php" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">settings</i>
            &emsp;状态
          </a>
          <a href="./about.php" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">info_outline</i>
            &emsp;关于
          </a>
        </div>
        <div class="mdui-collapse-item ">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">&#xe80d;</i>
            &emsp;友链
            <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <a href="//blog.xsot.cn" class="mdui-list-item mdui-ripple ">星辰日记</a>
          </div>
        </div>
      </div>
    </div>
    <br />
