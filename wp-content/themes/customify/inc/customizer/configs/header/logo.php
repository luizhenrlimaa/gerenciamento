<?php

class Customify_Builder_Item_Logo {
    public $id= 'logo';
    function item(){
        return  array(
            'name' => __( 'Logo & Site Identity', 'customify' ),
            'id' => 'logo',
            'width' => '3',
            'section' => 'title_tagline' // Customizer section to focus when click settings
        );
    }

    function customize( $wp_customize ){
        $section = 'title_tagline';
        $render_cb_el = array( $this, 'render' ) ;
        $selector = '.site-header .site-branding';
        $fn = 'customify_customize_render_header';
        $config  = array(

            array(
                'name' => 'logo_max_width',
                'type' => 'slider',
                'section' =>  $section,
                'default' => array(),
                'max' => 400,
                'priority' => 8,
                'device_settings' => true,
                'title' => __( 'Logo Max Width', 'customify' ),
                //'selector' => $selector.' img',
                'selector' => 'format',
                'css_format' => "$selector img { max-width: {{value}}; } .site-header .cb-row--mobile .site-branding img { width: {{value}}; } "
            ),

            array(
                'name' => 'header_logo_retina',
                'type' => 'image',
                'section' =>  $section,
                'device_settings' => false,
                'selector' => $selector,
                'render_callback' => $render_cb_el,
                'priority' => 9,
                'title' => __( 'Logo Retina', 'customify' )
            ),

            array(
                'name' => 'header_logo_name',
                'type' => 'radio_group',
                'section' => $section,
                'selector' => $selector,
                'render_callback' => $render_cb_el,
                'title' => __( 'Show Site Title', 'customify' ),
                'default' => 'yes',
                'choices' => array(
                    'yes' => __( 'Yes', 'customify' ),
                    'no' => __( 'No', 'customify' ),
                ),
            ),

            array(
                'name' => 'header_logo_desc',
                'type' => 'radio_group',
                'section' => $section,
                'selector' => $selector,
                'render_callback' => $render_cb_el,
                'title' => __( 'Show Site Tagline', 'customify' ),
                'default' => 'no',
                'choices' => array(
                    'yes' => __( 'Yes', 'customify' ),
                    'no' => __( 'No', 'customify' ),
                ),
            ),

            array(
                'name' => 'header_logo_pos',
                'type' => 'radio_group',
                'section' => $section,
                'selector' => $selector,
                'render_callback' => $render_cb_el,
                'title' => __( 'Logo Position', 'customify' ),
                'default' => 'top',
                'choices' => array(
                    'top' => __( 'Top', 'customify' ),
                    'left' => __( 'Left', 'customify' ),
                    'right' => __( 'Right', 'customify' ),
                    'bottom' => __( 'Bottom', 'customify' ),
                ),
            ),

        );

        $config = apply_filters( 'customify/builder/header/logo-settings', $config, $this );
        // Item Layout
        return array_merge( $config, customify_header_layout_settings( $this->id, $section ) );
    }

    function logo(){
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo_image = Customify()->get_media( $custom_logo_id, 'full' );
        $logo_retina = Customify()->get_setting( 'header_logo_retina' );
        $logo_retina_image = Customify()->get_media( $logo_retina );

        if ( $logo_image ) {
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link" rel="home" itemprop="url">
                <img class="site-img-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e( 'Logo', 'customify' ); ?>"<?php if ($logo_retina_image) { ?> srcset="<?php echo esc_url($logo_retina_image); ?> 2x"<?php } ?>>
                <?php do_action( 'customizer/after-logo-img' ); ?>
            </a>
            <?php
        }
    }

    /**
     * Render Logo item
     * @see get_custom_logo
     *
     */
    function render(){
        $show_name      = Customify()->get_setting( 'header_logo_name' );
        $show_desc      = Customify()->get_setting( 'header_logo_desc' );
        $image_position = Customify()->get_setting( 'header_logo_pos' );
        $logo_classes = array( 'site-branding'  );
        $logo_classes[] = 'logo-'.$image_position;
        $logo_classes = apply_filters( 'customify/logo-classes', $logo_classes );
        ?>
        <div class="<?php echo esc_attr( join(' ', $logo_classes ) ); ?>">
            <?php

            $this->logo();
            if ( $show_name !== 'no' ||  $show_desc !== 'no' ) {
                echo '<div class="site-name-desc">';
                if ($show_name !== 'no') {
                    if (is_front_page() && is_home()) : ?>
                        <__site_device_tag__ class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></__site_device_tag__>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                    endif;
                }

                if ($show_desc !== 'no') {
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) { ?>
                        <p class="site-description text-uppercase text-xsmall"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                        <?php
                    };
                }
                echo '</div>';
            }

            ?>
        </div><!-- .site-branding -->
        <?php
    }
}

Customify_Customize_Layout_Builder()->register_item('header', new Customify_Builder_Item_Logo() );
