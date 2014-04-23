<?php
/**
 * OrdersController
 * 
 * @author hiromasa
 */
class OrdersController extends CartAppController {
	/**
	 * The name of this controller.
	 */
	public $name = 'Orders';

	/**
	 * An array containing the class names of models this controller uses.
	 */
	public $uses = array('Cart.CartOrder', 'Cart.CartOrderDetail');

	/**
	 * beforeRender
	 *
	 * @return void
	 * @access public
	 */
	public function beforeRender() {
		parent::beforeRender();
		$this->set('status', $this->CartOrder->getOrderStatus());
	}

	/**
	 * admin - index
	 */
	public function admin_index() {
		$this->pageTitle = '注文一覧';
		$this->setViewConditions(
			'CartOrder'
			, array('default' =>
				array('named' => array(
					'num' => $this->siteConfigs['admin_list_num']
					, 'sort' => 'modified'
					, 'direction' => 'desc'
				))
			)
		);
		$this->paginate = array(
			'order' => 'CartOrder.modified'
			, 'sort' => 'modified'
			, 'direction' => 'desc'
			, 'limit' => $this->passedArgs['num']
			, 'recursive' => 0
		);

		$this->set('datas', $this->paginate('CartOrder'));
	}

	/**
	 * admin - edit
	 */
	public function admin_edit($id) {
		$this->pageTitle = '注文編集';

		if(!$id) {
			$this->setMessage('無効な処理です。', true);
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->request->data)) {
			$this->request->data = $this->CartOrder->read(null, $id);
		} else {
			$this->CartOrder->set($this->request->data);
			if($this->CartOrder->save()) {
				$this->setMessage('注文を更新しました。');
				$this->redirect(array('action' => 'edit', $id));
			} else {
				$this->setMessage('注文の更新に失敗しました。', true);
			}
		}

		$goods = $this->CartOrderDetail->find('all', array(
			'conditions' => array('cart_order_id' => $id)
		));
		$total = 0;
		foreach($goods as $order) {
			$total += $order['CartOrderDetail']['price'];
		}
		$this->set('goods', $goods);
		$this->set('total', $total);

		$this->render('form');
	}
}
