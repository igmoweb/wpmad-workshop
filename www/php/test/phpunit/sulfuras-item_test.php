<?php

class SulfurasTest extends GildedRoseTestCase {

	function test_item_sulfuras_tick() {
		$sell_in = 15;
		$quality = 10;
		$item1 = self::generate_item( [ 'name' => 'Sulfuras, Hand of Ragnaros', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $sell_in, $item1->sell_in );
		$this->assertEquals( 80, $item1->quality );

		$item1->tick();
		$this->assertEquals( $sell_in, $item1->sell_in );
		$this->assertEquals( 80, $item1->quality );
	}

	function test_item_sulfuras_quality_when_sell_in_is_over() {
		$sell_in = 0;
		$quality = 20;
		$item1 = self::generate_item( [ 'name' => 'Sulfuras, Hand of Ragnaros', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( 80, $item1->quality );

		$item1->tick();
		$this->assertEquals( 80, $item1->quality );
	}
}