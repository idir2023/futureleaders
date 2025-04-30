<header class="menu container-xlg">
    <div class="menu--top">
        <div class="menu--top-container">
            <ul class="menu--social">
                <li><a href="https://www.instagram.com/future__leaders_/" target="_blank" rel="noopener noreferrer"><img
                            src="<?php echo e(asset('assets/icons/social/instagram.svg')); ?>" alt="instagram"></a></li>
                <li><a href="https://t.me/futureleadre" target="_blank" rel="noopener noreferrer"><img
                            src="<?php echo e(asset('assets/icons/social/telegram.svg')); ?>" alt="telegram"></a></li>
            </ul>

            <div class="menu--top-settings">
                <div class="theme--switcher">
                    <label for="checkbox_theme" class="theme-switch-label">Dark Mode</label>
                    <label id="theme-switch" class="theme-switch switch" for="checkbox_theme">
                        <input type="checkbox" id="checkbox_theme">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="menu--lang">
                    <?php
                        $current_url = parse_url(LaravelLocalization::getNonLocalizedURL(Request::url()));
                    ?>
                    <span class="menu--lang-current"><?php echo e(LaravelLocalization::getCurrentLocale()); ?> <img
                            src="<?php echo e(asset('assets/icons/menu_arrow.svg')); ?>"></span>
                    <ul class="menu--lang-dropdown hide">
                        <li><a href="<?php echo e(url('/fr' . $current_url['path'])); ?>"
                                class="menu--lang-dropdown-active">Français</a>
                        </li>
                        <li><a href="<?php echo e(LaravelLocalization::getLocalizedURL('en')); ?>">English</a></li>
                        <li><a href="<?php echo e(LaravelLocalization::getLocalizedURL('ar')); ?>">العربية</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="menu--top-hr" />
    </div>

    <div class="menu--nav">
        <div class="menu--nav-container">
            <a href="/" class="menu--nav-logo"><img src="<?php echo e(asset('assets/images/logo.png')); ?>"
                    alt="Future leaders logo"></a>
            <div class="menu--nav-links">
                <ul class="menu--nav-links-default">
                    <li><a href="#calendar"><?php echo e(__('menu.calendar')); ?></a></li>
                    <li><a href="#pricing"><?php echo e(__('menu.pricing')); ?></a></li>
                    <li><a href="#about"><?php echo e(__('menu.about')); ?></a></li>
                    <li><a href="#services"><?php echo e(__('menu.our_services')); ?></a></li>
                    
                    <li><a href="#faq"><?php echo e(__('menu.faq')); ?></a></li>
                    <li><a href="#pricing1"><?php echo e(__('Consultation')); ?></a></li>
                    <li>
                        <?php if(auth()->guard()->check()): ?>
                            
                                <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('menu.dashboard')); ?></a>
                            
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>"><?php echo e(__('menu.login')); ?></a>
                        <?php endif; ?>
                    </li>

                </ul>
                
            </div>
            <div class="menu--burger">
                <span><img src="<?php echo e(asset('assets/icons/burger.svg')); ?>" alt="menu burger"></span>
            </div>
        </div>
    </div>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn">&times;</a>
        <div class="overlay-content">
            <a href="#calendar"><?php echo e(__('menu.calendar')); ?></a>
            <a href="#pricing"><?php echo e(__('menu.pricing')); ?></a>
            <a href="#about"><?php echo e(__('menu.about')); ?></a>
            <a href="#services"><?php echo e(__('menu.our_services')); ?></a>
            
            <a href="#faq"><?php echo e(__('menu.faq')); ?></a>
            <a href="#pricing1"><?php echo e(__('Consultation')); ?></a>
        
            <a href="#contact"><?php echo e(__('menu.contact')); ?></a>
            <?php if(auth()->guard()->check()): ?>
                
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('menu.dashboard')); ?></a>
                
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>"><?php echo e(__('menu.login')); ?></a>
            <?php endif; ?>

            <div class="theme--switcher">
                <label for="checkbox_theme" class="theme-switch-label theme-switch-label_mobile">Dark Mode</label>
                <label id="theme-switch" class="theme-switch switch" for="checkbox_theme">
                    <input type="checkbox" id="checkbox_theme">
                    
                </label>
            </div>


            <ul>
                <?php
                    $current_lang = LaravelLocalization::getCurrentLocale();
                ?>
                <li><a href="<?php echo e(url('/fr' . $current_url['path'])); ?>"
                        class="<?php echo e($current_lang === 'fr' ? 'active' : ' '); ?>">FR</a></li>
                <li><a href="<?php echo e(LaravelLocalization::getLocalizedURL('en')); ?>"
                        class="<?php echo e($current_lang === 'en' ? 'active' : ' '); ?>">EN</a></li>
                <li><a href="<?php echo e(LaravelLocalization::getLocalizedURL('ar')); ?>"
                        class="<?php echo e($current_lang === 'ar' ? 'active' : ' '); ?>">AR</a></li>
            </ul>
        </div>
    </div>

</header>
<?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/menu.blade.php ENDPATH**/ ?>