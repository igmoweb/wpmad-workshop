<?php

class ItemTest extends GildedRoseTestCase {

	function test_instantiate() {
		$_items = [
			[
				'name' => 'item-name-1',
				'sell_in' => 10,
				'quality' => 20
			],
			[
				'name' => 'item-name-2',
				'sell_in' => 15,
				'quality' => 25
			],
		];

		$items = [];
		foreach ( $_items as $_item ) {
			$items[] = self::generate_item( $_item );
		}

		$store = new GildedRose( $items );
		$this->assertCount( 2, $store->get_items() );
	}

	function test_item() {
		$item = new Item( 'item-name', 20, 15 );
		$this->assertEquals( 'item-name', $item->name );
		$this->assertEquals( 20, $item->sell_in );
		$this->assertEquals( 15, $item->quality );
		$this->assertEquals( "{$item->name}, {$item->sell_in}, {$item->quality}", (string) $item );
	}
}