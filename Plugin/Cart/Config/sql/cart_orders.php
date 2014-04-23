<?php
/**
 * CartOrdersSchema
 *
 * @author hiromasa
 */
class CartOrdersSchema extends CakeSchema {
	/**
	 * Name of the schema
	 */
	var $name = 'CartOrders';

	/**
	 * File to write
	 */
	var $file = 'cart_orders.php';

	/**
	 * Connection used for read
	 */
	var $connection = 'plugin';

	/**
	 * Fields
	 */
	var $cart_orders = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary')
		, 'code' => array('type' => 'string', 'null' => false)
		, 'email' => array('type' => 'string', 'null' => false)
		, 'name' => array('type' => 'string', 'null' => false)
		, 'status' => array('type' => 'string', 'null' => false)
		, 'memo' => array('type' => 'text', 'null' => true)
		, 'created' => array('type' => 'datetime', 'null' => false)
		, 'modified' => array('type' => 'datetime', 'null' => false)
		, 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
