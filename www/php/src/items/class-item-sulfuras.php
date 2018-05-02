<?php

class Sulfuras extends Standard {

	public function tick() {
		// Do nothing
	}

	public function normalize_quality() {
		$this->quality = max( $this->quality, 0 );
	}
}