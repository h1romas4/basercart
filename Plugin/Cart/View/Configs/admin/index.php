<?php echo $this->BcForm->create('CartConfig', array('url' => array('controller' => 'configs', 'action' => 'edit'))) ?>

<h2>基本項目</h2>

<div class="section">
	<table cellpadding="0" cellspacing="0" id="FormTable" class="form-table">
		<tr>
			<th><?php echo $this->BcForm->label('CartConfig.tax', '税率') ?></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartConfig.tax', array('type' => 'text', 'size' => 3, 'maxlength' => 3)) ?>%
				<?php echo $this->BcForm->error('CartConfig.tax') ?>
			</td>
		</tr>
		<!-- TODO:
		<tr>
			<th><?php echo $this->BcForm->label('CartConfig.mail_replay', '自動返信メール文面') ?></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('CartConfig.mail_replay', array(
					'type' => 'textarea'
					, 'cols' => 80
					, 'rows' => 15
					, 'maxlength' => 2000
				)) ?>
				<?php echo $this->BcForm->error('CartConfig.mail_replay') ?>
			</td>
		</tr>
		-->
	</table>
</div>

<div class="submit">
	<?php echo $this->BcForm->submit(
		'保存', array('div' => false, 'class' => 'button')) ?>
</div>

<?php echo $this->BcForm->end() ?>
