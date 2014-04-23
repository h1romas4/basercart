<?php $this->BcBaser->element('pagination') ?>

<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<thead>
		<tr>
			<th class="list-tool" style="width: 52px"></th>
			<th style="width: 4em"><?php echo $this->Paginator->sort('seq' , array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . ' 順番', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . ' NO'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th><?php echo $this->Paginator->sort('term', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . ' タグ', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . ' NO'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
			<th><?php echo $this->Paginator->sort('slug', array('asc' => $this->BcBaser->getImg('admin/blt_list_down.png', array('alt' => '昇順', 'title' => '昇順')) . ' スラッグ', 'desc' => $this->BcBaser->getImg('admin/blt_list_up.png', array('alt' => '降順', 'title' => '降順')) . ' NO'), array('escape' => false, 'class' => 'btn-direction')) ?></th>
		</tr>
	</thead>
<tbody>
	<?php if(!empty($datas)): ?>
		<?php foreach ($datas as $data): ?>
			<?php $this->BcBaser->element('item_tags/index_row', array('data' => $data)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="4"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>

<?php $this->BcBaser->element('pagination') ?>

<?php $this->BcBaser->element('list_num') ?>
