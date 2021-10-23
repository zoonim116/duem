<?php get_header(); ?>
    <section class="slider-section">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php if (get_field('slider')): ?>
                    <?php foreach (get_field('slider') as $index => $slider): ?>
                        <?php if ($index == 0): ?>
                            <button type="button" data-bs-target="#myCarousel" class="active" aria-current="true" data-bs-slide-to="<?php echo $index; ?>" aria-label="Slide <?php echo $index; ?>"></button>
                        <?php else: ?>
                            <button type="button" data-bs-target="#myCarousel"  data-bs-slide-to="<?php echo $index; ?>" aria-label="Slide <?php echo $index; ?>"></button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="carousel-inner">
                <?php if (get_field('slider')): ?>
                    <?php foreach (get_field('slider') as $index => $slider): ?>
                        <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
                            <img class="d-block w-100" src="<?php echo $slider ?>" alt="First slide">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="container">
            <?php foreach (get_field('advertisement') as $ad): ?>
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-5 about-us__content">
                        <h1><?php echo $ad['title']; ?></h1>
                        <?php echo $ad['content']?>
                        <div class="btn-wrap"><a href="<?php echo $ad['page_link']?>" class="btn"><span>Подробнее</span></a></div>
                    </div>
                    <div class="col-md-6 col-lg-7 about-us__img">
                        <img src="<?php echo $ad['picture']; ?>" alt="about us">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php get_footer(); ?>