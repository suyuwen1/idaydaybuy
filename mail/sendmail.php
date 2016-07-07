<?php
    require 'phpmail/PHPMailerAutoload.php';
    if(!empty($_POST['t']) && !empty($_POST['c']) && !empty($_POST['e'])){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = "smtp.qq.com";
        //$mail->Port = 25;
        $mail->CharSet = "UTF-8";
		$mail->isHTML(true);
		//$mail->setLanguage('zh_cn');
		$mail->Username='admin@idaydaybuy.com';
		$mail->Password='apedqizfcvzbbcbc';
		$mail->Priority = 3;
        $mail->SMTPAuth = true; //开启认证
		$mail->From = 'admin@idaydaybuy.com';
		$mail->FromName = '弘阔佳易数码';
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
        $back['b'] = '主题、邮件、内容不能为空！';
    }
    echo json_encode($back);
?>