<?php
/**
 * CartOrderDetail
 * 
 * @author hiromasa
 */
class CartOrderDetail extends CartAppModel {
	/**
	 * Name of the model.
	 */
	public $name = 'CartOrderDetail';

	/**
	 * Detailed list of belongsTo associations.
	 */
	public $belongsTo = array('CartItem' => array(
		'className' => 'Cart.CartItem'
		, 'foreignKey' => 'cart_item_id'
	));
}
