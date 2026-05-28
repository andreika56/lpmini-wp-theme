<?php
/**
* Template Name: Главная (LP Mini)
* Front page — главная страница лендинга.
* Вся верстка идентична оригинальному index.html, контент подключен через ACF.
*/
get_header(); ?>

<header class="bg_dark">
 <div class="cd-auto-hide-header">
   <div class="container2">
     <div class="menu">
       <div class="logo">
         <img src="<?php echo esc_url(lp_field('logo', get_template_directory_uri() . '/img/bg1/logo_visa.svg')); ?>" alt="" />
       </div>

       <div class="button">
         <a href="#zayavka">
           <button>
             <p><?php lp_the_field('header_btn_text', 'Стоимость'); ?></p>
           </button>
         </a>
       </div>
     </div>
   </div>
 </div>
 <div class="container">
   <div class="main">
     <div class="left">
       <h1>
         <b style="display: block">
           <?php lp_the_field('hero_title_before', 'Оформляем'); ?> <span><?php lp_the_field('hero_title_accent', 'загранпаспорта'); ?></span><br />
           <?php lp_the_field('hero_title_after', 'в Москве от 1 дня'); ?>
         </b>
         <?php lp_the_field('hero_subtitle', 'Без очередей и справок. Через МФЦ г. Москвы. Акция до'); ?> <span id="promo-date"></span>

         <div class="skidka">
           <div class="first">
             <img src="<?php echo esc_url(lp_field('skidka_icon', get_template_directory_uri() . '/img/bg1/skidka.svg')); ?>" alt="" />
             <p><?php lp_the_field('skidka_label', 'Скидка до'); ?></p>
             <p><?php lp_the_field('skidka_value', '-30%'); ?></p>
           </div>
         </div>

         <img class="car" src="<?php echo esc_url(lp_field('hero_image', get_template_directory_uri() . '/img/bg1/girl_new.png')); ?>" alt="" />
       </h1>

       <div class="plusi">
         <?php
         if (function_exists('have_rows') && have_rows('hero_advantages')) :
           while (have_rows('hero_advantages')) : the_row(); ?>
             <div class="plus">
               <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="" />
               <b><?php the_sub_field('text'); ?></b>
             </div>
         <?php endwhile;
         else : ?>
           <div class="plus">
             <img src="<?php echo get_template_directory_uri(); ?>/img/bg1/icon/1.png" alt="" />
             <b>С 2015 года оформили 17 439+ загранпаспортов</b>
           </div>
           <div class="plus">
             <img src="<?php echo get_template_directory_uri(); ?>/img/bg1/icon/3.png" alt="" />
             <b>Работаем с самыми сложными случаями</b>
           </div>
           <div class="plus">
             <img src="<?php echo get_template_directory_uri(); ?>/img/bg1/icon/4.png" alt="" />
             <b>Возможно удаленное оформление</b>
           </div>
         <?php endif; ?>
       </div>

       <div class="new_plus">
         <div class="item">
           <div class="china">
             <img class="car" src="<?php echo esc_url(lp_field('guarantee_image', get_template_directory_uri() . '/img/pasport.jpg')); ?>" alt="" />
           </div>

           <div class="text">
             <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/bg3/check.svg" alt="" /></div>
             <p><?php
               $guarantee = lp_field('guarantee_text', 'Вы 100% получите паспорт от 5 до 10 лет <b>или мы вернем деньги</b>');
               echo wp_kses_post($guarantee);
             ?></p>
           </div>
         </div>

         <div class="item">
           <div class="kek slide2 gallery owl-theme owl-loaded owl-drag">
             <?php
             if (function_exists('have_rows') && have_rows('reviews_gallery')) :
               while (have_rows('reviews_gallery')) : the_row();
                 $img_url = get_sub_field('image'); ?>
                 <a data-fancybox="case1.1" href="<?php echo esc_url($img_url); ?>"><img src="<?php echo esc_url($img_url); ?>" alt="" /></a>
             <?php endwhile;
             else :
               for ($i = 1; $i <= 10; $i++) :
                 $img = get_template_directory_uri() . '/img/otz/1 (' . $i . ').jpg'; ?>
                 <a data-fancybox="case1.1" href="<?php echo esc_url($img); ?>"><img src="<?php echo esc_url($img); ?>" alt="" /></a>
             <?php endfor;
             endif; ?>
           </div>

           <div class="text">
             <div class="img"><img src="<?php echo get_template_directory_uri(); ?>/img/bg3/check.svg" alt="" /></div>
             <p><?php
               $clients = lp_field('clients_text', 'За 2023-2024 г. <b>нам доверили оформление</b> загранпаспорта 3452 клиента');
               echo wp_kses_post($clients);
             ?></p>
           </div>
         </div>
       </div>

       <div class="h1_dop" id="zayavka">
         <?php lp_the_field('form_title', 'Узнайте стоимость оформления загранпаспорта от 1 дня со скидкой до 30%*'); ?>
         <p><?php lp_the_field('form_subtitle', 'Акция действует до'); ?> <span id="promo-date2"></span></p>
       </div>

       <div class="forma_pop">
         <?php
         $cf7_shortcode = lp_field('contact_form_shortcode', '');
         if ($cf7_shortcode) {
             echo do_shortcode($cf7_shortcode);
         } else { ?>
           <form action="" name="visa_mini">
             <input type="hidden" name="what" value="<?php echo esc_attr(lp_field('form_what_value', 'Мини-лендинг')); ?>" />
             <input type="tel" name="phone" id="phone" placeholder="+7(___) ___-__-__" />
             <div class="button feedback">
               <button>
                 <p><?php lp_the_field('form_btn_text', 'Узнать стоимость'); ?></p>
               </button>
             </div>
           </form>
         <?php } ?>
       </div>

       <div class="star" style="margin-top: 20px; text-align: center"><?php lp_the_field('form_disclaimer', '*условия акции уточняйте у менеджеров'); ?></div>

       <div class="ip">
         <p style="color: #aaaaaa; text-align: center; width: 100%; line-height: 16px"><?php lp_the_field('legal_text', 'Информация не является публичной офертой и носит информационный характер'); ?></p>
       </div>
     </div>
   </div>
 </div>
</header>

<?php get_footer(); ?>
