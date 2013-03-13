<?php

/**
 * 例子
 * 
 * 
$_form ['content'] = $model -> text;
$_form ['uploadUrl'] = $this->createUrl ( '/news/admin/upload' );
 
$_form ['fileUpload'] = $this->createUrl ( '/news/admin/fileUpload' );
$_form ['accessPath'] = Yii::app ()->params ['imgPath'];
$_form ['fileAccessUrl'] = Yii::app ()->params ['fileAccessPath'];
 		<?php
		
		$this->widget ( 'ext.ueditor.Ueditor', array (
				'getId' => 'content_editor',
				'UEDITOR_HOME_URL' => "/",
				'options' => 'filePath:"'.$_form['fileAccessUrl'].'",fileUrl:"'.$_form['fileUpload'].'",imageUrl:"' .$_form ['uploadUrl'] . '",toolbars:[["fullscreen","source","undo","redo","insertunorderedlist","insertorderedlist","unlink","cleardoc","selectall","searchreplace","preview","help","separate","gmap","pagebreak","insertimage","scrawl","music","snapscreen","emotion","insertvideo","insertframe","attachment","date","time","wordimage","map","webapp","horizontal","anchor","spechars","blockquote","highlightcode","template","background","imagecenter","imageright","imageleft","imagenone","fontsize","fontfamily","rowspacingtop","lineheight","rowspacingbottom","paragraph","bold","italic","underline","strikethrough","forecolor","backcolor","superscript","subscript","justifycenter","justifyleft","justifyright","justifyjustify","touppercase","tolowercase","directionalityrtl","indent","directionalityltr","removeformat","formatmatch","customstyle","pasteplain","autotypeset","inserttable","deletetable","mergeright","mergedown","splittorows","splittocols","splittocells","mergecells","insertrow","insertcol","deleterow","deletecol","insertparagraphbeforetable"],[]],wordCount:false,elementPathEnabled:false,imagePath:"' . $_form ['accessPath'] . '",initialFrameWidth:"auto",initialContent:"'.$_form['content'].'"' 
		) );
		
		?>

 */

/**
 * 
 */
class Ueditor extends CInputWidget 
{
	
	/******* widget private vars *******/
	private $baseUrl			= null;
	private $jsFiles			= array(
									'/editor_config.js',
									'/editor_all_min.js',
								);
	private $cssFiles			= array(
									'/themes/default/ueditor.css',
								);							
								
	public $getId = 'editor';

	public $options = NULL;
	
	public $UEDITOR_HOME_URL = '../';
	
								
	/**
	* Initialize the widget
	*/
	public function init()
	{
		//Publish assets
		$this->publishAssets();
		$this->registerClientScripts();
		parent::init();
	}
	
	/**
	* Publishes the assets
	*/
	public function publishAssets()
	{
		$dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ueditor';
		$this->baseUrl = Yii::app()->getAssetManager()->publish($dir);
	}
	
	/**
	* Registers the external javascript files
	*/
	public function registerClientScripts()
	{
		
		if ($this->baseUrl === '')
			throw new CException(Yii::t('Ueditor', 'baseUrl must be set. This is done automatically by calling publishAssets()'));
		
		//Register the main script files
		$cs = Yii::app()->getClientScript();
		foreach($this->jsFiles as $jsFile) {
			$ueditorJsFile = $this->baseUrl . $jsFile;
			$cs->registerScriptFile($ueditorJsFile, CClientScript::POS_HEAD);
		}
		
		// add the css
		foreach($this->cssFiles as $cssFile) {
			$ueditorCssFile = $this->baseUrl . $cssFile;
			$cs->registerCssFile($ueditorCssFile);
		}
		//Register the widget-specific script on ready
		 $js = $this->generateOnloadJavascript();
		$cs->registerScript('ueditor'.$this->getId, $js, CClientScript::POS_END);
	}
	
	protected function generateOnloadJavascript()
	{
		$js = "var editor = new baidu.editor.ui.Editor({UEDITOR_HOME_URL:'".$this->baseUrl.$this->UEDITOR_HOME_URL."',".$this->options."});";	
		$js.= "editor.render('$this->getId');";	
		return $js;
	}

	/**
	* Run the widget
	*/
	public function run()
	{
			
		parent::run();
	}
}
