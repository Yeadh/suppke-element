<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class suppke_Widget_Counter extends Widget_Base {
 
   public function get_name() {
      return 'counter';
   }
 
   public function get_title() {
      return esc_html__( 'Counter', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-counter';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

     $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Title Area', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Awesome Supplement For Your
            Body We Have','suppke')
         ]
      );
       $this->add_control(
         'color_title',
         [
            'label' => __( 'Color Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('15 Years Of Experience','suppke')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quasi ut minus labore voluptate natus fuga voluptatum, id architecto velit eum magni nostrum sit mollitia, autem dignissimos, optio officiis? Nesciunt. consectetur adipisicing elit. Sint quasi ut minus labore voluptate natus fuga.','suppke')
         ]
      );
       $this->end_controls_section();

      $this->start_controls_section(
         'counter_section',
         [
            'label' => esc_html__( 'Counter', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $counter = new \Elementor\Repeater();

      $counter->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'suppke' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );

      $counter->add_control(
         'count',
         [
            'label' => __( 'Count', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $counter->add_control(
         'title',
         [
            'label' => __( 'Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->add_control(
         'counter',
         [
            'label' => __( 'Counter', 'suppke' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $counter->get_controls(),
            'title_field' => '{{title}}',

         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

<!-- fact-area -->
  <section class="fact-area fact-bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-8 col-lg-10">
                  <div class="section-title white-title text-center mb-55">
                      <h2><?php echo $settings['title'] ?> <span><?php echo $settings['color_title'] ?></span></h2>
                      <p><?php echo $settings['description'] ?></p>
                  </div>
              </div>
          </div>
          <div class="row">
              <?php foreach (  $settings['counter'] as $counter_single ): ?>
              <div class="col-lg-3 col-sm-6">
                  <div class="single-fact text-center mb-50">
                      <div class="fact-icon mb-25">
                          <img src="<?php echo $counter_single['icon']['url'] ?>" alt="icon">
                      </div>
                      <div class="fact-content">
                          <h5><span class="count"><?php echo $counter_single['count'] ?></span></h5>
                          <p><?php echo $counter_single['title'] ?></p>
                      </div>
                  </div>
              </div>
               <?php endforeach; ?>
          </div>
      </div>
  </section>
  <!-- fact-area-end -->
















      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Counter );