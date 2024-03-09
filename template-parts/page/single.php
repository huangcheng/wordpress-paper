<?php get_header(); ?>

<main class="prose prose-neutral relative mx-auto min-h-[calc(100%-9rem)] max-w-3xl px-8 pb-16 pt-12 dark:prose-invert">
    <?php
    $post = get_post();

    $post_title = $post->post_title;

    $post_date = $post->post_date;

    $post_date = date('Y-m-d', strtotime($post_date));

    $post_author = $post->post_author;

    $post_author = get_the_author_meta('display_name', $post_author);

    $post_content = $post->post_content;

    $post_tags = get_the_tags($post->ID);
    ?>
    <article>
        <header class="mb-16">
            <h1 class="!my-0 pb-2.5"><?php echo $post_title ?></h1>
            <div class="text-sm antialiased opacity-60">
                <time><?php echo $post_date ?></time>
                <span class="mx-1">&middot;</span>
                <span><?php echo $post_author ?></span>
            </div>
        </header>
        <section><?php echo $post_content ?></section>
    </article>

    <?php if ($post_tags) : ?>
        <footer class="mt-12 flex flex-wrap">
            <?php foreach ($post_tags as $tag) : ?>
                <?php
                $tag_link = get_tag_link($tag->term_id);

                $tag_name = $tag->name;
                ?>
                <a class="mb-1.5 mr-1.5 rounded-lg bg-black/[3%] px-5 py-1.5 no-underline dark:bg-white/[8%]" href="<?php echo $tag_link ?>">
                    <?php echo $tag_name ?>
                </a>
            <?php endforeach; ?>
        </footer>
    <?php endif; ?>

    <?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    ?>
    <?php if (!empty($prev_post) || !empty($next_post)) : ?>
        <nav class="mt-24 flex rounded-lg bg-black/[3%] text-lg dark:bg-white/[8%]">
            <? if (!empty($next_post)) : ?>
                <a
                    class="flex w-1/2 items-center rounded-l-md p-6 pr-3 font-semibold no-underline hover:bg-black/[2%] dark:hover:bg-white/[3%]"
                    href="<?php echo get_permalink( $next_post->ID ); ?>"
                >
                    <span class="mr-1.5">←</span><span><?php echo $next_post->post_title; ?></span>
                </a>
            <? endif; ?>
            <? if (!empty($prev_post)) : ?>
                <a
                    class="ml-auto flex w-1/2 items-center justify-end rounded-r-md p-6 pl-3 font-semibold no-underline hover:bg-black/[2%] dark:hover:bg-white/[3%]"
                    href="<?php echo get_permalink( $prev_post->ID ); ?>"
                >
                    <span><?php echo $prev_post->post_title; ?></span><span class="ml-1.5">→</span></a>
            <? endif; ?>
        </nav>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
