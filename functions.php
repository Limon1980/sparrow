<?php

add_action( 'wp_enqueue_scripts', 'theme_styles');
add_action( 'wp_enqueue_scripts', 'theme_scripts');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action('widgets_init', 'register_my_widgets');
add_action( 'after_setup_theme', 'sparrow_setup' );
add_action( 'init', 'register_post_types' );
add_action( 'init', 'create_taxonomy' );
function register_post_types(){
	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить работу', // для добавления новой записи
			'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы', // для редактирования типа записи
			'new_item'           => 'Новоя работа', // текст новой записи
			'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу в портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		],
		'description'         => 'Это наши работы в портфолио',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-format-gallery',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'post-formats', 'excerpt', 'post-formats'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['skills'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => false,
	] );
}

// хук для регистрации

function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'skills', [ 'portfolio' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Найти навык',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Смотреть навык',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский Навык:',
			'edit_item'         => 'Изменить навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Новое имя навыка',
			'menu_name'         => 'Навыки',
		],
		'description'           => 'Навыки, которые использовались в работе', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => true, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => false, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		// 'capabilities'          => array(),
		// 'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		// 'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
		// 'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

// add_action( 'init', 'skills_for_portfolio' );
// function skills_for_portfolio(){
// 	register_taxonomy_for_object_type( 'skills', 'portfolio');
// }
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
	add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) ); 
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

wp_register_style('adobefont', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', false, null);


function theme_styles() {
wp_enqueue_style( 'styles', get_stylesheet_uri() );
wp_enqueue_style( 'default', get_template_directory_uri(). '/assets/css/default.css' );
wp_enqueue_style( 'layout', get_template_directory_uri(). '/assets/css/layout.css' );
wp_enqueue_style( 'media-queries', get_template_directory_uri(). '/assets/css/media-queries.css' );
wp_enqueue_style( 'fonts', get_template_directory_uri(). '/assets/css/fonts.css' );
wp_enqueue_style( 'woocommerce', get_template_directory_uri(). '/assets/css/woocommerce.css' );
wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/assets/css/font-awesome/css/font-awesome.css' );
wp_enqueue_style('adobefont');


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
			'numberposts' => 5,
			// 'order' => 'DESC',
			// запрос 5 последних постов по колличеству просмотров от большего к меньшему
			'meta_query' => array(
				'views' => array(
					'key'     => 'post_meta_views',
					// 'meta_value_num' => '0',
					// 'meta_compare' => '>='
					// 'value'   => 'blue',
					'compare' => 'EXISTS ',
				),
			),
			'orderby' => 'meta_value_num',
			'order'   => 'DESC',
			'post_type'   => 'post',
			'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
		) );


		foreach( $posts as $post ){
			setup_postdata($post);
				// формат вывода the_title() ...


			
				echo '<li><time class="date" datetime="">'.get_the_date('F jS, Y' ).' </time><a href="'.get_the_permalink( ).'">'.get_the_title().' </a><i class="fas fa-eye"></i>'.get_post_meta ($post->ID,'post_meta_views',true).'</li>';
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
$meta_key       = 'post_meta_views';  // Ключ мета поля, куда будет записываться количество просмотров.
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

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support');
}

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &#8194;&rsaquo;&#8194; ';
	return $defaults;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter', 20 );

// remove sidebar woocommerce

add_action('woocommerce_before_main_content', 'remove_sidebar');

function remove_sidebar(){
	if (is_shop()){
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
}

// product links

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );

// remove button cart 

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// remove sale default position
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 5 );

	// hover cart

	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_title', 5 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'sparrow_short_description', 15 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20 );

	function sparrow_short_description(){
		echo the_excerpt().'<br>';
	}

/**
 * Define image sizes
 */
function sparrow_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}

  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '340',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 0 		// false
	);



	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

add_action( 'after_switch_theme', 'sparrow_woocommerce_image_dimensions', 1 );
?>