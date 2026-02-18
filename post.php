<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="main">
        <div class="article-layout">
            <div class="article-main">
                <article class="post-single">
                    <h1 class="post-title"><?php $this->title() ?></h1>
                    <div class="post-meta">
                        <span class="date"><?php $this->date('Y-m-d H:i'); ?></span>
                        <span class="author"><?php $this->author(); ?></span>
                        <span class="category"><?php $this->category(','); ?></span>
                    </div>
                    <div class="post-tags">
                        <?php $this->tags(' ', true, '无标签'); ?>
                    </div>
                    <div class="post-content">
                        <?php $this->content(); ?>
                    </div>
                    <div class="post-navigation">
                        <div class="prev">
                            <?php $this->thePrev('&laquo; 上一篇', '没有上一篇了'); ?>
                        </div>
                        <div class="next">
                            <?php $this->theNext('下一篇 &raquo;', '没有下一篇了'); ?>
                        </div>
                    </div>
                </article>

                <?php $this->need('comments.php'); ?>
            </div>
            
            <div class="article-gap"></div>
            
            <div class="article-sidebar">
            </div>
        </div>
    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
