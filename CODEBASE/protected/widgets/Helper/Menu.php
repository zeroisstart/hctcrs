<?php
/**
 * 首页导航生成小工具
 * @author Top
 *
 */
Yii::import ( 'zii.widgets.CMenu' );
class Menu extends CMenu {
	/**
	 * (non-PHPdoc)
	 *
	 * @see CMenu::isItemActive()
	 */
	protected function isItemActive($item, $route) {
		if (isset ( $item ['url'] ) && is_array ( $item ['url'] ) && ! strcasecmp ( trim ( $item ['url'] [0], '/' ), $route )) {
			unset ( $item ['url'] ['#'] );
			if (count ( $item ['url'] ) > 1) {
				foreach ( array_splice ( $item ['url'], 1 ) as $name => $value ) {
					if (! isset ( $_GET [$name] ) || $_GET [$name] != $value)
						return false;
				}
			}
			return true;
		}
		return false;
	}
}