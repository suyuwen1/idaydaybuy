$(function(){
    sendclick();
    stopclick();
    clsclick();
});

function sendclick(){
    $(".send").bind('click',function(){
        send();
    });
}

function clsclick(){
    $(".cls").bind('click',function(){
        $(".info").html('');
    });
}

function stopclick(){
    $(".stop").bind('click',function(){
        //window.clearInterval(si);//停止
        tj = num;
        info2= true;
    });
}

var tj=0,e2,si,num,info2 = false,host1,username,password,from,fromName;
function send(){
    tj=0;
    info2 = false;

    host1 = $(".host").val().trim();
    username = $(".username").val().trim();
    password = $(".password").val().trim();
    from = $(".from").val().trim();
    fromName = $(".fromName").val().trim();

    var t = $(".title_in input").val().trim();
    var e = $("#emails_con").val().trim();
    var c = $("#con_con").val().trim();

    e2 = e.split(';');
    num = e2.length;
    xh(t,c,e2[0]);
    console.log(host1,username,password,from,fromName,t,c,e2,num);
}
function xh(t,c,e){
        if(Number(tj)>Number(num-1)){
            if(info2){
                $(".info2").html('已暂停！');
            }else{
                $(".info2").html('已完成！');
            }
            
            return false;
        }
        $.ajax({
            type: 'POST',
            url:  'sendmail.php',
            data: {"t":t,"c":c,"e":e,"host1":host1,"username":username,"password":password,"from":from,"fromName":fromName},
            dataType: 'json',
            beforeSend:function(){
                $(".info2").html('正在发送。。。');
		    },
            success:function(dt){
                $(".info").append(e+' '+dt.b+'<br>');
                tj++;
                si = setInterval(xh(t,c,e2[tj]), 1000);
            }
        });
}