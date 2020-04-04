<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class suppke_Widget_Brand extends Widget_Base {
 
   public function get_name() {
      return 'brand';
   }
 
   public function get_title() {
      return esc_html__( 'Brand', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

    $this->start_controls_section(
      'section_content_brand',
      [
        'label' => esc_html__( 'Brand Area', 'suppke' ),
      ] 
    );


    $this->add_control(
      'tabs',
      [
        'label' => esc_html__( 'Brand Items', 'suppke' ),
        'type' => Controls_Manager::REPEATER,
        'default' => [
          [
            'tab_title'   => esc_html__( 'Brand #1', 'suppke' ),
            'tab_content' => esc_html__( 'Click edit button to change this text.', 'suppke' ),
          ]
        ],
        'fields' => [ 
          [
            'name'    => 'tab_image',
            'label'   => esc_html__( 'Image', 'suppke' ),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => [ 'active' => true ],
          ],  
        ],
      ]
    );


      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <div class="brand-area pt-120 pb-120">
          <div class="container">
              <div class="row brand-active">
                <?php foreach ( $settings['tabs'] as $item ) : ?>
                  
                      <div class="col-12">
                        <?php if ( '' !== $item['tab_image'] ) : ?>
                          <div class="signle-brand">
                              <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="img">
                          </div>
                          <?php endif; ?> 
                      </div>
                    
                  <?php endforeach; ?>
              </div>
          </div>
      </div>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Brand );