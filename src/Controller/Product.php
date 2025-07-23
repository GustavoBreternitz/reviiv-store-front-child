<?php
/**
 * Implemented by Gustavo Breternitz
 *
 * @package Storefron_child
 */

namespace Storefront\Child\Controller;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Class Product.
 */
class Product {

	/**
	 * Construct method
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'carbon_fields_register_fields', array( $this, 'register_product_fields' ) );
	}

	/**
	 * Register Fields
	 *
	 * @return void
	 */
	public function register_product_fields(): void {
		Container::make( 'post_meta', 'Informações Jurídicas' )
			->show_on_post_type( 'product' )
			->add_fields(
				array(
					Field::make( 'textarea', 'product_technical_description', 'Descrição Técnica' ),
					Field::make( 'select', 'product_level_complexity', 'Nível de complexidade' )
						->add_options(
							array(
								'low'    => 'Baixa',
								'medium' => 'Média',
								'high'   => 'Alta',
							)
						),
					Field::make( 'text', 'product_number_hours', 'Quantidade estimada de horas para estudo' ),
				)
			);
	}
}
