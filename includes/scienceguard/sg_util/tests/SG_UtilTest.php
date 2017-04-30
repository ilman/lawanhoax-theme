<?php

use Scienceguard\SG_Util;

class SG_UtilTest extends PHPUnit_Framework_TestCase {

	public function testVal()
	{
		$values = array(
			'its_true' => true,
			'its_false' => false,
			'its_null' => null,
		);

		$its_true = (SG_Util::val($values, 'its_true') === true);
		$its_false = (SG_Util::val($values, 'its_false') === false);
		$its_null = (SG_Util::val($values, 'its_null') === null);
		$default = (SG_Util::val($values, 'default') === null);

		$this->assertTrue($its_true);
		$this->assertTrue($its_false);
		$this->assertTrue($its_null);
		$this->assertTrue($default);
	}

}