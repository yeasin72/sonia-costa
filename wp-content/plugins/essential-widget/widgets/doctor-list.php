<?php
use \Elementor\Widget_Base;
class Doctor_List extends \Elementor\Widget_Base {
    public function get_name() {
		return 'sonia_doctor_carousel_widget';
	}

	public function get_title() {
		return esc_html__( 'Doctor List', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'doctor', 'list' ];
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
			'column_count',
			[
				'label' => esc_html__( 'Column number', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 5,
				'step' => 1,
				'default' => 4,
			]
		);


		$this->add_control(
			'doctor_list',
			[
				'label' => esc_html__( 'Doctors', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'doctor_name',
						'label' => esc_html__( 'Doctor Name', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Name', 'textdomain' ),
						'default' => esc_html__( 'Jhon', 'textdomain' ),
					],
					[
						'name' => 'doctor_designation',
						'label' => esc_html__( 'Designation', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Doctor', 'textdomain' ),
						'default' => esc_html__( 'MBBS', 'textdomain' ),
					],
                    [
                        'name' => 'doctor_iamge',
                        'label' => esc_html__( 'Doctor Picture', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'doctor_link',
                        'label' => esc_html__( 'Link', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
                    ],
				],
				'default' => [
					[
						'doctor_name' => esc_html__( 'Dummy Name', 'textdomain' ),
						'doctor_link' => 'https://elementor.com/',
					],
					[
						'doctor_name' => esc_html__( 'Dummy Name 2', 'textdomain' ),
						'doctor_link' => 'https://elementor.com/',
					],
				],
				'title_field' => '{{{ doctor_name }}}',
			]
		);

		$this->end_controls_section();

	}


    protected function render() {
		$settings = $this->get_settings_for_display();
        $sections = count($settings['doctor_list']) + 2;
        ?>
        <div class="doctor_list">
            <style>
                .doctor_list{
                    width: <?php echo $sections * 375; ?>px;
                    display: flex;
                    flex-direction: row;
                    gap: 15px;
                    transform: translate(-375px, 0px);
                    transition: 0.5s;
                }
                .doctor_list a{
                    width: 25%;
                    cursor: crosshair;
                }
                .doctor_list a .single_doctor{
                    width: 100%;
                    position: relative;
                }
                .doctor_list .single_doctor img{
                    width: 100%!important;
                    height: 450px!important;
                    object-fit: cover;
                }
                .doctor_list .single_doctor h5{
                    margin: 0; 
                    position: absolute;
                    bottom: 40px;
                    left: 20px;
                    color: rgb(255, 255, 255);
                    display: block;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: bold;
                    font-size: 22px;
                    text-transform: uppercase;
                    z-index: 1;
                }
                .doctor_list .single_doctor h3{
                    margin: 0; 
                    position: absolute;
                    bottom: 20px;
                    left: 20px;
                    color: rgb(255, 255, 255);
                    display: block;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: 300;
                    font-size: 15px;
                    text-transform: uppercase;
                    z-index: 1;
                }
                .doctor_navigation {
                    width: 100%;
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    margin-top: 20px;
                }
                .doctor_navigation button.left{
                    border: 0px;
                    border-left: 1px solid rgb(255, 255, 255);
                    border-bottom: 1px solid rgb(255, 255, 255);
                    cursor: pointer;
                    height: 16px;
                    position: relative;
                    width: 16px;
                    background: transparent;
                    transform: rotate(45deg);
                }
                .doctor_navigation button.right{
                    border: 0px;
                    border-right: 1px solid rgb(255, 255, 255);
                    border-top: 1px solid rgb(255, 255, 255);
                    cursor: pointer;
                    height: 16px;
                    position: relative;
                    width: 16px;
                    background: transparent;
                    transform: rotate(45deg);
                }
            </style>
            <a href="#"></a>
            <?php foreach ( $settings['doctor_list'] as $index => $item ) : ?>
            <a href="<?php echo $item['doctor_link']['url']; ?>">
                <div class="single_doctor">
                    <img src="<?php echo $item['doctor_iamge']['url']; ?>" alt="<?php echo $item['doctor_name']; ?>">
                    <h5><?php echo $item['doctor_name']; ?></h5>
                    <h3><?php echo $item['doctor_designation']; ?></h3>
                </div>
            </a>
            <?php endforeach; ?>
            <a href="#"></a>
        </div>
        <div class="doctor_navigation">
            <button class="left"></button>
            <button class="right"></button>
            <script>
                jQuery( document ).ready(function() {
                    var max = <?php echo count($settings['doctor_list']) - 3; ?>;
                    // alert(max);
                    var step = 1;
                    jQuery('.doctor_navigation .left').click(() => {
                        console.log("working")
                        if (step !== 1) {
                            step--
                            jQuery('.doctor_list').css("transform", `translate(-${375 * step}px, 0px)`)
                        }
                    });
                    jQuery('.doctor_navigation .right').click(() => {
                        if (step !== max) {
                            step++
                            jQuery('.doctor_list').css("transform", `translate(-${375 * step}px, 0px)`)
                        }
                    });
                });

            </script>
        </div>
        <?php
    }
}