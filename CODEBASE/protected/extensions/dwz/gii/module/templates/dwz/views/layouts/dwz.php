<?php echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->pageTitle; ?> - 后台管理-DWZ - <?php echo Yii::app()->name; ?></title>
</head>
<?php $this->widget("ext.dwz.DwzWidget"); ?>
<body>
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<img src="/images/logo1.png" title="<?php echo Yii::app()->name; ?> 后台管理"/>
				<ul class="nav">
					<li id="switchEnvBox"><a href="javascript:">（<span>北京</span>）切换角色</a>
						<ul>
							<li><a href="sidebar_bj.html">北京</a></li>
							<li><a href="sidebar_sh.html">上海</a></li>
							<li>这个是会切换左边栏显示的，具体请看DWZ官方例子,根据需要来改或删除这里！</li>
						</ul>
					</li>
					<li><a href="changepwd.html" target="dialog">设置</a></li>
					<li><a href="http://bbs.dwzjs.com" target="_blank">论坛</a></li>
					<li><?php echo CHtml::link("退出",array("/site/logout")); ?></li>
				</ul>
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
				</ul>
			</div>
		</div>

		<div id="leftside">
		<div id="sidebar_s">
			<div class="collapse">
				<div class="toggleCollapse"><div></div></div>
			</div>
		</div>
		<div id="sidebar">
			<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>
			<?php $this->widget("ext.dwz.DwzAccordion", array(
				"items"=>array(
					"常用管理"=>$this->renderPartial("menu_tree",null,true),
				),
				))?>
		</div>
		</div>
		<div id="container">
			<?php $this->widget("ext.dwz.DwzNavTab", array(
				"tabs"=>array(
					"管理区首页"=>$this->renderPartial("index",null,true),
				),
				"htmlOptions"=>array("class"=>"a b"),
				)); ?>
		</div>
	</div>

	<div id="footer">Copyright &copy; 2010</div>

<!--以下为默认页面布局附加元素-->
<div id="taskbar" style="left:0px; display:none;">
	<div class="taskbarContent">
		<ul></ul>
	</div>
	<div class="taskbarLeft taskbarLeftDisabled" style="display:none;">taskbarLeft</div>
	<div class="taskbarRight" style="display:none;">taskbarRight</div>
</div>
<div id="splitBar"></div>
<div id="splitBarProxy"></div>
<!--拖动效果-->
	<div class="resizable"></div>
<!--阴影-->
	<div class="shadow" style="width:508px; top:148px; left:296px;">
		<div class="shadow_h">
			<div class="shadow_h_l"></div>
			<div class="shadow_h_r"></div>
			<div class="shadow_h_c"></div>
		</div>
		<div class="shadow_c">
			<div class="shadow_c_l" style="height:296px;"></div>
			<div class="shadow_c_r" style="height:296px;"></div>
			<div class="shadow_c_c" style="height:296px;"></div>
		</div>
		<div class="shadow_f">
			<div class="shadow_f_l"></div>
			<div class="shadow_f_r"></div>
			<div class="shadow_f_c"></div>
		</div>
	</div>
	<!--遮盖屏幕-->
	<div id="alertBackground" class="alertBackground"></div>
	<div id="dialogBackground" class="dialogBackground"></div>
	<div id="background" class="background"></div>
	<div id="progressBar" class="progressBar">数据加载中，请稍等...</div>
<!--附加元素结束-->
</body>
</html>
';