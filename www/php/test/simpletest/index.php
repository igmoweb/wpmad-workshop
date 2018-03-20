<?php

require_once( __DIR__ . '/../bootstrap.php' );
require_once( __DIR__ . '/../../vendor/simpletest/simpletest/autorun.php' );

class TestOfLogging extends UnitTestCase {
	// All tests must start with test

	// Helper assertions:
	// $this->assertTrue( $expresion );
	// $this->assertFalse( $expresion );
	// $this->assertEqual( $expected, $result );

	function test_item_name() {
		$items = array(new Item("foo", 0, 0));
		$gildedRose = new GildedRose($items);
		$gildedRose->update_quality();
		$this->assertEqual("fixme", $items[0]->name);
	}

	function test_another_one() {
		$this->assertTrue( true );
	}
}