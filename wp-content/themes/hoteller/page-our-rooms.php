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
?>
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
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="sidebar_content full_width">
                <?php
                if (have_posts()) {
                    while (have_posts()) : the_post(); ?>
                        <div class="hero-section">
                            <?php
                            //                  the_content();
                            //                            echo do_shortcode("[elementor-template id=\"1676\"]");
                            echo do_shortcode("[elementor-template id=\"1834\"]");
                            //  Content
                            // TODO: Separete on a diffrent file
                            //
                            ?>
                        </div>
                        <section class="ml-md-5 mt--120">
                            <?php
                            $args = array(
                                'post_type' => 'rayon_habitaciones',
                                'meta_key' => 'precio_habitacion',
                                'orderby' => 'meta_value',
                                'order' => 'DESC'
                            );
                            $clases = new WP_Query($args);
                            $counter_bg = 0;

                            while ($clases->have_posts()): $clases->the_post(); ?>

                                <?php
                                $class_bg_hab = 'bg-blue';
                                $counter_bg++;
                                if (($counter_bg % 2) == 0) {
                                    $class_bg_hab = 'bg-blue-alt';
                                }
                                ?>
                                <div class="wrapper-hab d-flex flex-wrap ">
                                    <div class="col-12 col-md-5 text-white py-5 <?php echo $class_bg_hab ?>">
                                        <div class="col-lg-10 mx-auto py-4">
                                            <h2 class=" ff-caslon-bold fs-35 text-white mb-4">
                                                <?php the_title() ?>
                                                <?php //the_field('precio_habitacion'); ?>
                                            </h2>
                                            <span class="ff-galano-bold fs-16">From</span>
                                            <h3 class="text-white ff-galano-medium fs-30 ">
                                                <?php
                                                $cost_room = get_field('precio_habitacion');
                                                setlocale(LC_MONETARY, 'en_US');
                                                echo money_format('%(#10n', $cost_room);
                                                ?>
                                            </h3>
                                            <div class="destacados mt-5">
                                                <div class="d-flex py-1">
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-bold fs-15 text-white">room:</h3>
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-semibold fs-15 text-white">
                                                            <?php
                                                            the_field('tipo_de_suite');
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="d-flex py-1">
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-bold fs-15 text-white">beds:</h3>
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-semibold fs-15 text-white">
                                                            <?php

                                                            $capacidad_habitacion = get_field('camas_en_la_habitacion')[0];
                                                            //                                                              var_dump($capacidad_habitacion);
                                                            echo get_the_title($capacidad_habitacion->ID)

                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="d-flex py-1">
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-bold fs-15 text-white">capacity:</h3>
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-semibold fs-15 text-white">
                                                            <?php
                                                            $capacidad_habitacion = get_field('capacidad_habitacion')[0];
                                                            //                                                              var_dump($capacidad_habitacion);
                                                            echo get_the_title($capacidad_habitacion->ID)
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="d-flex py-1">
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-bold fs-15 text-white">recommended
                                                            for:</h3>
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-semibold fs-15 text-white">
                                                            <?php
                                                            the_field('recomendado_para');
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="d-flex py-1">
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-bold fs-15 text-white">extras:</h3>
                                                    </div>
                                                    <div class="col-6 px-0">
                                                        <h3 class="ff-galano-semibold fs-15 text-white">
                                                            <?php
                                                            the_field('extras');
                                                            ?>
                                                        </h3>
                                                    </div>

                                                </div>
                                                <div class="d-flex mt-5 flex-wrap">
                                                    <div class="col-12 col-lg-auto px-0 pb-4 pb-0 mr-lg-2 mb-md-3">
                                                        <a class="btn-bordered btn-bg-white reservar-btn px-5 py-3"
                                                           href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 22.8 15.31">
                                                                <defs>
                                                                    <style>
                                                                        .cls-1 {
                                                                            opacity: 0.8;
                                                                        }

                                                                        .cls-2 {
                                                                            fill: #fff;
                                                                        }
                                                                    </style>
                                                                </defs>
                                                                <g id="Capa_2" data-name="Capa 2">
                                                                    <g id="Capa_1-2" data-name="Capa 1">
                                                                        <g class="cls-1-res">
                                                                            <path class="cls-2-res"
                                                                                  d="M21.75,13.19H2.11V11.3c0-2.25.78-3.69,2.46-4.53C6.43,5.82,9.2,5.7,11.4,5.7c6.13,0,8.71,1.23,9.21,4.39a1.05,1.05,0,0,0,2.08-.33,6.35,6.35,0,0,0-4.06-5.14,17.35,17.35,0,0,0-6.17-1V2.11h.9a1.06,1.06,0,0,0,0-2.11H9.45a1.06,1.06,0,0,0,0,2.11h.9V3.6A16.42,16.42,0,0,0,3.61,4.88C1.22,6.1,0,8.26,0,11.3v2.95a1.05,1.05,0,0,0,1.06,1.06H21.75a1.06,1.06,0,0,0,0-2.12Z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            Book now
                                                        </a>
                                                    </div>
                                                    <div class="col-12 col-lg-auto px-0 py-4 py-md-0 mx-lg-2">
                                                        <a class="btn-bordered text-white px-5 py-3" target="_blank"
                                                           href="<?php the_permalink(); ?>">
                                                            More details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 slider-custom slider-habitaciones-page px-0">
                                        <?php
                                        $images = get_field('galeria');
                                        if ($images): ?>
                                            <?php foreach ($images as $image): ?>
                                                <img src="<?php
                                                echo esc_url($image['sizes']['large']);
                                                ?>"
                                                     alt="<?php echo esc_attr($image['alt']); ?>"/>
                                                <?php
                                                $img_s = $image['sizes'];
//                                                var_dump($img_s);
                                                ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php

                            endwhile; ?>
                        </section>

                        <?php

//                        echo do_shortcode("[elementor-template id=\"1611\"]");
                        echo do_shortcode("[elementor-template id=\"1837\"]");

                        ?>

                        <section class="px-5">
                            <?php
                            echo do_shortcode("[elementor-template id=\"1840\"]");
                            echo do_shortcode("[elementor-template id=\"1843\"]");
                            echo do_shortcode("[elementor-template id=\"1849\"]");
                            ?>
                        </section>
                        <?php
                        echo do_shortcode("[elementor-template id=\"1856\"]");
                        ?>

                    <?php endwhile;

                    wp_link_pages(
                        array(
                            'before' => '<br class="clear"/><p>' . esc_html__('Pages:', 'hoteller'),
                            'after' => '</p>',
                        )
                    );
                }

                if (comments_open($post->ID) OR hoteller_post_has('pings', $post->ID)) {
                    ?>
                    <div class="fullwidth_comment_wrapper">
                        <!--                    <h2>gbhnjmkm</h2>-->
                        <?php comments_template('', true); ?>


                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- End main content -->
    </div>
    <br class="clear"/>
    </div>

<?php
//  en caso de que los scripts fallen, podemos usar los que están dentro del sitio
//  simplemente hay que descomentar las lieneas de código que están debajo, a continucación
//  wp_enqueue_script('jquery-1110', get_template_directory_uri() . '/js/slider-custom/jquery-1.11.0.min.js', array(), 1.0, true);
//  wp_enqueue_script('jquery-migrate-121', get_template_directory_uri() . '/js/slider-custom/jquery-migrate-1.2.1.min.js', array(), 1.0, true);
//  wp_enqueue_script('slick-min', get_template_directory_uri() . '/js/slider-custom/slick.min.js', array(), 1.0, true);


// inicializador del slider
wp_enqueue_script('main-handler', get_template_directory_uri() . '/js/test.js', array(), 1.0, true);
?>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php get_footer(); ?>