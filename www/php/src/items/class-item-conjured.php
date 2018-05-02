<?php
/**
 * @version:
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Conjured extends Standard {

	public function update_quality() {
		$this->quality = $this->quality - 2;
	}

}