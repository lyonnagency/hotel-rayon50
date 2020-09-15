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
    <style>
        .web-reserver{
            height:700px;
        }
        .web-reserver iframe{
            height: inherit;
        }
    </style>
<?php

?>
    <div class="inner">
        <!-- Begin main content -->
        <div class="inner_wrapper">
            <div class="sidebar_content full_width">
                <?php
                if (have_posts()) {
                    while (have_posts()) : the_post(); ?>
                        <!-- Add script to header tag-->
                        <!--Div that will hold the web engine-->
                        <div id="webDiv" style="border-width: 0" class="web-reserver mt-5 pt-5"></div>
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
    <script type="text/javascript" src="https://staygrid.com/js/hapi/web.js?v="20200220"></script>
    <script type="text/javascript">
    var hlWebEngine = new HotelogixWeb();
    function drawEngine()
    {
        var options = {
            container: document.getElementById("webDiv"),
            hotelId: "QV5TX0ZSczM0XzU0NDA2X0Y1dGVyOTA4N3NfKWRoZl9kcnRlcjdfNTQ0MDZfaGdmaF9nXmQ4NTQ=",
            languageId: 2
        };
        hlWebEngine.draw(options);
    }
    hlWebEngine.run(drawEngine);
    </script>
<?php get_footer(); ?>