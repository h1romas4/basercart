<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<thead>
		<tr>
			<th class="list-tool" style="width: 52px"></th>
			<th style="width: 8em"><?php echo $this->Paginator->sort('status', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . '状態', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . '状態'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th style="width: 8em"><?php echo $this->Paginator->sort('code', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . '注文番号', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . '注文番号'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th style="width: 8em"><?php echo $this->Paginator->sort('email', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . 'メール', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . 'メール'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th><?php echo $this->Paginator->sort('name', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . 'お名前', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . '商品名'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th style="width: 8em"><?php echo $this->Paginator->sort('created', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . '注文日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . '注文日'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th style="width: 8em"><?php echo $this->Paginator->sort('modified', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . '更新日', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . '更新日'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		</tr>
	</thead>
<tbody>
	<?php if(!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('orders/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="5"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>

<?php $this->BcBaser->element('pagination') ?>

<?php $this->BcBaser->element('list_num') ?>
