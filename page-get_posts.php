<?php get_header();?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Blog<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">
               <?php 
                     // параметры по умолчанию
            $posts = get_posts( array(
               'numberposts' => 3,
               'category' => 0,
               'order' => 'ASC',
               'post_type'   => 'post',
               'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            foreach( $posts as $post ){
               setup_postdata($post);
                  // формат вывода the_title() ...

            ?>
           
            <article class="post">

               <div class="entry-header cf">

                  <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>

                  <p class="post-meta">

                     <time class="date" datetime="<?php the_date('D M, Y' )?>"><?php the_date('D M, Y' )?></time>
                     /
                     <span class="categories">
                     <?php the_category( ' / ' ); ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
               <a href="<?php the_permalink( );?>" title=""><?php the_post_thumbnail( 'post-thumb'); ?></a>
               </div>

               <div class="post-content">

               <?php the_excerpt(); ?>
               <a class="more-link" href="<?php the_permalink(); ?>">Read More<i class="fa fa-arrow-circle-o-right"></i></a>

               </div>

            </article> <!-- post end -->
                     <?php  
                      
               
               }
              // След./Пред. Пост.
                     $post_nav = get_the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">Далее</span> ' .
                           '<span class="screen-reader-text">Следующая запись</span> ' .
                           '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">Назад</span> ' .
                           '<span class="screen-reader-text">Предыдущая запись</span> ' .
                           '<span class="post-title">%title</span>',
                     ) );

                     

                     echo $post_nav;

               
               wp_reset_postdata(); // сброс
               ?>


<?php

       
               $pred_post = get_previous_post(); // получили и записали в переменную объект предыдущего поста
               $next_post = get_next_post(); // получили и записали в переменную объект предыдущего поста
               ?>
      
      
               <ul class="post-nav cf">
               
                  <li class="prev"><a href="<?php echo get_permalink( $pred_post )?>" rel="prev"><strong>Previous Entry</strong> <?php echo get_the_title( $pred_post )?></a></li>
                  <li class="next"><a href="<?php echo get_permalink( $next_post )?>" rel="next"><strong>Next Entry</strong> <?php echo get_the_title( $next_post )?></a></li>
               </ul>
               

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

               <aside id="sidebar">
               <?php get_sidebar();?>

               </aside> <!-- Sidebar End -->

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweets Section End-->

  <?php get_footer();?>