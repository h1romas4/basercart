<?php
/**
 * CartItemTagRelationshipsSchema
 *
 * @author hiromasa
 */
class CartItemTagRelationshipsSchema extends CakeSchema {
	/**
	 * Name of the schema.
	 */
	var $name = 'CartItemTagRelationshipsSchema';

	/**
	 * File to write.
	 */
	var $file = 'cart_item_tag_relationships.php';

	/**
	 * Connection used for read.
	 */
	var $connection = 'plugin';

	/**
	 * Fields
	 */
	var $cart_item_tag_relationships = array(
		'id' => array('type' => 'integer', 'null' => false, 'key' => 'primary')
		, 'cart_item_id' => array('type' => 'integer', 'null' => false)
		, 'cart_item_tag_id' => array('type' => 'integer', 'null' => false)
		, 'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}
