<?php

class GildedRoseTest extends GildedRoseTestCase {

	function test_update_quality() {
		$sell_in = 10;
		$quality = 20;
		$item = self::generate_item( compact( 'sell_in', 'quality' ) );
		$store = new GildedRose( [ $item ] );
		$store->update_quality();
		$this->assertNotEquals( $sell_in, $store->get_items()[0]->sell_in );
		$this->assertNotEquals( $quality, $store->get_items()[0]->quality );
	}

}