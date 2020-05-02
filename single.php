<?php get_header();?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php if(get_post_format()){echo get_post_format(); }else{echo 'Standart';}?><span>.</span></h1>

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
            
         <?php get_template_part( 'template-part/post', get_post_format() );?>

            <!-- Comments
            ================================================== -->
            <div id="comments">

               <h3>5 Comments</h3>

               <!-- commentlist -->
               <ol class="commentlist">

                  <li class="depth-1">

                     <div class="avatar">
                        <img width="50" height="50" class="avatar" src="images/user-01.png" alt="">
                     </div>

                     <div class="comment-info">
                        <cite>Itachi Uchiha</cite>

                        <div class="comment-meta">
                           <time class="comment-time" datetime="2014-01-14T23:05">Jan 14, 2013 @ 23:05</time>
                           <span class="sep">/</span><a class="reply" href="#">Reply</a>
                        </div>
                     </div>

                     <div class="comment-text">
                        <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                        facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                     </div>

                  </li>

                  <li class="thread-alt depth-1">

                     <div class="avatar">
                        <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                     </div>

                     <div class="comment-info">
                        <cite>John Doe</cite>

                        <div class="comment-meta">
                           <time class="comment-time" datetime="2014-01-14T24:05">Jan 14, 2013 @ 24:05</time>
                           <span class="sep">/</span><a class="reply" href="#">Reply</a>
                        </div>
                     </div>

                     <div class="comment-text">
                        <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                        urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                        tantas semper delicatissimi.</p>
                     </div>

                     <ul class="children">

                        <li class="depth-2">

                           <div class="avatar">
                              <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                           </div>

                           <div class="comment-info">
                              <cite>Kakashi Hatake</cite>

                              <div class="comment-meta">
                                 <time class="comment-time" datetime="2014-01-14T25:05">Jan 14, 2013 @ 25:05</time>
                                 <span class="sep">/</span><a class="reply" href="#">Reply</a>
                              </div>
                           </div>

                           <div class="comment-text">
                              <p>Duis sed odio sit amet nibh vulputate
                              cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                              cursus a sit amet mauris</p>
                           </div>

                           <ul class="children">

                              <li class="depth-3">

                                 <div class="avatar">
                                    <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                                 </div>

                                 <div class="comment-info">
                                    <cite>John Doe</cite>

                                    <div class="comment-meta">
                                       <time class="comment-time" datetime="2014-01-14T25:15">Jan 14, 2013 @ 25:15</time>
                                       <span class="sep">/</span><a class="reply" href="#">Reply</a>
                                    </div>
                                 </div>

                                 <div class="comment-text">
                                    <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                                    etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                 </div>

                              </li>

                           </ul>

                        </li>

                     </ul>

                  </li>

                  <li class="depth-1">

                     <div class="avatar">
                        <img width="50" height="50" class="avatar" src="images/user-02.png" alt="">
                     </div>

                     <div class="comment-info">
                        <cite>Hinata Hyuga</cite>

                        <div class="comment-meta">
                           <time class="comment-time" datetime="2014-01-14T25:15">Jan 14, 2013 @ 25:15</time>
                           <span class="sep">/</span><a class="reply" href="#">Reply</a>
                        </div>
                     </div>

                     <div class="comment-text">
                        <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                     </div>

                  </li>

               </ol> <!-- Commentlist End -->


               <!-- respond -->
               <div class="respond">

                  <h3>Leave a Comment</h3>

                  <!-- form -->
                  <form name="contactForm" id="contactForm" method="post" action="">
  					   <fieldset>

                     <div class="cf">
  						      <label for="cName">Name <span class="required">*</span></label>
  						      <input name="cName" type="text" id="cName" size="35" value="" />
                     </div>

                     <div class="cf">
  						      <label for="cEmail">Email <span class="required">*</span></label>
  						      <input name="cEmail" type="text" id="cEmail" size="35" value="" />
                     </div>

                     <div class="cf">
  						      <label for="cWebsite">Website</label>
  						      <input name="cWebsite" type="text" id="cWebsite" size="35" value="" />
                     </div>

                     <div class="message cf">
                        <label  for="cMessage">Message <span class="required">*</span></label>
                        <textarea name="cMessage"  id="cMessage" rows="10" cols="50" ></textarea>
                     </div>

                     <button type="submit" class="submit">Submit</button>

  					   </fieldset>
  				      </form> <!-- Form End -->

               </div> <!-- Respond End -->

            </div>  <!-- Comments End -->

         </div>

         <div id="secondary" class="four columns end">

            <aside id="sidebar">
            <?php get_sidebar();?>

            </aside> <!-- Sidebar End -->

         </div> <!-- Comments End -->

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

   </section> <!-- Tweet Section End-->

<?php get_footer();?>