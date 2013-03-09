<?php

function p($data)
{
    echo '<pre>';
    CVarDumper::dump($data, 1000, false);
    echo '</pre>';
}

function v($data)
{
    echo "<pre>".var_dump($data)."</pre>";
}

class Y extends CComponent
{
	private static $startSkipCount = 0;
	private static $skipCount = 0;

	/**
     * Ярлык для функции dump класса CVarDumper для отладки приложения
     * @param mixed $var переменная для вывода
     * @param boolean $toDie остановить ли дальнейшее выполнение приложения, по умолчанию - true
     */
    public static function dump($var, $skipCount = 0, $depth = 2)
    {
    	if (self::$startSkipCount == 0)
    		self::$startSkipCount = self::$skipCount = $skipCount;
    	else
			self::$skipCount--;

    	if (self::$skipCount == 0) {
    		self::$startSkipCount = 0;

	        echo '<pre>';
	        CVarDumper::dump($var, $depth, true);
	        echo '</pre>';

//            Y::end(debug_backtrace());
            Y::end();
    	}
    }

    /**
     * Выводит текст и завершает приложение (применяется в ajax-действиях)
     * @param string $text текст для вывода
     */
    public static function end($data = '')
    {
    	if (is_array($data)) {
    		echo '<pre>';
    		print_r($data);
    		echo '</pre>';
    	} else {
    		echo $data;
    	}

        Yii::app()->end();
    }
}