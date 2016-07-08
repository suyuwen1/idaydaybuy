<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>发送邮件</title>
    <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="main.css"></link>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <div id="main">
        <div id="text">发送邮件</div>
        <div id="mail">
            Host：<input class="host" type="text" value="smtp.idaydaybuy.com">
            Username：<input class="username" type="text" value="admin@idaydaybuy.com">
            Password：<input class="password" type="text" value="Suyuwen1">
            SSL：<input class="ssl" type="checkbox">
            端口：<input style="width:50px;" class="port" type="text" value="465">
            发件人邮箱：<input class="from" type="text" value="admin@idaydaybuy.com">
            发件人名称：<input class="fromName" type="text" value="弘阔佳易数码">
        </div>
        <div id="title">
            <div class="title_zt">主　题：</div>
            <div class="title_in"><input type="text" tabindex="1" maxlength="200" autofocus></div>
        </div>
        <div id="emails">
            <div class="title_zt">收件人：</div>
            <div class="title_in"><textarea id="emails_con" cols=200 rows=6></textarea></div>
        </div>
        <div id="con">
            <textarea id="con_con" cols=210 rows=20></textarea>
        </div>
        <div id="but"><span class="send">发送</span> <a class="stop" href="javascript:void(0);">暂停</a><a style="margin-left:30px;" class="cls" href="javascript:void(0);">清除</a></div>
        <div style="margin-top:50px;"><div><span class="info2"></span></div><div><span class="info"></span></div></div>
    </div>
</body>
</html>