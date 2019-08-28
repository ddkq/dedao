


$(function(){	$(".wys").click(function(){ $(".con1_1").show();$(".wys").hide();$(".qp").show();})	})
$(function(){$(".qp").click(function(){$(this).hide();	$(".wys").show(100);$(".con1_1").hide();})	})
TouchSlide({slideCell:"#zj", titCell:".bh li", mainCell:".bd ul", effect:"leftLoop", autoPlay:true,delayTime:0,interTime:8000 });

$(function(){
	 $("#reset").click(function(){ document.YuQaIFS.reset(); });
	$(".yuyue").click(function(){
		if(document.getElementById("Feedback_Title").value==""  || document.getElementById("Feedback_Phone").value==""){
            alert("请填写正确信息!");	
            return false;	
        }else{
            $("#YuQaIFS").submit();
        }	
	});	
});


	
	
//点击测试出现下拉测试题
$(document).ready(function(){
	$(".cs1").click(function(){
			$(".mains").show();
			$(".ncs").hide();
			$("#q4").hide();
	});
	
	$(".cs4").click(function(){
			$("#q4").show();
			$(".mains").hide();
			$(".ncs").hide();
	});
});



function WebForm_OnSubmit()
{
    var cst1 = $('input[name="cst1"]:checked').val();
    var cst2 = $('input[name="cst2"]:checked').val();
    var cst3 = $('input[name="cst3"]:checked').val();
    var cst4 = $('input[name="cst4"]:checked').val();
    var cst5 = $('input[name="cst5"]:checked').val();
    var cst6 = $('input[name="cst6"]:checked').val();
    var cst7 = $('input[name="cst7"]:checked').val();
    var cst8 = $('input[name="cst8"]:checked').val();
	var cst9 = $('input[name="cst9"]:checked').val();
	var cst10 = $('input[name="cst10"]:checked').val();
   
    if(!cst1 || !cst2 || !cst3 || !cst4 || !cst5 || !cst6 || !cst7 || !cst8|| !cst9|| !cst10){
        alert("所有问题都为必填项");
        return false;
    }else{
        var cst = cst1+"；"+cst2+"；"+cst3+"；"+cst4+"；"+cst5+"；"+cst6+" ；"+cst7+"； "+cst8+"；"+cst9+"；"+cst10+"；";
    }

    $("#cst").val(cst);
	
    var name = document.getElementById("real_name").value;
    if(name==""){
		alert("姓名不能为空!");	
		document.getElementById("real_name").focus();
		return false;	
	}
	
    var phone = document.getElementById("phone").value;
	if(phone==""){
        alert("请输入您的联系电话!");	
        document.getElementById("phone").focus();
        return false;	
    }
    
    if(!/^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/i.test(phone)){
        alert("请输入正确的手机号码!");
        document.getElementById("phone").focus();
        return false;
    }
	
    var str = name+phone;
    OnlineLink(str);
	
}


//设置cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
//获取cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}


jQuery(".wj_content").slide({mainCell:".items",pnLoop:false});




//排卵期测试
function checkMensesCyc()
{
	var mensesCyc = $("#mensesCyc").val();
	var txtYear = $("#txtYear").val();
	var txtMonth = $("#txtMonth").val();
	var txtDate = $("#txtDate").val();
	var Today = new Date();
	
	if(isNaN(mensesCyc))
	{
		alert("请输入数字！");
		$("#mensesCyc").focus();
		
		return false;
	}
	
	if(mensesCyc>35 || mensesCyc<21)
	{
		alert("您输入的月经周期与标准月经周期相差太大，程序无法测试，请仔细核对。\n\n如输入确无问题请咨询医生！")
		$("#mensesCyc").focus();
		
		return false;
	}
	
	if(isNaN(txtYear) || txtYear<1900)
	{
		alert("请输入合法年份！");
		$("#txtYear").focus();
		
		return false;
	}
	
	if(isNaN(txtMonth) || txtMonth<1 || txtMonth>12)
	{
		alert("请输入合法月份！");
		$("#txtMonth").focus();
		
		return false;
	}
	
	var C_txtDate = GetDayPerMonth(txtYear,txtMonth);
	if(isNaN(txtDate) || txtDate<1 || txtDate>C_txtDate)
	{
		alert("请输入正确的日期！");
		$("#txtDate").focus();
		
		return false;
	}
	
	var Lastday = new Date(Date.UTC(txtYear, txtMonth-1, txtDate));
	if(Today.getTime() < Lastday.getTime())
	{
		alert("请输入正确的上次月经时间(不能早于当前时间)！")
		$("#txtYear").focus();
		
		return false;
	}
	
	var dateStart = Lastday.getTime() + (mensesCyc - 19) * 86400 * 1000;

	var dateEnd = dateStart + 9 * 86400 * 1000;
	
	var dStart = new Date(dateStart);
	var dEnd = new Date(dateEnd);
	
	var startY = dStart.getFullYear();
	var startM = dStart.getMonth() + 1;
	var startD = dStart.getDate();
	var endY = dEnd.getFullYear();
	var endM = dEnd.getMonth() + 1;
	var endD = dEnd.getDate();
	
	
	$("#plr").html("您最近的排卵期是："+startY+"年"+startM+"月"+startD+"日 至 "+endY+"年"+endM+"月"+endD+"日");
	
	
}

//Get the number of day in some month
	function GetDayPerMonth(year,month)
	{
		var monthDays = new Array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0))
		monthDays[2] = 29;
		return monthDays[month];
	}
// JavaScript Document

$(document).ready(function(){
	var thisUrl=document.URL;
	
	var i=0;
	for(i=0;i<=8; i++)
	{
		var aHref=$(".l_nav ul li:eq("+i+") a").attr("href");
		if(aHref==thisUrl)
		{
			$(".l_nav ul li:eq("+i+") a").addClass("ahover");
			}
		
		}
	})
