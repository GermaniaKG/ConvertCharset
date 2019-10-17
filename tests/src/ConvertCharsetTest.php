<?php
namespace tests;

use Germania\ConvertCharset\ConvertCharset;

class ConvertCharsetTest extends \PHPUnit\Framework\TestCase
{
	public function testInstantiation()
	{
		$sut = new ConvertCharset;
		$this->assertIsCallable( $sut );
	}
}