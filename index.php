<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="main">
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
    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
