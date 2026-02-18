<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<div class="comments-area">
    <h3 class="comments-title"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></h3>

    <?php $this->comments()->to($comments); ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
                <?php if ($this->user->hasLogin()): ?>
                    <p>登录身份：<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="退出">退出 &raquo;</a></p>
                <?php else: ?>
                    <div class="form-group">
                        <label for="author">昵称 *</label>
                        <input type="text" name="author" id="author" value="<?php $this->remember('author'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mail">邮箱 *</label>
                        <input type="email" name="mail" id="mail" value="<?php $this->remember('mail'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="url">网址</label>
                        <input type="url" name="url" id="url" value="<?php $this->remember('url'); ?>">
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="textarea">评论内容 *</label>
                    <textarea name="text" id="textarea" rows="5" required></textarea>
                </div>

                <div class="form-submit">
                    <button type="submit" class="submit-comment">提交评论</button>
                </div>
            </form>
        </div>

        <?php if ($comments->have()): ?>
            <div class="comments-list">
                <?php $comments->listComments(); ?>
                <div class="comments-pagination">
                    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <p class="comments-closed">评论已关闭</p>
    <?php endif; ?>
</div>
