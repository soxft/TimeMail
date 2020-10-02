<?php
require_once('./config.php');
$time = $_POST['time'];
$content = $_POST['content'];
$email = $_POST['email'];
$topic = $_POST['topic'];
//获取传值
if(!empty($ban[$ip]))
{
  echo "呀!你的IP被封禁了";
  exit();
}
if (empty($time) || empty($content) || empty($email) || empty($topic)) {
  echo "请检查表单是否填写完整!";
  exit();
}
if (strlen($content) > 5000) {
  echo "您发送的邮件内容超过了长度限制!";
  exit();
}
if (strlen($topic) > 500) {
  echo "您发送的邮件标题超过了长度限制!";
  exit();
}
if(!is_email($email))
{
  echo "请检查是否输入了真实的邮箱";
  exit();
}
if(strlen($content) < 20)
{
  echo "信件内容太少了,再写点内容吧!";
  exit();
}

if (!empty($ip)) {
  $sql = "SELECT * FROM `checking` where ip = '$ip'";
  $commd = mysqli_query($conn,$sql);
  $result_checking = mysqli_fetch_assoc($commd);

  $sql = "SELECT * FROM `checking` where ip = '$ip'";
  $commd = mysqli_query($conn,$sql);
  $result_waiting = mysqli_fetch_assoc($commd);

  if (!empty($result_checking) || !empty($result_waiting)) {
    if (($time - $result_checking['time']) <= 3600*24 || ($time - $result_waiting['time']) <= 3600*24) {
      echo "每24小时只能投递一次哦!";
      exit();
    }
  }
}

$time = strtotime($time); 
$timenow = strtotime(date("Y-m-d H:i:s",time()));
$timereal = time();
//timenow->发信时间戳    time->收信时间戳 timereal->完整时间戳

if($time <= $timenow)
{
  echo "请填写一个将来的时间!";
  exit();
}

//判断收信时间与当前时间先后
$code = null;
$str = "17hj0q5rtyzxcv89bn34o6sdfguiwepa2klm";
$max = strlen($str)-1;
for ($i = 0;$i < 50; $i++) {
    $code.= $str[rand(0,$max)];
}
$urll = URL . "check.php?c=$code";
$html = "
<h2>欢迎使用TimeMail - 时光邮局</h2>
&emsp;&emsp;我们发送这封验证邮件以防止他人滥用时光邮局,接下来请点击<a href='$urll'>立即激活</a>来激活您的邮箱,链接1小时内有效。<br />
&emsp;&emsp;如果您无法点击,请直接访问:$urll <br /><br />
&emsp;&emsp;接下来请你删除这封验证邮件,忘掉这件事,未来是光明而美丽的,爱它吧,向它突进,为它工作,迎接它,尽可能地使它成为现实吧,期待未来这封信与你再次相遇的时,您已完成自己心中定下的目标！<br />
&emsp;&emsp;为了在未来能收到这封信,请将".EMAIL_SET['email']."添加到邮箱白名单<br /><br />
&emsp;&emsp;若您并没有在TimeMail发送过邮件,请忽略这封邮件,很抱歉对您的打扰.
";
$return = emailsend($email,"TimeMail邮箱验证",$html);
$sql1 = "INSERT INTO `check` VALUES(uuid(),'$code','$timereal')";
mysqli_query($conn,$sql1);

$selectuid = "select * from `check` where `code`='$code';";
$re = mysqli_query($conn,$selectuid);
$arr = mysqli_fetch_assoc($re);
$uid = $arr['uid'];
//获取uid，防止uid不同
if($result = 200){
  $sql = "INSERT INTO `checking` VALUES('$uid','$topic','$content','$email','$timenow','$time','$ip')";
  mysqli_query($conn,$sql);
  echo 200;
}else{
  echo("错误代码:emailapi error,请联系网站管理员处理!");
  exit();
}
?>