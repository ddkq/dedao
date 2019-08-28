var g_Interval = 1;
var total = 0;//参加抽奖人数
var g_Timer;
var running = false;
var clickTime = 1;
var count = 5;
var url = 'http://www.cdddkqyy.com/';

function beginRndNum(trigger){
	if(running){
		clearTimeout(g_Timer);
		if(clickTime == 1) {
			$.post(url+'award/award/lottery', {reset: 1, count: count}, function(data) {
				for(var i = 0; i < data.length; i ++) {
					$('.num-box .num').eq(i).children('i').html(data[i]);
				}
			})
			clickTime ++;
			running = false;
		}
		else {
			$.post(url+'award/award/lottery', {count: count}, function(data) {
				if(data.code == 0) {
					alert(data.info);
					$('.num-box').find('.num').children('i').html('00');
					return;
				}
				else {
					for(var i = 0; i < data.length; i ++) {
						$('.num-box .num').eq(i).children('i').html(data[i]);
					}
					running = false;
				}
			})
		}
	}
	else{
		beginTimer();
		running = true;
	}
}

function updateRndNum(){
	var num = Math.floor(Math.random()*total+1);
	$('.num-box').find('.num').children('i').html(num);
}

function beginTimer(){
	g_Timer = setTimeout(beat, g_Interval);
}

function beat() {
	g_Timer = setTimeout(beat, g_Interval);
	updateRndNum();
}
$(function() {
	$.post(url+'award/award/total', {}, function(data) {
		// console.log(data)
		total = data;
	});
})