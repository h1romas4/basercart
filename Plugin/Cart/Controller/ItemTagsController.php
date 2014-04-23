<?php
/**
 * ItemTagsController
 * 
 * @author hiromasa
 */
class ItemTagsController extends CartAppController {
	/**
	 * The name of this controller.
	 */
	public $name = 'ItemTags';

	/**
	 * An array containing the class names of models this controller uses.
	 */
	public $uses = array('Cart.CartItemTag');

	/**
	 * admin - index
	 */
	public function admin_index() {
		$this->pageTitle = '商品タグ一覧';

		$this->setViewConditions(
			'CartItemTag'
			, array('default' =>
				array('named' => array(
					'num' => $this->siteConfigs['admin_list_num']
					, 'sort' => 'seq'
					, 'direction' => 'asc')
				)
			)
		);
		$this->paginate = array(
			'order' => 'CartItemTag.seq',
			'limit' => $this->passedArgs['num'],
			'recursive' => 0
		);

		$this->set('datas', $this->paginate('CartItemTag'));
	}

	/**
	 * admin - add
	 */
	public function admin_add() {
		$this->pageTitle = '商品タグ追加';

		if(!empty($this->request->data)) {
			$this->CartItemTag->create($this->request->data);
			if($this->CartItemTag->save()) {
				$this->setMessage('タグを追加しました。');
				$this->redirect(array(
					'action' => 'edit'
					, $this->CartItemTag->getLastInsertId()
				));
			} else {
				$this->setMessage('タグの追加に失敗しました。', true);
			}
		}

		$this->render('form');
	}

	/**
	 * admin - edit
	 */
	public function admin_edit($id) {
		$this->pageTitle = '商品タグ編集';

		if(!$id) {
			$this->setMessage('無効な処理です。', true);
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->request->data)) {
			$this->request->data = $this->CartItemTag->read(null, $id);
		} else {
			$this->CartItemTag->set($this->request->data);
			if($this->CartItemTag->save()) {
				$this->setMessage('タグを更新しました。');
			} else {
				$this->setMessage('タグの更新に失敗しました。', true);
			}
		}

		$this->render('form');
	}

	/**
	 * admin - del
	 */
	public function admin_del($id) {
		if(!$id) {
			$this->setMessage('無効な処理です。', true);
			$this->redirect(array('action' => 'index'));
		}

		$data = $this->CartItemTag->read(null, $id);
		if($this->CartItemTag->delete($id)) {
			$this->setMessage('タグを削除しました。');
		} else {
			$this->setMessage('タグの削除に失敗しました。', true);
		}

		$this->redirect(array('action' => 'index'));
	}
}
