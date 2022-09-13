<?php 
require_once('../config.php');


if(empty($_GET['email'])){
  $email = $_POST['email'];
}else{
  $email = $_GET['email'];
}
if(empty($_GET['sendto'])){
  $sendto = $_POST['sendto'];
}else{
  $sendto = $_GET['sendto'];
}
if(empty($_GET['topic'])){
  $topic = $_POST['topic'];
}else{
  $topic = $_GET['topic'];
}
if(empty($_GET['content'])){
   $content = $_POST['content'];
}else{
   $content = $_GET['content'];
}
if(empty($_GET['key'])){
   $key = $_POST['key'];
}else{
   $key = $_GET['key'];
}
if(empty($_GET['name'])){
   $name = $_POST['name'];
}else{
   $name = $_GET['name'];
}
//疯狂获取数据
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require './src/Exception.php'; 
require './src/PHPMailer.php'; 
require './src/SMTP.php'; 

if ($key !== EMAIL_SET['key']) {
  $data = array(//向服务器返回token
    'code' => '401'
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit();
}
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
try { 
    //服务器配置 
    $mail->CharSet ="UTF-8";                     //设定邮件编码 
    $mail->SMTPDebug = 0;                        // 调试模式输出 
    $mail->isSMTP();                             // 使用SMTP 
    $mail->Host = EMAIL_SET['smtp'];          // SMTP服务器 
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证 
    $mail->Username = EMAIL_SET['email'];                // SMTP 用户名  即邮箱的用户名 
    $mail->Password = EMAIL_SET['passwd'];             // SMTP 密码  部分邮箱是授权码(例如163邮箱) 
    $mail->SMTPSecure = EMAIL_SET['Secure'];                    // 允许 TLS 或者ssl协议 
    $mail->Port = EMAIL_SET['port'];                            // 服务器端口 25 或者465 具体要看邮箱服务器支持 
    $mail->setFrom(EMAIL_SET['setFrom'],$name);  //发件人 
    $mail->addAddress($sendto);  // 收件人 
    //$mail->addAddress('ellen@example.com');  // 可添加多个收件人 
    $mail->addReplyTo($sendto); //回复的时候回复给哪个邮箱 建议和发件人一致 
    //$mail->addCC('cc@example.com');                    //抄送 
    //$mail->addBCC('bcc@example.com');                    //密送 

    //发送附件 
    // $mail->addAttachment('../xy.zip');         // 添加附件 
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名 

    //Content 
    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容 
    $mail->Subject = $topic; 
    $mail->Body    = $content; 
    $mail->send(); 
    header('Content-type:text/json');
    echo  json_encode(["code" => "200", "msg" => "success"]);
} catch (Exception $e) { 
    $data = [
      'code' => 'error'
    ];
    if (DEBUG == true) $data["errMsg"] = $e->getMessage();
    header('Content-type:text/json');
    echo json_encode($data);
}
