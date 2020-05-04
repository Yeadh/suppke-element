<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Pricing
class suppke_Widget_Pricing extends Widget_Base {
 
   public function get_name() {
      return 'pricing';
   }
 
   public function get_title() {
      return esc_html__( 'Pricing', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-price-table';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }

   protected function _register_controls() {
      $this->start_controls_section(
         'section_content_features',
         [
            'label' => esc_html__( 'Pricing Title Area', 'suppke' ),
         ]  
      );
      
      $this->add_control(
         'heading',
         [
            'label'       => __( 'Heading', 'suppke' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'Enter your heading', 'suppke' ),
            'default'     => __( 'Choose Your Packages', 'suppke' ),
            'label_block' => true,
         ]
      ); 

      $this->add_control(
         'sub_heading',
         [
            'label'       => __( 'Sub Heading', 'suppke' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => __( 'Enter your sub heading', 'suppke' ),
            'default'     => __( 'There are many variations of passages of Lorem Ipsum that available, but the majority have fered alteration in some form, by injected humour.', 'suppke' ),
            'label_block' => true,
         ]
      ); 

      $this->end_controls_section();

      $this->start_controls_section(
         'pricing_section',
         [
            'label' => esc_html__( 'Pricing', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'tabs',
         [
            'label' => esc_html__( 'Pricing Items', 'suppke' ),
            'type' => Controls_Manager::REPEATER,
            'default' => [
               [
                  'tab_title'   => esc_html__( 'Pricing 1', 'suppke' ),
                  'tab_content' => esc_html__( 'Click edit button to change this text.', 'suppke' ),
               ]
            ],
            'fields' => [
               [
                  'name'    => 'tab_image',
                  'label'   => esc_html__( 'Feature Image', 'suppke' ),
                  'type'    => Controls_Manager::MEDIA,
                  'dynamic' => [ 'active' => true ],
               ], 
			   [
					'name'        => 'tab_active',
					'label'       => esc_html__( 'Active', 'suppke' ),
					'type'        => Controls_Manager::TEXT,
					'dynamic'     => [ 'active' => true ],
					'default'     => esc_html__( 'Active' , 'suppke' ),
					'label_block' => true,
				],	
               [
                  'name'        => 'tab_title',
                  'label'       => esc_html__( 'Title', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( 'Basic Limited' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_monthly',
                  'label'       => esc_html__( 'Monthly', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( 'MONTHLY' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_subcribe',
                  'label'       => esc_html__( 'Subcribe', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( 'Subscribe Best Plans' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_price',
                  'label'       => esc_html__( 'Price', 'suppke' ),
                  'type'        => Controls_Manager::TEXTAREA,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( '1 Person User - $59' , 'suppke' ),
                  'label_block' => true,
               ], 
               [
                  'name'        => 'tab_item_1',
                  'label'       => esc_html__( 'Item 1', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( '1 Person User vidmate' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_item_2',
                  'label'       => esc_html__( 'Item 2', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( '40 MG Per Capsule' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_item_3',
                  'label'       => esc_html__( 'Item 3', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( '50 Capsules Per Bottle' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_item_4',
                  'label'       => esc_html__( 'Item 4', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( '20% Future Purchases' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_link',
                  'label'       => esc_html__( 'Link', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( '#' , 'suppke' ),
                  'label_block' => true,
               ],
               [
                  'name'        => 'tab_button',
                  'label'       => esc_html__( 'Button', 'suppke' ),
                  'type'        => Controls_Manager::TEXT,
                  'dynamic'     => [ 'active' => true ],
                  'default'     => esc_html__( 'Buy Now' , 'suppke' ),
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
      

<!-- pricing-area -->
            <section id="price" class="pricing-area pt-110 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-10">
                            <div class="section-title text-center mb-55">
                                <h2><?php echo $settings['heading'] ?></h2>
                                <div class="bar"></div>
                                <p><?php echo $settings['sub_heading'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-wrap pl-80 pr-80">
                        <div class="row">
                           <?php foreach ( $settings['tabs'] as $item ) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-pricing text-center mb-30 <?php echo wp_kses_post($item['tab_active']); ?>">
                                    <div class="pricing-head mb-30">
                                       <?php if ( '' !== $item['tab_image'] ): ?>
                                         <div class="pricing-icon mb-15">
                                             <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="img">
                                         </div>
                                         <?php endif; ?> 
                                         <?php if ( '' !== $item['tab_title'] ) : ?>
                                          <h5><?php echo wp_kses_post($item['tab_title']); ?></h5>
                                         <?php endif; ?> 
                                         <?php if ( '' !== $item['tab_monthly'] ) : ?>
                                          <span><?php echo wp_kses_post($item['tab_monthly']); ?></span>
                                         <?php endif; ?> 
                                         <?php if ( '' !== $item['tab_subcribe'] ) : ?>
                                          <p><?php echo wp_kses_post($item['tab_subcribe']); ?></p>
                                         <?php endif; ?> 
                                         <?php if ( '' !== $item['tab_price'] ) : ?>
                                          <div class="price-count">
                                             <h4><?php echo wp_kses_post($item['tab_price']); ?></h4>
                                          </div>
                                         <?php endif; ?> 
                                     </div>
                                    <div class="pricing-list mb-30">
                                        <ul>
                                            <?php if ( '' !== $item['tab_item_1'] ) : ?>
                                                <li><?php echo wp_kses_post($item['tab_item_1']); ?></li>
                                             <?php endif; ?>   
                                             <?php if ( '' !== $item['tab_item_2'] ) : ?>
                                                <li><?php echo wp_kses_post($item['tab_item_2']); ?></li>
                                             <?php endif; ?>   
                                             <?php if ( '' !== $item['tab_item_3'] ) : ?>
                                                <li><?php echo wp_kses_post($item['tab_item_3']); ?></li>
                                             <?php endif; ?>   
                                             <?php if ( '' !== $item['tab_item_4'] ) : ?>
                                                <li><?php echo wp_kses_post($item['tab_item_4']); ?></li>
                                             <?php endif; ?>   
                                        </ul>
                                    </div>
                                    <?php if ( '' !== $item['tab_button'] ) : ?>
                                    <div class="pricing-btn">
                                        <a href="<?php echo wp_kses_post($item['tab_link']); ?>" class="btn"><?php echo wp_kses_post($item['tab_button']); ?><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                    <?php endif; ?>   
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- pricing-area-end -->

   <?php }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Pricing );