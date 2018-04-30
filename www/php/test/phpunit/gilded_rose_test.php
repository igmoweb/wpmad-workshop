<?php

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase {

	// All tests must start with test

	// Helper assertions:
	// $this->assertTrue( $expresion );
	// $this->assertFalse( $expresion );
	// $this->assertEquals( $expected, $result );

	/**
	 * Get a private property from a class and make it accessible to tests
	 *
	 * @param $class_name
	 * @param $property_name
	 *
	 * @return ReflectionProperty
	 * @throws ReflectionException
	 */
	private static function get_private_property( $class_name, $property_name ) {
		$reflected = new ReflectionClass( $class_name );
		$property = $reflected->getProperty( $property_name );
		$property->setAccessible( true );
		return $property;
	}

	private static function generate_item( $args = [] ) {
		$defaults = [
			'name' => 'item-name',
			'sell_in' => 10,
			'quality' => 20
		];

		$r =& $args;
		$r = array_merge( $defaults, $r );
		return new Item( $r['name'], $r['sell_in'], $r['quality'] );
	}

	function test_item() {
		$item = new Item( 'item-name', 20, 15 );
		$this->assertEquals( 'item-name', $item->name );
		$this->assertEquals( 20, $item->sell_in );
		$this->assertEquals( 15, $item->quality );
		$this->assertEquals( "{$item->name}, {$item->sell_in}, {$item->quality}", (string) $item );
	}

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
	    try {
		    $items_property = self::get_private_property( 'GildedRose', 'items' );
	    } catch ( ReflectionException $e ) {}

	    $this->assertCount( 2, $items_property->getValue( $store ) );
    }

    function test_update_quality() {
		$sell_in = 15;
	    $quality = 10;
	    $item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );
	    $store = new GildedRose( [ $item1 ] );
	    $store->update_quality();

	    try {
		    $items_property = self::get_private_property( 'GildedRose', 'items' );
	    } catch ( ReflectionException $e ) {}

	    $this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality - 1, $items_property->getValue( $store )[0]->quality );

	    $store->update_quality();
	    $this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality - 2, $items_property->getValue( $store )[0]->quality );


	    // Recommended sell is over
	    $sell_in = 0;
	    $quality = 15;
	    $item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );
	    $store = new GildedRose( [ $item1 ] );
	    $store->update_quality();

	    $this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality - 2, $items_property->getValue( $store )[0]->quality );

	    $store->update_quality();
	    $this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality - 4, $items_property->getValue( $store )[0]->quality );
    }

    function test_quality_not_under_zero() {
	    $sell_in = 2;
	    $quality = 0;
	    $item1 = self::generate_item( [ 'sell_in' => $sell_in, 'quality' => $quality ] );
	    $store = new GildedRose( [ $item1 ] );

	    try {
		    $items_property = self::get_private_property( 'GildedRose', 'items' );
	    } catch ( ReflectionException $e ) {}

	    $store->update_quality();
	    $this->assertEquals( 0, $items_property->getValue( $store )[0]->quality );

	    $store->update_quality();
	    $this->assertEquals( 0, $items_property->getValue( $store )[0]->quality );
    }

    function test_update_quality_for_Aged_Brie() {
	    $sell_in = 15;
	    $quality = 10;
	    $aged_brie = self::generate_item( [ 'name' => 'Aged Brie', 'sell_in' => $sell_in, 'quality' => $quality ] );

	    $store = new GildedRose( [ $aged_brie ] );
	    try {
		    $items_property = self::get_private_property( 'GildedRose', 'items' );
	    } catch ( ReflectionException $e ) {}

	    $store->update_quality();
	    $this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality + 1, $items_property->getValue( $store )[0]->quality );

	    // Recommended sell is over
	    $sell_in = 0;
	    $quality = 15;
	    $aged_brie = self::generate_item( [ 'name' => 'Aged Brie', 'sell_in' => $sell_in, 'quality' => $quality ] );
	    $store = new GildedRose( [ $aged_brie ] );

	    $store->update_quality();
	    $this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality + 2, $items_property->getValue( $store )[0]->quality );

	    $store->update_quality();
	    $this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
	    $this->assertEquals( $quality + 4, $items_property->getValue( $store )[0]->quality );
    }

	function test_quality_not_over_50() {
		$sell_in = 15;
		$quality = 49;
		$aged_brie = self::generate_item( [ 'name' => 'Aged Brie', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$store = new GildedRose( [ $aged_brie ] );
		try {
			$items_property = self::get_private_property( 'GildedRose', 'items' );
		} catch ( ReflectionException $e ) {}

		$store->update_quality();
		$this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality + 1, $items_property->getValue( $store )[0]->quality );

		$store->update_quality();
		$this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( 50, $items_property->getValue( $store )[0]->quality );

		$store->update_quality();
		$this->assertEquals( $sell_in - 3, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( 50, $items_property->getValue( $store )[0]->quality );
	}

	function test_update_quality_for_Sulfuras() {
		$sell_in = 15;
		$quality = 10;
		$sulfuras = self::generate_item( [ 'name' => 'Sulfuras, Hand of Ragnaros', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$store = new GildedRose( [ $sulfuras ] );
		try {
			$items_property = self::get_private_property( 'GildedRose', 'items' );
		} catch ( ReflectionException $e ) {}

		$store->update_quality();
		$this->assertEquals( $sell_in, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality, $items_property->getValue( $store )[0]->quality );

		// Recommended sell is over
		$sell_in = 0;
		$quality = 15;
		$sulfuras = self::generate_item( [ 'name' => 'Sulfuras, Hand of Ragnaros', 'sell_in' => $sell_in, 'quality' => $quality ] );
		$store = new GildedRose( [ $sulfuras ] );

		$store->update_quality();
		$this->assertEquals( $sell_in, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality, $items_property->getValue( $store )[0]->quality );

		$store->update_quality();
		$this->assertEquals( $sell_in, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality, $items_property->getValue( $store )[0]->quality );
	}

	function test_update_quality_for_Backstage() {
		$sell_in = 15;
		$quality = 10;
		$backstage = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );

		$store = new GildedRose( [ $backstage ] );
		try {
			$items_property = self::get_private_property( 'GildedRose', 'items' );
		} catch ( ReflectionException $e ) {}

		$store->update_quality();
		$this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality + 1, $items_property->getValue( $store )[0]->quality );

		// Less than 10 days to be sold
		$sell_in = 10;
		$quality = 20;
		$backstage = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );
		$store = new GildedRose( [ $backstage ] );

		$store->update_quality();
		$this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality + 2, $items_property->getValue( $store )[0]->quality );

		$store->update_quality();
		$this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality + 4, $items_property->getValue( $store )[0]->quality );

		// Less than 5 days to be sold
		$sell_in = 5;
		$quality = 20;
		$backstage = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );
		$store = new GildedRose( [ $backstage ] );

		$store->update_quality();
		$this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality + 3, $items_property->getValue( $store )[0]->quality );

		$store->update_quality();
		$this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( $quality + 6, $items_property->getValue( $store )[0]->quality );

		// Recommended sell is over
		$sell_in = 0;
		$quality = 20;
		$backstage = self::generate_item( [ 'name' => 'Backstage passes to a TAFKAL80ETC concert', 'sell_in' => $sell_in, 'quality' => $quality ] );
		$store = new GildedRose( [ $backstage ] );

		$store->update_quality();
		$this->assertEquals( $sell_in - 1, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( 0, $items_property->getValue( $store )[0]->quality );

		$store->update_quality();
		$this->assertEquals( $sell_in - 2, $items_property->getValue( $store )[0]->sell_in );
		$this->assertEquals( 0, $items_property->getValue( $store )[0]->quality );
	}

}