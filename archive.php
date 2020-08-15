<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
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
		<?php $ctpostCount=0; ?>
		<ul><?php while($this->next()): ?>
				<li><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><img src="<?php $this->options->themeUrl('/assets/img/file.ico'); ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a></li>
				<?php $ctpostCount++ ?>
			<?php endwhile; ?>
		</ul>
    </div>
    <div class="post_total">
		<div class="left"><?php echo $ctpostCount; ?> 个项目</div>
		<div class="right"><?php if ($this->is('tag')): ?>标签 <?php $this->tags(',', true, 'none'); ?> 下的相关文章<?php endif; ?><?php echo $this->getDescription(); ?><?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></div>
	</div>
</div>
<?php if ($this->have()): ?>
	<?php if($this->next()): ?>
		<div class="content">
			<div class="post_title">
				<img src="<?php $this->options->themeUrl('/assets/img/file.png'); ?>">
				<h1><?php $this->title() ?><?php $this->date(); ?> - <?php Views_Plugin::theViews('', '围观'); ?></h1>
				<a href="<?php $this->options->siteUrl(); ?>">
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
                <?php
                    $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)"[^>]*>/i';
                    preg_match_all($pattern, $this->content, $matchs);
                ?>
                <div class="btn" data-url="<?php $this->permalink(); ?>" 
                    data-pic="<?php echo $matchs[1][0] ?>" data-content="<?php $this->title(); ?>" onclick="shareqq(this)">
                    <span class="fa fa-share"></span>
                </div>
			</div>
			<ul class="topbar">
				<li></li>
			</ul>
			<div class="post_content">
        		<?php
                    $pattern = '/\<img.*?src\=\"(.*?)\".*?alt\=\"(.*?)"[^>]*>/i';
                    $replacement = '<a target="_blank" href="$1"><img src="$1" alt="$2" title="$2"></a>';
                    $content = preg_replace($pattern, $replacement, $this->content);
                    echo $content;
                ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
<?php $this->need('footer.php'); ?>