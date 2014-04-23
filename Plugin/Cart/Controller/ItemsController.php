<?php
/**
 * ItemsController
 * 
 * @author hiromasa
 */
class ItemsController extends CartAppController {
	/**
	 * The name of this controller.
	 */
	public $name = 'Items';

	/**
	 * An array containing the class names of models this controller uses.
	 */
	public $uses = array('Cart.CartItem', 'Cart.CartItemTag');

	/**
	 * An array containing the names of helpers this controller uses.
	 */
	public $helpers = array('BcUpload');

	/**
	 * beforeFilter
	 * 
	 * @see BcPluginAppController::beforeFilter()
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->BcAuth->allow(array('index', 'detail', 'tag'));
	}

	/**
	 * beforeRender
	 *
	 * @see BcPluginAppController::beforeRender()
	 */
	public function beforeRender() {
		parent::beforeRender();
		$this->set('upload', $this->CartItem->getUploadSetting());
		$this->set('conditions', $this->CartItem->getItemConditions());
		$this->set('tags', $this->CartItemTag->find(
			'list'
			, array('fields' => array('id', 'term')))
		);
		$this->set('tagLinks', $this->CartItemTag->find(
			'list'
			, array('fields' => array('slug', 'term')))
		);
	}

	/**
	 * admin - index
	 */
	public function admin_index() {
		$this->pageTitle = '商品一覧';

		$this->setViewConditions(
			'CartItem'
			, array('default' =>
				array('named' => array(
					'num' => $this->siteConfigs['admin_list_num']
					, 'sort' => 'modified'
					, 'direction' => 'desc'
				))
			)
		);
		$this->paginate = array(
			'conditions' => $this->CartItem->getItemEditableConditions()
			, 'order' => 'CartItem.modified'
			, 'sort' => 'modified'
			, 'direction' => 'desc'
			, 'limit' => $this->passedArgs['num']
			, 'recursive' => 0
		);

		$this->set('datas', $this->paginate('CartItem'));
	}

	/**
	 * admin - add
	 */
	public function admin_add() {
		$this->pageTitle = '商品追加';

		if(!empty($this->request->data)) {
			$this->CartItem->create($this->request->data);
			if($this->CartItem->save()) {
				$this->setMessage('商品を追加しました。');
				$this->redirect(array(
					'action' => 'edit'
					, $this->CartItem->getLastInsertId()
				));
			} else {
				$this->setMessage('商品の追加に失敗しました。', true);
			}
		}

		$this->render('form');
	}

	/**
	 * admin - edit
	 */
	public function admin_edit($id) {
		$this->pageTitle = '商品編集';

		if(!$id) {
			$this->setMessage('無効な処理です。', true);
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->request->data)) {
			$this->request->data = $this->CartItem->read(null, $id);
		} else {
			$this->CartItem->set($this->request->data);
			if($this->CartItem->save()) {
				$this->setMessage('商品を更新しました。');
				$this->redirect(array('action' => 'edit', $id));
			} else {
				$this->setMessage('商品の更新に失敗しました。', true);
			}
		}

		$this->render('form');
	}

	/**
	 * admin - index
	 */
	public function admin_del($id) {
		if(!$id) {
			$this->setMessage('無効な処理です。', true);
			$this->redirect(array('action' => 'index'));
		}

		$this->CartItem->read(null, $id);
		$this->CartItem->set(
			'condition'
			, $this->CartItem->getItemDeleteCondition()
		);
		if($this->CartItem->save()) {
			$this->setMessage('商品を削除しました。');
		} else {
			$this->setMessage('商品の削除に失敗しました。', true);
		}

		$this->redirect(array('action' => 'index'));
	}

	/**
	 * public - index
	 */
	public function index() {
		$this->pageTitle = "商品一覧";
		$this->crumbs = array();
		$this->set('items', $this->getItems());
		$this->set('itemSlug', '');
	}

	/**
	 * public - detail
	 */
	public function detail($id) {
		$items = $this->getItems(array('id' => $id));
		$this->set('items', $items);
		$tag = '';
		if(!empty($items[0]['CartItemTag'][0]['slug'])) {
			$tag = $items[0]['CartItemTag'][0]['slug'];
		}
		if(!empty($items[0]['CartItem']['title'])) {
			$this->pageTitle = $items[0]['CartItem']['title'];
		}

		$this->crumbs = array();
		$this->set('itemSlug', $tag);
	}

	/**
	 * public - tag
	 */
	public function tag($slug) {
		$tags = $this->CartItem->CartItemTag->find('all', array(
			'conditions' => array(
				'CartItemTag.slug' => $slug
			)
			, 'recursive' => 1
		));
		$publish = $this->CartItem->getItemPublishFlatConditions();
		$items = array();
		if (!empty($tags[0]['CartItem'])) {
			foreach($tags[0]['CartItem'] as $item) {
				if(!in_array($item['condition'], $publish)) {
					continue;
				}
				array_push($items, array('CartItem' => $item));
			}
		}
		if(!empty($tags[0]['CartItemTag']['term'])) {
			$this->pageTitle = $tags[0]['CartItemTag']['term'];
		}

		$this->crumbs = array();
		$this->set('items', $items);
		$this->set('itemSlug', $slug);

		$this->render('index');
	}

	/**
	 * getItem
	 */
	private function getItems($conditions = array()) {
		$conditions = array_merge(
			$conditions, $this->CartItem->getItemPublishConditions()
		);
		$this->paginate = array(
			'conditions' => $conditions
			, 'order' => 'CartItem.modified'
			, 'limit' => 10
			, 'recursive' => 1
			, 'cache' => false
		);
		$items = $this->paginate('CartItem');

		if (empty($items[0])) {
			$items = array();
		}

		return $items;
	}
}
