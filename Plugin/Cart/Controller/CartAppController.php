<?php
App::uses('BcPluginAppController', 'Controller');

/**
 * CartAppController
 * 
 * @property CartConfig $CartConfig
 * @property CartItem $CartItem
 * @property CartItemTag $CartItemTag
 * @property CartOrder $CartOrder
 * @property CartOrderDetail $CartOrderDetail
 * @property BcAuth $BcAuth
 * @property Session $Session
 * @author hiromasa
 */
class CartAppController extends BcPluginAppController {
	/**
	 * Instance of ComponentCollection used to handle callbacks.
	 */
	public $components = array('BcAuth', 'Session');

	/**
	 * An array containing the class names of models this controller uses.
	 */
	public $uses = array('Cart.CartConfig');

	/**
	 * An array containing the names of helpers this controller uses.
	 */
	public $helpers = array('Cart.Cart', 'BcForm');

	/**
	 * crumbs
	 */
	public $crumbs = array(
		array('name' => 'プラグイン管理', 'url' => array('plugin' => '', 'controller' => 'plugins', 'action' => 'index')),
		array('name' => 'ショッピングカート', 'url' => array('plugin' => 'cart', 'controller' => 'configs', 'action' => 'index'))
	);

	/**
	 * subMenuElements
	 */
	public $subMenuElements = array('items', 'orders');

	/**
	 * Cart Config
	 */
	protected $configs = array();

	/**
	 * beforeFilter
	 * 
	 * @see BcPluginAppController::beforeFilter()
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->configs = $this->CartConfig->findExpanded();
	}
}
