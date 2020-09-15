<?php
/*
    Plugin Name: Hotel Rayon - Post Types
    Plugin URI:
    Description: Añade Post Types al sitio de Hotel rayon
    Version: 1.0.0
    Author: Francisco Javier Pureco Lucas
    Author URI:
    text Domain: hotelrayon
*/

if (!defined('ABSPATH')) die();
// Registrar Custom Post Type
function rayon_habitaciones_post_type() {

    $labels = array(
        'name'                  => _x( 'Habitaciones', 'Post Type General Name', 'hotelrayon' ),
        'singular_name'         => _x( 'Habitación', 'Post Type Singular Name', 'hotelrayon' ),
        'menu_name'             => __( 'Habitaciones', 'hotelrayon' ),
        'name_admin_bar'        => __( 'Habitación', 'hotelrayon' ),
        'archives'              => __( 'Archivo', 'hotelrayon' ),
        'attributes'            => __( 'Atributos', 'hotelrayon' ),
        'parent_item_colon'     => __( 'Habitación Padre', 'hotelrayon' ),
        'all_items'             => __( 'Todas Las Habitaciones', 'hotelrayon' ),
        'add_new_item'          => __( 'Agregar Habitación', 'hotelrayon' ),
        'add_new'               => __( 'Agregar Habitación', 'hotelrayon' ),
        'new_item'              => __( 'Nueva Habitación', 'hotelrayon' ),
        'edit_item'             => __( 'Editar Habitación', 'hotelrayon' ),
        'update_item'           => __( 'Actualizar Habitación', 'hotelrayon' ),
        'view_item'             => __( 'Ver Habitación', 'hotelrayon' ),
        'view_items'            => __( 'Ver Habitaciones', 'hotelrayon' ),
        'search_items'          => __( 'Buscar Habitación', 'hotelrayon' ),
        'not_found'             => __( 'No Encontrado', 'hotelrayon' ),
        'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'hotelrayon' ),
        'featured_image'        => __( 'Imagen Destacada', 'hotelrayon' ),
        'set_featured_image'    => __( 'Guardar Imagen destacada', 'hotelrayon' ),
        'remove_featured_image' => __( 'Eliminar Imagen destacada', 'hotelrayon' ),
        'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'hotelrayon' ),
        'insert_into_item'      => __( 'Insertar en Habitación', 'hotelrayon' ),
        'uploaded_to_this_item' => __( 'Agregado en Habitación', 'hotelrayon' ),
        'items_list'            => __( 'Lista de Habitaciones', 'hotelrayon' ),
        'items_list_navigation' => __( 'Navegación de Habitaciones', 'hotelrayon' ),
        'filter_items_list'     => __( 'Filtrar Habitaciones', 'hotelrayon' ),
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
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-building',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'rayon_habitaciones', $args );

}
add_action( 'init', 'rayon_habitaciones_post_type', 0 );

