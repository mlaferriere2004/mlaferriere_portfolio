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

<div class="details">
    <div class="wrapper">

        <?php
        $favorite = get_field('is_favorite');
        ?>

        <h2>Détails:</h2>
        <ul>
            <?php if ($favorite) : ?>
                <li class="favorite">
                    <svg class="icon icon--md">
                        <use xlink:href="#icon-heart"></use>
                    </svg>
                    <p>Un de nos favoris!</p>
                    <svg class="icon icon--md">
                        <use xlink:href="#icon-heart"></use>
                    </svg>
                </li>
            <?php endif; ?>

            <?php if(get_field('preparation_time')) : ?>
                <li>
                    <p>Temps de préparation: <?php the_field('preparation_time'); ?></p>
                </li>
            <?php endif; ?>

            <?php if(get_field('portion_amount')) : ?>
                <li>
                    <p>Nombre de portions: <?php the_field('portion_amount'); ?> portions</p>
                </li>
            <?php endif; ?>

            <?php if(get_field('calorie_amount')) : ?>
                <li>
                    <p>Calories par portions: <?php the_field('calorie_amount'); ?> par portions</p>
                </li>
            <?php endif; ?>

            <?php if(get_field('target')) : ?>
            <li>
                <p>Pour les amateurs de: <?php the_field('target'); ?></p>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="description">
    <div class="wrapper">
        <h2>Résumer de la recette:</h2>
        <?php the_content();?>
    </div>
</div>


<?php if ( have_rows('gallery')) : ?>
    <!-- Slider main container -->
    <div class="swiper" data-component="Carousel" data-autoplay data-loop>
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

            <?php while(have_rows('gallery')) : the_row();?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <?php
                        $image = get_sub_field('photo');
                        if(!empty( $image )) :
                    ?>
                    <img src="<?php echo esc_url($image['url']);?>" alt="<?php echo esc_attr($image['alt']);?>" />
                    <?php endif; ?>
                    <p><?php the_sub_field('caption')?></p>
                </div>
            <?php endwhile;?>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
<?php endif; ?>


<?php get_footer(); ?>
