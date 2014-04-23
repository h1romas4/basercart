<tr>
	<td class="row-tools">
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('width' => 24, 'height' => 24, 'alt' => '編集', 'class' => 'btn')), array('action' => 'edit', $data['CartOrder']['id']), array('title' => '編集')) ?>
	</td>
	<td><?php echo h($status[$data['CartOrder']['status']]) ?></td>
	<td><?php $this->BcBaser->link(h($data['CartOrder']['code']), array('action' => 'edit', $data['CartOrder']['id'])) ?></td>
	<td><?php echo h($data['CartOrder']['email']) ?></td>
	<td><?php echo h($data['CartOrder']['name']) ?></td>
	<td><?php echo h($data['CartOrder']['created']) ?></td>
	<td><?php echo h($data['CartOrder']['modified']) ?></td>
</tr>
