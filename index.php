<?php
/**
 * @package Typecho windows 95 Theme 
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.me
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="wrapper">
	<div class="default_title">
		<img src="<?php $this->options->themeUrl('/assets/img/mycomputer.png'); ?>">
		<a href="<?php $this->options->siteUrl(); ?>"><h1><?php $this->options->title() ?></h1></a>
	</div>
	<ul class="topbar">
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>
			<a href="<?php $pages->permalink(); ?>"><li><?php $pages->title(); ?></li></a>
		<?php endwhile; ?>
	</ul>
	<div class="tag_list">
		<ul id="tag-list">
			<li><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl('/assets/img/disk.png'); ?>">(Type:)</a>
				<ul><?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
					<?php while ($category->next()): ?>
						<li><a href="<?php $category->permalink(); ?>"><img src="<?php $this->options->themeUrl('/assets/img/folder.ico'); ?>"><?php $category->name(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</li>
		</ul>
		<ul id="tag-list">
			<li><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl('/assets/img/disk.png'); ?>">(Tags:)</a>
				<ul><?php $this->widget('Widget_Metas_Tag_Cloud')->to($tags); ?>
					<?php while ($tags->next()): ?>
						<li><a href="<?php $tags->permalink(); ?>"><img src="<?php $this->options->themeUrl('/assets/img/folder.ico'); ?>"><?php $tags->name(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="post_list">
		<ul>
			<?php while($this->next()): ?>
				<li><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><img src="<?php $this->options->themeUrl('/assets/img/file.ico'); ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a></li>
			<?php endwhile; ?>
		</ul>
	</div>
	<div class="post_total">
		<div class="left"><?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> 个项目</div>
		<div class="right">欢迎来来到本站<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
	</div>
</div>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
	<?php if ($pages->slug == 'about'): ?>
		<div class="content">
			<div class="post_title">
				<img src="<?php $this->options->themeUrl('/assets/img/file.png'); ?>">
				<h1><?php $pages->title(); ?></h1>
				<a href="<?php $pages->permalink(); ?>">
					<div class="btn">
						<span class="fa fa-times"></span>
					</div>
				</a>
				<div class="btn btn_max">
					<span class="fa fa-window-maximize"></span>
				</div>
				<div class="btn">
					<span class="fa fa-window-minimize"></span>
				</div>
			</div>
			<ul class="topbar">
				<li></li>
			</ul>
			<div class="post_content">
        		<?php
                    $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)"[^>]*>/i';
                    $replacement = '<a target="_blank" href="$1"><img src="$1" alt="$2" title="$2"></a>';
                    $content = preg_replace($pattern, $replacement, $pages->content);
                    echo $content;
                ?>
			</div>
		</div>
	<?php endif; ?>
<?php endwhile; ?>
<?php $this->need('footer.php'); ?>