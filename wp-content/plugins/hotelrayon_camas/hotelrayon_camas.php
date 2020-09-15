<?php
/*
    Plugin Name: Hotel Rayon - Camas para Habitaciones
    Plugin URI:
    Description: Añade Tipo y numero de camas a las Camas
    Version: 1.0.0
    Author: Francisco Javier Pureco Lucas
    Author URI:
    text Domain: hotelrayon
*/

if (!defined('ABSPATH')) die();
// Registrar Custom Post Type
function rayon_camas_post_type() {

	$labels = array(
		'name'                  => _x( 'Camas', 'Post Type General Name', 'hotelrayon' ),
		'singular_name'         => _x( 'Cama', 'Post Type Singular Name', 'hotelrayon' ),
		'menu_name'             => __( 'Camas de Habitaciones', 'hotelrayon' ),
		'name_admin_bar'        => __( 'Cama', 'hotelrayon' ),
		'archives'              => __( 'Archivo', 'hotelrayon' ),
		'attributes'            => __( 'Atributos', 'hotelrayon' ),
		'parent_item_colon'     => __( 'Cama Padre', 'hotelrayon' ),
		'all_items'             => __( 'Todas Las Camas', 'hotelrayon' ),
		'add_new_item'          => __( 'Agregar Cama', 'hotelrayon' ),
		'add_new'               => __( 'Agregar Cama', 'hotelrayon' ),
		'new_item'              => __( 'Nueva Cama', 'hotelrayon' ),
		'edit_item'             => __( 'Editar Cama', 'hotelrayon' ),
		'update_item'           => __( 'Actualizar Cama', 'hotelrayon' ),
		'view_item'             => __( 'Ver Cama', 'hotelrayon' ),
		'view_items'            => __( 'Ver Camas', 'hotelrayon' ),
		'search_items'          => __( 'Buscar Cama', 'hotelrayon' ),
		'not_found'             => __( 'No Encontrado', 'hotelrayon' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'hotelrayon' ),
		'featured_image'        => __( 'Imagen Destacada', 'hotelrayon' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'hotelrayon' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'hotelrayon' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'hotelrayon' ),
		'insert_into_item'      => __( 'Insertar en Cama', 'hotelrayon' ),
		'uploaded_to_this_item' => __( 'Agregado en Cama', 'hotelrayon' ),
		'items_list'            => __( 'Lista de Camas', 'hotelrayon' ),
		'items_list_navigation' => __( 'Navegación de Camas', 'hotelrayon' ),
		'filter_items_list'     => __( 'Filtrar Camas', 'hotelrayon' ),
	);
	$args = array(
		'label'                 => __( 'Clase', 'hotelrayon' ),
		'description'           => __( 'Clases para el Sitio Web', 'hotelrayon' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-welcome-add-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'rayon_camas', $args );

}
add_action( 'init', 'rayon_camas_post_type', 0 );

