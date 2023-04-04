<?php
use \Elementor\Widget_Base;
class Sonia_Blog_tag extends \Elementor\Widget_Base {

	public function get_name() {
		return 'sonia_blog_tag_widget';
	}

	public function get_title() {
		return esc_html__( 'Sonia Blog Tag', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-tags';
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
			'tag_settings',
			[
				'label' => esc_html__( 'Tag Settings', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'max_tags',
			[
				'label' => esc_html__( 'Maximum tag', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'placeholder' => '0',
				'min' => 0,
				'max' => 5,
				'step' => 1,
				'default' => 2,
			]
		);



		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'tags_style',
			[
				'label' => esc_html__( 'Tag Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tag_color',
			[
				'label' => esc_html__( 'Tag Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $tags = get_the_tags();
        ?>
        <div class="tag_section">
            <style>
                .tag_section{
                    display: flex;
                    flex-direction: row;
                    gap: 10px;
                    font-size: 10px!important;
                }
                .tag_section span{
                    padding: 3px 12px;
                    color: <?php echo $settings['tag_color']; ?>;
                    border: 1px solid <?php echo $settings['tag_color']; ?>;
                    border-radius: 5px;
                }
            </style>
            <?php if ($tags) { ?>
                <?php foreach ($tags as $tag) { ?>
                    <span><?php echo $tag->name; ?></span>
                <?php } ?>
            <?php } ?>
        </div>
        <?php
	}
}