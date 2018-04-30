<?php

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

class ItemFactory {

	const SULFURAS = 'Sulfuras';
	const AGED_BRIE = 'Aged_Brie';
	const BACKSTAGE = 'Backstage';
	const CONJURED = 'Conjured';
	const STANDARD = 'Standard';

	public static function create( $name, $sell_in, $quality ) {
		$classname = self::STANDARD;
		switch ( $name ) {
			case 'Aged Brie': {
				$classname = self::AGED_BRIE;
				break;
			}
			case 'Sulfuras, Hand of Ragnaros':
				{
					$classname = self::SULFURAS;
					break;
				}
			case 'Backstage passes to a TAFKAL80ETC concert':
				{
					$classname = self::BACKSTAGE;
					break;
				}
			case 'Conjured':
				{
					$classname = self::CONJURED;
					break;
				}
		}

		return new $classname( $name, $sell_in, $quality );
	}
}

class Item {

	public $name;
	public $sell_in;
	public $quality;

	function __construct( $name, $sell_in, $quality ) {
		$this->name    = $name;
		$this->sell_in = $sell_in;
		$this->quality = $quality;
	}

	public function __toString() {
		return "{$this->name}, {$this->sell_in}, {$this->quality}";
	}

}

class Standard extends Item {

	const MAX_QUALITY = 50;

	public function __construct( $name, $sell_in, $quality ) {
		parent::__construct( $name, $sell_in, $quality );
		$this->normalize_quality();
	}

	public function tick() {
		$this->update_quality();
		$this->normalize_quality();
		$this->update_sell_in();
	}

	protected function update_sell_in() {
		$this->sell_in --;
	}

	protected function update_quality() {
		$this->quality --;
		if ( $this->sell_in <= 0 ) {
			$this->quality --;
		}
	}

	protected function normalize_quality() {
		$this->quality = min( $this->quality, (int) self::MAX_QUALITY );
		$this->quality = max( $this->quality, 0 );
	}
}

class Backstage extends Standard {

	protected function update_quality() {
		$this->quality ++;
		if ( $this->sell_in <= 0 ) {
			$this->quality = 0;
		} elseif ( $this->sell_in <= 5 ) {
			$this->quality = $this->quality + 2;
		} elseif ( $this->sell_in <= 10 ) {
			$this->quality = $this->quality + 1;
		}
	}
}

class Aged_Brie extends Standard {

	protected function update_quality() {
		$this->quality ++;
		if ( $this->sell_in <= 0 ) {
			$this->quality ++;
		}
	}
}

class Sulfuras extends Standard {

	public function tick() {
		// Do nothing
	}

	public function normalize_quality() {
		$this->quality = max( $this->quality, 0 );
	}
}

class Conjured extends Standard {

	public function update_quality() {
		$this->quality = $this->quality - 2;
	}

}



