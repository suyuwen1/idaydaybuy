<?php
    require 'phpmail/PHPMailerAutoload.php';
    if(!empty($_POST['t']) && !empty($_POST['c']) && !empty($_POST['e']) && !empty($_POST['host1']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['from']) && !empty($_POST['fromName']) && !empty($_POST['ssl']) && !empty($_POST['port'])){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = $_POST['host1'];
        $mail->Port = $_POST['port'];
        $mail->CharSet = "UTF-8";
		$mail->isHTML(true);
		//$mail->setLanguage('zh_cn');
        if($_POST['ssl']){
            $mail->SMTPSecure = "ssl";
        }
		$mail->Username=$_POST['username'];
		$mail->Password=$_POST['password'];
		$mail->Priority = 3;
        $mail->SMTPAuth = true; //开启认证
		$mail->From = $_POST['from'];
		$mail->FromName = $_POST['fromName'];
        $mail->addAddress($_POST['e']);
        $mail->Subject = $_POST['t'];
		$mail->Body    = $_POST['c'];
        $back = array();
		if ($mail->Send()) {
            $back['i'] = 1;
            $back['b'] = '<font color="green">发送成功！</font>';
		} else {
            $back['i'] = 0;
            $back['b'] = '<font color="red">发送失败！</font>';
            //echo $mail->ErrorInfo;
		}
    }else{
        $back['i'] = 0;
        $back['b'] = '主题、邮件、内容等不能为空！';
    }
    echo json_encode($back);
?>