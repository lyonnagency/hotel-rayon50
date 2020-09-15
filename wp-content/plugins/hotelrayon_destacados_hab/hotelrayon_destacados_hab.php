<?php

/*
    Plugin Name: Hotel Rayon - Destacados de las  habitaciones
    Plugin URI:
    Description: Añade destacados para ser relacionados con las habitaciones
    Version: 1.0.0
    Author: Francisco Javier Pureco Lucas
    Author URI:
    text Domain: hotelrayon_destacados
*/

if (!defined('ABSPATH')) die();
// Registrar Custom Post Type
function rayon_destacados_post_type()
{

  $labels = array(
    'name' => _x('Destacados', 'Post Type General Name', 'hotelrayon_destacados'),
    'singular_name' => _x('Destacado', 'Post Type Singular Name', 'hotelrayon_destacados'),
    'menu_name' => __('Destacados de Habitaciones', 'hotelrayon_destacados'),
    'name_admin_bar' => __('Destacado', 'hotelrayon_destacados'),
    'archives' => __('Archivo', 'hotelrayon_destacados'),
    'attributes' => __('Atributos', 'hotelrayon_destacados'),
    'parent_item_colon' => __('Destacado Padre', 'hotelrayon_destacados'),
    'all_items' => __('Todos los Destacados', 'hotelrayon_destacados'),
    'add_new_item' => __('Agregar Destacado', 'hotelrayon_destacados'),
    'add_new' => __('Agregar Destacado', 'hotelrayon_destacados'),
    'new_item' => __('Nuevo Destacado', 'hotelrayon_destacados'),
    'edit_item' => __('Editar Destacado', 'hotelrayon_destacados'),
    'update_item' => __('Actualizar Destacado', 'hotelrayon_destacados'),
    'view_item' => __('Ver Destacado', 'hotelrayon_destacados'),
    'view_items' => __('Ver Destacados', 'hotelrayon_destacados'),
    'search_items' => __('Buscar Destacado', 'hotelrayon_destacados'),
    'not_found' => __('No Encontrado', 'hotelrayon_destacados'),
    'not_found_in_trash' => __('No Encontrado en Papelera', 'hotelrayon_destacados'),
    'featured_image' => __('Imagen Destacada', 'hotelrayon_destacados'),
    'set_featured_image' => __('Guardar Imagen destacada', 'hotelrayon_destacados'),
    'remove_featured_image' => __('Eliminar Imagen destacada', 'hotelrayon_destacados'),
    'use_featured_image' => __('Utilizar como Imagen Destacada', 'hotelrayon_destacados'),
    'insert_into_item' => __('Insertar en Destacado', 'hotelrayon_destacados'),
    'uploaded_to_this_item' => __('Agregado en Destacado', 'hotelrayon_destacados'),
    'items_list' => __('Lista de Destacados', 'hotelrayon_destacados'),
    'items_list_navigation' => __('Navegación de Destacados', 'hotelrayon_destacados'),
    'filter_items_list' => __('Filtrar Destacados', 'hotelrayon_destacados'),
  );
  $args = array(
    'label' => __('Destacado', 'hotelrayon_destacados'),
    'description' => __('Destacados para la habitación', 'hotelrayon_destacados'),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 7,
    'menu_icon' => 'dashicons-post-status',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
  );
  register_post_type('rayon_destacados', $args);

}

add_action('init', 'rayon_destacados_post_type', 0);
