<?php 
    namespace firstplugin\includes;

    defined( 'ABSPATH' ) || die ( 'Access Denied' );

    class MetaBoxes {
        function __construct() {
            add_action( 'admin_init', function() {
                add_meta_box( 'fp_meta_box', 'Include Advertisement', array($this, 'fp_adds_metabox'), ['post', 'page'] );
            });
            add_action( 'save_post', array($this, 'fp_save_post' ));
            add_filter( 'the_content', array($this, 'fp_custom_content' ));

        }
       
    
        function fp_adds_metabox( $post ) {
            $fp_select_add_ = get_post_meta( $post->ID, 'fp_select_add', true ); 
            $args = array(
                'post_type' => 'fp_advertisement'
            );
            $query = new \WP_Query( $args );
            if( $query->have_posts() ) { 
                ?>
                <select name="fp_select_add" id="fp_select_add" name="fp_select_add" value="<?php echo $fp_select_add_?>">
                <option value="">-</option>
                <?php
                while( $query->have_posts() ) {  $query->the_post(); ?>
                        <option value="<?php echo the_ID(); ?>"><?php echo the_title(); ?></option>
                <?php } ?>
                </select>
                <?php  
            }
        }
    
    
        function fp_save_post( $post_id ) {  
            if( array_key_exists( 'fp_select_add', $_POST ) ) {
                update_post_meta( $post_id, 'fp_select_add', $_POST['fp_select_add'] );
            }
        }
    
    
        function fp_custom_content( $content ) {
            if( is_single() || is_home() || is_front_page() ) {
                $fp_select_add = get_post_meta( get_the_ID(), 'fp_select_add', true ) ? get_post_meta( get_the_ID(), 'fp_select_add', true ): '';
                if( $fp_select_add ) {
                    $query = get_post( $fp_select_add );
                    if($query) {
                        $content1 = '<div class="fp_max_adds" title="'.$query->post_title.'" image="'.get_the_post_thumbnail_url($query->ID).'"></div>';
                        return $content1.$content;
                    }
                }  
            }    
            return $content;
        }
    }

    
?>