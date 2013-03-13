<?php
/**
 * 
 * @author Top
 *
 */
class UploadedFile extends CUploadedFile {
	
	/**
	 * 返回上传的目录
	 *
	 * @return boolean string
	 */
	public static function getFolder($uploadFolder = false) {
		if ($uploadFolder) {
			$pathStr = $uploadFolder;
		} else {
			$pathStr = Yii::app ()->params ['uploadPath'];
		}
		if (strrchr ( $pathStr, "/" ) != "/") {
			$pathStr .= "/";
		}
		$pathStr .= date ( "Ymd" );
		if (! file_exists ( $pathStr )) {
			if (! mkdir ( $pathStr, 0777, true )) {
				return false;
			}
		}
		return $pathStr;
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CUploadedFile::saveAs()
	 */
	public function saveAs($file, $deleteTempFile = true) {
		if ($this->_error == UPLOAD_ERR_OK) {
			if ($deleteTempFile) {
				return move_uploaded_file ( $this->_tempName, $file );
			} elseif (is_uploaded_file ( $this->_tempName )) {
				return copy ( $this->_tempName, $file );
			} else
				return false;
		} else
			return false;
	}
}