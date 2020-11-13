</div><!-- #vue-wordpress-app -->
<div class="footer">
    <div class="container">
        <div class="footerWrapp">
            <?php if (is_active_sidebar('footer-left')) : ?>
                <div class="sidebarLeft">
                    <?php dynamic_sidebar('footer-left'); ?>
                </div>
            <?php endif; ?>
            <div class="sidebarCenter">
                <?php if (is_active_sidebar('footer-center')) : ?>

                    <?php dynamic_sidebar('footer-center'); ?>

                <?php endif; ?>
                <?php if (is_active_sidebar('footer-right')) : ?>
                    <div class="sidebarRight">
                        <?php dynamic_sidebar('footer-right'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>

</body>

</html>