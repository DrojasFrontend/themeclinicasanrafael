<div class="header__container d-flex align-center justify-between h-100">
    <div class="d-flex align-center align-lg-stretch justify-between w-100 h-100">
        <!-- Logo Principal -->
        <?php get_template_part('template-parts/layout/header/content', 'logo') ?>
        <!-- Fin Logo Principal -->

        <!-- Menu Desktop -->
        <?php get_template_part('template-parts/layout/header/content', 'nav') ?>
        <!-- Fin Menu Desktop -->

        <!-- Logo Lenus -->
        <?php get_template_part('template-parts/layout/header/content', 'logo-lenus') ?>
        <!-- Fin Logo Lenus -->

        <button class="hamburger-btn d-lg-none" data-toggle-menu>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>
</div>