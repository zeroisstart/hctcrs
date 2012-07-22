<?php
class ToolMap extends CWidget {
    
    /**
     * 控制器目录
     *
     * @var $_controllerPath
     */
    protected $_controllerPath = false;
    
    /**
     * 控制器action 集合
     *
     * @var $_controllerRoutes
     */
    protected $_controllerRoutes = array ();
    
    public function init() {
        if (empty ( $this->_controllerRoutes )) {
            $_app = Yii::app ();
            // 设置控制器在的目录
            $this->_controllerPath = $_controllerPath = $_app->ControllerPath;
            // 文件夹组件
            $folder = Yii::app ()->Folder;
            // 打开这个文件夹获取所有资源
            $ary_folder = $folder->openFolder ( $_controllerPath, FOLDER::FOLDER_ONLY_FILE );
            foreach ( $ary_folder as $_name ) {
                $_controllerRoutes [str_replace ( 'Controller.php', '', $_name )] = $_name;
            }
            $rtn_ary = $this->_GetControllerActions ( $_controllerRoutes );
            $this->_controllerRoutes = $rtn_ary;
        }
    }
    
    protected function _GetControllerActions(array $_routePath) {
        $rtn_ary = array ();
        foreach ( $_routePath as $_contrllerName => $_fileName ) {
            $_className = str_ireplace ( '.php', '', $_fileName );
            $_classFile = $this->_controllerPath . DIRECTORY_SEPARATOR . $_fileName;
            if (! class_exists ( $_className, false ))
                require ($_classFile);
            $class = new $_className ( $_contrllerName );
            $Relection = new ReflectionClass ( $class );
            foreach ( $Relection->getMethods () as $method ) {
                if (($_action = $this->_isAction ( $method->getName () ))) {
                    $rtn_ary [$_contrllerName] [] = $_contrllerName . '/' . $_action;
                }
            }
        }
        return $rtn_ary;
    }
    
    /**
     * 判断当前函数是否为Action
     *
     * @param string $actionName
     */
    protected function _isAction($actionName) {
        return preg_match ( '/^action*/', $actionName ) && $actionName != 'actions' ? substr ( $actionName, 6 ) : false;
    }
    
    protected function _registerClient() {
        $_css = array ();
        $_js = array (
                'js/tool/toolMap.js'
        );
        Yii::app ()->clientScript->registerCoreScript ( 'jquery' );
        Yii::app ()->clientScript->_registerCSS ( $_css );
        Yii::app ()->clientScript->_registerJS ( $_js );
    }
    
    public function run() {
        $this->_registerClient ();
        $this->render ( 'views._widget.System.ToolMap', array (
                'controllerRoutes' => ( array ) $this->_controllerRoutes
        ) );
    }
}