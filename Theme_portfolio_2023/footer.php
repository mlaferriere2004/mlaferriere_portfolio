<footer>
    <div class="wrapper">

        <?php if(get_field('copyright', 'options')) : ?>
        <p class="copyright"><?php the_field('copyright', 'options')?></p>
        <?php endif;?>

        <?php if ( have_rows('social', 'options')) : ?>
            <nav class="socials">
                <ul>
                    <?php while(have_rows('social', 'options')) : the_row();?>
                        <li class="social">
                            <a href="<?php the_sub_field('link')?>" class="social_link">
                                <svg class="icon icon--md">
                                    <use xlink:href="#icon-<?php the_sub_field('name')?>"></use>
                                </svg>
                            </a>
                        </li>
                    <?php endwhile;?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
    </body>
</html>