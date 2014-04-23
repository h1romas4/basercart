<?php $this->BcBaser->docType('html5'); ?>
<html>
<head>
<?php $this->BcBaser->title() ?>
<?php $this->BcBaser->metaDescription() ?>
<?php $this->BcBaser->metaKeywords() ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php $this->BcBaser->css(array('baser-cart', 'style')) ?>
<?php $this->BcBaser->js(array('jquery-1.11.0.min.js', 'kickstart.js', 'baser-cart.js')) ?>
<?php $this->BcBaser->scripts() ?>
</head>
<body id="<?php $this->BcBaser->contentsName() ?>">
<div class="base-page" id="page">

<div class="base-header">
	<?php $this->BcBaser->header() ?>
<!-- /.base-header --></div>

<div class="base-contents">
<?php if ($this->BcBaser->isHome()): ?>
	<?php $this->BcBaser->content() ?>
<?php elseif ($this->BcBaser->isPage()): ?>
	<article>
		<h1 class="mod-heading"><?php $this->BcBaser->contentsTitle(); ?></h1>
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->content() ?>
		<?php $this->BcBaser->element('contents_navi') ?>
	</article>
<?php else: ?>
	<?php $this->BcBaser->content() ?>
<?php endif ?>
<!-- /.base-contents --></div>

<div class="base-footer">
	<?php $this->BcBaser->footer() ?>
<!-- /.base-footer --></div>

<!-- /.base-page --></div>

<?php $this->BcBaser->func() ?>
</body>
</html>
