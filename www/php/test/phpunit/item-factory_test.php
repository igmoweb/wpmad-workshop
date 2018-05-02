<?php

class ItemFactoryTest extends GildedRoseTestCase {

	function test_ItemFactory() {
		$sell_in = 10;
		$quality = 20;

		$item = ItemFactory::create( 'Whatever', $sell_in, $quality );
		$this->assertInstanceOf( 'Standard', $item );
		$this->assertEquals( $sell_in, $item->sell_in );
		$this->assertEquals( $quality, $item->quality );

		$item = ItemFactory::create( 'Conjured', $sell_in, $quality );
		$this->assertInstanceOf( 'Conjured', $item );
		$this->assertEquals( $sell_in, $item->sell_in );
		$this->assertEquals( $quality, $item->quality );

		$item = ItemFactory::create( 'Backstage passes to a TAFKAL80ETC concert', $sell_in, $quality );
		$this->assertInstanceOf( 'Backstage', $item );
		$this->assertEquals( $sell_in, $item->sell_in );
		$this->assertEquals( $quality, $item->quality );

		$item = ItemFactory::create( 'Sulfuras, Hand of Ragnaros', $sell_in, $quality );
		$this->assertInstanceOf( 'Sulfuras', $item );
		$this->assertEquals( $sell_in, $item->sell_in );
		$this->assertEquals( $quality, $item->quality );

		$item = ItemFactory::create( 'Aged Brie', $sell_in, $quality );
		$this->assertInstanceOf( 'Aged_Brie', $item );
		$this->assertEquals( $sell_in, $item->sell_in );
		$this->assertEquals( $quality, $item->quality );
	}
}