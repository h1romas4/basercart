<?php if(isset($error)) : ?>
<div class="wgt-error">入力にエラーがあります。確認して再度送信してください。</div>
<?php endif ?>

<h1 class="mod-heading">お買いものかごの中身</h1>

<section class="mod-cart">
<p class="mod-cart-link"><i class="icon-angle-left"></i><?php $this->BcBaser->link('お買いものを続ける','/'); ?></p>

<?php if(!empty($items)) : ?>
<table class="mod-cart-table">
<tbody>
<tr>
	<th>削除</th>
	<th colspan="2">商品</th>
	<th>単価</th>
</tr>
<?php $count = 0; ?>
<?php foreach($items as $item) : ?>
<tr>
	<td class="mod-cart-delete">
		<?php echo $this->BcForm->create('Goods', array('controller' => 'goods', 'action' => 'remove', 'name' => 'Goods' . $count)) ?>
		<button class="small" onclick="document.Goods<?php echo $count?>.submit(); return false;"><i class="icon-trash"></i> 削除</button>
		<?php echo $this->BcForm->hidden('id', array('value' => $count)); ?>
		<?php echo $this->BcForm->end(); ?>
	</td>
	<td class="mod-cart-thumb"><a href="<?php echo $this->Cart->getDetailLink($item['CartItem']['id']); ?>"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image1']); ?><a></a></td>
	<td class="mod-cart-itemname"><?php echo h($item['CartItem']['title']) ?></td>
	<td class="mod-cart-price">¥<?php echo h($item['CartItem']['price']) ?></td>
</tr>
<?php $count++; ?>
<?php endforeach ?>
</tbody>
<tfoot>
	<th colspan="3">合計</th>
	<td class="mod-cart-price">¥<?php echo h($total) ?></td>
</tfoot>
</table>

<?php else : ?>
<?php //空のとき ?>
<p class="center">あなたのお買いものかごは、からっぽです。</p>
<p class="center"><?php $this->BcBaser->img('Goods/empty.png'); ?></p>
<?php endif ?>

<p class="mod-cart-link"><i class="icon-angle-left"></i><?php $this->BcBaser->link('お買いものを続ける','/'); ?></p>
<!-- /.mod-cart --></section>

<?php if(!empty($items)) : ?>
<section class="mod-form">
<p>お名前とメールアドレスを入力してください。<br>
	スタッフから購入の詳細についてメールいたします。</p>
<p>※3日以内に返信メールがない場合は、お問い合わせフォームよりご連絡ください。</p>

<?php if(isset($error)) : ?>
<div class="wgt-error">
<?php foreach($error as $message) :?>
<p><?php echo h($message) ?></p>
<?php endforeach ?>
</div>
<?php endif ?>

<?php echo $this->BcForm->create('Goods', array('controller' => 'goods', 'action' => 'order', 'name' => 'Order')) ?>
<table class="mod-form-table">
<tr class="required">
	<th>お名前</th>
	<td><?php echo $this->BcForm->input('order_name');?></td>
<tr class="required">
	<th>メールアドレス</th>
	<td><?php echo $this->BcForm->input('order_mail') ?></td>
</tr>
<tr class="required">
	<th>メールアドレス確認</th>
	<td><?php echo $this->BcForm->input('order_emain_conform') ?></td>
</tr>
</table>

<p class="mod-form-button"><button class="button" onclick="document.Order.submit(); return false;"><i class="icon-envelope icon-large"></i> 送信する</button></p>
<?php echo $this->BcForm->hidden('id', array('value' => 'dummy')); ?>
<?php echo $this->BcForm->end(); ?>
<!-- /.mod-form --></section>
<?php endif ?>
