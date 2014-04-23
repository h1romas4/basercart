<?php echo $this->BcForm->create('CartItemTag') ?>

<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItemTag.term', 'タグ') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItemTag.term', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('CartItemTag.term') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItemTag.slug', 'スラッグ') ?>&nbsp;<span class="required">*</span></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItemTag.slug', array('type' => 'text', 'size' => 40, 'maxlength' => 255)) ?>
				<?php echo $this->BcForm->error('CartItemTag.slug') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('CartItemTag.seq', '順番') ?></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartItemTag.seq', array('type' => 'text', 'size' => 2, 'maxlength' => 2)) ?>
				<?php echo $this->BcForm->error('CartItemTag.seq') ?>
			</td>
		</tr>
	</table>
</div>

<div class="submit">
	<?php echo $this->BcForm->submit('保存', array('div' => false, 'class' => 'button')) ?>
	<?php if ($this->action == 'admin_edit'): ?>
		<?php $this->BcBaser->link('削除', array('action' => 'del', $this->BcForm->value('CartItemTag.id')), array('class' => 'button')); ?>
	<?php endif ?>
	<?php if($this->action == 'admin_edit'): ?>
		<?php echo $this->BcForm->input('CartItemTag.id', array('type' => 'hidden')) ?>
	<?php endif; ?>
</div>

<?php echo $this->BcForm->end() ?>
