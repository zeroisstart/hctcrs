<?php
/**
 *
 * @author alan_shen
 *
 */

require 'BaseConfig.php';

class Config {
    
    /**
     * 开发环境
     *
     * @var string DEVELOP
     */
    Const DEVELOP = 'develop';
    /**
     * 测试开发环境
     *
     * @var string TEST
     */
    Const TEST = 'test';
    /**
     * 生产环境
     *
     * @var string PRODUCT
     */
    Const PRODUCT = 'product';
    
    /**
     * 自动检测开发环境
     *
     * @var integer AUTO
     */
    Const AUTO = 0;
    
    /**
     * 环境变量key
     *
     * @var string ENVKEY
     */
    Const ENVKEY = 'AppStrategy';
    
    /**
     * 开发场景
     *
     * @var string $appStrategy
     */
    public $appStrategy;
    
    private $_default = 0;
    
    public function __construct($_strategy = self::AUTO) {
    
    }
    /**
     * 获取开发等级
     *
     * @return string
     */
    public function GetLevel() {
        return getenv ( self::ENVKEY );
    }
    /**
     * 设置开发等级
     *
     * @param string $level
     * @return boolean
     */
    public function SetLevel($level) {
        return putenv ( self::ENVKEY . '=' . $level );
    }
    /**
     */
    public function GetConfigs() {
        $level = ($this->GetLevel ());
        $Path = dirname ( __FILE__ );
        $ConfigClass = ucfirst ( $level ) . 'Config';
        $ConfigClassFile = $Path . DIRECTORY_SEPARATOR . $ConfigClass  . '.php';
        if (file_exists ( $ConfigClassFile )) {
            require $ConfigClassFile;
            return new $ConfigClass ();
        }
        return false;
    }
}
