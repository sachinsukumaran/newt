<?php
/*
*  Custom code for builder
*  @package owt
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Test_Widget extends \Elementor\Widget_Base {

    public function get_name(){
      return 'oembed';
    }
    public function get_title(){
      return __( 'oEmbed', 'owt');
    }
    public function get_icon(){
      return 'fa fa-code';
    }
    public function get_categories(){
      return ['general'];
    }

    protected function _register_controls(){
      $this->start_controls_section(
        'content_section',
        [
            'label' =>  __('Content', 'owt'),
            'tab' =>  \Elementor\Controls_Manager::TEXT,
            'input_type'  => 'url',
            'placeholder' => __('https://your-link.com','owt'),
        ]
      );
      $this->end_controls_section();
    }

    protected function render(){
      $settings = $this->get_settings_for_display();
      $html = wp_oembed_get($settings['url']);
      echo '<div class="oembed-elementor-widget">';
      echo ($html) ? $html:settings['url'];
      echo '</div>';
    }
}

 ?>
