<!DOCTYPE html>
<html <?php language_attributes(); ?> class="lg:text-base" style="--bg:#faf8f1">
<head>
    <?php $theme_ver = wp_get_theme( '' )[ 'Version' ] ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo get_bloginfo('title'); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_enqueue_style( 'style', get_stylesheet_uri() ); ?>
    <?php wp_enqueue_style( 'paper', get_template_directory_uri() . '/assets/css/paper.css', false, $theme_ver, 'all'); ?>
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>

<body>
    <header class="mx-auto flex h-[4.5rem] max-w-3xl px-8 lg:justify-center">
        <div class="relative z-50 mr-auto flex items-center">
            <a class="-translate-x-[1px] -translate-y-[1px] text-2xl font-semibold" href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo('title'); ?></a>
            <div class="btn-dark text-[0] ml-4 h-6 w-6 shrink-0 cursor-pointer" role="button" aria-label="Dark"></div>
        </div>
        <div class="btn-menu relative z-50 -mr-8 flex h-[4.5rem] w-[5rem] shrink-0 cursor-pointer flex-col items-center justify-center gap-2.5 lg:hidden" role="button" aria-label="Menu"></div>

        <script>
          // base
          const htmlClass = document.documentElement.classList;
          setTimeout(() => {
            htmlClass.remove('not-ready');
          }, 10);

          // mobile menu
          const btnMenu = document.querySelector('.btn-menu');
          btnMenu.addEventListener('click', () => {
            htmlClass.toggle('open');
          });

          // dark theme
          const metaTheme = document.querySelector('meta[name="theme-color"]');
          const lightBg = '{{ $bg_color }}'.replace(/"/g, '');
          const setDark = (isDark) => {
            metaTheme.setAttribute('content', isDark ? '#000' : lightBg);
            htmlClass[isDark ? 'add' : 'remove']('dark');
            localStorage.setItem('dark', isDark);
          };

          // init
          const darkScheme = window.matchMedia('(prefers-color-scheme: dark)');
          if (htmlClass.contains('dark')) {
            setDark(true);
          } else {
            const darkVal = localStorage.getItem('dark');
            setDark(darkVal ? darkVal === 'true' : darkScheme.matches);
          }

          // listen system
          darkScheme.addEventListener('change', (event) => {
            setDark(event.matches);
          });

          // manual switch
          const btnDark = document.querySelector('.btn-dark');
          btnDark.addEventListener('click', () => {
            setDark(localStorage.getItem('dark') !== 'true');
          });
        </script>

        <?php $menus = get_primary_menu_items(); ?>

        <div class="nav-wrapper fixed inset-x-0 top-full z-40 flex h-full select-none flex-col justify-center pb-16 duration-200 dark:bg-black lg:static lg:h-auto lg:flex-row lg:!bg-transparent lg:pb-0 lg:transition-none">
            <?php count($menus) > 0 ? array_map(function($menu) { ?>
                <nav class="lg:ml-12 lg:flex lg:flex-row lg:items-center lg:space-x-6">
                    <?php
                    $target = $menu->target;

                    echo '<a class="block text-center text-2xl leading-[5rem] lg:text-base lg:font-normal" href="' . $menu->url . '" ' . ($target ? 'target="' . $target . '"' : '') . '>' . $menu->title . '</a>';
                    ?>
                </nav>
            <?php }, $menus) : ''; ?>
        </div>
    </header>
