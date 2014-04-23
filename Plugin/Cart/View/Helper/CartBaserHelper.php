<?php
/**
 * CartBaserHelper
 * 
 * @author hiromasa
 */
class CartBaserHelper extends AppHelper {
	/**
	 * List of helpers used by this helper
	 */
	public $helpers = array('BcBaser', 'Session');

	/**
	 * getGoodsLink
	 */
	public function getGoodsLink($title) {
		return $this->BcBaser->getLink(
			$title 
			, array(
				'admin' => false
				, 'plugin' => 'cart'
				, 'controller' => 'goods'
				, 'action' => 'index'));
	}

	/**
	 * hasGoods
	 */
	public function hasGoods() {
		if(!$this->Session->check(SESSION_CART)) {
			return false;
		}
		$goods = $this->Session->read(SESSION_CART);
		if(empty($goods)) {
			return false;
		}
		return true;
	}
}
