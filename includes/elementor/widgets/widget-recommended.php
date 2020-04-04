<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class suppke_Widget_Recommended extends Widget_Base {
 
   public function get_name() {
      return 'recommended';
   }
 
   public function get_title() {
      return esc_html__( 'Recommended', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'recommended_title_section',
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
            'default' => __('Why Use Suppke','suppke')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('There are many variations of passages of Lorem Ipsum that available, but the majority have fered alteration in some form, by injected humour.','suppke')
         ]
      );
       $this->end_controls_section();

      $this->start_controls_section(
         'recommended_section',
         [
            'label' => esc_html__( 'Recommended Items', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
      'tabs',
      [
        'label' => esc_html__( 'Ingredient Items', 'suppke' ),
        'type' => Controls_Manager::REPEATER,
        'default' => [
          [
            'tab_title'   => esc_html__( 'Ingredient #1', 'suppke' ),
            'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'suppke' ),
          ]
        ],
        'fields' => [ 
          [
            'name'    => 'tab_image',
            'label'   => esc_html__( 'Image', 'suppke' ),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => [ 'active' => true ],
          ],    
          [
            'name'    => 'tab_icon',
            'label'   => esc_html__( 'Icon', 'suppke' ),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => [ 'active' => true ],
          ],      
          [
            'name'        => 'tab_content',
            'label'       => esc_html__( 'Content', 'suppke' ),
            'type'        => Controls_Manager::TEXTAREA,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Content' , 'suppke' ),
            'label_block' => true,
          ],
          [
            'name'        => 'tab_author',
            'label'       => esc_html__( 'Doctor Name', 'suppke' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Author' , 'suppke' ),
            'label_block' => true,
          ],
          [
            'name'        => 'tab_designation',
            'label'       => esc_html__( 'specialist', 'suppke' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Heart Specialist' , 'suppke' ),
            'label_block' => true,
          ], 
        ],
      ]
    );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

 <!-- doctor-area -->
  <section id="ingredient" class="doctor-area doctor-bg pt-110 pb-65">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-8 col-md-10">
                  <div class="section-title white-title text-center mb-55">
                      <h2><?php echo $settings['title'] ?></h2>
                      <div class="bar"></div>
                      <p><?php echo $settings['description'] ?>.</p>
                  </div>
              </div>
          </div>
          <div class="doctor-wrap pl-80 pr-80">
              <div class="row">
                 <?php foreach ( $settings['tabs'] as $item ) : ?>
                  <div class="col-md-6">
                      <div class="single-doctor mb-55">
                          <?php if ( '' !== $item['tab_image'] ): ?>
                          <div class="doctor-thumb">
                              <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="img">
                          </div>
                          <?php endif; ?> 
                          <div class="doctor-content">
                               <?php if ( '' !== $item['tab_icon'] ): ?>
                              <div class="doctor-icon">
                                  <img src="<?php echo wp_kses_post($item['tab_icon']['url']); ?>" alt="img">
                              </div>
                              <?php endif; ?> 
                               <?php if ( '' !== $item['tab_content'] ): ?>
                              <p><?php echo wp_kses_post($item['tab_content']); ?></p>
                              <?php endif; ?> 
                               <?php if ( '' !== $item['tab_author'] ): ?>
                              <div class="doctor-info">
                                  <h6><?php echo wp_kses_post($item['tab_author']); ?> <span>- <?php echo wp_kses_post($item['tab_designation']); ?></span></h6>
                              </div>
                              <?php endif; ?> 
                          </div>
                      </div>
                  </div>
                  <?php endforeach; ?>
              </div>
          </div>
      </div>
  </section>
  <!-- doctor-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Recommended );