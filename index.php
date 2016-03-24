<?php 
include("all_include.php");
$nav_str='监测概况';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>国家环境腐蚀数据实时监测</title>
<meta name="description" content="国家环境腐蚀数据实时监测,中国腐蚀与防护网">
<meta name="keywords" content="国家环境腐蚀数据实时监测,中国腐蚀与防护网">
<meta name="generator" content="ecorr.org">
<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon">
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src="/js/jquery/1.9.1/jquery.min.js"></script>
<!-- hightchart b -->
<script type="text/javascript" src="/js/hightcharts/highcharts.js"></script>
<script type="text/javascript" src="/js/hightcharts/themes/grid.js"></script>
<script type="text/javascript" src="/js/modules/exporting.js"></script> 
<script type="text/javascript" src="/js/moment.js"></script> 
<!-- hightchart e -->
<!-- baduapi b -->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=07b13989fabc40b6ed0aeb414fbdc362"></script> 
<script type="text/javascript" src="http://api.map.baidu.com/library/Heatmap/2.0/src/Heatmap_min.js"></script>
<!-- baduapi e -->
<script type="text/javascript" src="/DataJs2.php?YYYY=<?=$YYYY ?>&MM=<?=$MM ?>&DD=<?=$DD ?>&city=<?=$city ?>"></script>
<script type="text/javascript" src="/js/date_date.js"></script>
<script type="text/javascript" language="javascript">
	$(document).ready(function () {
    $(".show").animate({opacity:"show"}).siblings().animate({opacity:"hide"});
	$('#city').children("li").mouseover(function(){
	var classn='.'+ $(this).attr("class")+'d' ;
	var c_i = $(this).attr("rel");
    $('#in_city').attr("value",c_i);
	var info='infoWindow'+(c_i-1);
	timer=window.clearInterval(timer);
	openMyWin(window[info],point[c_i-1]);
	$(classn).css("display","block").siblings().css("display","none");
	});
	});
function CheckLogin(obj){
	if(obj.YYYY.value=='')
	{
		alert('请输入年');
		obj.YYYY.focus();
		return false;
	}
	if(obj.MM.value=='')
	{
		alert('请输入月');
		obj.MM.focus();
		return false;
	}
	if(obj.DD!=null)
	{
		if(obj.DD.value=='')
		{
			alert('请输入日');
			obj.loginauth.focus();
			return false;
		}
	}
	document.forms['form1'].submit();
	return true;
}
 
function displayMenu(mId, level) {
    var liId = 'li_' + mId;
    var openClass = 'open_' + level;
    var closeClass = 'close_' + level;
    if ($('#' + liId).attr('class') == openClass) {
        $('#' + liId).removeClass().addClass(closeClass);
    } else {
        $('#' + liId).removeClass().addClass(openClass);
    }
}
 
$(function(){  
        $("#web").click(function(){  
            if("block" == $("#huangbiao").css("display")){  
                hideLi();  
            }else{  
                showLi();  
            }  
        });  
        $("#city li").each(function(i,v){
 
                $(this).mouseenter(function(){  
                $("#web").val($(this).html()); 
              //  hideLi();  
            });  
        });  
          
        $("#web").blur(function(){  
            setTimeout(hideLi,200);  
        });          
    }      
);
  
function showLi(){  
    $("#huangbiao").show();  
}  
function hideLi(){  
    $("#huangbiao").hide();  
}
</script>
 
<style type="text/css" media="screen">
div#___CONTAINER___Nchart__0{width: 100%;
height: 200;padding: 0;
margin: 0;}
div#___CONTAINER___Nchart__0 img{display: none;
width: 100%;height: 200;}
#huangbiao {
position: absolute;
top: 26px;
right: 6px;
width: 48px;
border: 1px solid #666;
background: #fff;
}
#huangbiao ul{
width: 40px;
}
#huangbiao li {
font-weight: normal;
display: block;
padding: 1px 2px 1px;
white-space: pre;
min-height: 1.2em;
cursor: pointer;
margin: 0px;
width: 44px;
}
#huangbiao li:hover {
background:#008BFF;
}
#___CONTAINER___Nchart__0 img{display: block;}
#___CONTAINER___Nchart__0 embed{display: none;}

</style>
</head>
 
<body onload="openMyWin(infoWindow0,point[0]);">
<div class="wrap">
<?php include("header.php"); ?>
	<div class="main mt_2">
        <table class="mainframe">
            <tbody>
			<tr>
				<td class="side">			
				<?php 
				$chart='';
				include("sidebar.php");
				?>
				</td>
                <td class="content">
<?php include("select.php"); ?>
	<div class="path">
	<a href="/">数据监测</a><em>›</em> <a href="#"><?=$nav_str ?></a>
	</div>
	<div class="bm">
    <div class="box" id="mapbox">
	<div id="map"style="width:762px;height:300px;"></div>
	<div class="city_d">
<?php 
$count_city=count($arr_ma);
for($i=0;$i<$count_city;$i++){
$ii=$i+1;
$show= $city==$ii ? 'show' : '' ;
$class='class="city_'.$i.' '.$arr_ma[$ii].'d '.$show.'"' ;
?>
<div <?=$class ?>>
<!--<?=$arr_city[$ii] ?>数据图表区--> 
<div class="wdt">
<div class="tbt" id="x<?=$ii?>" style="width:762px;height:300px;"></div><div class="clear"></div>
</div>
</div>
<?php 
}
?>
</div>
    </div>
		<div id="dataTable" style="width: auto;"></div>
</div>
                </td>
            </tr>
        </tbody>
		</table>
    </div>
<?php include("footer.php"); ?>	
</div>
<script type="text/javascript">
Highcharts.setOptions({
    global: {useUTC: false}
});
function paserStockData(data,transferDate){
    var ohlc = [],
      volume = [];

    for (var i = 0; i < data.length; i++) {
        if(transferDate||false){
            data[i][0] = moment(data[i][0], 'MM/DD/YYYY HH:mm:ss').toDate().getTime();
        }
        ohlc.push([
            data[i][0], // the date
            data[i][1] // the data
        ]);
    }
    return ohlc;
}
<?php 
for($i=1; $i<$count_city+1 ;$i++){
?>

$(function () {
    $('#x<?=$i ?>').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '<?=date('Y年m月d日', $uday).' '.$arr_city[$i] ?>监测点数据'
        },
        subtitle: {
            text: '含腐蚀度、温度、湿度三组数据'
        },
///////////////////////////////////////////////////////////////////		
	credits:{//版权设置
	enabled:true,                    // 默认值，如果想去掉版权信息，设置为false即可
	text:'www.ecorr.org',               // 显示的文字
	href:'http://www.ecorr.org',   // 链接地址
	position:{                          // 位置设置
		align: 'right',
		x: -10,
		verticalAlign: 'bottom',
		y: -10
	},
	style: {                            // 样式设置
		cursor: 'pointer',
		color: 'gray',
		fontSize: '12px'
	}
	},
	tooltip: {//十字架设置
		//animation: true,
		crosshairs: [{
			width: 1,
			color: 'black'
		}, {
			width: 1,
			color: 'black'
		}],
		shared: true
	},
	legend: {//左上角铭牌设置
		layout: 'vertical',
		align: 'left',
		x: 90,
		verticalAlign: 'top',
		y: 60,
		floating: true,
		backgroundColor: '#FFFFFF'
	},

///////////////////////////////////////////////////////////////////
        xAxis: [{
            maxPadding: 0, minPadding: 0, type: 'datetime', tickWidth: 10,
			  labels: {
                formatter: function() {
                    return Highcharts.dateFormat('%H:%M:%S',this.value);
                }
            }
        }],
        yAxis: [{ // Primary yAxis
		    gridLineWidth: 0,
		    max:null, // 定义Y轴 最大值  
            min:0, // 定义最小值  
            title: {
                text: '环境湿度',
                style: {
                    color: '#89A54E'
                }
            },
            labels: {
                formatter: function() {
                    return this.value +'%';
                },
                style: {
                    color: '#89A54E'
                }
            },

            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
			max:47.8, // 定义Y轴 最大值  
            min:null, // 定义最小值 
            title: {
                text: '环境温度',
                style: {
                    color: '#4572A7'
                }
            },
            labels: {
                formatter: function() {
                    return this.value +'℃';
                },
                style: {
                    color: '#4572A7'
                }
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
			max:null, // 定义Y轴 最大值  
            min:0, // 定义最小值  
            title: {
                text: '腐蚀度',
                style: {
                    color: '#AA4643'
                }
            },
            labels: {
                formatter: function() {
                    return this.value +' nA';
                },
                style: {
                    color: '#AA4643'
                }
            },
            opposite: true
        }],

        series: [{
            name: '环境温度',
            color: '#4572A7',
            type: 'spline',
            yAxis: 1,			
			marker: {
                    enabled: false,
                    states:{
                    	hover:{
                    		enabled: true
                    	}
                    },
                    radius: 1,
                    symbol: 'circle'
                },
            data: paserStockData(<?=$arr_ma[$i].'_te'?>,true),
            tooltip: {
                valueSuffix: ' ℃'
            }
        }, {
            name: '腐蚀度',
            type: 'spline',
            color: '#AA4643',
            yAxis: 2,
			marker: {
                    enabled: false,
                    states:{
                    	hover:{
                    		enabled: true
                    	}
                    },
                    radius: 1,
                    symbol: 'circle'
                },
            data: paserStockData(<?=$arr_ma[$i].'_c'?>,true),

            tooltip: {
                valueSuffix: ' nA'
            }

        }, {
            name: '环境湿度',
            color: '#89A54E',
		    marker: {
                    enabled: false,
                    states:{
                    	hover:{
                    		enabled: true
                    	}
                    },
                    radius: 1,
                    symbol: 'circle'
                },
            type: 'spline',
            data: paserStockData(<?=$arr_ma[$i].'_h'?>,true),
            tooltip: {
                valueSuffix: ' %'
            }
        }]
    });
});
<?php 
}
?>

</script>
<!-- BAIDU map B --> 

<script type="text/javascript">
<?php
//由于现在暂时就一个北京有数据暂时用城市坐标替换
$arr_gps[1]['JD']='39.57596253';
$arr_gps[1]['WD']='116.16875767';
$arr_gps[2]['JD']='39.57596253';
$arr_gps[2]['WD']='116.16875767';
$arr_gps[3]['JD']='36.1052150000';
$arr_gps[3]['WD']='120.3844280000';
$arr_gps[4]['JD']='30.5810840000';
$arr_gps[4]['WD']='114.3162000000';
$arr_gps[5]['JD']='30.3180500000';
$arr_gps[5]['WD']='112.2511420000';
$arr_gps[6]['JD']='23.1200490000';
$arr_gps[6]['WD']='113.3076500000';
$arr_gps[7]['JD']='19.2148300000';
$arr_gps[7]['WD']='110.4143590000';


//GPS数据存放的文档
$txtname_gps ='updLocation.txt';

for($i = 1; $i<$count_city+1 ;$i++){
$gps_or = my_gps($txtname_gps,$arr_siteid[$i],$arr_sitelm[$i]) ;  //3958.429258,N,11620.528075,E (E东经，N北纬)
if($gps_or){
$arr_gps_or=explode(',',$gps_or);
$arr_gps[$i]['JD']=$arr_gps_or[0] ;
$arr_gps[$i]['WD']=$arr_gps_or[2] ;
}
}
?>

var map = new BMap.Map("map");          // 创建地图实例
//创建和初始化地图函数：
function initMap(){
        addMarker();//向地图中添加marker
    }
map.centerAndZoom(new BMap.Point(<?=$arr_gps['1']['WD'].','.$arr_gps['1']['JD'] ?>), 15);     // 初始化地图,设置中心点坐标和地图级别

//坐标点数组
var point = [
<?php 
for($i=1;$i<$count_city;$i++){
echo '';
?>
new BMap.Point(<?=$arr_gps[$i]['WD'].','.$arr_gps[$i]['JD'] ?>),
<?php 
}
?>
new BMap.Point(<?=$arr_gps[$count_city]['WD'].','.$arr_gps[$count_city]['JD'] ?>)
];

setTimeout(function(){
map.setCenter(point[<?=$city-1 ?>]);//设置地图中心点。center除了可以为坐标点以外，还支持城市名//0,1,2,3,4,5,6
map.setZoom(7);  //将视图切换到指定的缩放等级，中心点坐标不变    
}, 1500);

map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
map.addControl(new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT}));   //右下角，打开
map.enableScrollWheelZoom();                            //启用滚轮放大缩小
map.addControl(new BMap.MapTypeControl());          //添加地图类型控件

var myIcon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(23, 25), {    //标识图片
    imageOffset: new BMap.Size(-46,-20)    //图片的偏移量。为了是图片底部中心对准坐标点。
  });


<?php 
for($i=0;$i<$count_city;$i++){
?>
var marker<?=$i?> = new BMap.Marker(point[<?=$i?>],{icon:myIcon}); // 创建xx个标注
map.addOverlay(marker<?=$i?>);// 将标注添加到地图中
<?php 
}
?>

//调整地图的最佳视野为显示标注数组point
map.setViewport(point);
<?php 
$txt_tm='updDatetime.txt';
for($i=0;$i<$count_city;$i++){
$ii=$i+1;
?>
var opts<?=$i ?> = {offset : new BMap.Size(0, -2), title : '<span style="font-size:12px;color:#0A8021"><a href="<?='/data_str.php?city='.$ii ?>"><?=$arr_city[$ii] ?> <?=my_gps($txt_tm,$arr_siteid[$ii],$arr_sitelm[$ii]) ?></a></span>'}; 
<?php 
}
?> 
//创建信息窗口对象，引号里可以书写任意的html语句。
<?php 
$txt_h='updHumidity_env.txt';
$txt_te='updTemperature_env.txt';
$txt_c='updCorrosion.txt';
for($i=0;$i<$count_city;$i++){
$ii=$i+1;
?>
var infoWindow<?=$i ?> = new BMap.InfoWindow("<div class='avatar_list' style='width:270px;line-height:1.4em;font-size:12px;'><P style='color:#F40;font-weight: 700;'>腐蚀电流：<?=my_gps($txt_c,$arr_siteid[$ii],$arr_sitelm[$ii]) ? my_gps($txt_c,$arr_siteid[$ii],$arr_sitelm[$ii]) : 'N/A' ?>；温度：<?=my_gps($txt_te,$arr_siteid[$ii],$arr_sitelm[$ii]) ? my_gps($txt_te,$arr_siteid[$ii],$arr_sitelm[$ii]) : 'N/A' ?>；湿度：<?=my_gps($txt_h,$arr_siteid[$ii],$arr_sitelm[$ii]) ? my_gps($txt_h,$arr_siteid[$ii],$arr_sitelm[$ii]) :'N/A' ?></P></div>", opts<?=$i ?>);
marker<?=$i ?>.addEventListener("mouseover", function(){
this.openInfoWindow(infoWindow<?=$i ?>);
//map.setCenter(point[<?=$i ?>]);
 $(".city_<?=$i ?>").css("display","block").siblings().css("display","none");
 $(".ctop").text($(".url<?=$i ?>").text()).attr('href',$(".url<?=$i ?>").attr("href")) ;
 $(".dd").attr('href','/?city=<?=$ii ?>&t=d');
 $(".dm").attr('href','/?city=<?=$ii ?>&t=m');
 $(".dy").attr('href','/?city=<?=$ii ?>&t=y'); 
});
marker<?=$i ?>.addEventListener("click", function(){
window.open("<?='/data_str.php?city='.$ii.'&t='.$t ?>"); 
});
<?php 
}
?>
 
function openMyWin(id,p){
    map.openInfoWindow(id,p);
	map.setCenter(p);
}
var ind = 1;
var timer = null;
function show(){
    timer = setInterval(function(){
        if(ind == 6){
            ind = 0;        //当轮播到最后一个信息窗口时，把计数器至为0
        }
	var name = "infoWindow"+ind;   //生成函数名
        map.openInfoWindow(window[name],point[ind]);
		map.setCenter(point[ind]);
        ind++;
    },8000);	//轮播时间	
}
show();
var div_array = document.getElementsByName("myname");
for(i=0; i < div_array.length ; i++)
{
div_array[i].onmouseover=function(){
timer=window.clearInterval(timer);
}
div_array[i].onmouseout=function(){
show();
}		 
}
document.getElementById("mapbox").onmouseover=function(){
timer=window.clearInterval(timer);
}	
document.getElementById("mapbox").onmouseout=function(){
show();
}
</script>
<!-- BAIDU map E -->
</body>
</html>
