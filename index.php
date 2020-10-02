<?php
require_once "config.php";
if(!IF_SET)
{
  header('Refresh:0;url=\'welcome.php\'');
  exit();
}
require_once "header.php";
?>
<div class="mdui-container">
    <div class="mdui-typo">
         <h2 class="doc-chapter-title doc-chapter-title-first">欢迎来到TimeMail - 时光邮局</h2>
        <blockquote>
            <div class="mdui-typo-title-opacity">给未来写封信</div>
            <footer>多年之后 愿你不负所期</footer>
        </blockquote>
    </div>
    <br />&emsp;<a href="write.php" class="mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">&#xe163;</i>&emsp;立即写信</a>
    <br />
    <div class="mdui-typo">
        <blockquote>
            <p>未来的你,过的还好吗?
                <br />给未来写封信,从过去获得惊喜,
                <br />给未来的自己带来些鼓励的话,
                <br />或是写下一些目标,看未来的自己是否实现</p>
            <footer>时间没有现在，永恒没有未来，也没有过去</footer>
        </blockquote>
    </div>
</div>
<?php
require_once "footer.php";
?>