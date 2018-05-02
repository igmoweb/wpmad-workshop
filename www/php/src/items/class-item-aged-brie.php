<?php

class Aged_Brie extends Standard {

	protected function update_quality() {
		$this->quality ++;
		if ( $this->sell_in <= 0 ) {
			$this->quality ++;
		}
	}
}