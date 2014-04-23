<?php echo $this->BcForm->create('CartItem', array('type' => 'file')) ?>

<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItem.condition', '状態') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItem.condition', array('type' => 'radio', 'options' => $conditions)) ?>
				<?php echo $this->BcForm->error('CartItem.condition') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItemTag', 'タグ') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItemTag', array('type' => 'select', 'multiple' => 'checkbox', 'options' => $tags)) ?>
				<?php echo $this->BcForm->error('CartItemTag') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItem.title', '商品名') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItem.title', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('CartItem.title') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItem.price', '価格') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItem.price', array('type' => 'text', 'size' => 8, 'maxlength' => 8)) ?>
				<?php echo $this->BcForm->error('CartItem.price') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItem.description', '説明') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->ckeditor('CartItem.description', array(
					'editorWidth' => 'auto',
					'editorHeight' => '120px',
					'editorToolType' => 'simple',
					'editorEnterBr' => @$siteConfig['editor_enter_br']
				)); ?>
				<?php echo $this->BcForm->error('CartItem.description') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head">画像1</th>
			<td><?php echo $this->BcUpload->file('CartItem.image1') ?></td>
		</tr>
		<tr>
			<th class="col-head">画像2</th>
			<td><?php echo $this->BcUpload->file('CartItem.image2') ?></td>
		</tr>
		<tr>
			<th class="col-head">画像3</th>
			<td><?php echo $this->BcUpload->file('CartItem.image3') ?></td>
		</tr>
		<tr>
			<th class="col-head">画像4</th>
			<td><?php echo $this->BcUpload->file('CartItem.image4') ?></td>
		</tr>
	</table>
</div>

<div class="submit">
	<?php echo $this->BcForm->submit('保存', array('div' => false, 'class' => 'button')) ?>
	<?php if($this->action == 'admin_edit'): ?>
		<?php $this->BcBaser->link('削除', array('action' => 'del', $this->BcForm->value('CartItem.id')), array('class' => 'button')); ?>
	<?php endif ?>
	<?php if($this->action == 'admin_edit'): ?>
		<?php echo $this->BcForm->input('CartItem.id', array('type' => 'hidden')) ?>
	<?php endif; ?>
</div>

<?php echo $this->BcForm->end() ?>
