<?php
/**
 * GoodsController
 * 
 * @author hiromasa
 */
class GoodsController extends CartAppController {
	/**
	 * The name of this controller.
	 */
	public $name = 'Goods';

	/**
	 * Instance of ComponentCollection used to handle callbacks.
	 */
	public $components = array("Session");

	/**
	 * An array containing the class names of models this controller uses.
	 */
	public $uses = array('Cart.CartOrder', 'Cart.CartOrderDetail', 'Cart.CartItem');

	/**
	 * beforeFilter
	 * 
	 * @see BcPluginAppController::beforeFilter()
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->BcAuth->allow(array('index', 'add', 'remove', 'order'));
	}

	/**
	 * beforeRender
	 *
	 * @return void
	 * @access public
	 */
	public function beforeRender() {
		parent::beforeRender();
		$this->set('upload', $this->CartItem->getUploadSetting());
	}

	/**
	 * public - 一覧
	 */
	public function index() {
		$this->pageTitle = "お買いものかご";
		$this->crumbs = array();
		$this->getGoods();
	}

	/**
	 * public - 追加
	 */
	public function add() {
		$goods = array();
		if($this->Session->check(SESSION_CART)) {
			$goods = $this->Session->read(SESSION_CART);
		}
		array_push($goods, $this->request->data['Goods']['id']);
		$this->Session->write(SESSION_CART, $goods);

		$this->redirect(array('action' => 'index'));
	}

	/**
	 * public - 削除
	 */
	public function remove() {
		if($this->Session->check(SESSION_CART)) {
			$goods = $this->Session->read(SESSION_CART);
			unset($goods[$this->request->data['Goods']['id']]);
			$new = array();
			foreach($goods as $item) {
				array_push($new, $item);
			}
			$this->Session->write(SESSION_CART, $new);
		}

		$this->redirect(array('action' => 'index'));
	}

	/**
	 * public - 発注
	 */
	public function order() {
		$this->pageTitle = "発注";
		$this->crumbs = array();
		$name = $this->request->data['Goods']['order_name'];
		$mail1 = $this->request->data['Goods']['order_mail'];
		$mail2 = $this->request->data['Goods']['order_emain_conform'];

		// TODO: make the unique code
		$code = time();

		$details = array();
		$tax = 0;
		if(isset($this->configs['tax'])) {
			$tax = $this->configs['tax'];
		}
		foreach($this->getGoods() as $item) {
			array_push($details, array(
				'cart_item_id' => $item['CartItem']['id']
				, 'price' => $item['CartItem']['price']
				, 'tax' => $tax
			));
		}
		$datas = array(
			'CartOrder' => array(
				'code' => $code
				, 'email' => $mail1
				, 'email_confirm' => $mail2
				, 'name' => ''. $name
				, 'status' => $this->CartOrder->getFirstStatus()
			)
			, 'CartOrderDetail' => $details
		);

		if(!$this->CartOrder->saveAssociated($datas)) {
			$this->getGoods();
			$error = array();
			foreach($this->CartOrder->validationErrors as $key => $values) {
				foreach($values as $value) {
					array_push($error, $value);
				}
			}
			$this->set('error', $error);
			$this->render('index');
		} else {
			// TODO: make auto mail and send
			$this->Session->delete(SESSION_CART);
			$this->set('code', $code);
			$this->render('submit');
		}
	}

	/**
	 * getGoods
	 */
	private function getGoods() {
		$goods = array();
		if($this->Session->check(SESSION_CART)) {
			$goods = $this->Session->read(SESSION_CART);
		}
		$items = array();
		$total = 0;
		foreach($goods as $no => $id) {
			// TODO: loop out
			$item = $this->CartItem->find('first'
				, array('conditions' => array('id' => $id))
			);
			if(!empty($item)) {
				array_push($items, $item);
				$total += $item['CartItem']['price'];
			}
		}

		$this->set('total', $total);
		$this->set('items', $items);

		return $items;
	}
}
