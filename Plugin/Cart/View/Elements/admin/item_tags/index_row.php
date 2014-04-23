<tr>
	<td class="row-tools">
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('width' => 24, 'height' => 24, 'alt' => '編集', 'class' => 'btn')), array('action' => 'edit', $data['CartItemTag']['id']), array('title' => '編集')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('width' => 24, 'height' => 24, 'alt' => '削除', 'class' => 'btn')), array('action' => 'del', $data['CartItemTag']['id']), array('title' => '削除', 'class' => 'btn-delete')) ?>
	</td>
	<td><?php echo $data['CartItemTag']['seq'] ?></td>
	<td><?php $this->BcBaser->link($data['CartItemTag']['term'], array('action' => 'edit', $data['CartItemTag']['id'])) ?></td>
	<td><?php echo $data['CartItemTag']['slug'] ?></td>
</tr>
