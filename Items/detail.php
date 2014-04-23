<div class="mod-category">
<ul class="mod-category-list">
<?php echo $this->BaserCart->getTagLinks($tagLinks, $itemSlug); ?>
</ul>
<!-- /.mod-category --></div>

<?php foreach($items as $item) : ?>
<article class="mod-detail">
<section class="mod-detail-photogallery">
<div class="mod-detail-photogallery-main">
<ul class="mod-detail-photogallery-list <?php echo $this->Cart->getSoldout($item['CartItem']['condition']); ?>">
<li class="mod-detail-photogallery-listitem"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image1']); ?></li>
<li class="mod-detail-photogallery-listitem"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image2']); ?></li>
<li class="mod-detail-photogallery-listitem"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image3']); ?></li>
<li class="mod-detail-photogallery-listitem"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image4']); ?></li>
</ul>
</div>
<?php if($this->Cart->getSoldout($item['CartItem']['condition']) == 'soldout') :?>
<p class="center">SOLD OUT</p>
<?php endif ?>
<div class="mod-detail-photogallery-sub">
<ul class="mod-detail-photogallery-pager">
<li class="mod-detail-photogallery-pageritem"><a data-slide-index="0" href="#"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image1']); ?></a></li>
<li class="mod-detail-photogallery-pageritem"><a data-slide-index="1" href="#"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image2']); ?></a></li>
<li class="mod-detail-photogallery-pageritem"><a data-slide-index="2" href="#"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image3']); ?></a></li>
<li class="mod-detail-photogallery-pageritem"><a data-slide-index="3" href="#"><?php echo $this->Cart->getItemImage($upload, $item['CartItem']['title'], $item['CartItem']['image4']); ?></a></li>
</ul>
</div>
</section>

<section class="mod-detail-info">
<table class="mod-detail-info-table">
<tr class="mod-detail-info-tr mod-detail-title">
<th class="mod-detail-info-th">商品</th>
<td class="mod-detail-info-td"><?php echo h($item['CartItem']['title']) ?></td>
</tr>
<tr class="mod-detail-info-tr mod-detail-price">
<th class="mod-detail-info-th">価格</th>
<td class="mod-detail-info-td">&yen;<?php echo h($item['CartItem']['price']) ?></td>
</tr>
</table>
<?php if($this->Cart->getSoldout($item['CartItem']['condition']) != 'soldout') :?>
<?php echo $this->BcForm->create('Goods', array('controller' => 'goods', 'action' => 'add', 'name' => 'Goods')) ?>
<p class="mod-detail-button"><a class="cartin" onclick="document.Goods.submit(); return false;">買い物かごに入れる</a></p>
<?php echo $this->BcForm->hidden('id', array('value' => $item['CartItem']['id'])); ?>
<?php echo $this->BcForm->end(); ?>
<?php endif ?>

<div class="mod-detail-description">
<?php echo $item['CartItem']['description'] ?>
</div>
</section>
<!-- /.mod-detail --></article>


<?php endforeach ?>