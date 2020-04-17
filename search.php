<?php get_header();?>
<div class="findme">
<? if ( have_posts() ) : ?>
<h1><? printf( __( 'Результаты поиска: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>
<ol class="find">            
<? while ( have_posts() ) : the_post(); ?>
<li><h2><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute() ?>"><? the_title() ?></a></h2>  
<p><? echo(get_the_excerpt()) ?></p></li>
<? endwhile; ?>
</ol>
<? else : ?>
<h1>Ничего не найдено</h1>
<p>Ничего не найдено, попробуйте еще раз.</p>
<br />
<? get_search_form(); ?>
<? endif; ?>
</div>




<?php get_footer();?>
