<?php 

function my_wp_nav_menu_args( $args = '' ) {
	$args[ 'container' ] = false;
	return $args;
}

function loadIconsStyle() {
	wp_register_style( 'styleIcons', get_stylesheet_directory_uri() . '/fonts/icons/all.min.css', array(), '5.15.1', 'all' );
	wp_enqueue_style( 'styleIcons' );
}

function loadBootsrapStyle() {
	wp_register_style( 'styleBootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '4.5.3', 'all' );
	wp_enqueue_style( 'styleBootstrap' );
}

function loadSwiperStyle() {
	wp_register_style( 'styleSwiper', get_stylesheet_directory_uri() . '/css/swiper-bundle.css', array(), '6.4.5', 'all' );
	wp_enqueue_style( 'styleSwiper' );
}

function loadLightBoxStyle() {
	wp_register_style( 'styleLight', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), '2.0.0', 'all' );
	wp_enqueue_style( 'styleLight' );
}

function loadCssStyle() {
	wp_register_style( 'style_tems', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'style_tems' );
}

// include custom jQuery
function shapeSpace_include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), null, true );
}

function loadMapScript() {
	wp_register_script( 'MapScript', 'https://api-maps.yandex.ru/2.1/?apikey=f0d23fbd-1ab1-4149-978f-0e066a1d6bfd&lang=ru_RU', array( 'jquery' ), null, true );
	wp_enqueue_script( 'MapScript' );
}

function loadMaskScript() {
	wp_register_script( 'MaskScript', get_stylesheet_directory_uri() . '/js/jquery.masked.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'MaskScript' );
}

function loadBootsrapScript() {
	wp_register_script( 'BootsrapScript', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'BootsrapScript' );
}

function loadBundleScript() {
	wp_register_script( 'BundleScript', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'BundleScript' );
}

function loadSwiperScript() {
	wp_register_script( 'SwiperScript', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'SwiperScript' );
}

function loadLightboxScript() {
	wp_register_script( 'LightboxScript', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'LightboxScript' );
}

function loadIconsScript() {
	wp_register_script( 'IconsScript', get_stylesheet_directory_uri() . '/fonts/icons/all.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'IconsScript' );
}

function loadFunctions() {
	wp_register_script( 'functions', get_stylesheet_directory_uri() . '/js/function.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'functions' );
}

function contact_more_options(){
	add_settings_field('insta','Ссылка на instagram:','display_insta','general');
	add_settings_field('fbook','Ссылка на facebook:','display_fbook','general');
	add_settings_field('vk','Ссылка на ВК:','display_vk','general');
	add_settings_field('addr','Адрес компании:','display_addr','general');
	add_settings_field('phone','Контактный телефон:','display_phone','general');
	add_settings_field('info','Юридическая набивка:','display_info','general');
	register_setting('general','contact_insta');
	register_setting('general','contact_fbook');
	register_setting('general','contact_vk');
	register_setting('general','contact_addr');
	register_setting('general','contact_phone');
	register_setting('general','contact_info');
}

function display_insta(){
	echo "<input type='text' name='contact_insta' value='".esc_attr(get_option('contact_insta'))."'>";
}

function display_fbook(){
	echo "<input type='text' name='contact_fbook' value='".esc_attr(get_option('contact_fbook'))."'>";
}

function display_vk(){
	echo "<input type='text' name='contact_vk' value='".esc_attr(get_option('contact_vk'))."'>";
}

function display_phone(){
	echo "<input type='text' name='contact_phone' value='".esc_attr(get_option('contact_phone'))."'>";
}

function display_addr(){
	echo "<input type='text' name='contact_addr' value='".esc_attr(get_option('contact_addr'))."'>";
}

function display_info(){
	echo "<input type='text' name='contact_info' value='".esc_attr(get_option('contact_info'))."'>";
}

add_action( 'wp_enqueue_scripts', 'loadIconsStyle' );
add_action( 'wp_enqueue_scripts', 'loadBootsrapStyle' );
add_action( 'wp_enqueue_scripts', 'loadSwiperStyle' );
add_action( 'wp_enqueue_scripts', 'loadLightBoxStyle' );
add_action( 'wp_enqueue_scripts', 'loadCssStyle' );
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');
add_action( 'wp_enqueue_scripts', 'loadMapScript' );
add_action( 'wp_enqueue_scripts', 'loadMaskScript' );
add_action( 'wp_enqueue_scripts', 'loadBootsrapScript' );
add_action( 'wp_enqueue_scripts', 'loadBundleScript' );
add_action( 'wp_enqueue_scripts', 'loadSwiperScript' );
add_action( 'wp_enqueue_scripts', 'loadLightboxScript' );
add_action( 'wp_enqueue_scripts', 'loadIconsScript' );
add_action( 'wp_enqueue_scripts', 'loadFunctions' );
add_action( 'admin_init','contact_more_options' );
add_action( 'wp_ajax_get_capsule', 'action_callback_post' );
add_action( 'wp_ajax_nopriv_get_capsule', 'action_callback_post' );
add_action( 'wp_ajax_ajax_form', 'action_send_form' );
add_action( 'wp_ajax_nopriv_ajax_form', 'action_send_form' );
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'comment_text', 'wpautop' );

// MY FUNCTIONS //------------------------------------------------------------//

function set_image($id){
	$data = [
		'medium' => wp_get_attachment_image_url( $id, 'medium' ),
		'full' => wp_get_attachment_image_url( $id, 'full' )		
	];

	return($data);
}

function set_category($id){
	$query = new WP_Query( 'category__in=' . $id . '&posts_per_page=' . get_category( $id )->category_count . '&order=ASC' );
	$cat_mane = get_the_category_by_ID($id);
	if ($query->have_posts()){
		while ($query->have_posts()):
			$query -> the_post();
			$id = get_the_id();
			$title = get_the_title();
			$content = get_the_content();
			$text = wp_trim_words( $content, 18, ' ... ' );		
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src( $thumb_id, 'medium', true );
			$category[] = [
				'id'     => $id + 22,
				'title'  => $title,
				'text'   => $text,
				'button' => 'Подробнее',
				'image'  => $thumb_url[0]
			];
		endwhile;
		wp_reset_postdata();
	}
	
	$data = [
		'name' => $cat_mane,
		'posts' => $category
	];
	
	return($data);
}

function set_comment($id){
	$query = new WP_Query( 'category__in=' . $id . '&posts_per_page=' . get_category( $id )->category_count . '&order=ASC' );
	if ($query->have_posts()){
		while ($query->have_posts()):
			$query -> the_post();
			$id = get_the_id();
			$name = get_the_title();
			$metadata = get_post_meta($id, 'meta_data', true);
			$metahref = get_post_meta($id, 'meta_href', true);
			$text = get_the_content();
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full', true );
			$data[] = [
				'id'     => $id,
				'name'   => $name,
				'data'   => $metadata,
				'href'   => $metahref,
				'text'   => $text,
				'avatar' => $thumb_url[0]
			];
		endwhile;
		wp_reset_postdata();
	}
	
	return($data);	
}

function get_section_slider(){
	$post = get_post( 2, ARRAY_A );
	$data = [
		'title' => $post['post_title'],
		'background' => get_the_post_thumbnail_url( $post['ID'], 'full' )
	];

	return($data);
}

function get_section_info(){
	$post = get_post( 22, ARRAY_A );
	$title = $post['post_title'];
	$background = get_the_post_thumbnail_url( $post['ID'], 'full' );
	$gallery = get_post_gallery( $post['ID'], false );
	$img_ids = explode(',', $gallery ['ids']);
	foreach ($img_ids as $value) {
		$images [] = set_image($value);
	}
	$metalist = get_post_meta( $post['ID'], 'info_item', false );
	$data = [
		'title' => $title,
		'background' => $background,
		'slider' => $images,
		'meta_items' => $metalist
	];

	return($data);
}

function get_section_service(){
	$post = get_post( 70, ARRAY_A );
	$title = $post['post_title'];
	$background = get_the_post_thumbnail_url( $post['ID'], 'full' );
	$cat_id = get_post_meta( $post['ID'], 'cat_id', true );
	
	$data = [
		'title' => $title,
		'span' => get_post_meta( $post['ID'], 'span', true ),
		'background' => $background,
		'category' => set_category($cat_id)
	];

	return($data);
}

function get_section_review(){
	$post = get_post( 105, ARRAY_A );
	$title = $post['post_title'];
	$background = get_the_post_thumbnail_url( $post['ID'], 'full' );
	$cat_id = get_post_meta( $post['ID'], 'cat_id', true );

	$data = [
		'title' => $title,
		'booking' => [
			'href' => 'https://www.booking.com/hotel/ru/loft-13-47-35.ru.html',
			'title' => 'Перейти на booking.com'
		],
		'span' => get_post_meta( $post['ID'], 'span', true ),
		'background' => $background,
		'comment' => set_comment($cat_id)
	];

	return($data);
}

function get_section_footer(){
	$info = str_replace(';', '<br>', get_option('contact_info'));
	$phone = get_option('contact_phone');
	$email = get_option('admin_email');
	$addr = get_option('contact_addr');
	$insta = get_option('contact_insta');
	$fbook = get_option('contact_fbook');
	$vk = get_option('contact_vk');
	
	$data = [
		'information' => $info,
		'contact' => [
			'phone' => [
				'title' => 'Позвоните нам',
				'href' => $phone,
				'icon' => 'fas fa-phone-alt'
			],
			'email' => [
				'title' => 'Напишите нам',
				'href' => $email,
				'icon' => 'fas fa-envelope'
			],
			'addr' => [
				'title' => 'Приезжайте к нам',
				'href' => $addr,
				'icon' => 'fas fa-map-marker-alt'
			]
		],
		'social' => [
			'insta' => [
				'title' => 'Мы в instagram',
				'href' => $insta,
				'icon' => 'fab fa-instagram'
			],
			'fbook' => [
				'title' => 'Мы в facebook',
				'href' => $fbook,
				'icon' => 'fab fa-facebook-f'
			],
			'vk'    => [
				'title' => 'Наша группа в VK',
				'href' => $vk,
				'icon' => 'fab fa-vk'
			]
		],
		'model' => [
			'title' => 'Заказть звонок',
			'title_info' => 'Сообщение',
			'name' => 'Ваше имя',
			'name_holder' => 'Имя',
			'name_invalid' => 'Поле должно содержать от 2 до 20 символов.',
			'phone' => 'Телефонный номер',
			'phone_holder' => '+7(___) ___ __-__',
			'button' => 'Отмена',
			'button_close' => 'Закрыть',
			'submit' => 'Отправить',
			'icon' => 'fas fa-phone-alt'
		]
	];
	
	return($data);
}

function get_capsule_post($id){
	$post = get_post( $id, ARRAY_A );
	$title = $post['post_title'];
	$text = $post['post_content'];	
	$data = [
		'title' => $title,
		'text' => $text
	];

	return($data);
}

function send_message($name,$phone){
	$to = get_bloginfo('admin_email');
  	$from = $from = preg_replace("([\r\n])", "", $name);
	$subject = 'Заказ звонка с сайта';
  	$message = 'Имя: '.$name;
  	$message .= '\r\n Телефонный номер: '.$phone;
    $headers = "From: ".$from."\r\n";
    $headers .= "Reply-to: ".$from."\r\n";
	if (wp_mail($to, $subject, $message, $headers)){
		$data = 'form_send';
	}else{
		$data = 'error_send';
	}

	return($data);
}

function action_callback_post(){
	$capsule_id = intval( $_GET['capsule_id'] );
	$data = get_capsule_post($capsule_id - 22);
	echo(wp_json_encode($data));

	wp_die();
}

function action_send_form(){
	if(isset($_POST['name']) && isset($_POST['phone'])):
		$name = sanitize_text_field($_POST['name']);
		$phone = sanitize_text_field($_POST['phone']);
		if(strlen($name) < 2 || strlen($name) > 20){
			echo(wp_json_encode('error_name'));
		}else{
			$send = send_message($name,$phone);
			echo(wp_json_encode($send));
		}
	endif;

	wp_die();
}
