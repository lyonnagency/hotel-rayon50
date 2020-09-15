<?php
/*
    Plugin Name: Hotel Rayon - Capacidad para Habitaciones
    Plugin URI:
    Description: Añade capacidad de usuarios a la habitación
    Version: 1.0.0
    Author: Francisco Javier Pureco Lucas
    Author URI:
    text Domain: hotelrayon
*/

if (!defined('ABSPATH')) die();
// Registrar Custom Post Type
function rayon_capacidad_post_type() {

	$labels = array(
		'name'                  => _x( 'Capacidad', 'Post Type General Name', 'hotelrayon' ),
		'singular_name'         => _x( 'Capacidad', 'Post Type Singular Name', 'hotelrayon' ),
		'menu_name'             => __( 'Capacidad de Habitaciones', 'hotelrayon' ),
		'name_admin_bar'        => __( 'Capacidad de Habitaciones', 'hotelrayon' ),
		'archives'              => __( 'Archivo', 'hotelrayon' ),
		'attributes'            => __( 'Atributos', 'hotelrayon' ),
		'parent_item_colon'     => __( 'Capacidad Padre', 'hotelrayon' ),
		'all_items'             => __( 'Todas Las Capacidades', 'hotelrayon' ),
		'add_new_item'          => __( 'Agregar Capacidad', 'hotelrayon' ),
		'add_new'               => __( 'Agregar Capacidad', 'hotelrayon' ),
		'new_item'              => __( 'Nueva Capacidad', 'hotelrayon' ),
		'edit_item'             => __( 'Editar Capacidad', 'hotelrayon' ),
		'update_item'           => __( 'Actualizar Capacidad', 'hotelrayon' ),
		'view_item'             => __( 'Ver Capacidad', 'hotelrayon' ),
		'view_items'            => __( 'Ver Capacidad', 'hotelrayon' ),
		'search_items'          => __( 'Buscar Capacidad', 'hotelrayon' ),
		'not_found'             => __( 'No Encontrado', 'hotelrayon' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'hotelrayon' ),
		'featured_image'        => __( 'Imagen Destacada', 'hotelrayon' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'hotelrayon' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'hotelrayon' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'hotelrayon' ),
		'insert_into_item'      => __( 'Insertar en Capacidad', 'hotelrayon' ),
		'uploaded_to_this_item' => __( 'Agregado en Capacidad', 'hotelrayon' ),
		'items_list'            => __( 'Lista de Capacidad', 'hotelrayon' ),
		'items_list_navigation' => __( 'Navegación de Capacidad', 'hotelrayon' ),
		'filter_items_list'     => __( 'Filtrar Capacidad', 'hotelrayon' ),
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
		'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'rayon_capacidad', $args );

}
add_action( 'init', 'rayon_capacidad_post_type', 0 );

