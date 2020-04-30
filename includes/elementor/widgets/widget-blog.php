<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class suppke_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'suppke' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'suppke-elements' ];
   }
   protected function _register_controls() {
      
       $this->start_controls_section(
         'blog_title_section',
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
            'default' => __('Blog & Tips Suppke','suppke')
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
         'blog_section',
         [
            'label' => esc_html__( 'Blog Post', 'suppke' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'suppke' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
               'ASC'  => __( 'Ascending', 'suppke' ),
               'DESC' => __( 'Descending', 'suppke' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

      <!-- blog-area -->
            <section id="blog" class="blog-area gray-bg pt-110 pb-90">
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
                        <?php
                          $blog = new \WP_Query( array( 
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'ignore_sticky_posts' => true,
                            'order' => $settings['order'],
                          ));
                          /* Start the Loop */
                          while ( $blog->have_posts() ) : $blog->the_post();
                          ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-post mb-30">
                                <?php if(has_post_thumbnail()) : ?>
                                <div class="b-post-thumb">
                                    <a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'suppke-404x302'); ?>" alt="img"></a>
                                </div>
                              <?php endif ?>
                                <div class="blog-content">
                                    <span><?php echo get_the_date() ?></span>
                                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                    <p><?php echo wp_trim_words( get_the_content(), 11, '.' ); ?></p>
                                    <a href="<?php the_permalink() ?>">Read More <i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                      <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new suppke_Widget_Blog );