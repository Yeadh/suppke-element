<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class suppke_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner_pop';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
      'banner_image',
        [
          'label' => __( 'Banner image', 'suppke' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Super Convenient Quality Protein','suppke')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dolor sit amet, consectetur seddo eiumod tempor incididunt labore adipiscing seddo eiumod','suppke')
         ]
      );

      $this->add_control(
         'btn_text', [
            'label' => __( 'Button One Text', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('get started','suppke')
         ]
      );

      $this->add_control(
         'btn_url', [
            'label' => __( 'Button One URL', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'btn_text2', [
            'label' => __( 'Button Two Text', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('get started','suppke')
         ]
      );

      $this->add_control(
         'btn_url2', [
            'label' => __( 'Button Two URL', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- slider-area -->
            <section id="home" class="slider-area slider-bg d-flex align-items-center">
                <div class="container">
                    <div class="slider-overflow">
                        <div class="row">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right text-xl-center position-relative">
                                    <img src="<?php echo esc_url( $settings['banner_image']['url'] ) ?>" alt="img" class="wow fadeInRight" data-wow-delay="0.6s">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h2 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $settings['title'] ?></h2>
                                    <p class="wow fadeInUp" data-wow-delay="0.4s"><?php echo esc_html( $settings['description'] ) ?></p>
                                    <div class="slider-btn">
                                        <a href="<?php echo esc_url( $settings['btn_url'] ) ?>" class="btn wow fadeInLeft" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text'] ) ?></a>
                                        <a href="<?php echo esc_url( $settings['btn_url2'] ) ?>" class="btn transparent-btn wow fadeInRight" data-wow-delay="0.6s"><?php echo esc_html( $settings['btn_text2'] ) ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Banner );