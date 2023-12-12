<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <section class="container single">
            <div class="row py-4">
                <!-- single left menu -->
                <div class="col-12 order-1 order-lg-0 col-md-8 col-lg-2 pt-5 mt-2" id="single__left--articles">
                    <p>
                        Sur le même sujet
                    </p>
                    <hr>

                    <?php
                    $args = array(
                        'post_type' => 'post', // articles
                        'category_name' => 'mondemagique',
                        'posts_per_page' => 3,
                        'offset' => 1,
                    );

                    $my_query = new WP_Query($args);

                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'single__img--little']); ?></a>
                        <h5 class="py-2">
                            <a class="single__img--little--title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                    <?php
                    endwhile;
                    endif;

                    wp_reset_postdata();
                    ?>
                </div>
                <!-- single article -->
                <div class="col-12 order-0 order-lg-0 col-lg-10 pt-5" id="single__container">
                    <h2><?php the_title(); ?></h2>
                    <small class="pt-3"><?php the_author(); ?> • Le <?php the_time('j F Y à H:i'); ?></h3>
                        <p class="fst-italic py-2 pt-3">
                            <?php the_content(); ?>
                        </p>
                </div>
            </div>
        </section>
        </main>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>