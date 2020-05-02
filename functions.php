<?php

add_action( 'wp_enqueue_scripts', 'theme_styles');
add_action( 'wp_enqueue_scripts', 'theme_scripts');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action('widgets_init', 'register_my_widgets');
add_action( 'after_setup_theme', 'sparrow_setup' );



function sparrow_setup() {
  add_theme_support(
'custom-logo', array(
'height' => 48,
'width'  => 226
)
);
}






function theme_register_nav_menu(){
  register_nav_menu( 'top', 'Меню в шапке' );
  register_nav_menu( 'bottom', 'Меню в футоре' );
  add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails', array( 'post' ) ); 
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video' ) );
  add_image_size( 'post-thumb', 1300, 500, true ); 
  // удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination( array(
	'end_size' => 2,
) ); 
}


function theme_styles() {
wp_enqueue_style( 'styles', get_stylesheet_uri() );
wp_enqueue_style( 'default', get_template_directory_uri(). '/assets/css/default.css' );
wp_enqueue_style( 'layout', get_template_directory_uri(). '/assets/css/layout.css' );
}

function theme_scripts() {
	// отменяем зарегистрированный jQuery
	// вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'flexslider', get_template_directory_uri(). '/assets/js/jquery.flexslider.js', ['jquery'], null, true );
	wp_enqueue_script( 'doubletaptogo', get_template_directory_uri(). '/assets/js/doubletaptogo.js', ['jquery'], null, true );
	wp_enqueue_script( 'init', get_template_directory_uri(). '/assets/js/init.js', ['jquery'], null, true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri(). '/assets/js/modernizr.js', null, null, false );
	wp_enqueue_script( 'fontawesome', '//kit.fontawesome.com/24510c20bc.js', null, null, false );
  }

  function register_my_widgets(){
    register_sidebar( array(
      'name'          => 'Left Sidebar',
      'id'            => "left_sidebar",
      'description'   => 'Описание нашего сайдбара',
      'before_widget' => '<div class="widget %2$s link-list">',
      'after_widget'  => "</div>\n",
      'before_title'  => '<h5 class="widgettitle">',
      'after_title'   => "</h5>\n",
    
    ) );
  }

	add_action('my_act', 'my_func');

	function my_func(){

		add_filter( 'excerpt_length', function(){
			return 15;
		} );
	
		add_filter('excerpt_more', function($more) {
			return '...';
		});

		global $post;
		$posts = get_posts( array(
			'numberposts' => 3,
			'order' => 'DESC',
			'post_type'   => 'post',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		) );

		foreach( $posts as $post ){
			setup_postdata($post);
				// формат вывода the_title() ...


			
				echo '<li><time class="date" datetime="">'.get_the_date('F jS, Y' ).' </time><a href="'.get_the_permalink( ).'">'.get_the_title().'</a></li>';
				echo '<span>'. the_excerpt('10'). '</span>';

		}
		wp_reset_postdata();
	}
	
	add_shortcode( 'my_short', 'my_short_func' );

	function my_short_func($atts){

		$atts = shortcode_atts( [
			'post' => '3', // здесь значение по умолчанию
		], $atts );

		global $post;
		$posts = get_posts( array(
			'numberposts' => $atts['post'],
			'order' => 'DESC',
			'post_type'   => 'post',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		) );

		foreach( $posts as $post ){
			setup_postdata($post);
				// формат вывода the_title() ...

				$text .= '<li><a href="'.get_the_permalink( ).'">'.get_the_title().'</a></li>';

		}
		wp_reset_postdata();




		return $text;
 }


 /* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
$who_count      = 0;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}


?>