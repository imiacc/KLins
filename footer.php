    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-left">
                <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. All rights reserved.</p>
                <p>Powered by <a href="https://typecho.org" target="_blank">Typecho</a>. Theme by <a href="#" target="_blank">You</a>.</p>
            </div>
            <div class="footer-right">
                <div class="footer-time">
                    <span id="current-time"></span>
                </div>
                <div class="footer-stats">
                    <?php if ($this->options->visitorStats): ?>
                        <?php echo $this->options->visitorStats; ?>
                    <?php endif; ?>
                </div>
                <div class="footer-icp">
                    <?php if ($this->options->moeIcp): ?>
                        <p><a href="https://beian.moe.gov" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline;"><?php echo $this->options->moeIcp; ?></a></p>
                    <?php endif; ?>
                    <?php if ($this->options->chinaIcp): ?>
                        <div><?php $this->options->chinaIcp(); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->footer(); ?>
    <script>
        function updateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const timeString = `${year}-${month}-${day} ${hours}:${minutes}`;
            const timeElement = document.getElementById('current-time');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }
        updateTime();
        setInterval(updateTime, 60000);
    </script>
</body>
</html>
