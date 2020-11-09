<?php
namespace Araratelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Ararat elementor service section widget.
 *
 * @since 1.0
 */
class Ararat_Services extends Widget_Base {

	public function get_name() {
		return 'ararat-services';
	}

	public function get_title() {
		return __( 'Services', 'ararat-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'ararat-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'ararat-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'ararat-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'About US', 'ararat-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'ararat-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Make your Dream with US', 'ararat-companion' )
            ]
        );

        $this->add_control(
            'service_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'araratservices', [
                'label' => __( 'Create New', 'ararat-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ service_title }}}',
                'fields' => [
                    [
                        'name' => 'service_img',
                        'label' => __( 'Service Image', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'service_title',
                        'label' => __( 'Service Title', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Interior', 'ararat-companion' ),
                    ],
                    [
                        'name' => 'service_text',
                        'label' => __( 'Service Text', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'ararat-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Interior', 'ararat-companion' ),
                        'service_text'   => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'ararat-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Exterior', 'ararat-companion' ),
                        'service_text'   => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'ararat-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Bridge', 'ararat-companion' ),
                        'service_text'   => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'ararat-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'ararat-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sing_ser_title_col', [
                'label' => __( 'Title Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sing_ser_txt_col', [
                'label' => __( 'Text Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $araratservices = !empty( $settings['araratservices'] ) ? $settings['araratservices'] : '';
    $dynamic_class  = is_front_page() ? 'dream_service' : 'dream_service';
    ?>

    <!-- dream_service_start -->
    <div class="dream_service">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-95">
                        <?php 
                            if ( $sub_title ) { 
                                echo '<span class="sub_heading">'.$sub_title.'</span>';
                            }
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $araratservices ) && count( $araratservices ) > 0 ) {
                    foreach( $araratservices as $service ) {
                        $service_img     = !empty( $service['service_img']['id'] ) ? wp_get_attachment_image( $service['service_img']['id'], 'ararat_service_thumb_200x200', '', array( 'alt' => 'service image' ) ) : '';
                        $service_title   = ( !empty( $service['service_title'] ) ) ? $service['service_title'] : '';
                        $service_text    = ( !empty( $service['service_text'] ) ) ? $service['service_text'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_dream text-center">
                                <?php 
                                    if ( $service_img ) { 
                                        echo '<div class="thumb">';
                                            echo $service_img;
                                        echo '</div>';
                                    }
                                    if ( $service_title ) { 
                                        echo '<h3>'.$service_title.'</h3>';
                                    }
                                    if ( $service_text ) { 
                                        echo '<p>'.esc_html( $service_text ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- dream_service_end -->
    <?php
    }
}