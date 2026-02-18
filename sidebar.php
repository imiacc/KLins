    <aside class="sidebar">
        <div class="sidebar-inner">
            <div class="widget">
                <h3 class="widget-title">搜索</h3>
                <div class="widget-content">
                    <form method="post" action="<?php $this->options->siteUrl(); ?>">
                        <input type="text" name="s" placeholder="搜索文章..." required>
                        <button type="submit">搜索</button>
                    </form>
                </div>
            </div>

            <div class="widget">
                <h3 class="widget-title">最新文章</h3>
                <ul class="widget-content">
                    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10')->to($recent); ?>
                    <?php while($recent->next()): ?>
                        <li><a href="<?php $recent->permalink(); ?>"><?php $recent->title(25); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="widget">
                <h3 class="widget-title">分类</h3>
                <ul class="widget-content">
                    <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
                    <?php while($categories->next()): ?>
                        <li><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?> (<?php $categories->count(); ?>)</a></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="widget">
                <h3 class="widget-title">标签</h3>
                <div class="widget-content tag-cloud">
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
                    <?php if($tags->have()): ?>
                        <?php while($tags->next()): ?>
                            <a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>暂无标签</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="widget">
                <h3 class="widget-title">归档</h3>
                <ul class="widget-content">
                    <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')->to($archives); ?>
                    <?php while($archives->next()): ?>
                        <li><a href="<?php $archives->permalink(); ?>"><?php $archives->date(); ?> (<?php $archives->count(); ?>)</a></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="widget">
                <h3 class="widget-title">友情链接</h3>
                <ul class="widget-content">
                    <?php if (class_exists('Widget_Contents_Link_List')): ?>
                        <?php $this->widget('Widget_Contents_Link_List')->to($links); ?>
                        <?php while($links->next()): ?>
                            <li><a href="<?php $links->url(); ?>" target="_blank"><?php $links->name(); ?></a></li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li>暂无友情链接</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </aside>
