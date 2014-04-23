<h1 class="mod-heading">注文完了</h1>

<section class="mod-cart">
<p class="mod-cart-link"><i class="icon-angle-left"></i><?php $this->BcBaser->link('お買いものを続ける','/'); ?></p>

<section class="mod-finish">
<p class="mod-finish-message">お買い上げありがとうございました。</p>
<div class="mod-finish-order">
<p class="mod-finish-order-caption">下記の注文番号をメモしてください。</p>
<table class="mod-finish-order-number">
	<tr>
		<th>注文番号</th>
		<td><?php echo h($code) ?></td>
	</tr>
</table>
</div>
<p class="mod-finish-notes">スタッフから近日中に購入の詳細についてメールいたします。<br>
	※3日以内に返信メールがない場合は、<a href="#">お問い合わせフォーム</a>よりご連絡ください。</p>
<p class="mod-finish-button"><a href="<?php echo $this->BcBaser->getUri('/') ?>"><i class="icon-angle-left icon-large"></i> お買いものを続ける</a></p>
<!-- /.mod-finish --></section>

<!-- /.mod-cart --></section>
