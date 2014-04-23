<?php
/**
 * CartHelper
 * 
 * @author hiromasa
 */
class CartHelper extends AppHelper {
	/**
	 * List of helpers used by this helper
	 */
	public $helpers = array('BcBaser', 'Html');

	/**
	 * getDetailLink
	 * 
	 * @param unknown $id
	 */
	public function getDetailLink($id) {
		return $this->Html->url(array(
			"controller" => "items"
			, "action" => "detail"
			, $id
		));
	}

	/**
	 * getImageLink
	 * 
	 * @param unknown $id
	 * @param unknown $image
	 */
	public function getItemImage($upload, $title, $image) {
		if($image == '') return '';
		$settings = $upload['CartItem'];
		$fileUrl = '/files/' . str_replace(DS, '/', $settings['saveDir']) . '/';
		return $this->Html->image($fileUrl . $image, array(
			"alt" => $title
		));
	}

	/**
	 * getSoldout
	 * 
	 * @param unknown $condition
	 */
	public function getSoldout($condition) {
		// TODO:
		if($condition == '10') {
			return 'soldout';
		}
		return '';
	}
}
