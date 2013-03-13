/*
 * 作者:剧中人
 * 博客：http://bh-lay.com/
 * Copyright (c) 2012-2018 小剧客栈
**/
function showTopicList(){
	for(var i=0;i<$('.state').length;i++){
		if($('.state').eq(i).html()=='未发布'){$('.state').eq(i).addClass('off');}
	}
	$('.topicList ul li').mouseenter(function(){
		$(this).addClass('focus');
	}).mouseleave(function(){
		$(this).removeClass('focus');
	});
}
$.fn.autoKey=function(){
	var searchBox = $(this);
	var title=searchBox.val(); 
	searchBox.click(function(){if(searchBox.val()==title){searchBox.val("");}}).blur(function(){if(searchBox.val()==""){searchBox.val(title);}}); 
	return searchBox;
}
function checkForm(){
	$('#topicCreate .rootName input').blur(function(){
		$("#topicCreate .topicLink .input").html('/zt/'+$('#topicCreate .rootName input').val()+'.html');
	});

    $("#topicCreate").submit(function(){
		if($('#topicCreate .rootName input').val()==""){
			alert('专题英文名称必须填写');
		}
	}); 
}

$(document).ready(function(){
	if($('.topicList').length>0){showTopicList()}
	$('#keyboard').autoKey();
	$('.addTopic').click(function(){
		$('.addTopicBox').slideDown('400').append('<div class="close">X</div>');
		$('.close').click(function(){
			$(this).parent().slideUp('100');
        });
		$('#title').val('');
		$('#name').val('').removeAttr('disabled');
		$('.topicLink .input').html('');
		$('#topicid').val('');
		$(".topicLink .input").html('');
	});
	checkForm();
});

function edit(topicid,title,name){
	$('.addTopic').click();
	$("#topicid").val(topicid);
	$("#title").val(title);
	$("#name").val(name).attr('disabled','disabled');
	$(".topicLink .input").html('/zt/'+name+'.html');
}

function save(){
	$.post('?act=save',{topicid:$("#topicid").val(),title:$("#title").val(),name:$("#name").val()},function(data){
		switch(data.code){
			case 1:
				alert('操作成功');
				location.reload();
				break;
			default:
				alert(data.msg);
				break;
		}
	},'json');
}

function del(topicid){
	if(confirm('确定要删除吗?')){
		$.post('?act=del',{topicid:topicid},function(data){
			switch(data.code){
				case 1:
					alert('操作成功');
					location.reload();
					break;
				default:
					alert(data.msg);
					break;
			}
		},'json');	
	}
}

function unpublish(topicid){
	$.post('?act=unpublish',{topicid:topicid},function(data){
		switch(data.code){
			case 1:
				alert('操作成功');
				location.reload();
				break;
			default:
				alert(data.msg);
				break;
		}
	},'json');
}

function page(name,value){
	var keyValue = name+"="+value;
	var search = location.search;
	if(search.length>0){
		var arr = search.slice(1).split("&");
		for(var i in arr){
			var pair = arr[i].split("=");
			if(pair[0]==name){
				arr[i] = keyValue;
				keyValue = "";
				break;
			}
		}
		if(keyValue!=""){
			arr[arr.length] = keyValue;
		}
		search = arr.join("&");
	}else{
		search = keyValue;
	}
	location.search = "?"+search;
}

function reset(){
	
}

