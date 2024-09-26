<?php get_header(); ?>

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

<div class="recent_recipes">
    <div class="wrapper">
            
        <?php the_content(); ?>

        <?php
            $arg = array(
                'post_type' => 'recipe',
                'post_status' => 'publish',
                'posts_per_page' => '2',
                'meta_key' => 'is_favorite',
                'meta_value' => true,
            );
            $query = new WP_Query($arg);
            ?>
            
        <div class="cards_container">
        <?php if($query->have_posts()):?>
            <?php while($query->have_posts()) : $query->the_post(); ?>
                    <a href="<?php the_permalink();?>" class="card">
                        <div class="card_media">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                        <div class="card_content">
                            <div class="card_title">
                                <h3><?php the_title();?></h3>
                                <?php if (get_field('is_favorite')) : ?>
                                <svg class="icon icon--lg">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <?php endif; ?>
                            </div>
                            <p>
                                <?php echo wp_trim_words( get_the_excerpt(), 30, ' [...]' ); ?>
                            </p>

                            <?php $categories = array(); ?>
                            <?php foreach(get_the_category() as $category) : ?>
                                <?php array_push($categories, $category->name); ?>
                            <?php endforeach; ?>

                            <?php if($categories) : ?>
                            <p>Catégories: <?php echo implode(', ', $categories);?></p>
                            <?php endif; ?>

                        </div>
                    </a>
                <?php endwhile;?>
            <?php endif;?>
            <?php wp_reset_postdata();?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
