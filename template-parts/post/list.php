<main class="prose prose-neutral relative mx-auto min-h-[calc(100%-9rem)] max-w-3xl px-8 pb-16 pt-12 dark:prose-invert">
    <?php
    $query = $args['query'];
    ?>

    <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <section class="relative my-10 first-of-type:mt-0 last-of-type:mb-0">
                <h2 class="!my-0 pb-1 font-bold !leading-none"><?php the_title(); ?></h2>
                <time class="text-sm antialiased opacity-60"><?php the_time('Y-m-d'); ?></time>
                <a class="absolute inset-0 text-[0]" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </section>
            <?php wp_reset_postdata(); endwhile; ?>
    <?php endif; ?>

    <nav class="mt-16 flex">
        <?php if (get_previous_posts_link()) : ?>
            <a class="btn" href="<?php previous_posts(); ?>"><?php echo __('Prev Page', 'paper'); ?></a>
        <?php endif; ?>

        <?php if (get_next_posts_link()) : ?>
            <a class="btn ml-auto" href="<?php next_posts(); ?>"><?php echo __('Next Page', 'paper'); ?></a>
        <?php endif; ?>
    </nav>
</main>
