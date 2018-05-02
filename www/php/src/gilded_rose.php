<?php

class GildedRose {

	private $items;

	function __construct( $items ) {
		$this->items = $items;
	}

	function update_quality() {

		foreach ( $this->items as $item ) {
			switch ( $item->name ) {
				case 'Aged Brie':
					{
						$item->quality ++;
						if ( $item->sell_in <= 0 ) {
							$item->quality ++;
						}
						$item->quality = min( $item->quality, 50 );
						$item->sell_in --;
						break;
					}
				case 'Sulfuras, Hand of Ragnaros':
					{
						break;
					}
				case 'Backstage passes to a TAFKAL80ETC concert':
					{
						$item->quality ++;
						if ( $item->sell_in <= 0 ) {
							$item->quality = 0;
						} elseif ( $item->sell_in <= 5 ) {
							$item->quality = $item->quality + 2;
						} elseif ( $item->sell_in <= 10 ) {
							$item->quality = $item->quality + 1;
						}

						$item->quality = min( $item->quality, 50 );
						$item->sell_in --;
						break;
					}
				case 'Conjured':
					{
						$item->quality = $item->quality - 2;
						$item->sell_in--;
						break;
					}
				default:
					{
						$item->quality --;
						if ( $item->sell_in <= 0 ) {
							$item->quality --;
						}

						$item->quality = min( $item->quality, 50 );
						$item->sell_in --;
						break;
					}
			}
			$item->quality = max( 0, $item->quality );
		}
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

