<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle([
        'category' => _t('分类 %s 下的文章'),
        'search'   => _t('包含关键字 %s 的文章'),
        'tag'      => _t('标签 %s 下的文章'),
        'author'   => _t('%s 发布的文章')
    ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="description" content="<?php $this->options->description(); ?>">
    <meta name="keywords" content="<?php $this->keywords(); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <script src="<?php $this->options->themeUrl('script.js'); ?>"></script>
    <?php if ($this->options->codeHighlight): ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/<?php echo $this->options->codeTheme; ?>.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <?php endif; ?>
    <?php $this->header(); ?>
    <style>
        <?php if ($this->options->customCss): ?>
            <?php echo $this->options->customCss; ?>
        <?php endif; ?>
        <?php if ($this->options->backgroundImage): ?>
            body {
                background-image: url('<?php echo $this->options->backgroundImage; ?>');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                background-repeat: no-repeat;
            }
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: inherit;
                filter: blur(10px);
                z-index: -1;
            }
            .site-header, .container, .site-footer, .toc-popup, .toc-toggle-button {
                background-color: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(5px);
            }
        <?php endif; ?>
    </style>
</head>
<body data-triangle-animation="<?php echo $this->options->triangleAnimation; ?>" 
      data-triangle-density="<?php echo $this->options->triangleDensity; ?>" 
      data-toc-enabled="<?php echo $this->options->tocEnabled; ?>" 
      data-toc-position="<?php echo $this->options->tocPosition; ?>" 
      data-show-reading-time="<?php echo $this->options->showReadingTime; ?>" 
      data-show-word-count="<?php echo $this->options->showWordCount; ?>"
      data-code-highlight="<?php echo $this->options->codeHighlight; ?>">
    <header class="site-header">
        <div class="header-inner">
            <div class="header-left">
                <h1 class="site-title">
                    <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                </h1>
                <p class="site-description"><?php $this->options->description() ?></p>
            </div>
            <nav class="site-nav">
                <ul>
                    <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                        <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </nav>
        </div>
    </header>
