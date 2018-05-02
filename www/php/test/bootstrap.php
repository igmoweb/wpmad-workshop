<?php

use PHPUnit\Framework\TestCase;

class GildedRoseTestCase extends TestCase {

	protected static function generate_item( $args = [] ) {
		$defaults = [
			'name' => 'item-name',
			'sell_in' => 10,
			'quality' => 20
		];

		$r =& $args;
		$r = array_merge( $defaults, $r );
		return ItemFactory::create( $r['name'], $r['sell_in'], $r['quality'] );
	}

}

require_once __DIR__ . '/../src/gilded_rose.php';