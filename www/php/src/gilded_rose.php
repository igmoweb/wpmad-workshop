<?php

require_once 'class-item-factory.php';
require_once 'items/class-item.php';
require_once 'items/class-item-standard.php';
require_once 'items/class-item-backstage.php';
require_once 'items/class-item-aged-brie.php';
require_once 'items/class-item-conjured.php';
require_once 'items/class-item-sulfuras.php';

class GildedRose {

	private $items;

	function __construct( $items ) {
		$this->items = $items;
	}

	function update_quality() {

		foreach ( $this->items as $item ) {
			/** @var Standard $item */
			$item->tick();
		}
	}
}



