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


            </article> <!-- post end -->

            <?php } // конец while ?>

           <?php } // конец if ?>
           