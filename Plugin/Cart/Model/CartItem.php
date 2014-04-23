<?php
/**
 * CartItem
 * 
 * @author hiromasa
 */
class CartItem extends CartAppModel {
	/**
	 * Name of the model.
	 */
	public $name = 'CartItem';

	/**
	 * List of behaviors.
	 */
	public $actsAs = array('BcUpload' => array(
		'saveDir'	=> "cart"
		, 'fields' => array(
			'image1' => array('type' => 'image')
			, 'image2' => array('type' => 'image')
			, 'image3' => array('type' => 'image')
			, 'image4' => array('type' => 'image')
		)
	));

	/**
	 * hasAndBelongsToMany
	 */
	public $hasAndBelongsToMany = array(
		'CartItemTag' => array(
			'className' => 'Cart.CartItemTag'
			, 'joinTable' => 'cart_item_tag_relationships'
			, 'order' => array('CartItemTag.seq')
		)
	);

	/**
	 * validate
	 */
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty'
			, 'message' => '商品名を入力してください。'
		)
		, 'price' => array(
			'numeric' => array(
				'rule' => 'numeric'
				, 'message' => '価格は数値で入力してください。'
			)
		)
		, 'description' => array(
			'rule' => 'notEmpty'
			, 'message' => '説明を入力してください。'
		)
		, 'condition' => array(
			'rule' => 'notEmpty'
			, 'message' => '状態を入力してください。'
		)
	);

	/**
	 * ITEM_CONDITION_PUBLISH
	 */
	const ITEM_CONDITION_PUBLISH = '00';

	/**
	 * ITEM_CONDITION_SOLDOUT
	 */
	const ITEM_CONDITION_SOLDOUT = '10';

	/**
	 * ITEM_CONDITION_PRIVATE
	 */
	const ITEM_CONDITION_PRIVATE = '20';

	/**
	 * ITEM_CONDITION_DELETE
	 */
	const ITEM_CONDITION_DELETE = '99';

	/**
	 * getItemConditions
	 */
	public function getItemConditions() {
		return array(
			self::ITEM_CONDITION_PUBLISH => '公開中'
			, self::ITEM_CONDITION_SOLDOUT => '売切れ'
			, self::ITEM_CONDITION_PRIVATE => '非公開'
		);
	}

	/**
	 * getItemPublishConditions
	 */
	public function getItemPublishConditions() {
		return array('or' => array(
			array('condition' => self::ITEM_CONDITION_PUBLISH)
			, array('condition' => self::ITEM_CONDITION_SOLDOUT)
		));
	}

	/**
	 * getItemPublishFlatConditions
	 */
	public function getItemPublishFlatConditions() {
		return Set::classicExtract(
			$this->getItemPublishConditions(), 'or.{n}.condition'
		);
	}

	/**
	 * getItemEditableConditions
	 */
	public function getItemEditableConditions() {
		return array('or' => array(
			array('condition' => self::ITEM_CONDITION_PUBLISH)
			, array('condition' => self::ITEM_CONDITION_SOLDOUT)
			, array('condition' => self::ITEM_CONDITION_PRIVATE)
		));
	}

	/**
	 * getItemEditableConditions
	 */
	public function getItemDeleteCondition() {
		return self::ITEM_CONDITION_DELETE;
	}

	/**
	 * getUploadSetting
	 */
	public function getUploadSetting() {
		return $this->Behaviors->BcUpload->settings;
	}
}
