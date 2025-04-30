<?php $__env->startSection('content'); ?>
    <?php
        $current_lang = LaravelLocalization::getCurrentLocale();
    ?>

    <style>
        /* Bouton de consultation */
        .btn-consultation {
            display: inline-block;
            padding: 8px 12px;
            background-color: rgb(255, 132, 1);
            /* Orange standard */
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn-consultation:hover {
            background-color: #E7E2DBFF;
            /* Orange foncé */
            transform: translateY(-1px);
        }

        /* Bouton de connexion */
        .btn-login {
            background-color: #FFB347;
            /* Orange clair */
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #FFA07A;
            /* Orange saumoné */
            transform: translateY(-1px);
        }
    </style>


    <section class="hero--section">
        <div class="hero--container">
            <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-lg hero--row">
                <div class="hero--content">
                    <img src="<?php echo e(asset('assets/icons/hero_icon.svg')); ?>" alt="Graph">
                    <h2><?php echo e(__('hero.title')); ?></h2>
                    <p><?php echo e(__('hero.content')); ?></p>
                    <a href="https://t.me/futureleadre" target="_blank" rel="noopener noreferrer"><img
                            src="<?php echo e(asset('assets/icons/social/telegram.svg')); ?>"
                            alt="Telegram icon"><span><?php echo e(__('hero.button')); ?></span></a>
                </div>
                <div class="hero--bg-lights">&nbsp;</div>
                <div class="hero--img">
                    <picture>
                        <source media="(min-width:650px)" srcset="<?php echo e(asset('assets/images/hero_img.webp')); ?>">
                        <source media="(min-width:465px)" srcset="<?php echo e(asset('assets/images/hero_img.webp')); ?>">
                        <img src="<?php echo e(asset('assets/images/hero_img.webp')); ?>">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <section class="trading--section section--container">
        <div class="container-lg">
            <h2 class="main--title"> <?php echo __('definition.title'); ?> </h2>
            <p class="main--content"> <?php echo e(__('definition.content')); ?> </p>
        </div>
    </section>

    <section class="about--section section--container" id="about">
        <div class="container-lg about--wrapper">
            <div class="about--container">
                <div class="about--img">
                    <img src="<?php echo e(asset('assets/images/logo_hor.png')); ?>" alt="Future leaders logo">
                </div>
                <div class="title--container about--content">
                    <h3 class="subtitle"> <?php echo e(__('about.subtitle')); ?> </h3>
                    <h2 class="main--title"> <?php echo e(__('about.title')); ?> </h2>
                    <p class="main--content"> <?php echo e(__('about.content')); ?> </p>
                </div>
            </div>
            <div class="about--objectif">
                <p class="main--content"><?php echo e(__('about.objectif')); ?></p>
            </div>
        </div>
    </section>

    <section class="video--section container-lg section--container">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/UFHsTbbktSw" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </section>

    <section class="services--section section--container" id="services">
        <div class="container-lg">
            <div class="title--container title--center title--margin">
                <h3 class="subtitle"> <?php echo e(__('services.subtitle')); ?> </h3>
                <h2 class="main--title"> <?php echo e(__('services.title')); ?> </h2>
            </div>
            <div class="services--container">
                <div class="services--live">
                    <div class="services--live-p">
                        <div class="services--live-header">
                            <img class="services--live-header_start"
                                src="<?php echo e(asset('assets/icons/services/live_start.svg')); ?>" alt="start video icon">
                            <div class="services--live-header_content">
                                <h4>
                                    <span class="live"><?php echo e(__('services.live_trade_live')); ?></span> <span
                                        class="trade"><?php echo e(__('services.live_trade_trade')); ?></span>
                                    <img src="<?php echo e(asset('assets/icons/services/live_arr.svg')); ?>" alt="top arr icon">
                                </h4>
                                <span><?php echo e(__('services.every_day')); ?></span>
                            </div>
                        </div>
                        <div class="services--live-content">
                            <p class="main--content"><?php echo e(__('services.live_trade_content')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="services--content">
                    <div>
                        <p class="main--content"><?php echo e(__('services.content')); ?></p>
                    </div>
                    <div class="services--cards-container">
                        <div class="services--card">
                            <img src="<?php echo e(asset('assets/icons/services/every_day.svg')); ?>" alt="24_7 icon">
                            <div class="services--card-content">
                                <h4><?php echo e(__('services.courses_every_day')); ?></h4>
                                <p><?php echo e(__('services.courses_every_day_content')); ?></p>
                            </div>
                        </div>

                        <div class="services--card">
                            <img src="<?php echo e(asset('assets/icons/services/rocket.svg')); ?>" alt="24_7 icon">
                            <div class="services--card-content">
                                <h4><?php echo e(__('services.from_zero')); ?></h4>
                                <p><?php echo e(__('services.from_zero_content')); ?></p>
                            </div>
                        </div>

                        <div class="services--card">
                            <img class="tie" src="<?php echo e(asset('assets/icons/services/tie.svg')); ?>" alt="24_7 icon">
                            <div class="services--card-content">
                                <h4><?php echo e(__('services.strategies')); ?></h4>
                                <p><?php echo e(__('services.strategies_content')); ?></p>
                            </div>
                        </div>

                        <div class="services--card">
                            <img src="<?php echo e(asset('assets/icons/services/graph_analyse.svg')); ?>" alt="24_7 icon">
                            <div class="services--card-content">
                                <h4><?php echo e(__('services.analyses')); ?></h4>
                                <p><?php echo e(__('services.analyses_content')); ?></p>
                            </div>
                        </div>

                        <div class="services--card">
                            <img src="<?php echo e(asset('assets/icons/services/public.svg')); ?>" alt="24_7 icon">
                            <div class="services--card-content">
                                <h4><?php echo e(__('services.public')); ?></h4>
                                <p><?php echo e(__('services.public_content')); ?></p>
                            </div>
                        </div>

                        <div class="services--card">
                            <img src="<?php echo e(asset('assets/icons/services/person.svg')); ?>" alt="24_7 icon">
                            <div class="services--card-content">
                                <h4><?php echo e(__('services.coach')); ?></h4>
                                <p><?php echo e(__('services.coach_content')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="calendar--section container-lg" id="calendar">
        <div class="calendar--head">
            <div class="title--container learn--content-title">
                <h3 class="subtitle"> <?php echo e(__('calendar.subtitle')); ?> </h3>
                <h2 class="main--title"> <?php echo __('calendar.title'); ?> </h2>
            </div>
            <div class="calendar--next">
                <span><?php echo e(__('calendar.next')); ?></span>
                <div>
                    <div class="calendar--next-title">
                        <div>
                            <img class="calendar--next-logo" src="<?php echo e(asset('assets/icons/services/live_start.svg')); ?>"
                                alt="start video icon">
                        </div>
                        <span>
                            <h4> <?php echo e(__('calendar.live_trade')); ?> </h4>
                            <span> <?php echo e(__('calendar.monday')); ?> </span>
                        </span>
                    </div>
                    <div class="calendar--next-time">
                        <div>
                            <h4>GMT+1</h4>
                            <span>13:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="calendar--body">
            <ul>
                <li>
                    <div>
                        <span><?php echo e(__('calendar.monday')); ?></span>
                        <ul>
                            <li data-color="red">
                                <span><?php echo e(__('calendar.live_trade')); ?></span>
                                <h4>13:00</h4>
                            </li>
                            <li data-color="orange">
                                <span><?php echo e(__('calendar.cours')); ?></span>
                                <h4>20:00</h4>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <span><?php echo e(__('calendar.tuesday')); ?></span>
                        <ul>
                            <li data-color="red">
                                <span><?php echo e(__('calendar.live_trade')); ?></span>
                                <h4>13:00</h4>
                            </li>
                            <li data-color="white">
                                <span><?php echo e(__('calendar.q_a')); ?></span>
                                <h4>20:00</h4>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <div>
                        <span><?php echo e(__('calendar.wednesday')); ?></span>
                        <ul>
                            <li data-color="red">
                                <span><?php echo e(__('calendar.live_trade')); ?></span>
                                <h4>13:00</h4>
                            </li>
                            <li data-color="orange">
                                <span><?php echo e(__('calendar.cours')); ?></span>
                                <h4>20:00</h4>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <span><?php echo e(__('calendar.thursday')); ?></span>
                        <ul>
                            <li data-color="red">
                                <span><?php echo e(__('calendar.live_trade')); ?></span>
                                <h4>13:00</h4>
                            </li>
                            <li data-color="white">
                                <span><?php echo e(__('calendar.q_a')); ?></span>
                                <h4>20:00</h4>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <span><?php echo e(__('calendar.friday')); ?></span>
                        <ul>
                            <li data-color="red">
                                <span><?php echo e(__('calendar.live_trade')); ?></span>
                                <h4>13:00</h4>
                            </li>
                            <li data-color="orange">
                                <span><?php echo e(__('calendar.cours')); ?></span>
                                <h4>20:00</h4>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <span><?php echo e(__('calendar.saturday')); ?></span>
                        <ul>
                            <li data-color="light-blue">
                                <span><?php echo e(__('calendar.team_meeting')); ?></span>
                                <h4>18:00</h4>
                            </li>
                            <li>&nbsp;</li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

        <script>
            let schedule = {
                1: [{
                        color: "red",
                        title: "<?php echo e(__('calendar.live_trade')); ?>",
                        day: "<?php echo e(__('calendar.monday')); ?>",
                        hour: 13,
                        hourFormat: "13:00",
                        icon: "live_start"
                    },
                    {
                        color: "orange",
                        title: "<?php echo e(__('calendar.cours')); ?>",
                        day: "<?php echo e(__('calendar.monday')); ?>",
                        hour: 20,
                        hourFormat: "20:00",
                        icon: "course"
                    },
                ],
                2: [{
                        color: "red",
                        title: "<?php echo e(__('calendar.live_trade')); ?>",
                        day: "<?php echo e(__('calendar.tuesday')); ?>",
                        hour: 13,
                        hourFormat: "13:00",
                        icon: "live_start"
                    },
                    {
                        color: "white",
                        title: "<?php echo __('calendar.q_a'); ?>",
                        day: "<?php echo e(__('calendar.tuesday')); ?>",
                        hour: 20,
                        hourFormat: "20:00",
                        icon: "q&a"
                    },
                ],
                3: [{
                        color: "red",
                        title: "<?php echo e(__('calendar.live_trade')); ?>",
                        day: "<?php echo e(__('calendar.wednesday')); ?>",
                        hour: 13,
                        hourFormat: "13:00",
                        icon: "live_start"
                    },
                    {
                        color: "orange",
                        title: "<?php echo e(__('calendar.cours')); ?>",
                        day: "<?php echo e(__('calendar.wednesday')); ?>",
                        hour: 20,
                        hourFormat: "20:00",
                        icon: "course"
                    },
                ],
                4: [{
                        color: "red",
                        title: "<?php echo e(__('calendar.live_trade')); ?>",
                        day: "<?php echo e(__('calendar.thursday')); ?>",
                        hour: 13,
                        hourFormat: "13:00",
                        icon: "live_start"
                    },
                    {
                        color: "white",
                        title: "<?php echo __('calendar.q_a'); ?>",
                        day: "<?php echo e(__('calendar.thursday')); ?>",
                        hour: 20,
                        hourFormat: "20:00",
                        icon: "q&a"
                    },
                ],
                5: [{
                        color: "red",
                        title: "<?php echo e(__('calendar.live_trade')); ?>",
                        day: "<?php echo e(__('calendar.friday')); ?>",
                        hour: 13,
                        hourFormat: "13:00",
                        icon: "live_start"
                    },
                    {
                        color: "orange",
                        title: "<?php echo e(__('calendar.cours')); ?>",
                        day: "<?php echo e(__('calendar.friday')); ?>",
                        hour: 20,
                        hourFormat: "20:00",
                        icon: "course"
                    },
                ],
                6: [{
                    color: "light-blue",
                    title: "<?php echo __('calendar.team_meeting'); ?>",
                    day: "<?php echo e(__('calendar.saturday')); ?>",
                    hour: 18,
                    hourFormat: "18:00",
                    icon: "meeting"
                }],
            };
            const d = new Date();
            let day = d.getDay();
            let hour = d.getHours();
            let session;
            if (day < 7) {
                for (let i = 0; i < schedule[day].length; i++) {
                    const element = schedule[day][i];
                    if (element.hour > hour) {
                        session = element;
                        break;
                    } else {
                        session = schedule[day + 1][0];
                    }
                }
                changeNextSession(session);
            } else {
                changeNextSession(schedule[1][0]);
            }

            function changeNextSession(session) {
                const title = document.querySelector(".calendar--next-title > span h4");
                const dayTxt = document.querySelector(".calendar--next-title > span span");
                const timeTxt = document.querySelector(".calendar--next-time span");
                const icon = document.querySelector(".calendar--next-logo");

                title.textContent = session.title;
                dayTxt.textContent = session.day;
                timeTxt.textContent = session.hourFormat;
                icon.src = "assets/icons/" + session.icon + ".svg"
            }
        </script>
    </section>

    <section class="learn--section container-lg section--container" id="steps">
        <div class="learn--img">
            <div>
                <div class="learn--img-wrapper">
                    <video autoplay muted loop>
                        <source src="<?php echo e(asset('assets/future.mp4')); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <p lang="en">“Hard work and learning is the key to a successful trading.”<span>&#8212; Team
                            manager</span> </p>
                </div>
            </div>
        </div>
        <div class="learn--content">
            <div class="learn--content-wrapper">
                <div class="title--container learn--content-title">
                    <h3 class="subtitle"> <?php echo e(__('learn.subtitle')); ?> </h3>
                    <h2 class="main--title"> <?php echo e(__('learn.title')); ?> </h2>
                    <p class="main--content"> <?php echo e(__('learn.content')); ?> </p>
                </div>
                <ul class="learn--cards">
                    <li>
                        <h4><?php echo e(__('learn.envirement')); ?></h4>
                        <p><?php echo e(__('learn.envirement_content')); ?></p>
                    </li>
                    <li>
                        <h4><?php echo e(__('learn.basics')); ?></h4>
                        <p><?php echo e(__('learn.basics_content')); ?></p>
                    </li>
                    <li>
                        <h4><?php echo e(__('learn.strategy')); ?></h4>
                        <p><?php echo e(__('learn.strategy_content')); ?></p>
                    </li>
                    <li>
                        <h4><?php echo e(__('learn.start')); ?></h4>
                        <p><?php echo e(__('learn.start_content')); ?></p>
                    </li>
                    <li>
                        <h4><?php echo e(__('learn.risk')); ?></h4>
                        <p><?php echo e(__('learn.risk_content')); ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="cta--section section--container">
        <div class="cta--container container-lg">
            <div class="cta--wrapper">
                <h3> <?php echo e(__('cta.title')); ?> </h3>
                <p> <?php echo e(__('cta.content')); ?> </p>


                <a href="https://t.me/futureleadre" target="_blank" rel="noopener noreferrer"><img
                        src="<?php echo e(asset('assets/icons/social/telegram.svg')); ?>" alt="Telegram icon">
                    <?php echo e(__('cta.button')); ?> </a>
            </div>
        </div>
    </section>
    <!--
                                                <section class="team--section section--container" id="team">
                                                    <div class="team--header">
                                                        <div class="container-lg">
                                                            <div class="title--container">
                                                                <h3 class="subtitle"> <?php echo e(__('team.subtitle')); ?> </h3>
                                                                <h2 class="main--title"> <?php echo __('team.title'); ?> </h2>
                                                            </div>
                                                            <div class="team--content">
                                                                <p class="main--content text--sm"> <?php echo e(__('team.content-1')); ?> </p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="team--members container-lg">
                                                        <div class="team--members-main" id="contact">
                                                            <div class="team--members-main_card">
                                                                <div class="team--members-main_img">
                                                                    <img src="<?php echo e(asset('assets/images/team/karim.webp')); ?>" alt="mohamed karim merroun">
                                                                </div>
                                                                <div class="team--members-main_content">
                                                                    <div>
                                                                        <h4><a href="https://karti.io/v/MOHAMEDKARIM" target="_blank"
                                                                                rel="noopener noreferrer"><?php echo e(__('team.mohamed')); ?>

                                                                                <?php echo e($current_lang === 'ar' ? '←' : '→'); ?></a></h4>
                                                                        <p> <?php echo e(__('team.mohamed_role')); ?> </p>
                                                                        <ul>
                                                                            <li><a href="https://instagram.com/m.karimmerroun" target="_blank"
                                                                                    rel="noopener noreferrer"><img
                                                                                        src="<?php echo e(asset('assets/icons/social/fill/instagram.svg')); ?>"
                                                                                        alt="instagram"></a></li>
                                                                            <li><a href="https://wa.me/212664004450" target="_blank" rel="noopener noreferrer"><img
                                                                                        src="<?php echo e(asset('assets/icons/social/fill/whatsapp.svg')); ?>"
                                                                                        alt="whatsapp icon"></a></li>
                                                                            <li><a href="https://www.youtube.com/@mohamedkarim_dreamer2299" target="_blank"
                                                                                    rel="noopener noreferrer"><img
                                                                                        src="<?php echo e(asset('assets/icons/social/fill/youtube.svg')); ?>" alt="facebook"></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="team--members-main_card">
                                                                <div class="team--members-main_img">
                                                                    <img src="<?php echo e(asset('assets/images/team/zouhair-merroun.webp')); ?>" alt="Zouhair Merroun">
                                                                </div>
                                                                <div class="team--members-main_content">
                                                                    <div>
                                                                        <h4> <?php echo e(__('team.zouhair')); ?> </h4>
                                                                        <p> <?php echo e(__('team.zouhair_role')); ?> </p>
                                                                        <ul>
                                                                            <li><a href="https://instagram.com/zezo_merroun" target="_blank"
                                                                                    rel="noopener noreferrer"><img
                                                                                        src="<?php echo e(asset('assets/icons/social/fill/instagram.svg')); ?>"
                                                                                        alt="instagram"></a></li>
                                                                            <li><a href="https://wa.me/212646053652" target="_blank" rel="noopener noreferrer"><img
                                                                                        src="<?php echo e(asset('assets/icons/social/fill/whatsapp.svg')); ?>"
                                                                                        alt="Whatsapp icon"></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="team--members-leaders">
                                                            <div class="team--members-leaders_card">
                                                                <div class="team--members-leaders_img">
                                                                    <div class="team--members-leaders_img-start">
                                                                        <img src="<?php echo e(asset('assets/images/team/najlae.webp')); ?>" alt="mohamed karim merroun">
                                                                        <button data-member="najlae" class="modal--btn"><img
                                                                                src="<?php echo e(asset('assets/icons/video_start.svg')); ?>"
                                                                                alt="Start video icon orange"></button>
                                                                    </div>
                                                                    <div class="team--members-leaders_content">
                                                                        <div>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="https://www.instagram.com/najlaa.meroun" target="_blank"
                                                                                        rel="noopener noreferrer">
                                                                                        <img src="<?php echo e(asset('assets/icons/social/fill/instagram.svg')); ?>"
                                                                                            alt="instagram">
                                                                                    </a>
                                                                                </li>
                                                                                <li><a href="https://wa.me/212681472358" target="_blank"
                                                                                        rel="noopener noreferrer"><img
                                                                                            src="<?php echo e(asset('assets/icons/social/fill/whatsapp.svg')); ?>"
                                                                                            alt="Whatsapp icon"></a></li>
                                                                            </ul>
                                                                            <h4> <?php echo __('team.najlae'); ?> </h4>
                                                                            <p> <?php echo e(__('team.najlae_role')); ?> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="team--members-leaders_card">
                                                                <div class="team--members-leaders_img">
                                                                    <div class="team--members-leaders_img-start">
                                                                        <img src="<?php echo e(asset('assets/images/team/imrane.webp')); ?>" alt="mohamed karim merroun">
                                                                        <button data-member="imrane" class="modal--btn"><img
                                                                                src="<?php echo e(asset('assets/icons/video_start.svg')); ?>"
                                                                                alt="Start video icon orange"></button>
                                                                    </div>
                                                                    <div class="team--members-leaders_content">
                                                                        <div>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="https://instagram.com/im_rane8" target="_blank"
                                                                                        rel="noopener noreferrer">
                                                                                        <img src="<?php echo e(asset('assets/icons/social/fill/instagram.svg')); ?>"
                                                                                            alt="instagram">
                                                                                    </a>
                                                                                </li>
                                                                                <li><a href="https://wa.me/212684312907" target="_blank"
                                                                                        rel="noopener noreferrer"><img
                                                                                            src="<?php echo e(asset('assets/icons/social/fill/whatsapp.svg')); ?>"
                                                                                            alt="Whatsapp icon"></a></li>
                                                                            </ul>

                                                                            <h4> <?php echo __('team.imrane'); ?> </h4>
                                                                            <p> <?php echo e(__('team.imrane_role')); ?> </p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="team--members-leaders_card">
                                                                <div class="team--members-leaders_img">
                                                                    <div class="team--members-leaders_img-start">
                                                                        <img src="<?php echo e(asset('assets/images/team/fatima.webp')); ?>" alt="mohamed karim merroun">
                                                                        <button data-member="fatima" class="modal--btn"><img
                                                                                src="<?php echo e(asset('assets/icons/video_start.svg')); ?>"
                                                                                alt="Start video icon orange"></button>
                                                                    </div>
                                                                    <div class="team--members-leaders_content">
                                                                        <div>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="https://instagram.com/fatimaa_nb" target="_blank"
                                                                                        rel="noopener noreferrer">
                                                                                        <img src="<?php echo e(asset('assets/icons/social/fill/instagram.svg')); ?>"
                                                                                            alt="instagram">
                                                                                    </a>
                                                                                </li>
                                                                                <li><a href="https://wa.me/212632288347" target="_blank"
                                                                                        rel="noopener noreferrer"><img
                                                                                            src="<?php echo e(asset('assets/icons/social/fill/whatsapp.svg')); ?>"
                                                                                            alt="Whatsapp icon"></a></li>
                                                                            </ul>

                                                                            <h4> <?php echo __('team.fatima'); ?> </h4>
                                                                            <p> <?php echo e(__('team.fatima_role')); ?> </p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="team--members-leaders_card">
                                                                <div class="team--members-leaders_img">
                                                                    <div class="team--members-leaders_img-start">
                                                                        <img src="<?php echo e(asset('assets/images/team/nouhayla.webp')); ?>" alt="mohamed karim merroun">
                                                                        <button data-member="nouhayla" class="modal--btn"><img
                                                                                src="<?php echo e(asset('assets/icons/video_start.svg')); ?>"
                                                                                alt="Start video icon orange"></button>
                                                                    </div>

                                                                    <div class="team--members-leaders_content">
                                                                        <div>
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="https://instagram.com/emeulye6" target="_blank"
                                                                                        rel="noopener noreferrer">
                                                                                        <img src="<?php echo e(asset('assets/icons/social/fill/instagram.svg')); ?>"
                                                                                            alt="instagram">
                                                                                    </a>
                                                                                </li>
                                                                                <li><a href="https://wa.me/212687651732" target="_blank"
                                                                                        rel="noopener noreferrer"><img
                                                                                            src="<?php echo e(asset('assets/icons/social/fill/whatsapp.svg')); ?>"
                                                                                            alt="Whatsapp icon"></a></li>
                                                                            </ul>

                                                                            <h4> <?php echo __('team.nouhayla'); ?> </h4>
                                                                            <p> <?php echo e(__('team.nouhayla_role')); ?> </p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="members--temp">
                                                        <div class="title--container container-lg">
                                                            <h2 class="main--title"> <?php echo __('team.contact_title'); ?> </h2>
                                                            <p class="main--content text--sm"> <?php echo e(__('team.contact')); ?> </p>
                                                        </div>
                                                    </div>

                                                </section>
                                                -->
    <section class="pricing--container">
        <div class="pricing--section">
            <header class="pricing--header container-lg" id="pricing">
                <div class="title--container title--center title--margin">
                    <h3 class="subtitle"> <?php echo e(__('pricing.subtitle')); ?> </h3>
                    <h2 class="main--title"> <?php echo e(__('pricing.title')); ?> </h2>
                    <p class="main--content"> <?php echo e(__('pricing.content')); ?> </p>
                </div>
                <img src="<?php echo e(asset('assets/images/certificates.png')); ?>" alt="">
                <div class="black--ellipse">&nbsp;</div>
            </header>

            <div class="pricing--regular">
                <div class="pricing--regular-price">
                    <div>
                        <h5><?php echo e(__('pricing.regular')); ?> <span><?php echo e(__('pricing.subscription')); ?></span></h5>
                    </div>
                    <span><span>&nbsp;</span></span>
                    <div>
                        <p>
                            <?php echo e(__('pricing.regular_desc')); ?>

                        </p>
                    </div>
                    <span><span>&nbsp;</span></span>
                    <div class="price">
                        <div><span> <?php echo e(__('pricing.one_two')); ?>

                                <?php echo e(__('pricing.dh')); ?></span><span>/<?php echo e(__('pricing.month')); ?></span></div>
                        <span><span>*</span> <?php echo e(__('pricing.three')); ?> <?php echo e(__('pricing.dh')); ?>

                            <?php echo e(__('pricing.inscription_fees')); ?></span>
                        
                    </div>
                </div>
            </div>


        </div>
        <div class="pricing--table">
            <header class="pricing--table-header" id="pricing1">
                <img src="<?php echo e(asset('assets/images/promotion.png')); ?>" alt="">
                <div>
                    <img src="<?php echo e(asset('assets/images/ranks/silver-rank.png')); ?>" alt="">
                    <span>
                        <span><?php echo e(__('pricing.pack')); ?></span>
                        <h5><?php echo e(__('pricing.silver')); ?></h5>
                        <span>3 <?php echo e(__('pricing.months')); ?></span>
                    </span>
                    <span>
                        <span><?php echo e(__('pricing.three_zero')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <span><?php echo e(__('pricing.three_nine')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <div>*<?php echo e(__('pricing.no_inscription_fees')); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="btn-consultation" href="<?php echo e(route('create-consultation', ['price' => 300])); ?>">
                                <?php echo e(__('pricing.consultation')); ?>

                            </a>
                        <?php else: ?>
                            <a class="btn-login" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('pricing.login_first')); ?>

                            </a>
                        <?php endif; ?>

                    </span>
                </div>
                <div>
                    <img src="<?php echo e(asset('assets/images/ranks/gold-rank.png')); ?>" alt="">
                    <span>
                        <span><?php echo e(__('pricing.pack')); ?></span>
                        <h5><?php echo e(__('pricing.gold')); ?></h5>
                        <span>6 <?php echo e(__('pricing.months')); ?></span>
                    </span>
                    <span>
                        <span><?php echo e(__('pricing.five')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <span><?php echo e(__('pricing.seven')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <div>*<?php echo e(__('pricing.no_inscription_fees')); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="btn-consultation" href="<?php echo e(route('create-consultation', ['price' => 500])); ?>">
                                <?php echo e(__('pricing.consultation')); ?>

                            </a>
                        <?php else: ?>
                            <a class="btn-login" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('pricing.login_first')); ?>

                            </a>
                        <?php endif; ?>
                    </span>
                </div>
                <div>
                    <img src="<?php echo e(asset('assets/images/ranks/diamond-rank.png')); ?>" alt="">
                    <span>
                        <span><?php echo e(__('pricing.pack')); ?></span>
                        <h5><?php echo e(__('pricing.diamond')); ?></h5>
                        <span>1 <?php echo e(__('pricing.year')); ?></span>
                    </span>
                    <span>
                        <span><?php echo e(__('pricing.ten_thousand')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <span><?php echo e(__('pricing.forteen')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <div>*<?php echo e(__('pricing.no_inscription_fees')); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="btn-consultation " href="<?php echo e(route('create-consultation', ['price' => 1000])); ?>">
                                <?php echo e(__('pricing.consultation')); ?>

                            </a>
                        <?php else: ?>
                            <a class="btn-login" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('pricing.login_first')); ?>

                            </a>
                        <?php endif; ?>
                    </span>
                </div>
            </header>

            <div class="pricing--table-content">
                <ul>
                    <li>
                        <span><?php echo e(__('pricing.live_trading')); ?></span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>

                    <li>
                        <span><?php echo e(__('pricing.forex_definitions')); ?></span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.trading_basics')); ?></span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.trading_fundamentals')); ?></span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.basics_of_risk_management')); ?></span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.advanced_market_analysis')); ?></span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.technical_analysis')); ?></span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.advanced_technical_analysis')); ?></span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.trading_strategies')); ?></span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                    <li>
                        <span><?php echo e(__('pricing.advanced_risk_management')); ?></span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            &nbsp;
                        </span>
                        <span>
                            <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pricing--table pricing--table-mobile">
            <header class="pricing--table-header">
                <div>
                    <img src="<?php echo e(asset('assets/images/ranks/silver-rank.png')); ?>" alt="">
                    <span>
                        <span><?php echo e(__('pricing.pack')); ?></span>
                        <h5><?php echo e(__('pricing.silver')); ?></h5>
                        <span>3 <?php echo e(__('pricing.months')); ?></span>
                    </span>
                    <span>
                        <span><?php echo e(__('pricing.three_zero')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <span><?php echo e(__('pricing.three_nine')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <div>*<?php echo e(__('pricing.no_inscription_fees')); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="btn-consultation " href="<?php echo e(route('create-consultation', ['price' => 1000])); ?>">
                                <?php echo e(__('pricing.consultation')); ?>

                            </a>
                        <?php else: ?>
                            <a class="btn-login" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('pricing.login_first')); ?>

                            </a>
                        <?php endif; ?>
                    </span>
                    <ul>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.live_trading')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.forex_definitions')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_basics')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_fundamentals')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.basics_of_risk_management')); ?></span>
                        </li>
                    </ul>
                </div>
                <div>
                    <img src="<?php echo e(asset('assets/images/ranks/gold-rank.png')); ?>" alt="">
                    <span>
                        <span><?php echo e(__('pricing.pack')); ?></span>
                        <h5><?php echo e(__('pricing.gold')); ?></h5>
                        <span>6 <?php echo e(__('pricing.months')); ?></span>
                    </span>
                    <span>
                        <span><?php echo e(__('pricing.five')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <span><?php echo e(__('pricing.seven')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <div>*<?php echo e(__('pricing.no_inscription_fees')); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="btn-consultation " href="<?php echo e(route('create-consultation', ['price' => 1000])); ?>">
                                <?php echo e(__('pricing.consultation')); ?>

                            </a>
                        <?php else: ?>
                            <a class="btn-login" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('pricing.login_first')); ?>

                            </a>
                        <?php endif; ?>
                    </span>
                    <ul>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.live_trading')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.forex_definitions')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_basics')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_fundamentals')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.basics_of_risk_management')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.advanced_market_analysis')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.technical_analysis')); ?></span>
                        </li>
                    </ul>
                </div>
                <div>
                    <img src="<?php echo e(asset('assets/images/ranks/diamond-rank.png')); ?>" alt="">
                    <span>
                        <span><?php echo e(__('pricing.pack')); ?></span>
                        <h5><?php echo e(__('pricing.diamond')); ?></h5>
                        <span>1 <?php echo e(__('pricing.year')); ?></span>
                    </span>
                    <span>
                        <span><?php echo e(__('pricing.ten_thousand')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <span><?php echo e(__('pricing.forteen')); ?> <?php echo e(__('pricing.dh')); ?></span>
                        <div>*<?php echo e(__('pricing.no_inscription_fees')); ?></div>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="btn-consultation " href="<?php echo e(route('create-consultation', ['price' => 1000])); ?>">
                                <?php echo e(__('pricing.consultation')); ?>

                            </a>
                        <?php else: ?>
                            <a class="btn-login" href="<?php echo e(route('login')); ?>">
                                <?php echo e(__('pricing.login_first')); ?>

                            </a>
                        <?php endif; ?>
                    </span>
                    <ul>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.live_trading')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.forex_definitions')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_basics')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_fundamentals')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.basics_of_risk_management')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.advanced_market_analysis')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.technical_analysis')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.advanced_technical_analysis')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.trading_strategies')); ?></span>
                        </li>
                        <li>
                            <span>
                                <img src="<?php echo e(asset('assets/icons/check.svg')); ?>" alt="">
                            </span>
                            <span><?php echo e(__('pricing.advanced_risk_management')); ?></span>
                        </li>
                    </ul>
                </div>
            </header>

        </div>

        <figure class="pricing--master">
            <img src="<?php echo e(asset('assets/images/master.jpg')); ?>" alt="Master certificate">
            <div>
                <div class="title--container learn--content-title">
                    <h3 class="subtitle"> <?php echo e(__('pricing.master_certificate_subtitle')); ?> </h3>
                    <h2 class="main--title"> <?php echo e(__('pricing.master_certificate_title')); ?> </h2>
                    <p class="pricing--master-content"> <?php echo __('pricing.master_certificate_content'); ?> </p>
                </div>
            </div>
        </figure>
    </section>

    <section class="testimonials--section section--container" id="testimonials">
        <div class="testimonials--wrapper container-lg">
            <div class="testimonials--content">
                <div class="title--container">
                    <h3 class="subtitle"> <?php echo e(__('testimonials.subtitle')); ?> </h3>
                    <h2 class="main--title"> <?php echo e(__('testimonials.title')); ?> </h2>
                    <p class="main--content"> <?php echo e(__('testimonials.content')); ?> </p>
                </div>
            </div>
            <div class="testimonials--carousel">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonials--carousel-card">
                                <div class="testimonials--carousel-card_header">
                                    <div class="testimonials--carousel-card_header_img">
                                        <img src="<?php echo e(asset('assets/images/testimonials/testimonials-1.webp')); ?>"
                                            alt="">
                                    </div>
                                    <div class="testimonials--carousel-card_header_content">
                                        <h4> <?php echo e(__('testimonials.client_1')); ?> </h4>
                                        <span><?php echo e(__('testimonials.member')); ?></span>
                                    </div>
                                </div>
                                <div class="testimonials--carousel-card_content">
                                    <p lang="en"> <?php echo e(__('testimonials.content_1')); ?> </p>
                                    <p>
                                        <?php echo e($current_lang === __('testimonials.content_1_lang') ? '' : '_ ' . __('testimonials.translate') . ' ' . __('languages.' . __('testimonials.content_1_lang'))); ?>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonials--carousel-card">
                                <div class="testimonials--carousel-card_header">
                                    <div class="testimonials--carousel-card_header_img">
                                        <img src="<?php echo e(asset('assets/images/testimonials/testimonials-2.webp')); ?>"
                                            alt="">
                                    </div>
                                    <div class="testimonials--carousel-card_header_content">
                                        <h4> <?php echo e(__('testimonials.client_2')); ?> </h4>
                                        <span><?php echo e(__('testimonials.member')); ?></span>
                                    </div>
                                </div>
                                <div class="testimonials--carousel-card_content">
                                    <p> <?php echo e(__('testimonials.content_2')); ?> </p>
                                    <p>
                                        <?php echo e($current_lang === __('testimonials.content_2_lang') ? '' : '_ ' . __('testimonials.translate') . ' ' . __('languages.' . __('testimonials.content_2_lang'))); ?>

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonials--carousel-card">
                                <div class="testimonials--carousel-card_header">
                                    <div class="testimonials--carousel-card_header_img">
                                        <img src="<?php echo e(asset('assets/images/testimonials/testimonials-3.webp')); ?>"
                                            alt="">
                                    </div>
                                    <div class="testimonials--carousel-card_header_content">
                                        <h4> <?php echo e(__('testimonials.client_3')); ?> </h4>
                                        <span><?php echo e(__('testimonials.member')); ?></span>
                                    </div>
                                </div>
                                <div class="testimonials--carousel-card_content">
                                    <p> <?php echo e(__('testimonials.content_3')); ?> </p>
                                    <p>
                                        <?php echo e($current_lang === __('testimonials.content_3_lang') ? '' : '_ ' . __('testimonials.translate') . ' ' . __('languages.' . __('testimonials.content_3_lang'))); ?>

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonials--carousel-card">
                                <div class="testimonials--carousel-card_header">
                                    <div class="testimonials--carousel-card_header_img">
                                        <img src="<?php echo e(asset('assets/images/testimonials/testimonials-4.webp')); ?>"
                                            alt="">
                                    </div>
                                    <div class="testimonials--carousel-card_header_content">
                                        <h4> <?php echo e(__('testimonials.client_4')); ?> </h4>
                                        <span><?php echo e(__('testimonials.member')); ?></span>
                                    </div>
                                </div>
                                <div class="testimonials--carousel-card_content">
                                    <p> <?php echo e(__('testimonials.content_4')); ?> </p>
                                    <p>
                                        <?php echo e($current_lang === __('testimonials.content_4_lang') ? '' : '_ ' . __('testimonials.translate') . ' ' . __('languages.' . __('testimonials.content_4_lang'))); ?>

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>


    <section class="faq--section section--container" id="faq">
        <div class="container-lg">
            <div class="title--container title--center title--margin faq--header">
                <h3 class="subtitle"> <?php echo e(__('faq.subtitle')); ?> </h3>
                <h2 class="main--title"> <?php echo e(__('faq.title')); ?> </h2>
                <p><?php echo e(__('faq.content')); ?></p>
            </div>

            <div class="faq-main">
                <div class="faq-item">
                    <div class="faq-label">
                        <?php echo e(__('faq.question1')); ?> <i></i>
                    </div>
                    <div class="faq-cont">
                        <p> <?php echo e(__('faq.question1_answer')); ?> </p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-label">
                        <?php echo e(__('faq.question2')); ?><i></i>
                    </div>
                    <div class="faq-cont">
                        <p> <?php echo e(__('faq.question2_answer')); ?> </p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-label"><?php echo e(__('faq.question3')); ?><i></i></div>
                    <div class="faq-cont">
                        <p> <?php echo e(__('faq.question3_answer')); ?> </p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-label"><?php echo e(__('faq.question4')); ?><i></i></div>
                    <div class="faq-cont">
                        <p> <?php echo e(__('faq.question4_answer')); ?> </p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-label">
                        <?php echo e(__('faq.question5')); ?><i></i>
                    </div>
                    <div class="faq-cont">
                        <p> <?php echo e(__('faq.question5_answer')); ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="footer--top container-lg">
            <div class="footer--about">
                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Future leaders logo">
                <div>
                    <p><?php echo e(__('footer.about')); ?></p>
                    <ul>
                        <li>
                            <a href="https://www.instagram.com/future__leaders_/" target="_blank"
                                rel="noopener noreferrer">
                                <img src="<?php echo e(asset('assets/icons/social/instagram.svg')); ?>" alt="Instagram icon">
                            </a>
                        </li>
                        <li>
                            <a href="https://t.me/futureleadre" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo e(asset('assets/icons/social/telegram.svg')); ?>" alt="Telegram icon">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer--links">
                <h4><?php echo e(__('footer.links')); ?></h4>
                <div>
                    <ul>
                        <li><a href="#about"><?php echo e(__('menu.about')); ?></a></li>
                        <li><a href="#services"><?php echo e(__('menu.our_services')); ?></a></li>
                        <li><a href="#team"><?php echo e(__('menu.our_team')); ?></a></li>
                        <li><a href="#faq"><?php echo e(__('menu.faq')); ?></a></li>
                    </ul>
                    <ul>
                        <li><a href="#steps"><?php echo e(__('menu.steps')); ?></a></li>
                        <li><a href="#testimonials"><?php echo e(__('menu.testimonials')); ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer--powered">
                <a href="http://kazalmedia.com" target="_blank" rel="noopener noreferrer">
                    <p lang="en">Powered By</p>
                    <img src="<?php echo e(asset('assets/images/kazalmedia.png')); ?>" alt="Kazalmedia Logo white">
                </a>
            </div>
        </div>


        <div class="footer--copyright">
            <div
                class="container d-flex flex-column flex-sm-row justify-content-between align-items-center text-muted text-center text-sm-start py-2">
                <span>
                    © 2025, Tous les droits sont réservés
                </span>
                <span>
                    Developed by
                    <a href="https://instagram.com/falcondeev" class="text-white fw-bold" target="_blank"
                        rel="noopener noreferrer">FalconDev</a>
                    <i class="typcn typcn-heart-full-outline text-danger"></i>
                </span>
            </div>
        </div>

        </div>
    </footer>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <div></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/index.blade.php ENDPATH**/ ?>