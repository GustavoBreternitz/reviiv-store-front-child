<?php
/**
 * Implemented by Gustavo Breternitz
 *
 * @package Storefron_child
 */

namespace Storefront\Child;

use Carbon_Fields\Carbon_Fields;

/**
 * Class Core.
 */
class Core {

	/**
	 * Holds the registered controllers for the application.
	 *
	 * @var array
	 */
	private $controllers;

	/**
	 * Construct method
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'init' ) );
		Carbon_Fields::boot();
	}

	/**
	 * Init Controllers
	 *
	 * @return void
	 */
	public function init(): void {
		$this->controllers = array(
			'Product',
		);
		$this->call();
	}

	/**
	 * Call Classes
	 *
	 * @return void
	 */
	public function call(): void {
		foreach ( $this->controllers as $name ) {
			$controller = "Storefront\Child\Controller\\{$name}";
			if ( class_exists( $controller ) ) {
				new $controller();
			}
		}
	}
}
