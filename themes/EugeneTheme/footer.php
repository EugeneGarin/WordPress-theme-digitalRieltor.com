            <div class="empty-space-filler"></div>
        </div>
    </main>
    <footer class="pt-2 container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-md-3">
                <a href="/"><img src="<?=get_template_directory_uri()?>/images/Logo.png" alt="logo.jpg" class="logo-image"></a>
            </div>
            <div class="col-md-2">
                <?php 
                wp_nav_menu( array(
                    'menu'            => 'header_and_footer_menu',
                    'container'       => '',
                    'menu_class'      => 'navbar-bottom navbar-nav ml-auto align-self-start',
                ) );
                ?>
            </div>
            <div class="col-md-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=get_permalink(97)?>">Про нас</a>
                    </li>
                    <li class="nav-item">
                        <a data-fancybox data-src="#hidden-content-1" href="javascript:;" class="nav-link">Задати питання</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link"><?=do_shortcode("[language-switcher]")?></div>
                    </li>
                </ul>
            </div>
            <div class="social-media col-md-4 mb-3 text-center text-md-right">
                <a href="javascript:;"><img src="<?=get_template_directory_uri()?>/images/facebook.png" alt="facebook" width="60"></a><a href="javascript:;"><img src="<?=get_template_directory_uri()?>/images/twitter.png" alt="twitter" width="55"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 copyright">
                © 2020 "digitalRieltor".<br>Всi права захищенi.
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>