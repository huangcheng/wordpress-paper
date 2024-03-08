<?php get_header(); ?>

<div class="article-list">
    <?php if ( have_posts() ) {
        while ( have_posts() ) : the_post(); ?>
            <article class="article-item" itemscope="itemscope" itemtype="http://schema.org/Article">

            </article>
        <?php endwhile;
    } else { ?>
        <article class="meta flex-center w-100" style="padding: 20% 0;flex-direction: column;">
            <h1>404</h1>
            <p>This page doesn't have what you're looking for.</p>
        </article>
    <?php }; ?>
</div>

<?php get_footer(); ?>
