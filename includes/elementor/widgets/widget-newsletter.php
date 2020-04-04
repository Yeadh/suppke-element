<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Newsletter
class suppke_Widget_newsletter extends Widget_Base {
 
   public function get_name() {
      return 'newsletter';
   }
 
   public function get_title() {
      return esc_html__( 'Newsletter', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-envelope';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'newsletter_section',
         [
            'label' => esc_html__( 'Newsletter', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title', [
            'label' => __( 'Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Newsletter Sign Up', 'suppke' ),
         ]
      );

      $this->add_control(
         'text', [
            'label' => __( 'Text', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( 'Notifications our best deals...', 'suppke' ),
         ]
      );

      $this->add_control(
         'shortcode', [
            'label' => __( 'Mailchimp Shortcode', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => __( '[mc4wp_form id="123"]', 'suppke' ),
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

    <section class="newsletter-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="newsletter-wrap">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="newsletter-content">

                                      <?php if ( '' !== $settings['title'] ): ?>
                                        <h4><?php echo $settings['title']; ?></h4>
                                      <?php endif; ?>

                                      <?php if ( '' !== $settings['text'] ): ?>
                                        <span><?php echo $settings['text']; ?></span>
                                      <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="newsletter-form">
                                        <?php echo do_shortcode( $settings['shortcode'] ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_newsletter );