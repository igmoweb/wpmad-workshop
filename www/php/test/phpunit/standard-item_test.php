<?php

class StandardTest extends GildedRoseTestCase {

	function test_item_standard_tick() {
		$sell_in = 15;
		$quality = 10;
		$item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $sell_in - 1, $item1->sell_in );
		$this->assertEquals( $quality - 1, $item1->quality );

		$item1->tick();
		$this->assertEquals( $sell_in - 2, $item1->sell_in );
		$this->assertEquals( $quality - 2, $item1->quality );
	}

	function test_item_standard_quality_when_sell_in_is_over() {
		$sell_in = 0;
		$quality = 10;
		$item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $quality - 2, $item1->quality );

		$item1->tick();
		$this->assertEquals( $quality - 4, $item1->quality );
	}

	function test_item_standard_quality_is_not_under_zero() {
		$sell_in = 10;
		$quality = 0;
		$item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( 0, $item1->quality );

		$item1->tick();
		$this->assertEquals( 0, $item1->quality );
	}

	function test_item_standard_quality_is_not_over_50() {
		$sell_in = 10;
		$quality = 55;
		$item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );

		$this->assertEquals( 50, $item1->quality );
	}
}