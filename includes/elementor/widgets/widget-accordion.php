<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Accordion
class suppke_Widget_Accordion extends Widget_Base {
 
   public function get_name() {
      return 'accordion';
   }
 
   public function get_title() {
      return esc_html__( 'Accordion', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-accordion';
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
         'accordion_section',
         [
            'label' => esc_html__( 'Accordion', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $accordion = new \Elementor\Repeater();

      $accordion->add_control(
         'title', [
            'label' => __( 'Title', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );
      $accordion->add_control(
         'text', [
            'label' => __( 'Text', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'accordion_list',
         [
            'label' => __( 'Accordion list', 'suppke' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $accordion->get_controls(),
            'default' => [
               [
                  'title' => __( 'Lorem ipsum dummy text used here?', 'suppke' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'suppke' )
               ],
               [
                  'title' => __( 'Why i should buy this Theme?', 'suppke' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'suppke' )
               ],
               [
                  'title' => __( 'Can i change any elements easilly?', 'suppke' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'suppke' )
               ]
            ],
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->add_control(
      'image',
        [
          'label' => __( 'Banner image', 'suppke' ),
          'type' => \Elementor\Controls_Manager::MEDIA,
          'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
          ],
        ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.

      $randID = wp_rand();

      $settings = $this->get_settings_for_display(); ?>


 <!-- faq-area -->
  <section class="faq-area faq-bg pt-110 pb-120">
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
          <div class="row">
              <div class="col-lg-6">
                  <div class="faq-img">
                      <img src="<?php echo esc_url( $settings['image']['url'] ) ?>" alt="img">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="faq-wrapper-padding">
                      <div class="faq-wrapper">
                          <div class="accordion" id="accordionExample">
                              <?php if ( $settings['accordion_list'] ) {
                                foreach (  $settings['accordion_list'] as $key => $accordion ) { ?>

                                  <div class="card">
                                      <div class="card-header" id="heading<?php echo $key.$randID ?>">
                                          <h5 class="mb-0">
                                              <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $key.$randID ?>"
                                                  aria-expanded="false" aria-controls="collapse<?php echo $key.$randID ?>">
                                                  <?php echo esc_html( $accordion['title'] ); ?>
                                              </a>
                                          </h5>
                                      </div>
                                      <div id="collapse<?php echo $key.$randID ?>" class="collapse" aria-labelledby="heading<?php echo $key.$randID ?>" data-parent="#accordionExample<?php echo $randID ?>">
                                          <div class="card-body">
                                              <p><?php echo esc_html( $accordion['text'] ); ?></p>
                                          </div>
                                      </div>
                                  </div>

                                  <?php } 
                                } ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- faq-area-end -->

      <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Accordion );