(function () {
    var htmlText = '',
    	arr1=[],
    	arr2=[],
    	distance=[];
    for (var i = 0; i < info.length; i++) {
        htmlText +=
            '<li>' +
            '<div class="textBox">' +
            '<div class="img"></div>' +
            '<div class="text">' +
            '<h3 class="name">' + info[i].name + '</h3>' +
            '<p class="address">' + info[i].address+ '</p>' +
            '<p class="time">'+"营业时间:  &nbsp;8:30-22:30"+'</p>' +
            '<div class="distance"></div>' +
            '</div>' +
            '<div class="btnBox">' +
            '<a href="tel:' + info[i].tel + '" class="phone">预定</a>' +
            '<span class="nav" data-mapx="' + info[i].mapX + '" data-mapy="' + info[i].mapY + '">导航</span>' +
            '</div>' +
            '</li>';
            arr1.push(info[i].mapX);//经度
            arr2.push(info[i].mapY);//
            
    }
    $('#content').append(htmlText);
    //获取当前坐标
		var d=document.querySelectorAll(".distance");
		var	lat=document.querySelector(".lat"),//用来测试当前坐标
//			s=document.querySelector(".cc"),//用来测试目的地坐标及距离
//			di=document.querySelector(".di"),
			lat2="",
	    	lng2="",
	        r="",
	        cX="",
	        cY="";
	    //针对 ios10无法访问地理授权
		var options = {
		        enableHighAccuracy: true,
		        maximumAge: 30000,
		        timeout: 12000
		    }
	
	    window.locationCallback = function(err, position){
	        if (err) {
	            showError(err);
	            return ;
	        }
	        showPosition(position);
	    }
	        
	
	    var str = '<iframe src="javascript:(function(){ '
	            +'window.navigator.geolocation.getCurrentPosition('
	            +'function(position){parent && parent.locationCallback && parent.locationCallback(null,position);}, '
	            +'function(err){parent && parent.locationCallback && parent.locationCallback(err);}, '
	            +'{enableHighAccuracy : '+ options.enableHighAccuracy +', maximumAge : '+ options.maximumAge +', timeout :'+ options.timeout +'})'
	            +';})()" style="display:none;"></iframe>';
	    $(str).appendTo('body');
	    if (navigator.geolocation)
		    {
				navigator.geolocation.getCurrentPosition(showPosition,showError);
		}

		function getLocation(){
				var a=lat.innerHTML.split(",");//取出当前坐标，把当前坐标分离出来
				var lat1=parseFloat(a[0]);//当前经度
				var lng1=parseFloat(a[1]);//当前纬度   经过测试，四个值类型均为number
//				var lat1=121.509281;
//				var lng1=31.306095;
			    for(var j=0;j<d.length;j++){			    
			    	lat2=parseFloat(arr1[j]);
		    	    lng2=parseFloat(arr2[j]);
//					lat2=121.403144;
//					lng2=31.628695;
					r=getDisance(lng1, lat1, lng2, lat2);	//此方法获取到的r值为NaN
//					r=getDisance(31.306095,121.509281,31.628695,121.403144);
//					s.innerHTML=lat2+","+lng2;
//					s.innerHTML=r;
		    		d[j].innerHTML=r+"KM";
		    
		   }
		}  
		function showPosition(position){	
		  	cX=position.coords.longitude;//当前经度 121.508806
		  	cY=position.coords.latitude;//当前纬度  31.305023
		    lat.innerHTML=cX+","+cY;
		    getLocation();
		}
		function showError(error){
	        switch(error.code) {
	            case error.PERMISSION_DENIED:
	                alert('用户不允许地理定位!');
	                break;
	            case error.POSITION_UNAVAILABLE:
	                alert('无法获取当前位置!');
	                break;
	            case error.TIMEOUT:
	                alert('操作超时!');
	                break;
	            case error.UNKNOWN_ERROR:
	                alert('未知错误！');
	                break;
	        }
    }
			
		
		
	//计算距离
	function toRad(d) {  return d * Math.PI / 180; }
	function getDisance(lat1, lng1, lat2, lng2) { //lat为纬度, lng为经度, 一定不要弄错
	    var dis = 0;
	    var radLat1 = toRad(lat1);
	    var radLat2 = toRad(lat2);
	    var deltaLat = radLat1 - radLat2;
	    var deltaLng = toRad(lng1) - toRad(lng2);
	    var dis = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(deltaLat / 2), 2) + Math.cos(radLat1) * Math.cos(radLat2) * Math.pow(Math.sin(deltaLng / 2), 2)));
	    return (dis * 6378.137).toFixed(0);
	} 
//	g=getDisance(31.306095,121.509281,31.628695,121.403144)
//	di.innerHTML=g
//	跳转到地图
    $('.nav').on('click', function (event) {
    	var maker=$(this).attr("data-mapy")+","+$(this).attr("data-mapx"),
    	    title=$(this).parent().siblings().children(".text").children(".name").text(),
    		addr=$(this).parent().siblings().children(".text").children(".address").text(),
 			url="http://apis.map.qq.com/tools/poimarker?type=0&marker=coord:"+maker+";title:"+title+";addr:"+addr+"&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77&referer=myapp";
			window.location.href=url;
    });
}());