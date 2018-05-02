<?php

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