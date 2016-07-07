var ue;
$(function(){
    ue = UE.getEditor('editor',{
        elementPathEnabled: false,
        initialStyle: 'p{line-height:1em;font-size:14px;font-family:微软雅黑;}',
    });
    sendclick();
});

function sendclick(){
    $(".send").bind('click',function(){
        send();
    });
}
var tj=0,e2;
function send(){
    tj=0;
    var t = $(".title_in input").val().trim();
    var e = $("#emails_con").val().trim();
    //var c = ue.hasContents()?ue.getContent():false;
    var c = $("#con_con").val().trim();
    e2 = e.split(';');
    var num = e2.length;
    //$(".send").unbind('click');
    xh(t,c,e2[0],num);
    console.log(t,c,e2,num);
    // if(t != '' && c && e!=''){
    //     $(".send").unbind('click');
    //     $.ajax({
    //         type: 'POST',
    //         url:  'sendmail.php',
    //         data: {"t":t,"c":c,"e":e},
    //         dataType: 'json',
    //         beforeSend:function(){
    //             $(".info").html('正在发送。。。');
	// 	    },
    //         success:function(dt){
    //             $(".info").html(dt.b);
    //             if(dt.i){
    //                 $(".title_in input").val('');
    //                 ue.execCommand('cleardoc');
    //             }
    //             sendclick();
    //         }
    //     });
    // }else{
    //     $(".info").html('主题和内容不能为空！');
    // }
}
function xh(t,c,e,num){
    if(t != '' && c!='' && e!=''){
        if(Number(tj)>Number(num-1)){
            $(".info2").html('');
            return false;
        }
        $.ajax({
            type: 'POST',
            url:  'sendmail.php',
            data: {"t":t,"c":c,"e":e},
            dataType: 'json',
            beforeSend:function(){
                $(".info2").html('正在发送。。。');
		    },
            success:function(dt){
                $(".info").append(e+' '+dt.b+'<br>');
                tj++;
                setInterval(xh(t,c,e2[tj],num), 500);
                // if(dt.i){
                //     $(".title_in input").val('');
                //     ue.execCommand('cleardoc');
                // }
                // sendclick();
            }
        });
    }else{
        $(".info2").html('');
        $(".info").append('主题和内容不能为空！<br>');
    }
}