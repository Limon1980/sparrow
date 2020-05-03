<?php
/*
Template Name: Портфолио-Entry
Template Post Type: post, page, product
*/
?>
<?php get_header();?>

<!-- Page Title
================================================== -->
<div id="page-title">

   <div class="row">

      <div class="ten columns centered text-center">
         <h1>Our Amazing Works<span>.</span></h1>

         <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
         enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
      </div>

   </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

   <div id="page-content" class="row portfolio">

      
               <?php 
                     // параметры по умолчанию
             $posts = get_posts( array(
               'numberposts' => '1',
               'order' => 'ASC',
               'post_type'   => 'portfolio',
               'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
             ) );

             foreach( $posts as $post ){
               setup_postdata($post);
                   // формат вывода the_title() ...

             ?>
               <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

                  <h1><?php the_title();?></h1>

                  <div class="entry-description">

                  <p><?php the_field('description')?></p>

                  </div>

                  <ul class="portfolio-meta-list">
						   <li><span>Date: </span><?php the_field('proj-date')?></li>
						   <li><span>Client </span><?php the_field('client')?></li>
						   <li><span>Skills: </span><?php the_field('skils')?></li>
				      </ul>

                  <a class="button" href="http://behance.net">View project</a>

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

            <div class="entry-media">

            <img src="<?php the_field('foto1')?>" alt="" />

            <img src="<?php the_field('foto2')?>" alt="" />

            </div>

               <div class="entry-excerpt">

               <p><?php the_field('excerpt')?></p>

					</div>

            </div> <!-- primary end-->
         
         </section> <!-- end section -->
         <?php } // конец while ?>

         <?php
         $pred_post = get_previous_post(); // получили и записали в переменную объект предыдущего поста
         $next_post = get_next_post(); // получили и записали в переменную объект предыдущего поста
         ?>


         <ul class="post-nav cf">
         
			   <li class="prev"><a href="<?php echo get_permalink( $pred_post )?>" rel="prev"><strong>Previous Entry</strong> <?php echo get_the_title( $pred_post )?></a></li>
				<li class="next"><a href="<?php echo get_permalink( $next_post )?>" rel="next"><strong>Next Entry</strong> <?php echo get_the_title( $next_post )?></a></li>
			</ul>
     

       
            
      </div>

   </div> <!-- content End-->
        



    


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

</section> <!-- Tweet Section End-->

<?php get_footer(); ?>