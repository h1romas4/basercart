<tr>
	<th>商品</th>
	<td>
		<ul>
			<li><?php $this->BcBaser->link('商品一覧', array('plugin' => 'cart', 'controller' => 'items', 'action' => 'index')) ?></li>
			<li><?php $this->BcBaser->link('商品追加', array('plugin' => 'cart', 'controller' => 'items', 'action' => 'add')) ?></li>
			<li><?php $this->BcBaser->link('商品タグ一覧', array('plugin' => 'cart', 'controller' => 'item_tags', 'action' => 'index')) ?></li>
			<li><?php $this->BcBaser->link('商品タグ追加', array('plugin' => 'cart', 'controller' => 'item_tags', 'action' => 'add')) ?></li>
		</ul>
	</td>
</tr>
