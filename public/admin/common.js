var $,layer,element,form;
layui.use(['element','layer','jquery','form'], function(){
	element = layui.element;
	layer = layui.layer;
	$ = layui.$;
	form = layui.form;
});
//template.config('escape', false);
template.config('openTag', '<%');
template.config('closeTag', '%>');
// 弹出页面
function layerPage(id,data,title) {
	var content = template(id,data);
	var index = layer.open({
		type: 1,
		offset: '200px',
		title: title?title:'编辑中...',
		area: ['60%'],
		content: content,
		yes: function() {

		}
	});
	form.render();
	return index;
}
// 网络请求
function request(url,d,m,type) {
	$.ajax({
		url: _global.url.api + url,
		method: type?type:'post',
		data: d,
		success: function(res) {
			console.log(res);
			if (typeof m == 'function') {
				m(res);
			}
		},
		fail: function() {
			layer.msg(url + '请求未响应');
		}
	})
}
// 数组对象转,字符串
function arr2str(arr,key) {
	var res = '';
	for (var i = 0,len = arr.length; i < len; i++) {
		if (i == len - 1) {
			res += arr[i][key];
		} else {
			res += arr[i][key] + ',';
		}
	}
	return res;
}

// 数组删除value
function arrDel(arr,val) {
	var res = [];
	for (var i = 0,len = arr.length; i < len; i++) {
		if (arr[i] != val) {
			res.push(arr[i]);
		}
	}
	return res;
}