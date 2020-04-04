<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class suppke_Widget_video extends Widget_Base {
 
   public function get_name() {
      return 'video';
   }
 
   public function get_title() {
      return esc_html__( 'video', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'video_section',
         [
            'label' => esc_html__( 'Video', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'heading',
      [
        'label'       => __( 'Heading', 'suppke' ),
        'type'        => Controls_Manager::TEXT,
        'placeholder' => __( 'Enter your heading', 'suppke' ),
        'default'     => __( 'Awesome Supplement For Your Body We Have 15 Years Of Experience', 'suppke' ),
        'label_block' => true,
      ]
    );  

    $this->add_control(
      'sub_heading',
      [
        'label'       => __( 'Sub Heading', 'suppke' ),
        'type'        => Controls_Manager::TEXTAREA,
        'placeholder' => __( 'Enter your sub heading', 'suppke' ),
        'default'     => __( 'There are many variations of passages of Lorem Ipsum that available, but the majority have fered alteration in some form, by injected humour that available.', 'suppke' ),
        'label_block' => true,
      ]
    );  


    $this->add_control(
      'link',
      [
        'label'       => __( 'Link', 'suppke' ),
        'type'        => Controls_Manager::TEXT,
        'placeholder' => __( 'Video Link', 'suppke' ),
        'default'     => __( '#', 'suppke' ),
        'label_block' => true,
      ]
    );

    $this->add_control(
      'button',
      [
        'label'       => __( 'Button Text', 'suppke' ),
        'type'        => Controls_Manager::TEXT,
        'placeholder' => __( 'Button', 'suppke' ),
        'default'     => __( 'more services', 'suppke' ),
        'label_block' => true,
      ]
    );
    $this->add_control(
      'video_link',
      [
        'label'       => __( 'Video Link', 'suppke' ),
        'type'        => Controls_Manager::TEXT,
        'placeholder' => __( 'Video Link', 'suppke' ),
        'default'     => __( 'https://www.youtube.com/watch?v=iWKu6WNFf9M', 'suppke' ),
        'label_block' => true,
      ]
    );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- video-area -->
            <section class="video-area video-bg">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="video-play">
                                <a href="<?php echo $settings['video_link'] ?>" class="popup-video"><i class="fas fa-play"></i></a>
                            </div>
                            <div class="video-title text-center">
                                <h2><?php echo $settings['heading'] ?></h2>
                                <p><?php echo $settings['sub_heading'] ?></p>
                                <a href="<?php echo $settings['link'] ?>" class="btn"><?php echo $settings['button'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- video-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_video );