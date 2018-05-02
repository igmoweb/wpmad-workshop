<?php

class BackstageTest extends GildedRoseTestCase {
	function test_item_backstage_tick() {
		$sell_in = 15;
		$quality = 10;
		$item1 = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $sell_in - 1, $item1->sell_in );
		$this->assertEquals( $quality + 1, $item1->quality );

		$item1->tick();
		$this->assertEquals( $sell_in - 2, $item1->sell_in );
		$this->assertEquals( $quality + 2, $item1->quality );
	}

	function test_item_backstage_quality_when_sell_in_is_less_than_10() {
		$sell_in = 10;
		$quality = 20;
		$item1 = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $quality + 2, $item1->quality );

		$item1->tick();
		$this->assertEquals( $quality + 4, $item1->quality );
	}

	function test_item_backstage_quality_when_sell_in_is_less_than_5() {
		$sell_in = 5;
		$quality = 20;
		$item1 = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( $quality + 3, $item1->quality );

		$item1->tick();
		$this->assertEquals( $quality + 6, $item1->quality );
	}

	function test_item_backstage_quality_when_sell_in_is_over() {
		$sell_in = 0;
		$quality = 20;
		$item1 = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$item1->tick();
		$this->assertEquals( 0, $item1->quality );

		$item1->tick();
		$this->assertEquals( 0, $item1->quality );
	}
}