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

                  <div class="bio cf">

                     <div class="gravatar">
                        <img src="images/author-img.png" alt="">
                     </div>
                     <div class="about">
                        <h5><a title="Posts by John Doe" href="#" rel="author">John Doe</a></h5>
                        <p>Jon Doe is lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                        cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                        <a href="#">cursus</a> a sit <a href="#">amet mauris</a>. Morbi elit consequat ipsum.</p>
                     </div>

                  </div>

                  <ul class="post-nav cf">
  			            <li class="prev"><a rel="prev" href="#"><strong>Previous Article</strong> Duis Sed Odio Sit Amet Nibh Vulputate</a></li>
  				         <li class="next"><a rel="next" href="#"><strong>Next Article</strong> Morbi Elit Consequat Ipsum</a></li>
  			         </ul>

               </div>

            </article> <!-- post end -->

            <?php } // конец while ?>

           <?php } // конец if ?>