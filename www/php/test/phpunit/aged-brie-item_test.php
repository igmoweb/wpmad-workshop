<?php

class AgedBrieTest extends GildedRoseTestCase {

	function test_item_aged_brie_tick() {
		$sell_in = 15;
		$quality = 10;
		$item1 = self::generate_item( [ 'name' => 'Aged Brie', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $sell_in - 1, $item1->sell_in );
		$this->assertEquals( $quality + 1, $item1->quality );

		$item1->tick();
		$this->assertEquals( $sell_in - 2, $item1->sell_in );
		$this->assertEquals( $quality + 2, $item1->quality );
	}

	function test_item_aged_brie_quality_when_sell_in_is_over() {
		$sell_in = 0;
		$quality = 20;
		$item1 = self::generate_item( [ 'name' => 'Aged Brie', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $quality + 2, $item1->quality );

		$item1->tick();
		$this->assertEquals( $quality + 4, $item1->quality );
	}
}