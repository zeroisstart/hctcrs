<?php

/**
 *
 * @author alan_shen
 *基类配置
 *
 */
abstract class BaseConfig {
    
    /**
     * 实际配置的文件
     *
     * @var string $_configFile
     */
    protected $_configFile;
    
    public function __construct() {
        $this->_configFile = $this->getConfigFile ();
    }
    
    public function getConfigs() {
        return require $this->_configFile;
    }
    
    public function getConfigFile() {
        return rtrim ( get_class ( $this ), 'Config' ) . '.php';
    }
}