<?php

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase {

	// All tests must start with test

	// Helper assertions:
	// $this->assertTrue( $expresion );
	// $this->assertFalse( $expresion );
	// $this->assertEquals( $expected, $result );

    function testFoo() {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("fixme", $items[0]->name);
    }
}