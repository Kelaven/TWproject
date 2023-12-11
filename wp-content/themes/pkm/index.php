<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col" id="main__content">

            <!-- ! contenu de la page d'accueil -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php the_content(); ?>

            <?php endwhile;
            endif; ?>

        </div>
    </div>
</section>
</main>


<?php get_footer(); ?>