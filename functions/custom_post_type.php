<?php
/* ----------------------------------------------------- */
/* Post Types */
/* ----------------------------------------------------- */

/* Criando um Post Type Personalizado */
add_action('init', 'modelo_register');
function modelo_register() {
	 $labels = array(
			'name' => 'Portfólio',
			'singular_name' => 'Post',
			'all_items' => 'Todos Portfólio',
			'add_new' => 'Adicionar Portfólio',
			'add_new_item' => 'Adicionar novo Portfólio',
			'edit_item' => 'Editar post',
			'new_item' => 'Novo post',
			'view_item' => 'Ver post',
			'search_items' => 'Procurar Portfólio',
			'not_found' =>  'Nada encontrado',
			'not_found_in_trash' => 'Nada encontrado no lixo',
			'parent_item_colon' => ''
	);
	$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'taxonomy' => array('categoria-portfolio'),
			'menu_position' => 6,
			'supports' => array('title','editor','excerpt','comments','thumbnail','category'),
			'rewrite' => array('slug' => 'categoria-portfolio')
	  );
	register_post_type('portfolio',$args);
}

/* ini: post type: carousel-home */
add_action('init', 'registrar_post_type_carousel');
function registrar_post_type_carousel() {
	register_post_type('carousel-home',  array(
	  'labels' => array(
	  'name' => 'Todas os itens do carousel home',
	  'add_new' => 'Adicionar item',
	  'add_new_item' => 'Novo item',
	  'edit_item' => 'Editar item',
	  'new_item' => 'Ver item',
	  'search_items' => 'Procurar por item',
	  'not_found' => 'Nenhum registro encontrado',
	  'not_found_in_trash' => 'Nada encontrado na lixeira',
	  'menu_name' => 'Carousel Home',
	  ),
	  'public' => true,
	  'hierarchical' => false,
	  'supports' => array('title', 'page-attributes'),
	  'menu_icon' => 'dashicons-slides'
	)) ;
}
/* end: post type: carousel-home */

/* ----------------------------------------------------- */
/* Taxonomias */
/* ----------------------------------------------------- */

/* Criando uma Taxonomia Personalizada */
register_taxonomy("categoria-portfolio", array("portfolio"), array("hierarchical" => true,
	"label" => "Categorias", "singular_label" => "Categoria",'rewrite' => array( 'slug' => 'categoria-portfolio' )));
