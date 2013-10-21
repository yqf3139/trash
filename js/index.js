// JavaScript Document
function moveheadPho(dis)
{
	pause=false;
	var moving= document.getElementById("_headPho");
	//alert(1);
	if(dis=="left")
	{
		moving.scrollLeft+=40;
		//alert(moving.scrollLeft);
	}
	else
	{
		moving.scrollLeft-=40;
	}
	pause=true;
}
window.onload = function ()
{
	var moving= document.getElementById("headPho");
		moving.scrollLeft=500;
	var oBox = document.getElementById("box");
	var aUl1 = document.getElementById("list");
	var aUI2 = document.getElementById("count");
	var aImg = aUl1.getElementsByTagName("li");
	var aNum = aUI2.getElementsByTagName("li");
	var timer = play = null;
	var i = index = 0;	
	//切换按钮
	for (i = 0; i < aNum.length; i++)
	{
		aNum[i].index = i;
		aNum[i].onmouseover = function ()
		{
			show(this.index)
		}
	}
	//鼠标划过关闭定时器
	oBox.onmouseover = function ()
	{
		clearInterval(play)	
	};
	
	//鼠标离开启动自动播放
	oBox.onmouseout = function ()
	{
		autoPlay()
	};	
	
	//自动播放函数
	function autoPlay ()
	{
		play = setInterval(function () {
			index++;
			index >= aImg.length && (index = 0);
			show(index);		
		},2000);	
	}
	autoPlay();//应用
	//图片切换, 淡入淡出效果
	function show (a)
	{
		index = a;
		var alpha = 0;
		for (i = 0; i < aNum.length; i++)aNum[i].className = "";
		aNum[index].className = "current";
		clearInterval(timer);			
		
		for (i = 0; i < aImg.length; i++)
		{
			aImg[i].style.opacity = 0;
			aImg[i].style.filter = "alpha(opacity=0)";	
		}
		
		timer = setInterval(function () {
			alpha += 10;
			alpha > 100 && (alpha =100);
			aImg[index].style.opacity = alpha / 100;
			aImg[index].style.filter = "alpha(opacity = " + alpha + ")";
			alpha == 100 && clearInterval(timer)
		},60);
	}
};

var pause=true;
function moveheadPho(dis)
{
	pause=false;
	var moving= document.getElementById("headPho");
	//alert(1);
	if(dis=="left")
	{
		moving.scrollLeft+=40;
		//alert(moving.scrollLeft);
	}
	else
	{
		moving.scrollLeft-=40;
	}
	pause=true;
}

function goto_site(obj)
{
	//window.location.href=obj.value;
	window.open(obj.value);
}