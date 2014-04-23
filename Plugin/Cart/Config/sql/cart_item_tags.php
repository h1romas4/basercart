<?php
/**
 * CartItemCategoriesSchema
 *
 * @author hiromasa
 */
class CartItemTagsSchema extends CakeSchema {
	/**
	 * Name of the schema
	 */
	var $name = 'CartItemTagsSchema';

	/**
	 * File to write
	 */
	var $file = 'cart_item_tags.php';

	/**
	 * Connection used for read
	 */
	var $connection = 'plugin';

	/**
	 * Fields
	 */
	var $cart_item_tags = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary')
		, 'term' => array('type' => 'string', 'null' => false)
		, 'slug' => array('type' => 'string', 'null' => false)
		, 'seq' => array('type' => 'integer', 'null' => false)
		, 'created' => array('type' => 'datetime', 'null' => false)
		, 'modified' => array('type' => 'datetime', 'null' => false)
		, 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
