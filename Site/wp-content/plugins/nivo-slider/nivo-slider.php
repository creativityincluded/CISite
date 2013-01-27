<?php
/*
Plugin Name: Nivo Slider WordPress Plugin
Plugin URI: http://nivo.dev7studios.com/wordpress
Description: The official WordPress plugin for the <a href="http://nivo.dev7studios.com">Nivo Slider</a>.
Version: 0.5
Author: Gilbert Pellegrom
Author URI: http://gilbert.pellegrom.me
*/

$wordpress_nivo_slider = new WordpressNivoSlider();

class WordpressNivoSlider {
    
    function __construct() {	
        add_action('init', array(&$this, 'init'));
        add_action('manage_edit-nivoslider_columns', array(&$this, 'edit_columns'));
        add_action('manage_posts_custom_column', array(&$this, 'custom_columns'));
        add_action('admin_init', array(&$this, 'admin_init'));
        add_action('admin_print_styles', array(&$this, 'admin_print_styles'));
        add_action('admin_print_scripts', array(&$this, 'admin_print_scripts'));
        add_action('save_post', array(&$this, 'save_post'));
        add_action('wp_ajax_nivoslider_upload', array(&$this, 'upload_image'));
        add_action('wp_ajax_nivoslider_remove', array(&$this, 'remove_image'));
        add_action('wp_ajax_nivoslider_order_save', array(&$this, 'save_order'));
        add_action('init', array(&$this, 'include_scripts'));
        add_shortcode('nivoslider', array(&$this, 'shortcode'));
	}
    
    function init() {
        $labels = array(
            'name' => _x( 'Nivo Slider', 'post type general name' ),
            'singular_name' => _x( 'Nivo Slider', 'post type singular name' ),
            'add_new' => __( 'Add New' ),
            'add_new_item' => __( 'Add New Slider' ),
            'edit_item' => __( 'Edit Slider' ),
            'new_item' => __( 'New Slider' ),
            'view_item' => __( 'View Slider' ),
            'search_items' => __( 'Search Sliders' ),
            'not_found' =>  __( 'No Sliders found' ),
            'not_found_in_trash' => __( 'No Sliders found in Trash' ), 
            'parent_item_colon' => ''
        );
        
        register_post_type(
            'nivoslider',
            array(
                'labels' => $labels,
                'public' => true,
                'show_ui' => true,
                'menu_position' => 100,
                'supports' => array(
                    'title'
                )
            )
        );
    }
    
    function edit_columns( $columns ) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Title' ),
            'shortcode' => __( 'Shortcode' ),
            'author' => __( 'Author' ),
            'images' => __( 'Images' ),
            'date' => __( 'Date' )
        );

        return $columns;
    }

    function custom_columns( $column ) {
        global $post;
        switch ( $column )
        {
            case 'images':     
                $limit = 5;
                if(isset($_GET['mode']) && $_GET['mode'] == 'excerpt') $limit = 20;
                $images = $this->get_slider_images( $post->ID, array(32, 32), $limit );
                if ( $images ) {
                    echo '<ul class="nivoslider-thumbs">';
                    foreach( $images as $image ){
                        echo '<li><img src="'. $image .'" alt="" style="width:32px;height:32px;" /></li>';
                    }
                    echo '</ul>'; 
                }
                break;
            case 'shortcode':  
                echo '<code>[nivoslider id="'. $post->ID .'"]</code>';
                break;
        }
    }
    
    function admin_init() {
        add_meta_box( 'nivoslider_upload_box', 'Upload Images', array(&$this, 'meta_box_upload'), 'nivoslider', 'normal' );
        add_meta_box( 'nivoslider_settings_box', 'Settings', array(&$this, 'meta_box_settings'), 'nivoslider', 'normal' );
        add_meta_box( 'nivoslider_shortcode_box', 'Using this Slider', array(&$this, 'meta_box_shortcode'), 'nivoslider', 'side' );
    }
    
    function admin_print_styles() {
        global $post;

        if($post->post_type == 'nivoslider'){
            wp_enqueue_style( 'nivoslider-fileupload-css', WP_PLUGIN_URL .'/nivo-slider/scripts/uploader/fileuploader.css' );
            wp_enqueue_style( 'nivoslider-admin-css', WP_PLUGIN_URL .'/nivo-slider/styles/nivo-admin.css' );
        }
    }
    
    function admin_print_scripts() {
        global $post;

        if($post->post_type == 'nivoslider'){
            wp_register_script( 'nivoslider-fileupload', WP_PLUGIN_URL .'/nivo-slider/scripts/uploader/fileuploader.js' );
            wp_enqueue_script( 'nivoslider-fileupload' ); 
            wp_register_script( 'nivoslider-admin-js', WP_PLUGIN_URL .'/nivo-slider/scripts/nivo-admin.js', array('jquery') );
            wp_enqueue_script( 'nivoslider-admin-js' );
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-sortable');
        }
    }

    function meta_box_settings() {
        global $post;
        $options = get_post_meta( $post->ID, 'nivo_settings', true );
    
        wp_nonce_field( plugin_basename( __FILE__ ), 'nivoslider_noncename' );
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Slider Type</th>
                <td><select name="nivo_settings[type]">
                    <option value="manual"<?php if($options['type'] == 'manual') echo ' selected="selected"'; ?>>Manual</option>
                    <option value="category"<?php if($options['type'] == 'category') echo ' selected="selected"'; ?>>Category</option>
                    <option value="sticky"<?php if($options['type'] == 'sticky') echo ' selected="selected"'; ?>>Sticky Posts</option>
                </select><br />
                <span class="description">Choose to manually upload images or use post thumbnails</span></td>
            </tr>
            <tr valign="top" id="nivo_type_category">
                <th scope="row">Category</th>
                <td><select name="nivo_settings[type_category]">
                    <?php 
                    $categories = get_categories();
                    foreach($categories as $category){
                        echo '<option value="'. $category->cat_ID .'"';
                        if($options['type_category'] == $category->cat_ID) echo ' selected="selected"';
                        echo '>'. $category->name .'</option>';
                    }
                    ?>
                </select><br />
                <span class="description">Select the category you want to use for post thumbnails</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Slider Size</th>
                <td><input type="text" name="nivo_settings[dim_x]" value="<?php echo $options['dim_x']; ?>" /> x 
                <input type="text" name="nivo_settings[dim_y]" value="<?php echo $options['dim_y']; ?>" /><br />
                <span class="description">(Size in px) Images will be cropped to these dimensions (eg 400 x 150)</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Transition Effect</th>
                <td><select name="nivo_settings[effect]">
                    <option value="random"<?php if($options['effect'] == 'random') echo ' selected="selected"'; ?>>Random</option>
                    <option value="fade"<?php if($options['effect'] == 'fade') echo ' selected="selected"'; ?>>Fade</option>
                    <option value="fold"<?php if($options['effect'] == 'fold') echo ' selected="selected"'; ?>>Fold</option>
                    <option value="sliceDown"<?php if($options['effect'] == 'sliceDown') echo ' selected="selected"'; ?>>Slice Down</option>
                    <option value="sliceDownLeft"<?php if($options['effect'] == 'sliceDownLeft') echo ' selected="selected"'; ?>>Slice Down (Left)</option>
                    <option value="sliceUp"<?php if($options['effect'] == 'sliceUp') echo ' selected="selected"'; ?>>Slice Up</option>
                    <option value="sliceUpLeft"<?php if($options['effect'] == 'sliceUpLeft') echo ' selected="selected"'; ?>>Slice Up (Left)</option>
                    <option value="sliceUpDown"<?php if($options['effect'] == 'sliceUpDown') echo ' selected="selected"'; ?>>Slice Up/Down</option>
                    <option value="sliceUpDownLeft"<?php if($options['effect'] == 'sliceUpDownLeft') echo ' selected="selected"'; ?>>Slice Up/Down (Left)</option>
                    <option value="boxRandom"<?php if($options['effect'] == 'boxRandom') echo ' selected="selected"'; ?>>Box Random</option>
                    <option value="boxRain"<?php if($options['effect'] == 'boxRain') echo ' selected="selected"'; ?>>Box Rain</option>
                    <option value="boxRainReverse"<?php if($options['effect'] == 'boxRainReverse') echo ' selected="selected"'; ?>>Box Rain (Reverse)</option>
                    <option value="boxRainGrow"<?php if($options['effect'] == 'boxRainGrow') echo ' selected="selected"'; ?>>Box Rain Grow</option>
                    <option value="boxRainGrowReverse"<?php if($options['effect'] == 'boxRainGrowReverse') echo ' selected="selected"'; ?>>Box Rain Grow (Reverse)</option>
                </select></td>
            </tr>
            <tr valign="top">
                <th scope="row">Slices</th>
                <td><input type="text" name="nivo_settings[slices]" value="<?php echo $options['slices']; ?>" class="regular-text" /><br />
                <span class="description">The number of slices to use in the "Slice" transitions (eg 15)</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Box (Cols x Rows)</th>
                <td><input type="text" name="nivo_settings[boxCols]" value="<?php echo $options['boxCols']; ?>" /> x 
                <input type="text" name="nivo_settings[boxRows]" value="<?php echo $options['boxRows']; ?>" /><br />
                <span class="description">The number of columns and rows to use in the "Box" transitions (eg 8 x 4)</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Animation Speed</th>
                <td><input type="text" name="nivo_settings[animSpeed]" value="<?php echo $options['animSpeed']; ?>" class="regular-text" /><br />
                <span class="description">The speed of the transition animation in milliseconds (eg 500)</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Pause Time</th>
                <td><input type="text" name="nivo_settings[pauseTime]" value="<?php echo $options['pauseTime']; ?>" class="regular-text" /><br />
                <span class="description">The amount of time to show each slide in milliseconds (eg 3000)</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Start Slide</th>
                <td><input type="text" name="nivo_settings[startSlide]" value="<?php echo $options['startSlide']; ?>" class="regular-text" /><br />
                <span class="description">Set which slide the slider starts from (zero based index: usually 0)</span></td>
            </tr>
            <tr valign="top">
                <th scope="row">Enable Direction Navigation<br />(Prev &amp; Next arrows)</th>
                <td><input type="hidden" name="nivo_settings[directionNav]" value="off" />
                <input type="checkbox" name="nivo_settings[directionNav]" value="on"<?php if($options['directionNav'] == 'on' || !isset($options['directionNav'])) echo 'checked="checked"'; ?>/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Hide Direction Navigation on Hover</th>
                <td><input type="hidden" name="nivo_settings[directionNavHide]" value="off" />
                <input type="checkbox" name="nivo_settings[directionNavHide]" value="on"<?php if($options['directionNavHide'] == 'on' || !isset($options['directionNavHide'])) echo 'checked="checked"'; ?>/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Enable Control Navigation<br />(eg 1,2,3...)</th>
                <td><input type="hidden" name="nivo_settings[controlNav]" value="off" />
                <input type="checkbox" name="nivo_settings[controlNav]" value="on"<?php if($options['controlNav'] == 'on' || !isset($options['controlNav'])) echo 'checked="checked"'; ?>/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Enable Keyboard Navigation<br />(Press Left or Right)</th>
                <td><input type="hidden" name="nivo_settings[keyboardNav]" value="off" />
                <input type="checkbox" name="nivo_settings[keyboardNav]" value="on"<?php if($options['keyboardNav'] == 'on' || !isset($options['keyboardNav'])) echo 'checked="checked"'; ?>/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Pause the Slider on Hover</th>
                <td><input type="hidden" name="nivo_settings[pauseOnHover]" value="off" />
                <input type="checkbox" name="nivo_settings[pauseOnHover]" value="on"<?php if($options['pauseOnHover'] == 'on' || !isset($options['pauseOnHover'])) echo 'checked="checked"'; ?>/></td>
            </tr>
            <tr valign="top">
                <th scope="row">Manual Transitions<br />(Slider is always paused)</th>
                <td><input type="hidden" name="nivo_settings[manualAdvance]" value="off" />
                <input type="checkbox" name="nivo_settings[manualAdvance]" value="on"<?php if($options['manualAdvance'] == 'on') echo 'checked="checked"'; ?>/></td>
            </tr>           
        </table>
        <?php
    }
    
    function save_post( $post_id ){
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
            return;

        if ( !wp_verify_nonce( $_POST['nivoslider_noncename'], plugin_basename( __FILE__ ) ) )
            return;

        // Check permissions
        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) )
                return;
        } else {
            if ( !current_user_can( 'edit_post', $post_id ) )
                return;
        }

        // Good to go
        $settings = $_POST['nivo_settings'];
        
        if( !is_numeric($settings['dim_x']) || $settings['dim_x'] <= 0 ) $settings['dim_x'] = 400;
        if( !is_numeric($settings['dim_y']) || $settings['dim_y'] <= 0 ) $settings['dim_y'] = 150;
        if( !is_numeric($settings['slices']) || $settings['slices'] <= 0 ) $settings['slices'] = 15;
        if( !is_numeric($settings['boxCols']) || $settings['boxCols'] <= 0 ) $settings['boxCols'] = 8;
        if( !is_numeric($settings['boxRows']) || $settings['boxRows'] <= 0 ) $settings['boxRows'] = 4;
        if( !is_numeric($settings['animSpeed']) || $settings['animSpeed'] <= 0 ) $settings['animSpeed'] = 500;
        if( !is_numeric($settings['pauseTime']) || $settings['pauseTime'] <= 0 ) $settings['pauseTime'] = 3000;
        if( !is_numeric($settings['startSlide']) || $settings['startSlide'] < 0 ) $settings['startSlide'] = 0;
        
        update_post_meta( $post_id, 'nivo_settings', $settings );
    }
    
    function meta_box_upload() {
        global $post;
        
        $args = array(
            'orderby'        => 'menu_order ID',
            'order'          => 'ASC',
            'post_type'      => 'attachment',
            'post_parent'    => $post->ID,
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1
        );
        $attachments = get_posts( $args );
        
        echo '<ul id="nivoslider-images">';
        if( $attachments ){
            foreach( $attachments as $attachment ){
                // Rememebr to change javascript as well below
                ?>
                <li id="attachment-<?php echo $attachment->ID; ?>">
                    <?php echo wp_get_attachment_image( $attachment->ID, 'thumbnail' ); ?>
                    <a href="#" class="remove-image" rel="<?php echo $attachment->ID; ?>" title="Remove Image">Remove</a>
                </li>
                <?php 
            }
        }
        echo '</ul>';
        ?>
        <div id="file-uploader">       
            <noscript>          
                <p>Please enable JavaScript to use the file uploader.</p>
            </noscript>         
        </div>
        <script type="text/javascript">
        jQuery(document).ready(function($){ 
            // File Uploader
            var uploader = new qq.FileUploader({
                element: document.getElementById('file-uploader'),
                action: '<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php',
                params: { action:'nivoslider_upload', post_id:'<?php echo $post->ID; ?>', 
                          nonce:'<?php echo wp_create_nonce('nivoslider_upload'); ?>' },
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],        
                multiple: true,
                debug: false,
                onComplete: function(id, fileName, response){
                    if(response.error){
                        alert(response.message);
                    } else {
                        $('#nivoslider-images').append('<li id="attachment-' + response.attachment_id + '">' +
                            '<img src="' + response.upload_path + '/' + response.file + '" alt="" class="attachment-thumbnail" />' +
                            '<a href="#" class="remove-image" rel="' + response.attachment_id + '" title="Remove Image">Remove</a></li>');
                            
                        // Remove item from upload list
                        $('.qq-upload-list li').each(function(){
                            if($('.qq-upload-file', this).text() == fileName){
                                $(this).remove();
                            }
                        });
                    }
                }
            });
            $('.qq-upload-button').addClass('button-secondary');
            $('.qq-upload-button').bind('click', function(){
                $('.qq-upload-list li').remove();
                $('.qq-upload-drop-area').hide();
            });
            
            // Remove Image
            $('#nivoslider-images .remove-image').live('click', function(){
                var remove = $(this);
                $.post('<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php', 
                    { action:'nivoslider_remove', data:remove.attr('rel'),
                      nonce:'<?php echo wp_create_nonce('nivoslider_remove'); ?>' }, 
                    function(data){
                        remove.parent().fadeOut(500, function(){
                            remove.remove();
                        });
                    }
                );
                
                return false;
            });
            
            // Drag & Drop sort images
            $('#nivoslider-images').sortable({
                update: function(event, ui){
                    $.post('<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php', 
                    $(this).sortable('serialize') + '&action=nivoslider_order_save&nonce=<?php echo wp_create_nonce('nivoslider_order_save'); ?>', 
                    function(response){
                        response = jQuery.parseJSON(response);
                        if(response.error){
                            alert(response.message);
                        }
                    });
                }
            });
        });
        </script>
        <?php 
    }
    
    function upload_image(){
        // Verify this came from the our screen and with proper authorization
        if ( !isset($_GET['nonce']) || !wp_verify_nonce( $_GET['nonce'], plugin_basename('nivoslider_upload') ))
            return 0;
        
        require_once(WP_PLUGIN_DIR .'/nivo-slider/scripts/uploader/uploader.php');
        $response['error'] = false;
        $response['message'] = '';
        
        // Upload file
        $wp_uploads = wp_upload_dir();
        $uploader = new qqFileUploader();
        $result = $uploader->handleUpload( $wp_uploads['path'] .'/', false );
        
        if( is_array($result) && $result[0] == 'success' ){  
            // Attach image to the post
            $uploadfile = $result[1];
            $wp_filetype = wp_check_filetype( basename($uploadfile), null );
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title' => preg_replace('/\.[^.]+$/', '', basename($uploadfile)),
                'post_content' => '',
                'post_status' => 'inherit',
                'menu_order' => 1
            );
            $attach_id = wp_insert_attachment( $attachment, $uploadfile, $_GET['post_id'] );
            $attach_data = wp_generate_attachment_metadata( $attach_id, $uploadfile );
            wp_update_attachment_metadata( $attach_id,  $attach_data );
            
            $response['upload_path'] = $wp_uploads['url'];
            if(!empty($attach_data['sizes'])){
                $response['file'] = $attach_data['sizes']['thumbnail']['file'];
                $response['file_medium'] = $attach_data['sizes']['medium']['file'];
            } else {
                $response['file'] = basename($attach_data['file']);
                $response['file_medium'] = basename($attach_data['file']);
            }
            $response['file_full'] = basename($attach_data['file']);
            $response['attachment_id'] = $attach_id;
            $response['success'] = true;
        } else {
            $response['error'] = true;
            $response['message'] = $result; 
        }
        
        // to pass data through iframe you will need to encode all html tags
        echo htmlspecialchars( json_encode($response), ENT_NOQUOTES );
        die;
    }
    
    function remove_image() {
        // Verify this came from the our screen and with proper authorization
        if ( !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], plugin_basename('nivoslider_remove') ))
            return 0;
            
        $response['error'] = false;
        $response['message'] = '';
            
        wp_delete_attachment( $_POST['data'] );
        $response['message'] =  'success';
        
        echo json_encode($response);
        die;
    }

    function save_order() {    
        // Verify this came from the our screen and with proper authorization
        if ( !isset($_POST['nonce']) || !wp_verify_nonce( $_POST['nonce'], plugin_basename('nivoslider_order_save') ))
            return 0;
            
        $response['error'] = false;
        $response['message'] = '';
            
        $i = 0;
        $data = $_POST['attachment'];
        foreach( $data as $attach_id ){
            $attachment = array();
            $attachment['ID'] = $attach_id;
            $attachment['menu_order'] = $i;
            wp_update_post( $attachment );
            $i++;
        }
        
        $response['data'] = $data;
        $response['message'] =  'success';
        
        echo json_encode($response);
        die;
    }
    
    function meta_box_shortcode() {
        global $post;
        
        echo '<p>To use this slider in your posts or pages use the following shortcode:</p>
        <p><code>[nivoslider id="'. $post->ID .'"]</code></p>';
    }
    
    function include_scripts() {
        if (!is_admin()) {
            wp_register_script( 'nivoslider', WP_PLUGIN_URL .'/nivo-slider/scripts/nivo-slider/jquery.nivo.slider.pack.js', array('jquery') );
            wp_enqueue_script( 'nivoslider' );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_style( 'nivoslider', WP_PLUGIN_URL .'/nivo-slider/scripts/nivo-slider/nivo-slider.css' );
        }
    }
    
    function shortcode( $atts ) {
        extract( shortcode_atts( array(
            'id' => 0
        ), $atts ) );
        
        if(!$id){
            echo 'Invalid Slider ID';
            return;
        }
        
        $options = get_post_meta( $id, 'nivo_settings', true );
        $images = $this->get_slider_images( $id );
        
        if( $images ){
            ?>
            <div id="nivoslider-<?php echo $id; ?>" class="nivoSlider" style="width:<?php echo $options['dim_x']; ?>px;height:<?php echo $options['dim_y']; ?>px;">
            <?php
            foreach( $images as $image ){
                echo '<img src="'. WP_PLUGIN_URL .'/nivo-slider/timthumb.php?src='. $image .'&h='. $options['dim_y'] .'&w='. $options['dim_x'] .'&zc=1&q=100" alt="" />';
            }
            ?>
            </div>
            <?php if( count($images) > 1){ ?>
            <script type="text/javascript">
            jQuery(window).load(function(){
                jQuery('#nivoslider-<?php echo $id; ?>').nivoSlider({
                    effect:'<?php echo $options['effect']; ?>',
                    slices:<?php echo $options['slices']; ?>,
                    boxCols:<?php echo $options['boxCols']; ?>,
                    boxRows:<?php echo $options['boxRows']; ?>,
                    animSpeed:<?php echo $options['animSpeed']; ?>,
                    pauseTime:<?php echo $options['pauseTime']; ?>,
                    startSlide:<?php echo $options['startSlide']; ?>,
                    directionNav:<?php echo (($options['directionNav'] == 'on') ? 'true' : 'false'); ?>,
                    directionNavHide:<?php echo (($options['directionNavHide'] == 'on') ? 'true' : 'false'); ?>,
                    controlNav:<?php echo (($options['controlNav'] == 'on') ? 'true' : 'false'); ?>,
                    keyboardNav:<?php echo (($options['keyboardNav'] == 'on') ? 'true' : 'false'); ?>,
                    pauseOnHover:<?php echo (($options['pauseOnHover'] == 'on') ? 'true' : 'false'); ?>,
                    manualAdvance:<?php echo (($options['manualAdvance'] == 'on') ? 'true' : 'false'); ?>
                });
            });
            </script>
            <?php
            }
        }
    }
    
    function get_slider_images( $post_id, $size = 'full', $limit = -1 ) {
        $options = get_post_meta( $post_id, 'nivo_settings', true );
        $images = array();
        
        if($options['type'] == 'manual'){
            $args = array(
                'orderby'        => 'menu_order ID',
                'order'          => 'ASC',
                'post_type'      => 'attachment',
                'post_parent'    => $post_id,
                'post_mime_type' => 'image',
                'post_status'    => null,
                'numberposts'    => $limit
            );
            $attachments = get_posts( $args );
            if( $attachments ){
                foreach( $attachments as $attachment ){
                    $image = wp_get_attachment_image_src( $attachment->ID, $size );
                    $images[] = $image[0];
                }
            }
        }
        if($options['type'] == 'category'){
            $args = array(
                'post_type'      => 'post',
                'numberposts'    => $limit,
                'category'       => $options['type_category']
            );
            $posts = get_posts( $args );
            if( $posts ){
                foreach( $posts as $post ){
                    if( has_post_thumbnail($post->ID) ) {
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
                        $images[] = $image[0];
                    }
                }
            }
        }
        if($options['type'] == 'sticky'){
            $sticky = get_option( 'sticky_posts' );
            $args = array(
                'post_type'      => 'post',
                'numberposts'    => $limit,
                'post__in'       => $sticky
            );
            $posts = get_posts( $args );
            if( $posts ){
                foreach( $posts as $post ){
                    if( has_post_thumbnail($post->ID) ) {
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
                        $images[] = $image[0];
                    }
                }
            }
        }
        
        return $images;
    }
    
}

?>