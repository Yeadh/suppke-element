<?php
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// contact item
class suppke_Widget_Contact extends Widget_Base {
 
   public function get_name() {
      return 'Contact item';
   }
 
   public function get_title() {
      return esc_html__( 'Contact Item', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'contact_section',
         [
            'label' => esc_html__( 'Contact Item', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'suppke' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Call us','suppke'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'icon', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>

      <div class="single-contact-box">
         <h5><?php echo esc_html($settings['title']); ?></h5>
         <div class="single-contact">
            <div class="contact-box-icon">
                <img src="<?php echo esc_attr($settings['icon']['url']); ?>" alt="img">
            </div>
            <div class="contact-content">
                <span><?php echo $settings['text'] ?></span>
            </div>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Contact );