<?php if(have_posts()){ while (have_posts()) { the_post(); ?>
            <article class="post">

               <div class="entry-header cf">

                  <h1><?php the_title(); ?></h1>
                  <p class="post-meta">

                     <time class="date" datetime=""><?php the_date('F jS, Y' )?></time>
                     /
                     <span class="categories">
                     <?php the_category( ' / ' ); ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
               <?php the_post_thumbnail( 'large'); ?>
               </div>

               <div class="post-content">

                <?php the_content( );?>

                  <p class="tags">
  			            <span>Tagged in </span>:
                    <?php the_tags( '', '|' ) ?>
  			         </p>



               </div>

            </article> <!-- post end -->

            <?php } // конец while ?>
            <?php
         $pred_post = get_previous_post(); // получили и записали в переменную объект предыдущего поста
         $next_post = get_next_post(); // получили и записали в переменную объект предыдущего поста
         ?>


         <ul class="post-nav cf">
         
			   <li class="prev"><a href="<?php echo get_permalink( $pred_post )?>" rel="prev"><strong>Previous Entry</strong> <?php echo get_the_title( $pred_post )?></a></li>
				<li class="next"><a href="<?php echo get_permalink( $next_post )?>" rel="next"><strong>Next Entry</strong> <?php echo get_the_title( $next_post )?></a></li>
			</ul>
           <?php } // конец if ?>