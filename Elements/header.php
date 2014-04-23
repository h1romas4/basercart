<?php
/**
 * ヘッダー
 */
?>

<div class="base-header">
<header class="mod-header"><div class="mod-header-inner">
<h1 class="mod-header-sitetitle">basercart</h1>
<p class="mod-header-cart"><?php echo $this->BcBaser->getGoodsLink('<i class="icon-shopping-cart"></i> お買いものかご'); ?></p>
<div class="mod-header-figure <?php if(!$this->BcBaser->hasGoods()) { echo "noitem"; } ?>">
<div class="mod-header-basket">
<span class="acorn"><?php $this->BcBaser->img('base/acorn.png'); ?></span>
</div>
<p class="mod-header-character"><?php $this->BcBaser->img('base/character.png'); ?></p>
<!-- /.mod-header-figure --></div>
</div><!-- /.mod-header --></header>

<nav class="mod-globalnavi">
<?php $this->BcBaser->element('global_menu') ?>
<!-- /.mod-globalnavi --></nav>

<!-- /.base-header --></div>


