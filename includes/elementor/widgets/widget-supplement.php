<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner Parallax
class suppke_Widget_Supplement extends Widget_Base {
 
   public function get_name() {
      return 'supplement';
   }
 
   public function get_title() {
      return esc_html__( 'Supplement', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-slider-video';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'supplement_title_section',
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
         'supplement_section',
         [
            'label' => esc_html__( 'Supplement', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
      'middle_image',
        [
          'label' => __( 'Supplement Middle Image', 'suppke' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->add_control(
      'tabs',
      [
        'label' => esc_html__( 'Supplement Items Left', 'suppke' ),
        'type' => Controls_Manager::REPEATER,
        'default' => [
          [
            'tab_title'   => esc_html__( 'Increased Energy', 'suppke' ),
            'tab_content' => esc_html__( 'Lorem ipsufm dolor site amet mortllis Suppke regio amet mollis.', 'suppke' ),
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
            'name'        => 'tab_title',
            'label'       => esc_html__( 'Title', 'suppke' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Increased Energy' , 'suppke' ),
            'label_block' => true,
          ],
          [
            'name'        => 'tab_subtitle',
            'label'       => esc_html__( 'Subtitle', 'suppke' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Lorem ipsufm dolor site amet mortllis Suppke regio amet mollis' , 'suppke' ),
            'label_block' => true,
          ],  
        ],
      ]
    );

    

    $this->add_control(
      'tabs_2',
      [
        'label' => esc_html__( 'Supplement Items Right', 'suppke' ),
        'type' => Controls_Manager::REPEATER,
        'default' => [
          [
            'tab_title'   => esc_html__( 'Increased Energy', 'suppke' ),
            'tab_content' => esc_html__( 'Lorem ipsufm dolor site amet mortllis Suppke regio amet mollis.', 'suppke' ),
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
            'name'        => 'tab_title',
            'label'       => esc_html__( 'Title', 'suppke' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Increased Energy' , 'suppke' ),
            'label_block' => true,
          ],
          [
            'name'        => 'tab_subtitle',
            'label'       => esc_html__( 'Subtitle', 'suppke' ),
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => [ 'active' => true ],
            'default'     => esc_html__( 'Lorem ipsufm dolor site amet mortllis Suppke regio amet mollis' , 'suppke' ),
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

<!-- services-area -->
      <section id="supplement" class="services-area pt-110 pb-120">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-7 col-lg-8 col-md-10">
                      <div class="section-title text-center mb-55">
                          <h2><?php echo $settings['title'] ?></h2>
                          <div class="bar"></div>
                          <p><?php echo $settings['description'] ?></p>
                      </div>
                  </div>
              </div>
              <div class="row align-items-center">
                  <div class="col-xl-4 col-lg-6 col-md-6">

                    <?php foreach ( $settings['tabs'] as $item ) : ?>
                      <div class="single-delivery-services mb-70 pr-40">
                        <?php if ( '' !== $item['tab_image']['url'] ) : ?>
                        <div class="ds-icon order-0 order-md-2">
                          <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="icon">
                        </div>
                        <?php endif; ?>
                        <div class="ds-content text-center text-sm-left text-md-right">
                          <?php if ( '' !== $item['tab_title'] ) : ?>
                          <h5><?php echo wp_kses_post($item['tab_title']); ?></h5>
                          <?php endif; ?>
                          <?php if ( '' !== $item['tab_subtitle'] ) : ?>
                          <p><?php echo wp_kses_post($item['tab_subtitle']); ?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <div class="col-xl-4 d-none d-xl-block">
                      <div class="d-services-img">
                          <img src="<?php echo esc_url( $settings['middle_image']['url'] ) ?>" alt="img">
                      </div>
                  </div>

                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <?php foreach ( $settings['tabs_2'] as $item ) : ?>
                      <div class="single-delivery-services mb-70 pl-40">
                        <?php if ( '' !== $item['tab_image']['url'] )  : ?>
                        <div class="ds-icon">
                          <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="icon">
                        </div>
                        <?php endif; ?>
                        <div class="ds-content">
                          <?php if ( '' !== $item['tab_title'] ) : ?>
                          <h5><?php echo wp_kses_post($item['tab_title']); ?></h5>
                          <?php endif; ?>
                          <?php if ( '' !== $item['tab_subtitle'] ) : ?>
                          <p><?php echo wp_kses_post($item['tab_subtitle']); ?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </section>
      <!-- services-area-end -->

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Supplement );