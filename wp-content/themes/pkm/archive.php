<?php get_header(); ?>

<div class="container archive">
    <div class="row">
        <div class="col text-center d-flex flex-wrap justify-content-center pt-5">
            <h2 class="w-100"><?php single_term_title() ?></h2>
            <hr>
            <h3 class="pt-3 w-100 category__h3"><?= category_description() ?></h3>
        </div>
    </div>
</div>



<section class="container archive">

    <!-- cards -->

    <div class="row py-5 text-center ">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="col col-lg-4 py-2 p-lg-0 d-flex justify-content-center">
                    <div class="card mb-5" style="width: 18rem;">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'card__img']) ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-dark">Voir plus</a>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</section>
</main>





<?php get_footer(); ?>