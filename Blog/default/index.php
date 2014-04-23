<?php
/**
 * ブログトップ
 */
$this->BcBaser->css('admin/colorbox/colorbox', array('inline' => true));
$this->BcBaser->js('admin/jquery.colorbox-min-1.4.5', false);
$this->BcBaser->setDescription($this->Blog->getDescription());
?>
<!-- blog title -->

<script type="text/javascript">
$(function(){
	if($("a[rel='colorbox']").colorbox) $("a[rel='colorbox']").colorbox({transition:"fade"});
	});
</script>
<h2 class="mod-heading">
<?php $this->Blog->title() ?>
</h2>
<!-- blog description -->
<?php if ($this->Blog->descriptionExists()): ?>
	<p class="blog-description">
	<?php $this->Blog->description() ?>
	</p>
<?php endif; ?>

<?php if (!empty($posts)): ?>
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<h4 class="contents-head">
			<?php $this->Blog->postTitle($post) ?>
			</h4>
			<?php $this->Blog->postContent($post, false, '続きを読む') ?>
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
	<?php endforeach; ?>
<?php else: ?>
	<p class="no-data">記事がありません。</p>
<?php endif; ?>
<!-- pagination -->
<?php $this->BcBaser->pagination('simple'); ?>