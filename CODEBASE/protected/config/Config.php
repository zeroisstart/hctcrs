<?php
/**
 *
 * @author alan_shen
 *
 */

require 'BaseConfig.php';

class Config {
    
    /**
     * ��������
     *
     * @var string DEVELOP
     */
    Const DEVELOP = 'develop';
    /**
     * ���Կ�������
     *
     * @var string TEST
     */
    Const TEST = 'test';
    /**
     * ��������
     *
     * @var string PRODUCT
     */
    Const PRODUCT = 'product';
    
    /**
     * �Զ���⿪������
     *
     * @var integer AUTO
     */
    Const AUTO = 0;
    
    /**
     * ��������key
     *
     * @var string ENVKEY
     */
    Const ENVKEY = 'AppStrategy';
    
    /**
     * ��������
     *
     * @var string $appStrategy
     */
    public $appStrategy;
    
    private $_default = 0;
    
    public function __construct($_strategy = self::AUTO) {
    
    }
    /**
     * ��ȡ�����ȼ�
     *
     * @return string
     */
    public function GetLevel() {
        return getenv ( self::ENVKEY );
    }
    /**
     * ���ÿ����ȼ�
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
