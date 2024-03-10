<?php require_once(__DIR__ . '/inc/head.php'); ?>

<body class="text-black duration-200 ease-out dark:text-white">
    <header class="mx-auto flex h-[4.5rem] max-w-3xl px-8 lg:justify-center">
        <div class="relative z-50 mr-auto flex items-center">
            <a class="-translate-x-[1px] -translate-y-[1px] text-2xl font-semibold" href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo('title'); ?></a>
            <div class="btn-dark text-[0] ml-4 h-6 w-6 shrink-0 cursor-pointer [transition:_background-position_0.4s_steps(5)] dark:[background-position:right]" role="button" aria-label="Dark"></div>
        </div>
        <div class="btn-menu relative z-50 -mr-8 flex h-[4.5rem] w-[5rem] shrink-0 cursor-pointer flex-col items-center justify-center gap-2.5 lg:hidden" role="button" aria-label="Menu"></div>

        <script>
          const lightBg = '#faf8f1';
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

        <?php $social_links = get_theme_mod('social_links') ?? []; ?>

        <?php if (is_array($social_links) && count($social_links) > 0) : ?>
            <nav class="mt-12 flex justify-center space-x-10 dark:invert lg:ml-12 lg:mt-0 lg:items-center lg:space-x-6">
                <?php foreach ($social_links as $link) : ?>
                    <a
                        class="h-8 w-8 text-2xl/[1.5rem] lg:h-6 lg:w-6 icon <?php echo $link['icon'] ?>"
                        href="<?php echo $link['link']; ?>"
                        target="<?php echo $link['new'] ? '_blank' : '_self'; ?>"
                        title="<?php echo $link['title']; ?>"
                    >
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </header>
