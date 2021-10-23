<footer>
    <div class="container">
        <div class="row justify-content-between align-content-center">
            <div class="col logo-wrap">
                <a href="<?php echo get_site_url(); ?>">Duem</a>
            </div>
            <div class="col footer-social">
                <ul class="d-flex justify-content-end">
					<?php if ( get_field( 'facebook', 'option' ) ): ?>
                        <li><a href="<?php the_field( 'facebook', 'option' ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/facebook.svg">
                            </a></li>
					<?php endif; ?>
					<?php if ( get_field( 'instagram', 'option' ) ): ?>
                        <li><a href="<?php the_field( 'instagram', 'option' ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/insta.svg">
                            </a></li>
					<?php endif; ?>
					<?php if ( get_field( 'telegram', 'option' ) ): ?>
                        <li><a href="<?php the_field('telegram', 'option'); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/telegram.svg">
                            </a></li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>