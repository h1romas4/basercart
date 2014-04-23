<?php
/**
 * CartOrder
 * 
 * @author hiromasa
 */
class CartOrder extends CartAppModel {
	/**
	 * Name of the model.
	 */
	public $name = 'CartOrder';

	/**
	 * Detailed list of hasMany associations.
	 */
	public $hasMany = array('Cart.CartOrderDetail');

	/**
	 * validate
	 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => 'email'
				, 'message' => 'メールアドレスが正しくありません。'
			)
			, 'match' => array(
				'rule' => array('confirm', array('email', 'email_confirm'))
				, 'message' => 'ふたつのメールアドレスが一致しません。'
			)
		)
		, 'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty'
				, 'message' => 'お名前を入力してください。'
			)
			, 'maxLength' => array(
				'rule' => array('maxLength', 50)
				, 'message' => 'お名前は50文字以内で入力してください。'
			)
		)
	);

	/**
	 * orderStatus
	 */
	private static $orderStatus = array(
		'01' => '受注（未返信）'
		, '02' => '受注（返信済）'
		, '10' => '送金確認中'
		, '11' => '送金確認済'
		, '20' => '発送準備中'
		, '21' => '発送済'
		, '70' => '完了'
		, '80' => '返品'
		, '90' => '取消し'
		, '99' => 'その他'
	);

	/**
	 * getOrderStatus
	 */
	public function getOrderStatus() {
		return self::$orderStatus;
	}

	/**
	 * getFirstStatus
	 */
	public function getFirstStatus() {
		return key(array_slice(self::$orderStatus, 0, 1));
	}
}
