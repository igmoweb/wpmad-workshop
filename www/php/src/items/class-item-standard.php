<?php

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
