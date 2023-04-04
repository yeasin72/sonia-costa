<?php

use Elementor\Controls_Manager;
use Elementor\PageSettings\Page;
use Elementor\Utils;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/*plugin class*/
class AnimateGL_El
{

	public $version;
	public $path;
	public $plugin_dir_path;
	public $plugin_dir_url;

	// Singleton
	private static $instance = null;

	public static function get_instance()
	{

		if (null == self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	protected function __construct()
	{
		$this->version = ANIMATE_GL_VERSION;
		$this->path = ANIMATE_GL_FILE;
		$this->plugin_dir_path = plugin_dir_path($this->path);
		$this->plugin_dir_url = plugin_dir_url($this->path);

		$this->init();
	}

	public function init()
	{
		add_action('elementor/element/common/section_effects/after_section_end',  [$this, 'add_section']);
		add_action('elementor/element/section/section_effects/after_section_end',  [$this, 'add_section']);
		add_action('elementor/element/column/section_effects/after_section_end',  [$this, 'add_section']);
		add_action('elementor/element/container/section_effects/after_section_end',  [$this, 'add_section']);

		add_action('elementor/element/after_add_attributes', function ($element) {

			$agl_in_name = $element->get_settings('agl_in_name');

			if ($agl_in_name) {
				$classes = $agl_in_name == 'custom' ? 'agl' : 'agl agl-' . $agl_in_name . $element->get_settings('agl_in_direction');
				$duration = $element->get_settings('agl_in_duration')['size'];
				$delay = $element->get_settings('agl_in_delay')['size'];
				$classes .= ' agl-in-duration-' . $duration;
				$classes .= ' agl-in-delay-' . $delay;
				$atts = array();
			    $atts['class'] = $classes;

				$element->add_render_attribute(
					'_wrapper',
					$atts
				);
			}
		});

		wp_enqueue_script('agl-el', $this->plugin_dir_url . 'js/el.js', array('jquery'), $this->version);

		add_action('elementor/editor/after_enqueue_styles', function () {
			// enqueue style for editor
			wp_register_style('agl-el', $this->plugin_dir_url . 'css/el.css', array(), $this->version);
			wp_enqueue_style("agl-el");
		});
	}

	public function add_section($element)
	{

		$name = $element->get_name();


		$element->start_controls_section(
			'agl_section',
			[
				'label' => 'A n i m a t e  G L',
				'tab' => Controls_Manager::TAB_ADVANCED,
			]
		);

		$element->add_control(
			'agl_in_name',
			[
				'label' => __('Entrance Animation', 'animate-gl'),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'options' => [
					'' => __('None', 'animate-gl'),
					'custom' => __('Custom', 'animate-gl'),
					'fade' => __('Fade', 'animate-gl'),
					'flip' => __('Flip', 'animate-gl'),
					'slide' => __('Slide', 'animate-gl'),
					'stretch' => __('Stretch ', 'animate-gl'),
					'bend' => __('Bend', 'animate-gl'),
					'peel' => __('Peel', 'animate-gl'),
					'wipe' => __('Wipe', 'animate-gl'),
					'zoomIn' => __('Zoom In', 'animate-gl'),

				],
				'default' => '',
				'render_type'        => 'none',
				'frontend_available' => true,
			]
		);

		$element->add_control(
			'agl_in_direction',
			[
				'label' => __('Direction', 'animate-gl'),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'options' => [
					'Left' => __('Left', 'animate-gl'),
					'Right' => __('Right', 'animate-gl'),
					'Up' => __('Up', 'animate-gl'),
					'Down' => __('Down', 'animate-gl'),

				],
				'default' => 'Right',
				'render_type'        => 'none',
				'frontend_available' => true,
			]
		);

		$element->add_control(
			'agl_in_duration',
			[
				'label' => esc_html__('Duration', 'animate-gl'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'ms' => [
						'max' => 3000,
						'min' => 0,
						'step' => 100,
					],
				],
				'size_units' => ['ms'],
				'default' => [
					'unit' => 'ms',
					'size' => 1000,
				],
				'frontend_available' => true,
				'render_type'        => 'none',
			]
		);

		$element->add_control(
			'agl_in_delay',
			[
				'label' => esc_html__('Delay', 'animate-gl'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'ms' => [
						'max' => 5000,
						'min' => 0,
						'step' => 100,
					],
				],
				'size_units' => ['ms'],
				'default' => [
					'unit' => 'ms',
					'size' => 0,
				],
				'frontend_available' => true,
				'render_type'        => 'none',

			]
		);

		$element->end_controls_section(); // END ENTRANCE SECTION / PANEL

	}
}
