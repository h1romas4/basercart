<?php echo $this->BcForm->create('Order') ?>

<h2>注文内容</h2>

<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.status', 'ステータス') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartOrder.status', array('type' => 'select', 'options' => $status)) ?>
				<?php echo $this->BcForm->error('CartOrder.status') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.created', '注文日') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartOrder.created', array('type' => 'text', 'size' => 20, 'maxlength' => 255, 'readonly' => 'readonly', 'style' => 'background-color: #ddd')) ?>
				<?php echo $this->BcForm->error('CartOrder.created') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.created', '更新日') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartOrder.modified', array('type' => 'text', 'size' => 20, 'maxlength' => 255, 'readonly' => 'readonly', 'style' => 'background-color: #ddd')) ?>
				<?php echo $this->BcForm->error('CartOrder.modified') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.code', '注文番号') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartOrder.code', array('type' => 'text', 'size' => 20, 'maxlength' => 255, 'readonly' => 'readonly', 'style' => 'background-color: #ddd')) ?>
				<?php echo $this->BcForm->error('CartOrder.code') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.email', 'メールアドレス') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartOrder.email', array('type' => 'text', 'size' => 20, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('CartOrder.email') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.name', 'お名前') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartOrder.name', array('type' => 'text', 'size' => 20, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('CartOrder.name') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartOrder.memo', 'メモ') ?></th>
			<td class="col-input">
				<?php echo $this->BcForm->ckeditor('CartOrder.memo', array(
					'editorWidth' => 'auto',
					'editorHeight' => '120px',
					'editorToolType' => 'simple',
					'editorEnterBr' => @$siteConfig['editor_enter_br']
				)); ?>
				<?php echo $this->BcForm->error('CartOrder.memo') ?>
			</td>
		</tr>
	</table>
</div>

<h2>注文明細</h2>

<table cellpadding="0" cellspacing="0" class="list-table" id="ListTable">
	<thead>
		<tr>
			<th>商品名</th>
			<th style="width: 52px">税率</th>
			<th style="width: 52px">価格</th>
		</tr>
	</thead>
	<?php foreach($goods as $order) : ?>
	<tr>
		<td><?php echo h($order['CartItem']['title']) ?></td>
		<td><?php echo h($order['CartOrderDetail']['tax']) ?>%</td>
		<td>&yen;<?php echo h($order['CartOrderDetail']['price']) ?></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td></td>
		<td>合計</td>
		<td>&yen;<?php echo h($total) ?></td>
	</tr>
</table>

<div class="submit">
	<?php echo $this->BcForm->submit('保存', array('div' => false, 'class' => 'button')) ?>
	<?php if($this->action == 'admin_edit'): ?>
		<?php echo $this->BcForm->input('CartOrder.id', array('type' => 'hidden')) ?>
	<?php endif; ?>
</div>

<?php echo $this->BcForm->end() ?>
