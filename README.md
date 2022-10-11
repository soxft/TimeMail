# TimeMail
[![](https://data.jsdelivr.com/v1/package/gh/soxft/TimeMail/badge)](https://www.jsdelivr.com/package/gh/soxft/TimeMail)
<a href="http://www.apache.org/licenses/LICENSE-2.0.html"> 
<img src="https://img.shields.io/github/license/soxft/TimeMail.svg" alt="License"></a>
<a href="https://github.com/soxft/TimeMail/stargazers"> 
<img src="https://img.shields.io/github/stars/soxft/TimeMail.svg" alt="GitHub stars"></a>
<a href="https://github.com/soxft/TimeMail/network/members"> 
<img src="https://img.shields.io/github/forks/soxft/TimeMail.svg" alt="GitHub forks"></a> 

## 简介
> 给未来写封信<br />
> 多年之后,愿你不负所期.<br />
> 时间没有现在,永恒没有未来,也没有过去<br />
> 未来的你,过的还好吗?<br />
> 给未来写封信,从过去获得惊喜,<br />
> 给未来的自己带来些鼓励的话, <br />
> 或是写下一些目标,看未来的自己是否实现

# 初衷
  制作这个项目的初衷是为了让我们放下手边的一些事,或是给自己定下一个目标,或是仅仅只是一段对自己未来的憧憬。
  
  在这个平台寄送出去,寄出的信是不可撤回的,也不可查找,希望你也忘掉这件事,直到你收到信的那一天,也给自己一个惊喜.在那一天回忆起写这封信的时候,带着更多的可能是一种怀念?或许这封邮件会激励你越走越远...
  
# 用户/隐私协议
1.TimeMail-时光邮局,包括但不限于TimeMail,时光邮局等(特指定本程序)由<a href='//xsot.cn'>XCSOFT</a>开发,版权归xcsoft所有.

2.源码使用到了MDUI作为前端样式,后端采用php,发信采用PHPMailer库.在使用本程序时,应同时遵守以上源码的开源协议.

3.由于某些不可抗因素,故开源本源码,由于时间限制,并没有做网页端的安装程序,所以需要用户手动修改根目录下的`config.php`,具体步骤会在下方快速开始栏目显示.

4.在使用过程中,请不要修改版权信息,当然如果你实在要去改的话,我也拦不住\^_^)

5.基于<a href='http://www.apache.org/licenses/LICENSE-2.0.html'>Apache2.0</a>开源协议开源,使用过程中涉及到的一切可能造成损失的因素,由运营者承担,与本人无关.

6.禁止倒卖本程序.

7.协议可能随时更新,不另作通知.

# 快速开始
1.修改根目录下的`config.php`文件,将DATABASE常量依据注释中的提示指向数据库地址,并导入根目录下的`time.sql`文件.

2.修改其他基本信息,注意网址必须区分https与http,否则可能导致邮件无法发送,在修改smtp信息的同时请注意填写正确,区分好授权码和密码.

3.将常量`IF_SET`修改为`true`,用于标识已经修改config信息.

4.至此,已经安装完毕,请注意如果任然无法发送邮件,可能是服务商屏蔽了25等常用smtp端口,请尝试与服务商取得联系得到支持,同时也注意服务器是否放通了该类端口,或者查看是否是WAF(Nginx防火墙)屏蔽了海外访问等常见问题.

5.最后记通过corntab或其他方式添加一个计划任务,定时访问//example.com/server/send.php 一天>2次 用于监控定时发信

5.有任何问题,请尝试添加QQ群：608265912 获取支持.

# 需要注意

如果搭建该平台，希望您能遵守约定，将所有信件按时寄出。 

由于仍然使用mysqli连接数据库, 并未对语句进行预处理, 可能存在注入安全问题, 建议使用时启用WAF.

目前 www.timeletters.cn 为我们运行的官方站点, 并在持续升级构建中. (该版本并不会开源)
