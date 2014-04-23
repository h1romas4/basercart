<?php
/**
 * CartConfigsSchema
 * 
 * @author hiromasa
 */
class CartConfigsSchema extends CakeSchema {
	/**
	 * Name of the schema.
	 */
	var $name = 'CartConfigs';

	/**
	 * File to write.
	 */
	var $file = 'cart_configs.php';

	/**
	 * Connection used for read.
	 */
	var $connection = 'plugin';

	/**
	 * Fields
	 */
	var $cart_configs = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary')
		, 'name' => array('type' => 'string', 'null' => false)
		, 'value' => array('type' => 'text')
		, 'created' => array('type' => 'datetime', 'null' => false)
		, 'modified' => array('type' => 'datetime', 'null' => false)
		, 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
