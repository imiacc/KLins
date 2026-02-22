<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    // 基本设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('basicSection', NULL, 'basic'));
    
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowCategory' => _t('显示分类'),
    'ShowTag' => _t('显示标签'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowCategory', 'ShowTag', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());

    // 动画设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('animationSection', NULL, 'animation'));
    
    $triangleAnimation = new Typecho_Widget_Helper_Form_Element_Radio('triangleAnimation',
    array('1' => _t('开启'),
    '0' => _t('关闭')),
    '0', _t('三角形动画'), _t('是否开启背景随机三角形动画'));
    $form->addInput($triangleAnimation);

    $triangleDensity = new Typecho_Widget_Helper_Form_Element_Select('triangleDensity',
    array('low' => _t('稀疏'),
    'medium' => _t('中等'),
    'high' => _t('密集')),
    'medium', _t('三角形密度'), _t('控制背景三角形的生成密度'));
    $form->addInput($triangleDensity);

    // 文章设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('articleSection', NULL, 'article'));
    
    $tocEnabled = new Typecho_Widget_Helper_Form_Element_Radio('tocEnabled',
    array('1' => _t('开启'),
    '0' => _t('关闭')),
    '1', _t('文章目录'), _t('是否在文章页显示目录'));
    $form->addInput($tocEnabled);

    $tocPosition = new Typecho_Widget_Helper_Form_Element_Select('tocPosition',
    array('right' => _t('右侧'),
    'left' => _t('左侧')),
    'right', _t('目录位置'), _t('选择目录显示位置'));
    $form->addInput($tocPosition);

    $articleWidth = new Typecho_Widget_Helper_Form_Element_Text('articleWidth', NULL, '70', _t('文章内容宽度(%)'), _t('设置文章内容区域占宽度的百分比，建议 60-80'));
    $form->addInput($articleWidth);

    $showReadingTime = new Typecho_Widget_Helper_Form_Element_Radio('showReadingTime',
    array('1' => _t('显示'),
    '0' => _t('隐藏')),
    '1', _t('阅读时间'), _t('是否显示文章预计阅读时间'));
    $form->addInput($showReadingTime);

    $showWordCount = new Typecho_Widget_Helper_Form_Element_Radio('showWordCount',
    array('1' => _t('显示'),
    '0' => _t('隐藏')),
    '1', _t('字数统计'), _t('是否显示文章字数统计'));
    $form->addInput($showWordCount);

    // 代码设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('codeSection', NULL, 'code'));
    
    $codeHighlight = new Typecho_Widget_Helper_Form_Element_Radio('codeHighlight',
    array('1' => _t('开启'),
    '0' => _t('关闭')),
    '1', _t('代码高亮'), _t('是否开启代码块语法高亮功能'));
    $form->addInput($codeHighlight);

    $codeTheme = new Typecho_Widget_Helper_Form_Element_Select('codeTheme',
    array('default' => _t('默认'),
    'atom' => _t('Atom'),
    'dark' => _t('Dark'),
    'light' => _t('Light'),
    'monokai' => _t('Monokai'),
    'solarized' => _t('Solarized')),
    'default', _t('代码主题'), _t('选择代码高亮主题'));
    $form->addInput($codeTheme);

    // 底部设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('footerSection', NULL, 'footer'));
    
    $visitorStats = new Typecho_Widget_Helper_Form_Element_Textarea('visitorStats', NULL, '', _t('访问人数统计'), _t('在此处填入访问统计代码（如百度统计、Google Analytics等），将显示在网站底部右侧'));
    $form->addInput($visitorStats);

    $moeIcp = new Typecho_Widget_Helper_Form_Element_Text('moeIcp', NULL, '', _t('MOE备案号'), _t('在此处填入MOE备案号（示例：MOE备案号 12345678）'));
    $form->addInput($moeIcp);

    $chinaIcp = new Typecho_Widget_Helper_Form_Element_Textarea('chinaIcp', NULL, '', _t('公安备案HTML代码'), _t('在此处填入公安备案的完整HTML代码，支持包含国徽图标的代码（示例：<a href="https://beian.mps.gov.cn" target="_blank"><img src="国徽图标路径" />京公网安备12345678号</a>）'));
    $form->addInput($chinaIcp);

    // 外观设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('appearanceSection', NULL, 'appearance'));
    
    $backgroundImage = new Typecho_Widget_Helper_Form_Element_Text('backgroundImage', NULL, '', _t('全局背景图片'), _t('在此处填入背景图片URL，图片将自动模糊处理，不影响文字阅读'));
    $form->addInput($backgroundImage);

    $darkMode = new Typecho_Widget_Helper_Form_Element_Select('darkMode',
    array('auto' => _t('Auto'),
    'light' => _t('Light'),
    'dark' => _t('Dark')),
    'auto', _t('黑夜模式'), _t('选择默认黑夜模式：Auto（跟随系统）、Light（浅色模式）、Dark（深色模式）'));
    $form->addInput($darkMode);

    // 自定义设置
    $form->addInput(new Typecho_Widget_Helper_Form_Element_Hidden('customSection', NULL, 'custom'));
    
    $customCss = new Typecho_Widget_Helper_Form_Element_Textarea('customCss', NULL, '', _t('自定义 CSS'), _t('在这里输入自定义 CSS 代码，将应用到整个主题'));
    $form->addInput($customCss);
}

function themeFields($layout) {
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('文章缩略图'), _t('输入图片URL，用于文章列表显示缩略图'));
    $layout->addItem($thumb);

    $showToc = new Typecho_Widget_Helper_Form_Element_Radio('showToc',
    array('1' => _t('显示'),
    '0' => _t('隐藏')),
    '1', _t('显示目录'), _t('是否在本文显示目录（覆盖全局设置）'));
    $layout->addItem($showToc);
}
