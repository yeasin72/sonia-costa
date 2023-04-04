<?php
use \Elementor\Widget_Base;
class Casos_List extends \Elementor\Widget_Base {
    public function get_name() {
		return 'sonia_casos_list_widget';
	}

	public function get_title() {
		return esc_html__( 'Casos List', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-integration';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'casos', 'list' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'section_title',
			[
				'label' => esc_html__( 'Section Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'CASOS',
			]
		);


		$this->add_control(
			'caso_list',
			[
				'label' => esc_html__( 'Casos List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'caso_name',
						'label' => esc_html__( 'Caso name', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'name', 'textdomain' ),
						'default' => esc_html__( 'CASO - Nº 1', 'textdomain' ),
					],
					[
						'name' => 'caso_description',
						'label' => esc_html__( 'Description', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Write your description', 'textdomain' ),
						'default' => esc_html__( 'Esta Clínica, desde o primeiro', 'textdomain' ),
					],
                    [
                        'name' => 'caso_iamge',
                        'label' => esc_html__( 'Person Picture', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
						'name' => 'person_name',
						'label' => esc_html__( 'Person name', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'name', 'textdomain' ),
						'default' => esc_html__( 'AIDA RIBAS', 'textdomain' ),
					],
                    [
						'name' => 'first_tag',
						'label' => esc_html__( 'First Tag', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'tag', 'textdomain' ),
						'default' => esc_html__( 'MEDICINA DENTÁRIA', 'textdomain' ),
					],
                    [
						'name' => 'second_tag',
						'label' => esc_html__( 'Second Tag', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'tag', 'textdomain' ),
						'default' => esc_html__( 'IMPLANTOLOGIA', 'textdomain' ),
					],
                    [
                        'name' => 'caso_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'caso_name' => esc_html__( 'CASO - Nº 1', 'textdomain' ),
					],
					[
						'caso_name' => esc_html__( 'CASO - Nº 2', 'textdomain' ),
					],
					[
						'caso_name' => esc_html__( 'CASO - Nº 3', 'textdomain' ),
					],
				],
				'title_field' => '{{{ caso_name }}}',
			]
		);

		$this->end_controls_section();

        // Style Tab Start

		$this->start_controls_section(
			'tags_style',
			[
				'label' => esc_html__( 'Tag Style', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_hvr_color',
			[
				'label' => esc_html__( 'Button Hover Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);


		$this->add_control(
			'section_text_color',
			[
				'label' => esc_html__( 'Text color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
		$this->add_control(
			'tag_color',
			[
				'label' => esc_html__( 'Tag color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		

		$this->end_controls_section();

	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        $total = count($settings['caso_list']);
        ?>
        <div class="casos_area">
            <style>
                .casos_area{
                    width: 100%;
                    color: <?php echo $settings['section_text_color']; ?>;
                    height: 900px;
                    overflow: hidden;
                    position: relative;
                }
                .casos_area .overlay_section{
                    position: absolute;
                    width: 100%;
                    top: 0;
                    left: 0;
                    z-index: 2;
                }
                .overlay_section h2{
                    position: absolute;
                    z-index: 1;
                    color: <?php echo $settings['section_text_color']; ?>;
                    color: rgb(255, 255, 255);
                    font-family: Prata;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 100px;
                    text-transform: uppercase;
                    margin-top: 50px;
                }
                .casos_area .casos_content{
                    width: 100%;
                    gap: <?php echo 800 * $total; ?>px;
                    transition: 0.8s;
                }
                .casos_content .slide{
                    height: 900px;
                    width: 100%;
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 100px;
                }
                .slide .slide_left{
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    padding-top: 220px;
                    z-index: 1;
                }
                .slide_left span{
                    font-size: 14px;
                    color: rgb(97, 97, 97);
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    text-transform: uppercase;
                }
                .slide_left a{
                    color: rgb(255, 255, 255);
                    font-family: Roboto;
                    font-weight: blod;
                    font-size: 15px;
                    text-transform: uppercase;
                    transition: 0.3s;
                }
                .slide_left a:hover{
                    color: <?php echo $settings['button_hvr_color']; ?>;
                }
                .slide_left p{
                    color: <?php echo $settings['section_text_color']; ?>;
                    font-family: Prata;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 34px;
                    line-height: 150%;
                    position: relative;
                    margin-top: 30px;
                }
                .slide_left h4{
                    color: <?php echo $settings['section_text_color']; ?>;
                    font-family: Roboto;
                    font-weight: blod;
                    font-size: 22px;
                    text-transform: uppercase;
                    margin-top: 45px;
                    margin-bottom: 10px;
                }
                .slide_left .tags{
                    display: flex;
                    flex-direction: row;
                    gap: 10px;
                    margin-bottom: 30px;
                }
                .slide_left .tags span{
                    padding: 3px 8px;
                    border:1px solid <?php echo $settings['tag_color']; ?>;
                    font-size: 10px;
                    border-radius: 5px;
                    color: <?php echo $settings['tag_color']; ?>;
                }
                .slide .slide_right{
                    padding-top: 100px;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    z-index: 1;
                }
                .slide_right img{
                    width: 500px;
                    height: 500px;
                    object-fit: cover;
                }
                .color_overlay{
                    position: absolute;
                    width: 50%;
                    height: 600px;
                    background: <?php echo $settings['section_bg_color']; ?>;
                    /* background: linear-gradient(183deg, rgba(25,33,17,1) 0%, rgba(10,14,7,1) 100%); */
                    z-index: 0;
                    top: 0;
                    rotate: 143deg;
                    transform: translate(-600px, 100px);
                }
                .color_overlay2{
                    position: absolute;
                    width: 100%;
                    height: 600px;
                    background: <?php echo $settings['section_bg_color']; ?>;
                    z-index: 0;
                    bottom: 0;
                    right: 0;
                    rotate: 143deg;
                    transform: translate(180px, -1195px);
                }
                .casos_area .top{
                    width: 16px;
                    height: 16px;
                    border: 0px;
                    background: transparent;
                    border-right: 1px solid #FFF;
                    border-top: 1px solid #FFF;
                    rotate: -45deg;
                    position: absolute;
                    left: 10px;;
                    top: 10px;
                    cursor: pointer;
                    z-index: 10;
                    padding: 0;
                }
                .casos_area .down{
                    width: 16px;
                    height: 16px;
                    padding: 0;
                    border: 0px;
                    background: transparent;
                    border-left: 1px solid #FFF;
                    border-bottom: 1px solid #FFF;
                    rotate: -45deg;
                    position: absolute;
                    left: 10px;;
                    bottom: 10px;
                    cursor: pointer;
                    z-index: 10;
                } 
                .casos_area .down:focus,
                .casos_area .top:focus
                {
                    outline: none;
                }
            </style>
            <button class="top"></button>
            <div class="overlay_section">
                <h2><?php echo $settings['section_title']; ?></h2>
                <div class="color_overlay"></div>
                <div class="color_overlay2"></div>
            </div>
            <div class="casos_content">
            <?php foreach ( $settings['caso_list'] as $index => $item ) : ?>
                <div class="slide">
                    <div class="slide_left">
                        <span><?php echo $item['caso_name']; ?></span>
                        <p><?php echo $item['caso_description']; ?></p>
                        <h4><?php echo $item['person_name']; ?></h4>
                        <div class="tags">
                            <span><?php echo $item['first_tag']; ?></span>
                            <span><?php echo $item['second_tag']; ?></span>
                        </div>
                        <a href="<?php echo $item['caso_link']['url']; ?>">LER MAIS</a>
                    </div>
                    <div class="slide_right">
                    <img src="<?php echo $item['caso_iamge']['url']; ?>" alt="<?php echo $item['person_name']; ?>">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="down"></button>
            <script>
                jQuery( document ).ready(function() {
                    var step = 0;
                    var max = <?php echo $total; ?>;
                        jQuery('.casos_area .top').click(() => {
                            if(step > 0){
                                step--
                                console.log(step)
                                jQuery('.casos_content').css('transform', `translate(0px, -${step * 900}px)`)
                            }
                        })
                        jQuery('.casos_area .down').click(() => {
                            if(step < (max-1)){
                                step++
                                console.log(step)
                                jQuery('.casos_content').css('transform', `translate(0px, -${step * 900}px)`)
                            }
                        })
                    
                })
            </script>
        </div>
        <?php
    }
}