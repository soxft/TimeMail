<?php 
  require_once "config.php";
  $code = $_GET['c'];
  $arr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `check` WHERE `code`='$code';"));
  @$uid = $arr['uid'];
  @$timefrom = $arr['time'];
  //获取输入请求时间,用于验证是否失效

  if(empty($timefrom))
  {
    $info = "该链接已失效!";
  }elseif((time()-  $timefrom) > 3600){
    mysqli_query($conn,"DELETE FROM `check` WHERE `uid`='$uid';");
    mysqli_query($conn,"DELETE FROM `checking` WHERE `uid`='$uid';");
    $info = "该链接已失效!";
  }else{
    $result = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `checking` WHERE `uid`='$uid'"));
    $topic = $result['topic'];
    $content = $result['content'];
    $email = $result['email'];
    $timenow = $result['from'];
    $time = $result['to'];
    $ip = $result['ip'];
    //获取基本信息
      
    mysqli_query($conn,"DELETE FROM `check` WHERE `uid`='$uid';");
    mysqli_query($conn,"DELETE FROM `checking` WHERE `uid`='$uid';");
    mysqli_query($conn,"INSERT INTO `waiting` VALUES('$uid','$topic','$content','$email','$timenow','$time','$ip')");
    
    $info = "恭喜你,验证成功!";
    header("Refresh:10;url=\"./index.php\"");
  }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/soxft/cdn@1.0.1/mdui/css/mdui.min.css">
        <script src="https://cdn.jsdelivr.net/gh/soxft/cdn@1.0.1/mdui/js/mdui.min.js"></script>
        <title>
            <?php echo TITLE;?>
        </title>
    </head>
      <body background="https://cdn.jsdelivr.net/gh/soxft/cdn@latest/time/img/background.png">
    <div style="Height:40px"></div>
    <div class="mdui-container" style="max-width: 500px;">
        <div class="mdui-card">
                <div class="mdui-card-menu">
                    <button onclick="window.location.href='/'" class="mdui-btn mdui-btn-icon mdui-text-color-grey"><i class="mdui-icon material-icons">home</i>
                    </button>
                </div>
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title">邮件确认</div>
                <div class="mdui-card-primary-subtitle">Corfirm State</div>
            </div>
            <div class="mdui-card-content">
              <center>
                <h2><?php echo $info ?></h2>
              </center>
                <br>
            </div>
        </div>
    </div>
    </body>
</html>
