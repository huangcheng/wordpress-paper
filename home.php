<?php get_header(); ?>

<main class="prose prose-neutral relative mx-auto min-h-[calc(100%-9rem)] max-w-3xl px-8 pb-16 pt-12 dark:prose-invert">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array('posts_per_page' => 5, 'paged' => $paged);

    $posts = get_posts($args);

    $avatar = get_theme_mod('avatar');

    $username = get_theme_mod('username');

    $bio = get_theme_mod('bio');
    ?>

    <div class="-mt-2 mb-16 flex items-center">
        <?php if ($avatar) : ?>
            <div class="mr-5 shrink-0 rounded-full border-[0.5px] border-black/10 bg-white/50 p-3 shadow dark:bg-white/[15%]">
                <img class="my-0 aspect-square w-16 rounded-full !bg-black/5 hover:animate-spin dark:!bg-black/80" src="<?php echo $avatar; ?>" alt="<?php echo $username; ?>"/>
            </div>
        <?php endif; ?>
        <?php if ($username) : ?>
            <div>
                <h1 class="mb-2 mt-3 text-[1.6rem] font-bold"><?php echo $username; ?></h1>
                <div class="break-words">
                    <?php echo $bio ? $bio : "A personal blog by $username"; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if (count($posts) > 0) : ?>
        <?php foreach ($posts as $post) : setup_postdata($post); ?>
            <section class="relative my-10 first-of-type:mt-0 last-of-type:mb-0">
                <h2 class="!my-0 pb-1 font-bold !leading-none"><?php the_title(); ?></h2>
                <time class="text-sm antialiased opacity-60"><?php the_time('Y-m-d'); ?></time>
                <a class="absolute inset-0 text-[0]" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </section>
            <?php wp_reset_postdata(); endforeach; ?>
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

<?php get_footer(); ?>
