<?php wp_footer(); ?>

<footer class="opaco mx-auto flex h-[4.5rem] max-w-3xl items-center px-8 text-[0.9em] opacity-60">
    <div class="mr-auto">
        &copy; <?php echo date('Y'); ?>
        <a class="link" href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo('title'); ?></a>
    </div>
    <a class="link mx-6" href="https://wordpress.org" rel="noopener" target="_blank">Powered by WordPress</a>️
    <a class="link" href="https://github.com/huangcheng/wordpress-paper" rel="noopener" target="_blank">✎ Paper</a>
</footer>

</body>
</html>
