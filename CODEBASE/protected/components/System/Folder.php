<?php
class Folder extends CComponent {
    
    /**
     * ����������Դ
     *
     * @var FOLDER_ALL
     */
    Const FOLDER_ALL = 0;
    /**
     * ���������ļ���Դ
     *
     * @var FOLDER_ALL
     */
    Const FOLDER_ONLY_FILE = 1;
    /**
     * ���������ļ�����Դ
     *
     * @var FOLDER_ALL
     */
    Const FOLDER_ONLY_FOLDER = 2;
    
    public function init() {
        ;
    }
    
    /**
     * �����ļ����µ���Դ
     *
     * @param string $folderPath
     */
    public function openFolder($folderPath, $level = self::FOLDER_ALL) {
        if (is_dir ( $folderPath )) {
            $ary_dir = array ();
            $_fp = opendir ( $folderPath );
            while ( ($_dirname = readdir ( $_fp )) ) {
                if (! in_array ( $_dirname, array (
                        '.',
                        '..'
                ) )) {
                    $_path = $folderPath . DIRECTORY_SEPARATOR . $_dirname;
                    switch ($level) {
                        case self::FOLDER_ALL :
                            $ary_dir [] = $_dirname;
                            break;
                        case self::FOLDER_ONLY_FILE :
                            if (is_file ( $_path ))
                                $ary_dir [] = $_dirname;
                            break;
                        case self::FOLDER_ONLY_FOLDER :
                            if (is_file ( $_path ))
                                $ary_dir [] = $_dirname;
                            break;
                    }
                }
            }
            return $ary_dir;
        }
        throw new ErrorException ( $folderPath . ": Folder not exists ! " );
    }
}