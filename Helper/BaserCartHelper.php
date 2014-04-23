<?php
/**
 * BaserCartHelper
 * 
 * @author hiromasa
 */
class BaserCartHelper extends AppHelper {
	/**
	 * List of helpers used by this helper
	 */
	public $helpers = array('BcBaser', 'BcUpload', 'Html');

	/**
	 * getTagLinks
	 */
	public function getTagLinks($tagLinks, $itemSlug) {
		$all = '';
		if($itemSlug == '') {
			$all = 'class="current"';
		}
		echo '<li class="mod-category-listitem">'
			. '<a href="' . $this->BcBaser->getUri('/') . '" ' . $all . ">" . 'すべて' . '</a>'
			. '</li>' . "\n";
		foreach($tagLinks as $slug => $name) {
			$current = array();
			if($itemSlug == $slug) {
				$current = array('class'=> 'current');
			}
			$url = $this->Html->link(
				$name
				, array(
					'admin' => false
					, 'plugin' => 'cart'
					, 'controller' => 'items'
					, 'action' => 'tag'
					, $slug
				)
				, $current
			);
			echo '<li class="mod-category-listitem">' . $url . '</li>' . "\n";
		}
	}
}
