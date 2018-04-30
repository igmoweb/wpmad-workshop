<?php

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {

        foreach ($this->items as $item) {
        	switch ( $item->name ) {
		        case 'Aged Brie': {
			        $item->quality++;
		        	if ( $item->sell_in <= 0 ) {
				        $item->quality++;
			        }
		        	$item->quality = min( $item->quality, 50 );
		        	$item->sell_in--;
		        	break;
		        }
		        case 'Sulfuras, Hand of Ragnaros': {
			        break;
		        }
		        case 'Backstage passes to a TAFKAL80ETC concert': {
			        $item->quality++;
			        if ( $item->sell_in <= 10 ) {
				        $item->quality = $item->quality + 1;
			        }
			        elseif ( $item->sell_in <= 5 ) {
				        $item->quality = $item->quality + 2;
			        }
			        elseif ( $item->sell_in <= 0 ) {
				        $item->quality = 0;
			        }

			        $item->sell_in--;
		        	break;
		        }
	        }

	        if ( 'Backstage passes to a TAFKAL80ETC concert' === $item->name || 'Aged Brie' === $item->name || 'Sulfuras, Hand of Ragnaros' === $item->name ) {
        		continue;
	        }

            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->quality = $item->quality - 1;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }
            
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in = $item->sell_in - 1;
            }
            
            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }
    }
}

class Item {

    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

}

