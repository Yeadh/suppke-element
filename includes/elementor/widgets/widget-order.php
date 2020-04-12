<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// order
class suppke_Widget_order extends Widget_Base {
 
   public function get_name() {
      return 'order';
   }
 
   public function get_title() {
      return esc_html__( 'Order', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }
   protected function _register_controls() {
      
       $this->start_controls_section(
         'order_title_section',
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
            'default' => __('order & Tips Suppke','suppke')
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

      $this->add_control(
         'orderid',
         [
            'label' => __( 'Order', 'suppke' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display(); ?>

      <!-- perched-area -->
      <section id="order" class="perched-area pt-110 pb-120">
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
              <?php
              $order = new \WP_Query( array( 
                'post_type' => 'product',
                'posts_per_page' => 1,
                'p' => $settings['orderid'],
              ));
              /* Start the Loop */
              while ( $order->have_posts() ) : $order->the_post();
              ?>
              
              <div class="row">
                  <div class="col-xl-7 col-lg-6">
                      <div class="product-wrap">
                          <div class="product-active">
                              <?php if (has_post_thumbnail()): ?>
                                <div class="single-product">
                                  <?php the_post_thumbnail() ?>
                                </div>
                              <?php endif ?>
                              <?php
                              $product = new \WC_product(get_the_ID());
                              $attachment_ids = $product->get_gallery_image_ids();
                              foreach( $attachment_ids as $attachment_id ) { ?>
                                <div class="single-product">
                                  <img src="<?php echo wp_get_attachment_url( $attachment_id ) ?>" alt="img">
                                </div>
                              <?php } ?>
                          </div>
                          <div class="product-nav-active">
                              <?php if (has_post_thumbnail()): ?>
                                <div class="single-product">
                                  <?php the_post_thumbnail() ?>
                                </div>
                              <?php endif ?>
                              <?php
                              $product = new \WC_product(get_the_ID());
                              $attachment_ids = $product->get_gallery_image_ids();
                              foreach( $attachment_ids as $attachment_id ) { ?>
                                <div class="single-product">
                                  <img src="<?php echo wp_get_attachment_url( $attachment_id ) ?>" alt="img">
                                </div>
                              <?php } ?>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-5 col-lg-6">
                      <div class="product-details-content">
                          <h3><?php the_title() ?></h3>
                          <h6><?php woocommerce_template_single_price() ?></h6>
                          <div class="product-rating mb-35">
                              <?php woocommerce_template_loop_rating() ?>
                              <span>(2 Customer Review)</span>
                          </div>
                          <p><?php the_excerpt() ?></p>
                          <div class="perched-info">
                              <?php woocommerce_template_single_add_to_cart() ?>
                          </div>
                          <div class="product-info mb-50">
                              <h5>Product info</h5>
                              <?php woocommerce_template_single_meta() ?>
                          </div>

                          <div class="product-desc-wrap">
                          <?php 
                          $product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

                          if ( ! empty( $product_tabs ) ) : ?>

                              <ul class="nav nav-tabs mb-25" id="myTab" role="tablist">
                                <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                                  <li  class="nav-item">
                                    <a class="nav-link" id="<?php echo esc_attr( $key ); ?>-teb" data-toggle="tab" href="#<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="<?php echo esc_attr( $key ); ?>"
                                          aria-selected="false">
                                      <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                                    </a>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                              <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                                <div class="tab-pane fade" id="<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab">
                                  <?php
                                  if ( isset( $product_tab['callback'] ) ) {
                                    call_user_func( $product_tab['callback'], $key, $product_tab );
                                  }
                                  ?>
                                </div>
                              <?php endforeach; ?>
                            </div>

                          <?php endif; ?>
                        </div>

                      </div>
                  </div>
              </div>
              <?php endwhile; wp_reset_postdata(); ?>
          </div>
      </section>
      <!-- perched-area-end -->

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_order );