<?

$sLibraryPath = '/tmp/PHPExcel.phar';

// we will build library in case if it not exist
if (! file_exists ( $sLibraryPath )) {
	// ini_set("phar.readonly", 0); // Could be done in php.ini
	
	$oPhar = new Phar ( $sLibraryPath ); // creating new Phar
	                                  // oPhar->setDefaultStub('',
	                                  // 'PHPExcel.php'); // pointing main file
	                                  // which require all classes
	$oPhar->setDefaultStub ( '', '' ); // pointing main file which require all
	                                // classes
	$oPhar->buildFromDirectory ( 'framework/vendors/PHPExcel' ); // creating our
	                                                          // library using
	                                                          // whole directory
	
	$oPhar->compress ( Phar::GZ ); // plus - compressing it into gzip
}

// when library already compiled - we will using it
// equire_once('phar://'.$sLibraryPath.'.gz');

?>
