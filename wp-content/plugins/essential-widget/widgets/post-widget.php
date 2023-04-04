<?php
use \Elementor\Widget_Base;
class Sonia_Blog extends \Elementor\Widget_Base {

	public function get_name() {
		return 'sonia_blog_widget';
	}

	public function get_title() {
		return esc_html__( 'Sonia Blog', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-kit-details';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'blog', 'post' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'blog_settings',
			[
				'label' => esc_html__( 'Blog Settings', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'blog_per_page',
			[
				'label' => esc_html__( 'Blog per page', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '0',
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 10,
			]
		);

        $this->add_control(
			'items_in_per_column',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Blog per column', 'textdomain' ),
				'options' => [
					'default' => esc_html__( 'Default', 'textdomain' ),
					'1' => esc_html__( '1', 'textdomain' ),
					'2' => esc_html__( '2', 'textdomain' ),
					'3' => esc_html__( '3', 'textdomain' ),
					'4' => esc_html__( '4', 'textdomain' ),
					'5' => esc_html__( '5', 'textdomain' ),
				],
				'default' => '3',
			]
		);


        $this->add_control(
			'items_order',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Order', 'textdomain' ),
				'options' => [
					'default' => esc_html__( 'Default', 'textdomain' ),
					'DESC' => esc_html__( 'DESC', 'textdomain' ),
					'ASC' => esc_html__( 'ASC', 'textdomain' ),
				],
				'default' => 'ASC',
			]
		);

        $this->add_control(
			'items_category',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Category', 'textdomain' ),
				'options' => [
					'default' => esc_html__( 'Default', 'textdomain' ),
					'aesthetic' => esc_html__( 'aesthetic', 'textdomain' ),
					'care' => esc_html__( 'care', 'textdomain' ),
					'dental' => esc_html__( 'dental', 'textdomain' ),
				],
				'default' => 'care',
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'blog_section_style',
			[
				'label' => esc_html__( 'Section Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog_section' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label' => esc_html__( 'Button hover color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,

			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $settings['blog_per_page'],
            'orderby' => 'date',
            'order' => $settings['items_order'],
            'category_name' => $settings['items_category'],
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        );
        $query = new WP_Query($args);

		?>
        <div class="blog_section">
            <style>
                .blog_section{
                    display: grid;
                    grid-template-columns: repeat(<?php echo $settings['items_in_per_column']; ?>, 1fr);
                    gap: 40px;
                    color: rgb(97, 97, 97);
                }
                .blog_section .single_blog_post{
                    display: flex;
                    flex-direction: column;
                }
                .single_blog_post h6{
                    margin: 0;
                    padding: 0;
                    color: rgb(97, 97, 97);
                    display: block;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 1rem;
                    margin-bottom: 2.5rem;
                    text-transform: uppercase;
                }
                .single_blog_post .thumbnail{
                    width: 100%;
                    margin-bottom: 15px;
                }
                .single_blog_post .tthumbnail img{
                    width: 100%;
                    height: 300px!important;
                    object-fit: cover!important;
                }
                .single_blog_post .content{
                    width: 100%;
                    padding: 5px;
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }
                .single_blog_post .content a{
                    color: rgb(255, 255, 255);
                    display: block;
                    font-family: Prata;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 1.875rem;
                    margin-bottom: 0.5rem;
                }
                .single_blog_post .content h4{
                    margin: 0;
                }
                .single_blog_post .content .tags{
                    display: flex;
                    flex-direction: row;
                    gap: 10px;
                }
                .single_blog_post .content .tags span{
                    padding: 1px 8px;
                    border: 1px solid rgb(97, 97, 97); 
                    border-radius: 5px;
                }
                .single_blog_post .content .link a{
                    margin-top: 15px;
                    color: rgb(255, 255, 255);
                    display: block;
                    font-family: Roboto;
                    font-style: normal;
                    line-height: 1rem;
                    transition: color 0.6s ease 0s;
                    text-transform: uppercase;
                    width: fit-content;
                    font-size: 1rem;
                    font-weight: bold;
                    text-align: left
                }
                .single_blog_post .content .link a:hover{
                    color: <?php echo $settings['btn_hover_color']; ?>;
                }
                .single_blog_post .content .description{
                    margin-top: 15px;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    color: rgb(97, 97, 97);
                    font-size: 17px;
                    line-height: 1.606rem;
                }
                .pagination{
                    margin-top: 30px;
                }
                .pagination a,
                {
                    padding: 10px 15px;
                    color: rgb(97, 97, 97);
                    margin-top: 15px;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    color: rgb(97, 97, 97);
                    font-size: 17px;
                    line-height: 1.606rem;
                    transition: color 0.6s ease 0s;
                }
                .pagination span{
                    padding: 10px 15px;
                    color: <?php echo $settings['btn_hover_color']; ?>;
                    margin-top: 15px;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    color: rgb(97, 97, 97);
                    font-size: 17px;
                    line-height: 1.606rem;
                    transition: color 0.6s ease 0s;
                }
                .pagination a:hover,
                .pagination span:hover{
                    color: <?php echo $settings['btn_hover_color']; ?>;
                }
            </style>
            <?php if ($query->have_posts()) { ?>
                <?php  while ($query->have_posts()) { ?>
                    <?php $query->the_post(); ?>
                    <div class="single_blog_post">
                        <h6><?php echo get_the_date(); ?></h6>
                        <?php if (has_post_thumbnail()) { ?>
                            <a href="<?php echo get_permalink(); ?>">
                                <div class="thumbnail">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                            </a>
                                <?php } ?>
                        <div class="content">
                            <a href="<?php echo get_permalink(); ?>"><h4 class="title"><?php echo get_the_title(); ?></h4></a>
                            <?php 
                            $tags = get_the_tags();
                            if ($tags) {  ?>
                                <div class="tags">
                                    <?php foreach ($tags as $tag) { ?>
                                        <span><?php echo $tag->name; ?></span>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="description">
                                <?php echo get_the_excerpt(); ?>
                            </div>
                            <div class="link">
                                <a href="<?php echo get_permalink(); ?>">Ler mais</a>
                            </div>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php } ?>
            <?php }else{ ?>
                    <p>No blog found</p>
            <?php } ?>

        </div>
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'base' => @add_query_arg('paged','%#%'),
                'format' => '?paged=%#%',
                'total' => $query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => __('<', 'elementor-addon'),
                'next_text' => __('>', 'elementor-addon')
            ));
            ?>
        </div>
		<?php
	}
}