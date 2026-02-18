<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container">
    <div class="main">
        <article class="page">
            <h1 class="page-title"><?php $this->title() ?></h1>
            <div class="page-content">
                <?php $this->content(); ?>
            </div>
        </article>
    </div>

    <?php $this->need('sidebar.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
