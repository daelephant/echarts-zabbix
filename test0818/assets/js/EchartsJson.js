  	 function needMap() {
		  	 	 var href = location.href;
		  	 	 return href.indexOf('map') != -1
						|| href.indexOf('mix3') != -1
						|| href.indexOf('mix5') != -1
						|| href.indexOf('dataRange') != -1;

		  	 }

		  	 var fileLocation = needMap() ? 'assets/js/echarts-map' : 'assets/js/echarts';
		  	 require.config({
		  	 	 paths: {
		  	 	 	 echarts: fileLocation,'echarts/assets/js/pie': fileLocation, 
					 'echarts/assets/js/map': fileLocation,
		  	 	 }
		  	 });

		  	 require(
						[
							'echarts','echarts/chart/pie',needMap() ? 'echarts/chart/map' : 'echarts'
						],
						 DrawCharts
			    );
		  	 function DrawCharts(ec) {
		  	 	 FunDraw2(ec);
		  	 	 FunDraw1(ec);
		  	 	
		  	 }
		  
		  	 function FunDraw1(ec) {
		  	 	 //---地图饼状图 ---
		  	 	 var mapChart = ec.init(document.getElementById('mapPieCharts'));
		  	 	 mapChart.showLoading({text: "加载中...请等待" });
		  	 	 mapChart.hideLoading();
		  	 	 var seriesMapData;
		  	 	 var seriesPieData;
		  	 	 var legendData;
		  	 	 $.ajax({
		  	 	 	 type: "post",
		  	 	 	 async: false, //同步执行
		  	 	 	 url: "SearchHandler.ashx?MapPieType=MapPieChart",
		  	 	 	 dataType: "json",
		  	 	 	 success: function (result) {
		  	 	 	 	 seriesMapData = eval('(' + result.split('_')[0] + ')');
		  	 	 	 	 seriesPieData = eval('(' + result.split('_')[1] + ')');
		  	 	 	 	 legendData = eval('(' + result.split('_')[2] + ')');
		  	 	 	 },
		  	 	 	 error: function (errorMsg) {
		  	 	 	 	 alert("全国各省份订单销售量统计数据请求失败。");
		  	 	 	 }
		  	 	 });
		  	 	 mapChart.setOption({
		  	 	 	 title: {
		  	 	 	 	 text: new Date().getFullYear() + '全国各省份订单销售量统计（月/单）',
		  	 	 	 	 subtext: '数据来自WMS统计'
		  	 	 	 },
		  	 	 	 tooltip: {
		  	 	 	 	 trigger: 'item'
		  	 	 	 },
		  	 	 	 legend: {
		  	 	 	 	 x: 'right',
		  	 	 	 	 selectedMode: false,
		  	 	 	 	 data: legendData
		  	 	 	 },
		  	 	 	 dataRange: {
		  	 	 	 	 orient: 'horizontal',
		  	 	 	 	 min: 0,
		  	 	 	 	 max: 200,
		  	 	 	 	 text: ['购买力强', '低'],
		  	 	 	 	 splitNumber: 0, 
		  	 	 	 	 color: ['orangered', 'yellow', 'lightskyblue']
		  	 	 	 },
		  	 	 	 animation: false,
		  	 	 	 series: [
								{
				 					name: new Date().getFullYear() + '全国各省份订单销售量',
				 					type: 'map',
				 					mapType: 'china',
				 					mapLocation: {x: 'left'},
				 					selectedMode: 'multiple',
				 					itemStyle: {
				 	 					normal: { label: { show: true } },
				 	 					emphasis: { label: { show: true } }
				 					},
				 					data: seriesMapData
								},
								{
				 					name: new Date().getFullYear() + '全国各省份订单销售量',
				 					type: 'pie',
				 					roseType: 'area',
				 					tooltip: {
				 	 					trigger: 'item',
				 	 					formatter: "{a} <br />{b} : {c} ({d}%)"
				 					},
				 					center: [document.getElementById('mapPieCharts').offsetWidth - 250, 225],
				 					radius: [30, 120],
				 					data: seriesPieData
								}
		  	 	 	 ]
		  	 	 });

		  	 }

		  	 function FunDraw2(ec) {
		  	 	 //--- 柱状图 ---
		  	 	 var myChart = ec.init(document.getElementById('barCharts'));
		  	 	 myChart.showLoading({
		  	 	 	 text: "加载中...请等待"
		  	 	 });
		  	 	 myChart.hideLoading();
		  	 	 myChart.setOption({
		  	 	 	 title: {
		  	 	 	 	 text: '本月每天订单数量统计（单）[周日除外]',
		  	 	 	 	 subtext: '数据来自WMS统计'
		  	 	 	 },
		  	 	 	 tooltip: {
		  	 	 	 	 trigger: 'item',
		  	 	 	 	 axisPointer: {
		  	 	 	 	 	 type: 'shadow'
		  	 	 	 	 }
		  	 	 	 },
		  	 	 	 legend: {
		  	 	 	 	 data: [],
		  	 	 	 	 x: 'right',
		  	 	 	 },
		  	 	 	 toolbox: {
		  	 	 	 	 show: true, orient: 'vertical',
		  	 	 	 	 y: 'center',
		  	 	 	 	 feature: {
		  	 	 	 	 	 magicType: { show: true, type: ['line', 'bar'] },
		  	 	 	 	 	 restore: { show: true },
		  	 	 	 	 	 saveAsImage: { show: true }
		  	 	 	 	 }
		  	 	 	 },
		  	 	 	 calculable: true,
		  	 	 	 xAxis: { data: [], orient: 'vertical' },
		  	 	 	 yAxis: { type: 'value' },
		  	 	 	 series: []
		  	 	 });
		  	 	 // 通过Ajax获取数据
		  	 	 $.ajax({
		  	 	 	 type: "post",
		  	 	 	 async: false, //同步执行
		  	 	 	 url: "SearchHandler.ashx?BarType=BarChart",
		  	 	 	 dataType: "json", //返回数据形式为json
		  	 	 	 success: function (result) {
		  	 	 	 	 if (result) {
		  	 	 	 	 	 //将返回的category和series对象赋值给options对象内的category和series
		  	 	 	 	 	 myChart._option.xAxis.data = result.category;
		  	 	 	 	 	 myChart._option.series = result.series;
		  	 	 	 	 	 myChart._option.legend.data = result.legend;
		  	 	 	 	 	 myChart.hideLoading();
		  	 	 	 	 	 myChart.setOption(myChart._option);
		  	 	 	 	 }
		  	 	 	 },
		  	 	 	 error: function (errorMsg) {
		  	 	 	 	 alert("每月订单数量统计数据请求失败。");
		  	 	 	 }
		  	 	 });

		  	 }