<?php
/**
 * CartOrderDetailsSchema
 *
 * @author hiromasa
 */
class CartOrderDetailsSchema extends CakeSchema {
	/**
	 * Name of the schema
	 */
	var $name = 'CartOrderDetails';

	/**
	 * File to write
	 */
	var $file = 'cart_order_details.php';

	/**
	 * Connection used for read
	 */
	var $connection = 'plugin';

	/**
	 * Fields
	 */
	var $cart_order_details = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary')
		, 'cart_order_id' => array('type' => 'integer', 'null' => false)
		, 'cart_item_id' => array('type' => 'integer', 'null' => false)
		, 'price' => array('type' => 'string', 'null' => false)
		, 'tax' => array('type' => 'string', 'null' => false)
		, 'created' => array('type' => 'datetime', 'null' => false)
		, 'modified' => array('type' => 'datetime', 'null' => false)
		, 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
