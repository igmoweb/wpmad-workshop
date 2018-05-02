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

	public static function create( $name, $sell_in, $quality ) {
		$classname = 'Standard';
		switch ( $name ) {
			case 'Aged Brie': {
				$classname = 'Aged_Brie';
				break;
			}
			case 'Sulfuras, Hand of Ragnaros':
				{
					$classname = 'Sulfuras';
					break;
				}
			case 'Backstage passes to a TAFKAL80ETC concert':
				{
					$classname = 'Backstage';
					break;
				}
			case 'Conjured':
				{
					$classname = 'Conjured';
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



