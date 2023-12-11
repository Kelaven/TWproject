<footer class="footer__bg">
    <section>
        <div class="container-fluid">
            <!-- footer picture -->
            <div class="row">
                <div class="col p-0">
                    <img id="footer__img" src="/wp-content/themes/pkm/public/assets/img/Pokemon_cover_image.jpg" alt="photo de couverture d'un paysage pokemon">
                </div>
            </div>
            <!-- footer h2 -->
            <div class="row">
                <div class="col text-center d-flex flex-wrap justify-content-center pt-5">
                    <h2 class="footer__h2">Découvrez</h2>
                    <h3 class="pt-3 footer__h3">Articles les plus récents</h3>
                    <hr>
                </div>
            </div>

            <div class="row py-5 text-center ">
            <?php
                    $args = array(
                        'post_type' => 'post',
                        // 'category_name' => 'mondemagique',
                        'posts_per_page' => 3,
                    );

                    $my_query = new WP_Query($args);

                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <div class="col py-2 p-lg-0 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'card__img']); ?>
                        <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-dark">Voir plus</a>
                        </div>
                    </div>
                </div>

                    <?php
                    endwhile;
                    endif;

                    wp_reset_postdata();
                    ?>
            </div>









            <!-- cards -->
            <!-- <div class="row py-5 text-center ">
                <div class="col py-2 p-lg-0 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="/wp-content/themes/pkm/public/assets/img/pokemon-image-for-article.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Éclosion Céleste</h5>
                            <p class="card-text">Sous l'éclat d'un alignement céleste, un Pokémon rare a vu le jour, son existence chuchotée par les vents du destin.</p>
                            <a href="#" class="btn btn-dark">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col py-4 p-lg-0 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="/wp-content/themes/pkm/public/assets/img/pokemon_city_picture_for-article.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lumiverde : cité rêvée</h5>
                            <p class="card-text">La cité Pokémon de Lumiverde s'épanouit au cœur d'une vallée mystique, où les aventuriers et les Pokémon vivent en harmonie.</p>
                            <a href="#" class="btn btn-dark">Voir plus</a>
                        </div>
                    </div>
                </div>
                <div class="col py-2 p-lg-0 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="/wp-content/themes/pkm/public/assets/img/pokemon-dresser-picture-for-article.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Éclatante Style</h5>
                            <p class="card-text">Dans son manteau écarlate orné d'écailles argentées, la dresseuse Éclatante reflète la fusion entre la mode et l'aventure.</p>
                            <a href="#" class="btn btn-dark">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- trad footer -->
            <div class="row pt-5  text-center">
                <div class="col">
                    <h5 class="footer__trad__h5 ps-4 ms-2">Accès rapide</h5>
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-footer' ) ); ?>
                </div>
                <div class="col">
                    <h5 class="footer__trad__h5">
                        Contactez-nous
                    </h5>
                    <p id="footer__adress" class="text-center pt-4">
                        70 rue des jacobins <br>
                        80 000 Amiens <br>
                        contactus@centrepkm.fr
                    </p>
                </div>
                <div class="col">
                    <form class="d-flex justify-content-center flex-wrap py-3 py-lg-0 pt-xl-3">
                        <label for="email" class="w-100"><small>Inscrivez-vous à notre newsletter</small></label>
                        <div class="input-group">
                            <input type="email" name="email" id="email" placeholder="Entrez votre mail" class="form-control">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</footer>




<?php wp_footer(); ?> <!-- pour charger les scripts -->

</body>

</html>