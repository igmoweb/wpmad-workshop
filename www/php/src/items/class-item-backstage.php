<?php

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