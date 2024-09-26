<?php get_header(); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            
            <div class="hero">
                <div class="hero_media">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <div class="hero_content">
                    <div class="wrapper">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <section>
                <div class="wrapper">
                    <?php the_content(); ?>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>