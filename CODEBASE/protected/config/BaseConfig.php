<?php

/**
 *
 * @author alan_shen
 *��������
 *
 */
abstract class BaseConfig {
    
    /**
     * ʵ�����õ��ļ�
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