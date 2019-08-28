TouchSlide({slideCell:"#con5", mainCell:".c5_1", effect:"leftLoop", autoPlay:true,delayTime:0,interTime:2000 });

//点击测试出现下拉测试题
$(document).ready(function(){
	$(".cs1").click(function(){
			$("#q1").show();
			$("#q4").hide();
	});
	$(".cs4").click(function(){
			$("#q4").show();
			$("#q1").hide();
	});

});
//是否怀孕测试
var item_num = 6;
$("#show_res div").hide();
$(function(){
	$(".ss .ss_a ").click(function(){
		var so = parseInt($(this).attr("tid"));
		var is_checked = $("#ss"+so+" input:radio:checked").val();
		if(is_checked==undefined){ alert("请选择"); return false}
		so += 1;
		if(so - 1==item_num){//如果到最后一题就提交
		var val = 0; //分数
		    for(i=1; i<=item_num; i++)
			{
				val += parseInt($("#ss"+i+" input:radio:checked").val());
			}
			get_result(val);
			$(".ss").hide();
		}else{//显示下一题
			$(".ss").hide();
			$("#ss"+so).show();
		}
	});
	$(".ss .ss_b").click(function(){
		var so = parseInt($(this).attr("tid"));
		so -= 1;	
		//显示下一题
		$(".ss").hide();
		$("#ss"+so).show();

	});
	
	$("#ss"+ item_num + " input:radio").click(function(){
		$(" .ss_result").show();
	});
	
	
});
//判断是否显示怀孕
function mhy(){
  var radios = document.getElementsByName("radio");
  if (radios[1].checked==true) {
   	alert("你没有怀孕！");
	  $(".xz1").removeAttr('checked');
   }
 }

//结果显示
function get_result(val)
{
	if(val <= 5)
	{
		$("#sr1").show().siblings("div").hide();
	}else if(val <= 8){
		$("#sr2").show().siblings("div").hide();
	}else{
		$("#sr3").show().siblings("div").hide();
	}
}
//重新测试
$(document).ready(function(){
	$(".ss_c").click(function(){
           $(".ss").hide();
		   $(this).parent().hide();
		$("#ss1").show();
	});
});


//怀孕多久测试
function Show_rl_time(){
		var rl_year1=document.getElementsByName("rl_year")[0];
		var year= rl_year1.options[rl_year1.options.selectedIndex].value//你要的值
		var rl_month1=document.getElementsByName("rl_month")[0];
		var month= rl_month1.options[rl_month1.options.selectedIndex].value//你要的值
		if (month < 10 ){
			month = "0" + month;
		}
		var rl_date1=document.getElementsByName("rl_date")[0];
		var date= rl_date1.options[rl_date1.options.selectedIndex].value//你要的值
		if (date < 10 ){
			date = "0" + date;
		}
		var rl_time = year +"-"+ month + "-"+ date;
		//alert(rl_time);
		
		var myDate = new Date();
		var year1 = myDate.getFullYear()
		var month1 = myDate.getMonth()+1;
		if (month1 < 10 ){
			month1 = "0" + month1;
		}
		var date1 = myDate.getDate();
		if (date1 < 10 ){
			date1 = "0" + date1;
		}
		var rl_time1 = year1 +"-"+ month1 + "-"+ date1;
		//alert(rl_time1);
		
		Interval_time = daysBetween(rl_time1,rl_time)
		//alert(Interval_time);
		if(Interval_time >= 0 && Interval_time <= 290){
			$("#plr").html("你的怀孕时间是："+Interval_time+"天（"+(Interval_time/7).toFixed(0)+"周左右）");
		}else if(Interval_time > 291){
			$("#plr").html("你选择的时间有误，请重新选择");
		}else{
			$("#plr").html("你选择的时间超出当前时间，请重新选择");
		}
	}
	
	function daysBetween(DateOne,DateTwo)  
		{   
			var OneMonth = DateOne.substring(5,DateOne.lastIndexOf ('-'));  
			var OneDay = DateOne.substring(DateOne.length,DateOne.lastIndexOf ('-')+1);  
			var OneYear = DateOne.substring(0,DateOne.indexOf ('-'));  
		  
			var TwoMonth = DateTwo.substring(5,DateTwo.lastIndexOf ('-'));  
			var TwoDay = DateTwo.substring(DateTwo.length,DateTwo.lastIndexOf ('-')+1);  
			var TwoYear = DateTwo.substring(0,DateTwo.indexOf ('-'));  
		  
			var cha=((Date.parse(OneMonth+'/'+OneDay+'/'+OneYear)- Date.parse(TwoMonth+'/'+TwoDay+'/'+TwoYear))/86400000);   
			//return Math.abs(cha);  
			return cha;
		} 