<?php
/*
 * シスナビ定義
 */
$config['BcApp.adminNavi.cart'] = array(
	'name'		=> 'ショッピングカート'
	, 'contents' => array(
		array(
			'name' => '注文一覧'
			, 'url' => array(
				'admin' => true
				, 'plugin' => 'cart'
				, 'controller' => 'orders'
				, 'action' => 'index'
			)
		)
		, array(
			'name' => '商品一覧'
			, 'url' => array(
				'admin' => true
				, 'plugin' => 'cart'
				, 'controller' => 'items'
				, 'action' => 'index'
			)
		)
		, array(
			'name' => '店舗設定'
			, 'url' => array(
				'admin' => true
				, 'plugin' => 'cart'
				, 'controller' => 'configs'
				, 'action' => 'index'
			)
		)
	)
);
