<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Button
class suppke_Widget_Button extends Widget_Base {
 
   public function get_name() {
      return 'button';
   }
 
   public function get_title() {
      return esc_html__( 'Button', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-button';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'button_section',
         [
            'label' => esc_html__( 'Button', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'button_text', [
            'label' => __( 'Button Text', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn More','suppke')
         ]
      );

      $this->add_control(
         'button_url', [
            'label' => __( 'Button URL', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );
      
      $this->add_control(
         'button_border', [
            'label' => __( 'Border', 'suppke' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'suppke' ),
            'label_off' => __( 'Off', 'suppke' ),
            'return_value' => 'on',
            'default' => 'off',
         ]
      );
      
      $this->add_control(
         'align',
         [
            'label' => __( 'Align', 'suppke' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
               'center'  => __( 'Center', 'suppke' ),
               'left' => __( 'Left', 'suppke' ),
               'right' => __( 'Right', 'suppke' )
            ],
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      
      $this->add_inline_editing_attributes( 'button_text', 'basic' );
      $this->add_inline_editing_attributes( 'button_url', 'basic' );
      $this->add_inline_editing_attributes( 'align', 'basic' );
      $this->add_inline_editing_attributes( 'color', 'basic' );
      ?>

      <div class="suppke-btn" style="text-align: <?php echo esc_attr($settings['align']) ?>">
         <a class="btn <?php if( $settings['button_border'] == 'on' ){ echo 'border border-white';} ?>" href="<?php echo esc_url( $settings['button_url'] ); ?>">
            <?php echo esc_html( $settings['button_text'] ); ?></a>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Button );