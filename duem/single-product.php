<?php get_header(); ?>
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 single-product__img">
                <div class="single-product__img-wrap">
	                <?php echo get_the_post_thumbnail(); ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 single-product__info">
                <h1 class="title"><?php the_title(); ?></h1>
                <p class="gray"><?php _e('Taste', 'duem'); ?></p>
                <p class="text-uppercase"><?php the_field('taste'); ?></p>
                <p class="gray"><?php _e('Puff', 'duem'); ?></p>
                <p><?php the_field('puff'); ?></p>
                <p class="gray"><?php _e('Availability', 'duem'); ?></p>
                <p><?php echo get_field('availability') == 1 ? __('Available', 'duem') : __('Not Available', 'duem'); ?></p>
                <p class="gray"><?php _e('Price', 'duem'); ?></p>
                    <form>
                        <div class="row order align-content-end">
                            <div class="col-xxl-4 col-xl-6 d-flex align-content-center justify-content-between">
                                <p class="price"><?php the_field('price'); ?> грн</p>
	                            <?php if (get_field('availability') == 1): ?>
                                    <div class="count d-flex align-content-center justify-content-between">
                                        <input type="hidden" name="count" value="1" />
                                        <input type="hidden" name="product_id" value="<?php the_ID(); ?>">
                                        <button class="input-btn" id="inc">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/img/plus.svg" alt="plus">
                                        </button>
                                        <span>1</span>
                                        <button class="input-btn" id="decr">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/img/minus.svg" alt="minus">
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (get_field('availability') == 1): ?>
                            <div class="col-xxl-8 col-xl-6">
                                <input type="tel" id="phone" placeholder="<?php _e('Phone', 'duem'); ?>" />
                                <span class="d-none phone-error">Неверный номер</span>
                                <button class="btn" id="order"><span><?php _e('Order', 'duem'); ?></span></button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>
<section class="similar-price">
    <div class="container">
        <h3 class="title"><?php _e('Similar products', 'duem'); ?></h3>
        <div class="products-list">
            <div class="row">
                <?php do_action('show_similar_products_action'); ?>
            </div>
        </div>
    </div>
</section>

<div class="modal" id="success" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Спасибо за заказ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Мы получили ваш заказ. Менеджеры свяжуться с вами в ближайщее время.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="fail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Что-то пошло не так</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Что-то пошло не так, попробуйте позже.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
