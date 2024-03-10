<!DOCTYPE html>
<html <?php language_attributes(); ?> class="lg:text-base" style="--bg:#faf8f1">
<head>
    <?php
        $title = get_bloginfo('title');

        $post_title = get_the_title();

        $title = is_single() ? get_the_title() . ' - ' . $title : $title;
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo $title ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="theme-color" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="author" content="<?php echo get_bloginfo('author'); ?>" />
    <meta name="keywords" content="<?php echo get_bloginfo('keywords'); ?>" />
    <?php global $THEME_VERSION; ?>
    <?php wp_enqueue_style('style', get_stylesheet_uri(), array(), $THEME_VERSION, 'all'); ?>
    <?php wp_enqueue_style('paper',  get_template_directory_uri() . '/assets/css/paper.css', array(), $THEME_VERSION, 'all'); ?>
    <?php is_single() ? wp_enqueue_style('atom-one-dark-reasonable',  'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark-reasonable.min.css', array(), $THEME_VERSION, 'all') : ''; ?>
    <?php echo is_single() ? '<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js" defer onload="hljs.highlightAll()"></script>' : '' ?>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
      };
    </script>
    <style type="text/tailwindcss">
        @layer base {
            html,
            body {
                @apply h-full;
            }

            html {
                --bg: transparent;
            }

            body {
                -webkit-tap-highlight-color: transparent;
                background: var(--bg);

                @apply dark:bg-black/90;
            }
        }

        @layer components {
            .btn {
                @apply rounded-full bg-black px-7 py-4 text-sm text-white no-underline shadow duration-100 active:scale-95 dark:bg-white dark:text-black;
            }

            .link {
                @apply duration-200 hover:text-black dark:hover:text-white;
            }
        }

        @layer utilities {
            .not-ready * {
                @apply !transition-none;
            }

            .prose {
                @apply break-words;
            }

            .btn-menu::before,
            .btn-menu::after {
                @apply block h-[2px] w-5 bg-black duration-200 content-[''] dark:invert;
            }

            .nav-wrapper {
                background: var(--bg);
            }

            .open {
                @apply overflow-hidden;
            }

            .open .btn-menu::before {
                @apply w-6 translate-y-[5.5px] rotate-45;
            }

            .open .btn-menu::after {
                @apply w-6 -translate-y-[5.5px] -rotate-45;
            }

            .open .nav-wrapper {
                @apply top-0;
            }

            article {
                @apply text-lg leading-[1.8] text-black dark:text-white;
            }

            article blockquote {
                @apply !border-l-[3px] !border-black dark:!border-white;
            }

            article code {
                @apply inline-block !text-sm !leading-6;
            }

            article .highlight {
                @apply my-8;
            }

            article .highlight pre {
                @apply my-0;
            }

            article .highlight > div {
                @apply rounded-md bg-[--tw-prose-pre-bg];
            }

            article .highlight > div table {
                @apply my-0 table-fixed;
            }

            article .highlight > div table tr {
                @apply flex;
            }

            article .highlight > div table tr td {
                @apply p-0;
            }

            article .highlight > div table tr td pre {
                @apply !bg-transparent;
            }

            article .highlight > div table tr td:first-of-type pre {
                @apply pr-[4px];
            }

            article .highlight > div table tr td:first-of-type pre code span {
                @apply !mr-0 block min-w-[18px] !p-0 text-right text-white/40;
            }

            article .highlight > div table tr td:last-of-type {
                @apply overflow-auto;
            }

            .aspect-square {
                aspect-ratio: 1/1
            }

            .aspect-video {
                aspect-ratio: 16/9
            }

            .aspect-auto {
                aspect-ratio: auto
            }
        }
    </style>
    <style>
        .btn-dark {
            background: <?php echo 'url(' . get_template_directory_uri() . '/assets/images/theme.png?ver=' . $THEME_VERSION .')' ?> 0 / auto 1.5rem no-repeat;
        }

        :is(:where(.dark) .dark\:\[background-position\:right\]) {
            background-position: 100% !important;
        }
    </style>
    <?php wp_head(); ?>
</head>

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
    </header>
