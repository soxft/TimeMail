<?php
require_once "../config.php";
$time = strtotime(date("Y-m-d",time()));
$succ = 0;
//计数
$error = 0;
while (true) {
  $re = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `waiting` WHERE `to`='$time'"));
  //读取数据库信息
  if (!empty($re)) {
    $return = emailsend($re['email'],$re['topic'],"<h2>TimeMail - 时光邮局</h2><br />您收到一封来自" . date("Y",$re['from']) . "年" . date("m",$re['from']) . "月" . date("d",$re['from']) . "日的信件：<br /><br />" . $re['content'] . "<br /><br />感谢使用<a href='".URL."'>时光邮局</a>Powered By<a href='//xsot.cn'>XCSOFT</a>");
    if ($return = 200) {
      $uid = $re['uid'];
      $topic = $re['topic'];
      $content = $re['content'];
      $email = $re['email'];
      $timenow = $re['from'];
      $time = $re['to'];
      $ip = $re['ip'];
      mysqli_query($conn,"DELETE FROM `waiting` WHERE `uid`='$uid';");
      //删除元数据
      mysqli_query($conn,"INSERT INTO `sent` VALUES('$uid','$topic','$content','$email','$timenow','$time','$ip')");
      //迁移数据
      $succ++;
    } else {
      $error++;
    }
  } else {
    break;
  }
}
if ($error + $succ !== 0) {
  echo "处理完毕 -> ".$succ."封邮件发送成功! | ".$error."封邮件发送失败\r\n";
}else{
  echo "无今日邮件!\r\n";
}
?>