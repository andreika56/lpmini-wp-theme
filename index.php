<?php
/**
* Index template — fallback для WordPress темы LP Mini.
* Главная страница рендерится через front-page.php.
* Этот файл нужен только потому что WordPress требует index.php в каждой теме.
*/

get_header(); ?>

<main class="site-main">
   <?php
   if ( have_posts() ) :
       while ( have_posts() ) :
           the_post();
           ?>
           <article <?php post_class(); ?>>
               <h1><?php the_title(); ?></h1>
               <div class="entry-content">
                   <?php the_content(); ?>
               </div>
           </article>
           <?php
       endwhile;
   else :
       ?>
       <p>Контент не найден.</p>
       <?php
   endif;
   ?>
</main>

<?php get_footer(); ?>
