
<div class="accordion-item">
    <h2 class="accordion-header" id="heading_<?php the_ID(); ?>">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapseOne">
            <?php the_title(); ?>
        </button>
    </h2>
    <div id="collapse_<?php the_ID(); ?>" class="accordion-collapse collapse <?php echo $args['index'] == 0 ? 'show' : ''; ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <?php the_content(); ?>
        </div>
    </div>
</div>