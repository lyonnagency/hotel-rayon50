<?php
/**
 * The main template file for display page.
 *
 * @package WordPress
 */

//Check if single attachment page
if ($post->post_type == 'attachment') {
    get_template_part("single-attachment");
    die;
}

/**
 *    Get Current page object
 **/
if (!is_null($post)) {
    $page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
 *    Get current page id
 **/

if (!is_null($post) && isset($page_obj->ID)) {
    $current_page_id = $page_obj->ID;
}

get_header();
?>

<?php
//Include custom header feature
//get_template_part("/templates/template-header");
//wp_enqueue_style( 'style', get_stylesheet_uri() );
?>

<div class="custom-container-habitaciones">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <?php
    //  en caso de que los estilos fallen, podemos usar los que están dentro del sitio
    //  simplemente hay que descomentar las lieneas de código que están debajo, a continucación
    //  wp_enqueue_style('slick', get_template_directory_uri() . '/css/slider-custom/slick.css', false, '1.1', 'all');
    //  wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slider-custom/slick-theme.css', false, '1.1', 'all');
    ?>

    <?php while (have_posts()):the_post(); ?>
        <!--    --><?php //the_post_thumbnail(); ?>
        <section class="hero-habitaciones" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
            <div class="d-flex align-items-center justify-content-center h-100">
                <div class="text-white text-center">
                    <h2 class="ff-fargoise fs-52 text-white"> <?php the_field('titulo_1') ?> </h2>
                    <h1 class="ff-galano-semibold fs-45 text-white"> <?php the_field('titulo_principal'); ?> </h1>
                    <h2 class="ff-galano-bold fs-14 text-white text-uppercase mt-4 track-200"> <?php the_field('sub_titulo') ?> </h2>
                </div>
            </div>
        </section>
        <section class="mx-lg-5 mx-4 mx-md-5">
            <div class="d-flex flex-wrap card-description-habitation bg-white">
                <!--              <div class="col-md-1"></div>-->
                <div class="col-12 col-md-7 offset-lg-1 col-lg-6 py-md-5 pb-0 pt-5">
                    <div class="col-12 px-0 px-md-3 d- justify-content-center py-md-5">
                        <h2 class="ff-caslon-bold fs-40 color-blue text-center text-md-left"><?php the_field('recomendado_para'); ?></h2>
                        <div class="hotel-simple-logo mx-auto my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 307.07 376.1"><defs><style>.cls-isotipo{fill:#8c8155;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="cls-isotipo" d="M163.31,233.63c-12.54-15.55-36.95-59.44-36.95-59.44s19.31,15.74,53.36,8.2C202,177.46,220,158,219.19,124.27c-.71-31.18-31.42-60.1-73-57-34.87,2.62-58.85,29.24-65.21,45.23-5,12.48-3.08,28.81,12.39,31.59,11,2,16.49-6.61,15.65-14.3C107.79,118.92,97.36,119,97.36,119c2.37-3.81,15-19.62,37.1-26.77,38.36-12.42,66.09,9.36,67,36.07.53,15.76-8.1,39.68-37.64,42.88-32.7,3.53-47.94-15.68-39.48-30.55,8.14-14.3,20.57-2.49,18.36,5.33s-9-.68-9.23,8.16c-.22,9.92,16.31,2.68,18.32-7.72,1.69-8.76-.64-15.53-7.89-20.69-3.33-2.37-9.55-2.82-15.86-1.33-14.84,3.51-17.16,23-18.12,36.08-1.51,20.41,1.32,87.25,1.34,88.21-6.29-13.31-21-11.46-26.71-9.76-6,1.81-13.66,10.66-7.46,16.23,3,2.69,4.48,1.28,6.33.46,3.52-1.57,2.71-6.39,2.71-6.39A10.77,10.77,0,0,1,99,251.29c7.9,7.83,7.62,23,.57,29-12.65,10.85-16.11,1.26-16.11,1.26s14-10.74,4.4-19.52S63.48,266.52,72,284.75c6.38,13.65,24.19,12,34.29,5.63S122,273.6,123.61,254.6s-6.17-73.32-6.17-73.32c8.74,35.32,19.67,46.87,32.92,63.55,15.93,20,38.85,41.82,69.72,41.14,8.13-.18,27.77-1.58,34.45-17.94,6.06-14.84-3.25-29.08-18-26.86C224.79,243,219,251.49,222.37,259.71c1.55,3.81,5.37,5.9,8.27,4.36,5-2.68,2.82-6.67,1.56-9.09,0,0,1-4.21,7.14-3.55,8.06.86,8.72,8.41,6.73,13.49a27.1,27.1,0,0,1-29.18,10.2C198.72,270.31,180.25,254.64,163.31,233.63Z"/><circle class="cls-isotipo" cx="153.25" cy="9.46" r="9.46"/><circle class="cls-isotipo" cx="153.25" cy="366.65" r="9.46"/><path class="cls-isotipo" d="M307.07,189.87c0-84.91-54.31-155.45-125.92-170.11v0a13.49,13.49,0,1,0,10.22,13.09,13.22,13.22,0,0,0-.22-2.37c54.39,20.45,94.07,84,94.07,159.37,0,73.76-38,136.23-90.6,158,0-.44.07-.89.07-1.34A13.5,13.5,0,1,0,179.91,360c0,.08,0,.16,0,.24l1-.19h.36a13.53,13.53,0,0,0,6.18-1.5C255.88,341.18,307.07,272.3,307.07,189.87Z"/><path class="cls-isotipo" d="M127.8,333.06a13.49,13.49,0,0,0-13.5,13.5,12.61,12.61,0,0,0,.19,2.14c-53.66-21-92.65-84.12-92.65-158.83,0-75.05,39.34-138.42,93.37-159.15a12.64,12.64,0,0,0-.19,2.15,13.49,13.49,0,1,0,8.32-12.47l0-.09C53,36.11,0,106,0,189.87c0,84.79,54.17,155.24,125.62,170l0-.05a13.33,13.33,0,0,0,2.2.19,13.5,13.5,0,0,0,0-27Z"/></g></g></svg>
                        </div>
                        <div class="description mt-5">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <!--              <div class="col-1"></div>-->
                <div class="col-12 col-md-5 col-xl-4 border-md-left offset-xl-1 px-0 py-md-5 pb-5">
                    <div class="col-12 px-lg-5 pt-5">
                      <span class="ff-galano-bold fs-16 color-brown">
                          <?php
                          echo (pll_current_language() == 'es') ? "Desde" : "From";
                          ?>
                      </span>
                        <p class="ff-galano-semi-bold fs-65 color-blue py-0">
                            <?php
                            $formated_price = number_format(get_field('precio_habitacion'));
                            echo "$" . $formated_price;
                            ?>
                        </p>
                        <a href="#" class="btn-reservar">
                          <span class="reservar-ico">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.8 15.31"><defs><style>.cls-1 {
                                              fill: #fff;
                                          }</style></defs><title>reservar-ico</title><g id="Capa_2" data-name="Capa 2"><g
                                              id="Capa_1-2" data-name="Capa 1"><path class="cls-1"
                                                                                     d="M21.75,15.31H1.06A1.06,1.06,0,0,1,0,14.25v-3c0-3,1.22-5.19,3.62-6.41A16.34,16.34,0,0,1,10.35,3.6V2.11h-.9A1.06,1.06,0,0,1,9.45,0h3.91a1.06,1.06,0,0,1,0,2.11h-.9V3.6a17.13,17.13,0,0,1,6.17,1,6.35,6.35,0,0,1,4.06,5.14,1.05,1.05,0,0,1-2.08.33c-.5-3.16-3.08-4.39-9.21-4.39-2.2,0-5,.12-6.83,1.07-1.68.84-2.45,2.28-2.45,4.52v1.9H21.75a1.06,1.06,0,0,1,0,2.12Z"/></g></g></svg>
                          </span>
                            <?php
                            echo (pll_current_language() == 'es') ? "Reservar" : "Book now";
                            ?>
                        </a>
                    </div>
                    <div class="col-12 px-lg-5 px-0 mt-5">

                        <?php

                        $capacidad = get_field('capacidad_habitacion');
                        if ($capacidad): ?>
                            <?php foreach ($capacidad as $p): // variable must NOT be called $post (IMPORTANT) ?>
                                <?php $icono = get_field('icono_de_capacidad', $p->ID); ?>
                                <div class="col-12 my-4">
                                    <img class="mr-3" width="30px" src="<?php echo $icono['url'] ?>"
                                         alt="<?php echo $icono['alt'] ?>">
                                    <span class="ff-galano-semibold fs-16 color-blue"><?php echo get_the_title($p->ID); ?></span>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>
                        <?php
                        $camas = get_field('camas_en_la_habitacion');
                        if ($camas): ?>
                            <?php foreach ($camas as $p): // variable must NOT be called $post (IMPORTANT) ?>
                                <?php $icono = get_field('icono_camas', $p->ID); ?>
                                <div class="col-12 my-4">
                                    <img class="mr-3" width="30px" src="<?php echo $icono['url'] ?>"
                                         alt="<?php echo $icono['alt'] ?>">
                                    <span class="ff-galano-semibold fs-16 color-blue"><?php echo get_the_title($p->ID); ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <!--                      -->
                        <?php

                        $posts = get_field('destacados');

                        if ($posts): ?>

                            <?php foreach ($posts as $p): // variable must NOT be called $post (IMPORTANT) ?>
                                <?php $icono = get_field('icono_destacado', $p->ID); ?>
                                <div class="col-12 my-4">
                                    <img class="mr-3" width="30px" src="<?php echo $icono['url'] ?>"
                                         alt="<?php echo $icono['alt'] ?>">
                                    <span class="ff-galano-semibold fs-16 color-blue"><?php echo get_the_title($p->ID); ?></span>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-blue w-100 py-5">
            <div class="mx-md-5 d-flex justify-content-center py-5 flex-wrap">
                <div class="col-12 col-xl-10 d-flex py-5 flex-wrap ">
                    <!--  Amenidades   -->
                    <div class="col-md-7 d-flex flex-wrap d-md-block d-lg-flex px-lg-0">
                        <div class="col-lg-5 mb-3">
                            <div class="d-flex">
                        <span class="ico-amenidades mr-4 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.66 33.23">
                            <defs>
                                <style>
                                    .cls-ame-1, .cls-ame-2 {
                                        fill: none;
                                        stroke: #fff;
                                        stroke-miterlimit: 10;
                                    }

                                    .cls-ame-2 {
                                        stroke-linecap: round;
                                    }
                                </style>
                            </defs>
                            <title>ico-amenidades</title>
                            <g id="Capa_2" data-name="Capa 2">
                                <g id="Capa_1-2" data-name="Capa 1">
                                    <path class="cls-ame-1"
                                          d="M.5,23.79V3.1A2.49,2.49,0,0,1,2.79.5H20.55a2.49,2.49,0,0,1,2.29,2.66V23.79a2.49,2.49,0,0,1-2.29,2.66H16.3"/>
                                    <path class="cls-ame-1"
                                          d="M13.13,32.52,1.91,27.13A2.71,2.71,0,0,1,.5,24.67V3.12A1.54,1.54,0,0,1,2.58,1.5l12.3,5.92A2.69,2.69,0,0,1,16.3,9.87v20.2C16.3,32,14.64,33.25,13.13,32.52Z"/><circle
                                            class="cls-ame-1" cx="10.51" cy="18.34" r="2.04"/>
                                    <line class="cls-ame-2"
                                          x1="28.16"
                                          y1="26.45"
                                          x2="21.07"
                                          y2="26.45"/>
                                </g>
                            </g>
                        </svg>
                    </span>
                                <h2 class="ff-galano-bold fs-24 text-white mb-0">
                                    <?php
                                    echo (pll_current_language() == 'es') ? "Amenidades" : "Amenities";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 text-white">
                            <ul class="list-custom-habitacion">
                                <?php
                                $ameidades = get_field('amenidades');
                                foreach ($ameidades as $key => $amenoItem) {
                                    ?>
                                    <li>
                                        <?php
                                        echo $amenoItem;
                                        ?>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Servicios -->
                    <div class="col-md-5 d-flex flex-wrap mt-5 mt-md-0 d-md-block d-lg-flex px-lg-0">
                        <div class="col-lg-6 mb-3">
                            <div class="d-flex">
                        <span class="ico-amenidades ico-servicios mr-4 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.2 38.2"><defs><style>.cls-serv-1 {
                                        fill: #fff;
                                    }</style></defs><title>ico-services</title><g id="Capa_2" data-name="Capa 2"><g
                                        id="Capa_1-2" data-name="Capa 1"><path class="cls-serv-1"
                                                                               d="M15.26,8.72a.67.67,0,0,0,.19-.92,2.84,2.84,0,0,1-.69-1.62,3.06,3.06,0,0,1,.59-1.26l.18-.29a5.08,5.08,0,0,0,.79-2.12A2.81,2.81,0,0,0,15.39.17.66.66,0,0,0,15,0h0a.67.67,0,0,0-.45.22.65.65,0,0,0-.17.48.67.67,0,0,0,.22.46A1.45,1.45,0,0,1,15,2.4a3.57,3.57,0,0,1-.59,1.54l-.18.27a4.21,4.21,0,0,0-.78,1.88,4.1,4.1,0,0,0,.9,2.43A.68.68,0,0,0,15.26,8.72Z"/><path
                                            class="cls-serv-1"
                                            d="M32.91,15.52a.66.66,0,0,0,.2-.92A2.87,2.87,0,0,1,32.42,13,2.83,2.83,0,0,1,33,11.72l.19-.3A5,5,0,0,0,34,9.3,2.8,2.8,0,0,0,33.05,7a.66.66,0,0,0-.44-.17h0a.67.67,0,0,0-.46.22.74.74,0,0,0-.17.48.67.67,0,0,0,.22.45,1.46,1.46,0,0,1,.49,1.25,3.45,3.45,0,0,1-.6,1.53l-.17.28a4.16,4.16,0,0,0-.78,1.88,4,4,0,0,0,.9,2.43A.67.67,0,0,0,32.91,15.52Z"/><path
                                            class="cls-serv-1"
                                            d="M6.12,15.44a.67.67,0,0,0,.19-.92c-.49-.76-.72-1.19-.69-1.62a2.93,2.93,0,0,1,.59-1.26l.18-.3a5,5,0,0,0,.79-2.12,2.81,2.81,0,0,0-.93-2.33.66.66,0,0,0-.44-.17h0a.67.67,0,0,0-.62.7.69.69,0,0,0,.22.46,1.45,1.45,0,0,1,.48,1.24,3.54,3.54,0,0,1-.59,1.53l-.18.28a4.21,4.21,0,0,0-.78,1.88,4.1,4.1,0,0,0,.9,2.43A.68.68,0,0,0,6.12,15.44Z"/><path
                                            class="cls-serv-1"
                                            d="M25.18,8.72a.67.67,0,0,0,.19-.92,2.81,2.81,0,0,1-.68-1.62,2.88,2.88,0,0,1,.58-1.26l.18-.29a5,5,0,0,0,.79-2.12A2.81,2.81,0,0,0,25.31.17.64.64,0,0,0,24.87,0h0a.67.67,0,0,0-.46.22.65.65,0,0,0-.17.48.67.67,0,0,0,.22.46,1.47,1.47,0,0,1,.49,1.24,3.74,3.74,0,0,1-.6,1.54l-.17.27a4.1,4.1,0,0,0-.78,1.88,4,4,0,0,0,.89,2.43A.68.68,0,0,0,25.18,8.72Z"/><path
                                            class="cls-serv-1"
                                            d="M37.54,36.88H35.08V34.49a15.78,15.78,0,0,0-.39-3.5.67.67,0,0,0-.79-.51.71.71,0,0,0-.42.3.67.67,0,0,0-.08.5,15,15,0,0,1,.35,3.21v2.39H4.45V34.49a17.44,17.44,0,0,1,.1-1.75l.1-.79H27a.66.66,0,1,0,0-1.32H4.91l.45-1.22a14.65,14.65,0,0,1,25-4.34.69.69,0,0,0,.45.24.67.67,0,0,0,.72-.61.71.71,0,0,0-.15-.48,15.94,15.94,0,0,0-10.69-5.63l-.81-.08v-3l.39-.27a1.84,1.84,0,1,0-2.1,0l.39.27v3l-.83.07A16,16,0,0,0,3.13,34.49v2.39H.66a.66.66,0,0,0,0,1.32H37.54a.66.66,0,0,0,0-1.32Z"/></g></g></svg>
                    </span>
                                <h2 class="ff-galano-bold fs-24 text-white mb-0">
                                    <?php
                                    echo (pll_current_language() == 'es') ? "Servicios" : "Services";
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 text-white">
                            <ul class="list-custom-habitacion">
                                <?php
                                $ameidades = get_field('servicios');
                                foreach ($ameidades as $key => $amenoItem) {
                                    ?>
                                    <li><?php echo $amenoItem ?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-0">
            <div class="slider-custom slider-single-room">
                <?php
                $images = get_field('galeria');
                if ($images): ?>
                    <!--              <div class="">-->
                    <!--                <img src="--><?php //the_post_thumbnail_url(); ?><!--" class="d-block w-" alt="...">-->
                    <!--              </div>-->
                    <?php foreach ($images as $image): ?>
                        <!--                --><?php //echo var_dump($image['sizes']); ?>
                        <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </section>
        <?php
        $call_to_action_template = "";
        $call_to_action_template = (pll_current_language() == 'es') ? "[elementor-template id=\"1671\"]" : "[elementor-template id=\"1856\"]";
        echo do_shortcode($call_to_action_template);
        ?>
    <?php endwhile; ?>
    <?php
    //  en caso de que los scripts fallen, podemos usar los que están dentro del sitio
    //  simplemente hay que descomentar las lieneas de código que están debajo, a continucación
    //  wp_enqueue_script('jquery-1110', get_template_directory_uri() . '/js/slider-custom/jquery-1.11.0.min.js', array(), 1.0, true);
    //  wp_enqueue_script('jquery-migrate-121', get_template_directory_uri() . '/js/slider-custom/jquery-migrate-1.2.1.min.js', array(), 1.0, true);
    //  wp_enqueue_script('slick-min', get_template_directory_uri() . '/js/slider-custom/slick.min.js', array(), 1.0, true);
    // inicializador del slider
    wp_enqueue_script('main-handler', get_template_directory_uri() . '/js/slider-custom/slider-handler.js', array(), 1.0, true);
    ?>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <?php get_footer(); ?>

    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"-->
    <!--        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"-->
    <!--        crossorigin="anonymous"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"-->
    <!--        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"-->
    <!--        crossorigin="anonymous"></script>-->

    <?php //get_header('header-transparent'); ?>
    <?php
    //Include custom header feature
    //get_template_part("/templates/template-header");
    //?>
