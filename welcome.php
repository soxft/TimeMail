<!-- 
  Designed by xcsoft
  https://soxft.cn
  2020/09/14
  //版权所有,盗版必究
-->
<!DOCTYPE html>
<html lang="zh_CN">
    <head>
        <!-- 网页信息配置。 -->
        <meta charset="utf-8" />
        <meta name="author" content="xcsoft" />
        <meta name="description" content="TimeMail时光邮局 - 给未来写封信" />
        <meta name="keywords" content="TimeMail,时光邮局,给未来写封信,xcsoft,星辰日记,php,xc-blog,soxft" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.jsdelivr.net/gh/soxft/cdn@latest/time/img/favicon.ico" media="screen" />
        <title>欢迎使用 - TimeMail - 时光邮局</title>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/soxft/cdn@latest/mdui/css/mdui.min.css">

        <!-- 页面内样式表文件 -->
        <style>
        .footer {
            /*页脚样式，仿Google页脚*/
            line-height: 40px;
            background: #f2f2f2;
            border-top: 1px solid #e4e4e4;
            font-size: 10pt;
            color: #222;
        }
        .footer text, .footer a {
            /*页脚链接和文字*/
            margin-left: 30px;
            color: #666;
            display: inline-block;
            line-height: 40px;
            font-family: sans-serif;
            font-size: 10pt;
            margin-right: 30px;
            text-decoration: none;
        }
        #banner {
            /*横幅宽高和背景壁纸*/
            background-image: url(https://cdn.jsdelivr.net/gh/soxft/cdn@3.4/time/img/background.jpg);
            height: 40vh;
            width: 100%;
            background-size:cover
        }
        .banner-title {
            font-weight: 400;
        }
        .content-view {
            padding-top: 64px;
        }
        body {
            background-color: #f1f1f1;
        }
        .no-title-weight {
            font-weight: 400;
        }
        .mdui-list-item-icon, .mdui-list-item-content {
            color: rgba(0, 0, 0, 0.54);
        }
        .loading {
            left: 45%;
            top: 30%;
        }
        </style>
    </head>
    <!-- NO复制 -->
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <header id="appbar" class="mdui-appbar mdui-appbar-fixed">
        <!-- 导航栏 -->
        <div class="mdui-toolbar mdui-color-theme">
            <div class="mdui-typo-title font-weight:500;" id="appbar-title">TimeMail</div>
            <div class="mdui-toolbar-spacer"></div>
        </div>
    </header>
      <nav id="banner" class="mdui-container-fluid mdui-valign">
        <div class="mdui-row">
          <div style='Height:30px'></div>
            <div class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-offset-xs-1 mdui-typo-display-2">欢迎使用</div>
            <div class="mdui-col-xs-12 mdui-col-sm-8 mdui-col-offset-xs-1 mdui-typo-display-1">TimeMail</div>
        </div>
    </nav>
    <main id="startx" class="content-view mdui-container">
      <div class="mdui-container">
        <div class="mdui-typo">
          <h2 class="doc-chapter-title doc-chapter-title-first">使用条款/隐私协议&emsp;-></h2>
            <p>1.TimeMail-时光邮局,包括但不限于TimeMail,时光邮局等(特指定本程序)由<a href='//xsot.cn'>XCSOFT</a>开发,版权归xcsoft所有.</p> 
            <p>2.源码使用到了MDUI作为前端样式,后端采用php,发信采用PHPMailer库.在使用本程序时,应同时遵守以上源码的开源协议.</p> 
            <p>3.由于某些不可抗因素,故开源本源码,由于时间限制,并没有做网页端的安装程序,所以需要用户手动修改根目录下的`config.php`,具体步骤会在下方快速开始栏目显示.</p> 
            <p>4.在使用过程中,请不要修改版权信息,当然如果你实在要去改的话,我也拦不住对不对\^_^)</p> 
            <p>5.基于<a href='http://www.apache.org/licenses/LICENSE-2.0.html'>Apache2.0</a>开源协议开源,使用过程中涉及到的一切可能造成损失的因素,由运营者承担,与本人无关.</p> 
            <p>6.禁止倒卖本程序.</p> 
            <p>7.协议可能随时更新,不另作通知.</p> 
          <h2 class="doc-chapter-title doc-chapter-title-first">快速开始&emsp;-></h2>
              <p>1.修改根目录下的`config.php`文件,将DATABASE常量依据注释中的提示指向数据库地址,并导入根目录下的`time.sql`文件.</p>
              <p>2.修改其他基本信息,注意网址必须区分https与http,否则可能导致邮件无法发送,在修改smtp信息的同时请注意填写正确,区分好授权码和密码.</p>
              <p>3.将常量`IF_SET`修改为`true`,用于标识已经修改config信息.</p> 
              <p>4.至此,已经安装完毕,请注意如果任然无法发送邮件,可能是服务商屏蔽了25等常用smtp端口,请尝试与服务商取得联系得到支持,同时也注意服务器是否放通了该类端口,或者查看是否是WAF(Nginx防火墙)屏蔽了海外访问等常见问题.</p>
              <p>5.有任何问题,请尝试通过<a href='mailto:contact@xcsoft.top'>contact@xcsoft.top</a>或<a href='//blog.xsot.cn'>BLOG</a>获取帮助.</p>
        </div>
      </div>
    </main>
</body>
    <div style="height:25px;"></div>
    <footer class="footer">
        <!-- 页脚信息 -->
        <text>CopyRight. &copy; 2018-2020 XCSOFT Copyright.</text>
    </footer>
        <!-- 隐藏的页面组件，如音乐播放器、网站统计。 -->
        <div id="hidden" class="mdui-hidden"></div>
        <!-- JavaScript文件引入(CDN) -->
        <script src="//cdn.jsdelivr.net/gh/soxft/cdn@master/mdui/js/mdui.min.js"></script>
        <!-- 页面内JavaScript文件 -->
        <script>
          console.log("\n %c XCSOFT %c XSOT.CN ","color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
        </script>
    </body>

</html>
