<?php
/*
 * ベースパスのルーティングを商品一覧に上書き
 * 
 * @see app/Config/routes.php
 */
Router::connect(
	'/', array('plugin' => 'cart', 'controller' => 'items', 'action' => 'index'));
