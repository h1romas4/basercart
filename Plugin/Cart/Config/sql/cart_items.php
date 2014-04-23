<?php
/**
 * CartItemsSchema
 * 
 * @author hiromasa
 */
class CartItemsSchema extends CakeSchema {
	/**
	 * Name of the schema
	 */
	var $name = 'CartItems';

	/**
	 * File to write
	 */
	var $file = 'cart_items.php';

	/**
	 * Connection used for read
	 */
	var $connection = 'plugin';

	/**
	 * Fields
	 */
	var $cart_items = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary')
		, 'title' => array('type' => 'string', 'null' => false)
		, 'price' => array('type' => 'string', 'null' => false)
		, 'description' => array('type' => 'string', 'null' => false)
		, 'condition' => array('type' => 'string', 'null' => false)
		, 'image1' => array('type' => 'string')
		, 'image2' => array('type' => 'string')
		, 'image3' => array('type' => 'string')
		, 'image4' => array('type' => 'string')
		, 'created' => array('type' => 'datetime', 'null' => false)
		, 'modified' => array('type' => 'datetime', 'null' => false)
		, 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
