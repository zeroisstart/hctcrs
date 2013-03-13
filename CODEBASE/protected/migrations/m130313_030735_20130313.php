<?php
class m130313_030735_20130313 extends CDbMigration {
	
	/**
	 * (non-PHPdoc)
	 * 
	 * @see CDbMigration::up()
	 */
	public function up() {
		$transaction = $this->getDbConnection ()->beginTransaction ();
		try {
			
			$transaction->commit ();
		} catch ( Exception $e ) {
			echo "Exception: " . $e->getMessage () . "\n";
			$transaction->rollback ();
			return false;
		}
	}
	/**
	 * (non-PHPdoc)
	 * 
	 * @see CDbMigration::down()
	 */
	public function down() {
		echo "m130313_030735_20130313 does not support migration down.\n";
		return false;
	}
}