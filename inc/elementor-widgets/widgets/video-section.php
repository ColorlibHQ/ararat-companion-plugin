<?php
namespace Araratelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Ararat elementor video section section widget.
 *
 * @since 1.0
 */
class Ararat_Video_Section extends Widget_Base {

	public function get_name() {
		return 'ararat-video-section';
	}

	public function get_title() {
		return __( 'Video Section', 'ararat-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'ararat-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Video Section ------------------------------
        $this->start_controls_section(
            'video_section_content',
            [
                'label' => __( 'Video Section', 'ararat-companion' ),
            ]
        );
        $this->add_control(
            'video_thumb',
            [
                'label' => esc_html__( 'Video Thumbnail', 'ararat-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Popup Video URL', 'ararat-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=E_-lMZDi7Uw'
                ],
            ]
        );
        
        
        $this->end_controls_section(); // End video_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'ararat-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact h2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact .btn_1' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_hov_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact .btn_1:hover' => 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'bg_overlay_col', [
				'label' => __( 'Bg Overlay Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact:after' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $video_thumb      = !empty( $settings['video_thumb']['url'] ) ?  $settings['video_thumb']['url'] : '';
    $video_url      = !empty( $settings['video_url']['url'] ) ?  $settings['video_url']['url'] : '';
    ?>
     
    <!-- youtube_video_area_start -->
    <div class="youtube_video_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="youtube_video youtube_bg" <?php echo ararat_inline_bg_img( esc_url( $video_thumb ) ); ?>>
                        <div class="youtube_play_btn">
                            <a class="popup-video" href="<?php echo esc_url( $video_url )?>">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- youtube_video_area_end -->
    <?php

    }
}
