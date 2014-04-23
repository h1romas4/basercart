<?php
/**
 * ブログ詳細ページ
 */
$this->BcBaser->css('admin/colorbox/colorbox', array('inline' => true));
$this->BcBaser->js('admin/jquery.colorbox-min-1.4.5', false);
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->Blog->getPostContent($post, false, false, 50));
?>

<script type="text/javascript">
$(function(){
	if($("a[rel='colorbox']").colorbox) $("a[rel='colorbox']").colorbox({transition:"fade"});
	});
</script>



<h1 class="mod-heading"><?php $this->Blog->title() ?></h1>

<div class="post">
<h2 class="contents-head">
<?php $this->BcBaser->contentsTitle() ?>
</h2>

<div class="eye-catch">
<?php echo $this->Blog->eyeCatch($post) ?>
</div>

<?php $this->Blog->postContent($post) ?>
	<div class="meta">
		<span class="date">
<?php $this->Blog->postDate($post) ?>
		</span>
		<span class="category">
			<?php $this->Blog->category($post) ?>
			&nbsp;
<?php $this->Blog->author($post) ?>
		</span>
    </div>
<?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?>
</div>
<div id="contentsNavi">
	<?php $this->Blog->prevLink($post) ?>
	&nbsp;  &nbsp;
<?php $this->Blog->nextLink($post) ?>
</div>
<?php $this->BcBaser->element('blog_comments') ?>