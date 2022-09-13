<?php
define('DATABASE',array("localhost","db_user","db_passwd","db_name"));
//数据库配置  服务器/数据库用户名/数据库密码/数据库名称

define("URL","http://example.com/");
//网址 记住必须以/结尾

define("TITLE","TimeMail - 给未来写封信");
//网站名称

define("DEBUG", false);

define('EMAIL_SET',array(
  'key' => 'rand', //随机值
  'smtp' => 'smtp.exmail.qq.com',   //SMTP 用户名  即邮箱的用户名
  'email' => 'service@example.com', //邮箱账户
  'passwd' => 'PASSWD', //SMTP 密码  部分邮箱是授权码(例如163邮箱) 
  'Secure' => 'ssl',
   'setFrom' => 'service@example.com', //发件人
  'port' => '465', //服务器端口 25 或者465 具体要看邮箱服务器支持 
  'name' => 'TimeMail - 时光邮局'  //发信名称
  ));
//邮箱配置

define('IF_SET',false);
//用于判断是否手动修改配置，请再修改过后将此处的false改为true 如 替换为define('IF_SET',true);

/***********************************
 *                                 *
 *       以下配置不需要修改        *
 *                                 *
 ***********************************/
$conn = mysqli_connect(DATABASE[0],DATABASE[1],DATABASE[2],DATABASE[3]);
$conns = mysqli_connect(DATABASE[0],DATABASE[1],DATABASE[2],"information_schema");


define("EMAILAPI", URL . "email/emailsend.php");

/*
  function
*/
if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])
{
    $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
}
elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])
{
    $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
}
elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])
{
    $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
}
elseif (getenv("HTTP_X_FORWARDED_FOR"))
{
    $ip = getenv("HTTP_X_FORWARDED_FOR");
}
elseif (getenv("HTTP_CLIENT_IP"))
{
    $ip = getenv("HTTP_CLIENT_IP");
}
elseif (getenv("REMOTE_ADDR"))
{
    $ip = getenv("REMOTE_ADDR");
}
else
{
    $ip = "Unknown";
}
//获取用户ip

function is_email($user_email)
{
    $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false)
    {
        if (preg_match($chars, $user_email)){
            return true;
        }
        else{
            return false;
        }
   }
   else{
            return false;
        }
}
//邮箱合法性

$ban = array(
  "1.1.1.2" => "ban"
);
//ban用户数据库

function emailsend($sendto,$topic,$content) {
  $data = array (
    'key' => EMAIL_SET['key'],
    'sendto' => $sendto,
    'topic' => $topic,
    'content' => $content,
    'name' => EMAIL_SET['name']
  );
  $ch = curl_init ();
  curl_setopt ($ch, CURLOPT_URL, EMAILAPI);
  curl_setopt ($ch, CURLOPT_POST, 1);
  curl_setopt ($ch, CURLOPT_HEADER, 0);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
  $return = curl_exec ($ch);
  curl_close ($ch);
  $arr = json_decode($return, true);
  //获取返回值
  return $arr;
}
//邮件发送

    
?>
