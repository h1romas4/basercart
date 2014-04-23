<?php
/**
 * CartItemTag
 * 
 * @author hiromasa
 */
class CartItemTag extends CartAppModel {
	/**
	 * Name of the model.
	 */
	public $name = 'CartItemTag';

	/**
	 * hasAndBelongsToMany
	 */
	public $hasAndBelongsToMany = array(
		'CartItem' => array(
			'className' => 'Cart.CartItem'
			, 'joinTable' => 'cart_item_tag_relationships'
		)
	);

	/**
	 * validate
	 */
	public $validate = array(
		'term' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
				, 'message' => 'タグを入力してください。'
			)
			, 'duplicate' => array(
				'rule' => array('duplicate', 'term')
				, 'message' => '既に登録のあるタグです。'
			)
		)
		, 'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
				, 'message' => 'スラッグを入力してください。'
			)
			, 'duplicate' => array(
				'rule' => array('duplicate', 'slug')
				, 'message' => '既に登録のあるスラッグです。'
			)
		)
		, 'seq' => array(
			'rule' => 'numeric'
			, 'message' => "順番は数値で入力してください。"
		)
	);
}
