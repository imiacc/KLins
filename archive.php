<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="main">
        <h1 class="archive-title">
            <?php if ($this->is('index')): ?>
                最新文章
            <?php elseif ($this->is('category')): ?>
                分类：<?php $this->archiveTitle(' &raquo; ', '', ''); ?>
            <?php elseif ($this->is('tag')): ?>
                标签：<?php $this->archiveTitle(' &raquo; ', '', ''); ?>
            <?php elseif ($this->is('search')): ?>
                搜索：<?php $this->archiveTitle(' &raquo; ', '', ''); ?>
            <?php else: ?>
                归档
            <?php endif; ?>
        </h1>

        <?php if ($this->have()): ?>
            <?php while($this->next()): ?>
                <article class="post">
                    <h2 class="post-title">
                        <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                    </h2>
                    <div class="post-meta">
                        <span class="date"><?php $this->date('Y-m-d'); ?></span>
                        <span class="author"><?php $this->author(); ?></span>
                        <span class="category"><?php $this->category(','); ?></span>
                        <span class="comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></span>
                    </div>
                    <div class="post-content">
                        <?php $this->excerpt(200, '...'); ?>
                    </div>
                    <div class="post-more">
                        <a href="<?php $this->permalink() ?>">阅读全文</a>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
        <?php else: ?>
            <div class="no-posts">
                <p>没有找到相关文章</p>
            </div>
        <?php endif; ?>
    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
