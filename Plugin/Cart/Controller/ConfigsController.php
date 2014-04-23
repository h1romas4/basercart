<?php
/**
 * ConfigsController
 * 
 * @author hiromasa
 */
class ConfigsController extends CartAppController {
	/**
	 * The name of this controller.
	 */
	public $name = 'Configs';

	/**
	 * An array containing the class names of models this controller uses.
	 */
	public $uses = array('Cart.CartConfig');

	/**
	 * admin - index
	 */
	public function admin_index() {
		$this->pageTitle = '店舗設定';
		$this->request->data = array('CartConfig' => $this->configs);
	}

	/**
	 * admin - edit
	 */
	public function admin_edit() {
		if($this->request->isPost()) {
			if($this->CartConfig->validates()) {
				if($this->CartConfig->saveKeyValue($this->request->data)) {
					$this->Session->setFlash('設定を保存しました。');
				} else {
					$this->Session->setFlash('設定の保存に失敗しました。', true);
				}
			} else {
				$this->Session->setFlash('入力値にエラーがあります。', true);
			}
		}
		$this->redirect(array('admin'=>true, 'action' => 'index'));
	}
}
