<?php get_header(); ?>


<section class="container-fluid">
    <div class="row">
        <div class="col p-0" id="cover__img">
            <div id="cover__overlay">
                <h1 class="text-center px-2">Titre du site</h1>
            </div>
        </div>
    </div>
</section>
</header>

<main>
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