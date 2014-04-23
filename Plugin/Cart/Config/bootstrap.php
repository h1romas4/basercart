<?php
/*
 * プラグイン設定ロード
 */
loadPluginConfig('Cart.setting');

/*
 * プラグインで使う、セッション名定数定義
 * 
 * カートの内容を格納するセッションは全コントローラで共有するため定数で定義。
 * プラグインの bootstrap.php が複数回コールされるので存在確認後設定。
 */
if(!defined('SESSION_CART')) {
	define('SESSION_CART', 'cart');
}
