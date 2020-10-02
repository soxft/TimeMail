<?php
require_once ("smtp.php");
/*
if(empty($_POST['sendto'])){
  $sendto = $_GET['sendto'];
}else{
   $sendto = $_POST['sendto'];
}
if(empty($_POST['topic'])){
  $topic = $_GET['topic'];
}else{
   $topic = $_POST['topic'];
}
if(empty($_POST['content'])){
  $content = $_GET['content'];
}else{
   $content = $_POST['content'];
}
if(empty($_POST['key'])){
  $key = $_GET['key'];
}else{
   $key = $_POST['key'];
}
*/
if ($_POST['key'] !== 'emailapikeyxcsoft') {
  $data = array(//向服务器返回token
    'code' => '401'
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit();
}
//******************** 配置信息 ********************************
$smtpserver = "smtp.exmail.qq.com";
//SMTP服务器
$smtpserverport = 25;
//SMTP服务器端口
$smtpusermail = "oauth@xcsoft.top";
//SMTP服务器的用户邮箱
$smtpuser = "oauth@xcsoft.top";
//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
$smtppass = "Wabadmin.9824";
//SMTP服务器的授权码
$smtpemailto = $_POST['sendto'];
//发送给谁
$mailtitle = $_POST['topic'];
//邮件主题
$mailcontent = $_POST['content'];
//邮件内容
$mailtype = "TXT";
//邮件格式（HTML/TXT）,TXT为文本邮件
//************************ 配置信息 ****************************
$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false;
//是否显示发送的调试信息
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
if ($state == "") {
  $data = array(//向服务器返回token
    'code' => 'error'
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
} else {
  $data = array(//向服务器返回token
    'code' => '200'
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
}
?>