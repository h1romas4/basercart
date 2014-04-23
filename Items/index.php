<div class="mod-category">
<ul class="mod-category-list">
<?php echo $this->BaserCart->getTagLinks($tagLinks, $itemSlug); ?>
</ul>
<!-- /.mod-category --></div>

<section class="mod-items">
<ul class="mod-items-list">
<?php foreach($items as $item) : ?>
<li class="mod-items-listitem <?php echo $this->Cart->getSoldout($item['CartItem']['condition']); ?>">
<a href="<?php echo $this->Cart->getDetailLink($item['CartItem']['id']); ?>">
<?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image1']); ?>
<div class="mod-items-caption">
<p class="mod-items-text"><?php echo h($item['CartItem']['title']) ?></p>
<p class="mod-items-price">&yen;<?php echo h($item['CartItem']['price']) ?></p>
<?php if($this->Cart->getSoldout($item['CartItem']['condition']) == 'soldout') :?>
<p class="mod-items-soldout">SOLD OUT</p>
<?php endif ?>
</div>
</a>
</li>
<?php endforeach ?>
</ul>
<!-- /.mod-itemlist --></section>

<?php $this->BcBaser->pagination('simple'); ?>
