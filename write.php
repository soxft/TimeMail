<?php require_once './header.php'; ?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>写信</h2>
        <div class="mdui-textfield">
            <input id="time" time="time" class="mdui-textfield-input" type="date"/>
        </div> 
        <div class="mdui-textfield">
            <input id="topic" time="topic" placeholder="一封来自<?php echo date("Y") . "年" . date("m") . "月" . date("d") . "日的信件" ?>" class="mdui-textfield-input" type="text" />
        </div>
        <div class="mdui-textfield">
            <textarea rows="10" cols="20" id="content" time="content" class="mdui-textfield-input" type="text" placeholder="你想写的内容"></textarea>
        </div>
        <div class="mdui-textfield">
            <input id="email" time="email" class="mdui-textfield-input" type="text" placeholder="收信邮箱" />
        </div>
        <br>
        <button onClick="Submit();" id="Submit" class="mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">near_me</i>
        </button>
    </div>
</div>

<div class="mdui-typo">
  <blockquote>
  <div class="mdui-typo-title-opacity" >注意事项:</div>
    <p>
        寄出的信是不可撤回的，也不可查找,希望你也忘掉这件事,直到你收到信的那一天。<br />
        同时在投递的那一刻我们将向你的邮箱发送一封确认邮件,只有点击确认邮件中的链接,您才能在未来收到邮件.<br />
        请记得将service#xcsoft.top加入邮箱白名单,以防收不到信<br />
        更多请访问菜单栏中的关于页面
    </p>
  </blockquote>
</div>

<!-- 加载 -->
<div id='loading' style="position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom: 0;display: none;width: 50px;height: 50px" class="mdui-spinner mdui-spinner-colorful"></div>
  
<script>
function Submit() {
  var $ = mdui.JQ;
  
  $.showOverlay(); //遮罩
  $('#loading').show();
    
    $.ajax({
      method: 'POST',
      url: './submit.php',
      timeout: 10000,
      data: {
        time: $('#time').val(),
        content: $('#content').val(),
        email: $('#email').val(),
        topic: $('#topic').val()
      },
      success:function(data)
      {
            if (data == 200) {
                mdui.dialog({
                    title: '投递成功..',
                    content: '我们已经向您的邮箱发送了一封验证邮件,请在1小时内点击邮箱内的验证链接,这样在未来您才会收到信件哦!',
                    modal: true
                });
            } else {
                mdui.snackbar({
                  message: '发送失败<br/>原因:' + data,
                  position: 'right-top',
                });
            }
      },
      complete:function(xhr,status){
        setTimeout(function () {$.hideOverlay();}, 100); //移除遮罩
        $('#loading').hide();
        if(status == 'timeout')
        {
          mdui.snackbar({
            message: '请求超时...',
            position: 'right-top',
          }); 
        }
      }
    });
}
</script>
<br />
</body>
<?php require_once './footer.php'; ?>