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
 * Ararat elementor about us section widget.
 *
 * @since 1.0
 */
class Ararat_About_Us extends Widget_Base {

	public function get_name() {
		return 'ararat-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'ararat-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'ararat-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'ararat-companion' ),
            ]
        );
        $this->add_control(
            'section_img',
            [
                'label' => esc_html__( 'Section Image', 'ararat-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'experience_section_separator',
            [
                'label' => esc_html__( 'Experience Section', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'seperator' => 'after',
            ]
        );
        $this->add_control(
            'exp_val',
            [
                'label' => esc_html__( 'Experience Duration', 'ararat-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '25', 'ararat-companion' ),
            ]
        );
        $this->add_control(
            'exp_txt',
            [
                'label' => esc_html__( 'Experience Text', 'ararat-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Years of Experience', 'ararat-companion' ),
            ]
        );
        $this->add_control(
            'right_section_separator',
            [
                'label' => esc_html__( 'Right Section', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'seperator' => 'after',
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'ararat-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Us', 'ararat-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'ararat-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Architechtural plan <br>design and build',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'About Text', 'ararat-companion' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'   => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p><ul><li>Consectetur adipiscing sed do eiusmod. </li><li>Eiusmod tempor incididunt labore. </li></ul>',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'ararat-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'ABOUT US', 'ararat-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'ararat-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'ararat-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'left_sec_styles_seperator',
            [
                'label' => esc_html__( 'Left Section Styles', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'exp_val_col', [
				'label' => __( 'Experience Value Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience h1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_txt_col', [
				'label' => __( 'Experience Text Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'right_sec_styles_seperator',
            [
                'label' => esc_html__( 'Right Section Styles', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_info .section_title .seperator' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area .about_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Circle Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info ul li::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'ararat-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg & Border Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'ararat-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

    }
    
    public function ararat_get_about_text_section( $sub_title, $sec_title, $about_text, $btn_text, $btn_url ) {
        ?>
        <div class="col-xl-5 offset-xl-1 col-md-6">
            <div class="about_info">
                <div class="section_title">
                    <?php 
                        if ( $sub_title ) { 
                            echo '<span class="sub_heading">'.$sub_title.'</span>';
                        }
                        if ( $sec_title ) { 
                            echo '<h3>'.wp_kses_post( nl2br( $sec_title ) ).'</h3>';
                        }
                    ?>
                    <div class="seperator"></div>
                </div>
                <?php 
                    if ( $about_text ) { 
                        echo '<p>'.$about_text.'</p>';
                    }
                ?>
                <a href="<?php echo esc_url( $btn_url )?>" class="boxed-btn"><?php echo esc_html( $btn_text )?></a>
            </div>
        </div>
        <?php
    }

    public function ararat_get_about_img_section( $about_img, $exp_val, $exp_txt ) {
        ?>
        <div class="col-xl-6 col-md-6">
            <div class="about_thumb">
                <?php 
                    if ( $about_img ) { 
                        echo $about_img;
                    }
                ?>
                <div class="exprience">
                    <?php 
                        if ( $exp_val ) { 
                            echo '<h1>'.$exp_val.'</h1>';
                        }
                        if ( $exp_txt ) { 
                            echo '<span>'.$exp_txt.'</span>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

	protected function render() {
    $settings       = $this->get_settings();    
    $about_img      = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'ararat_about_thumb_585x750', '', array( 'alt' => 'about image' ) ) : '';
    $exp_val        = !empty( $settings['exp_val'] ) ?  $settings['exp_val'] : '';
    $exp_txt        = !empty( $settings['exp_txt'] ) ?  $settings['exp_txt'] : '';
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $about_text     = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $btn_text       = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
    $btn_url        = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    $dynamic_class  = is_front_page() ? 'about_area' : 'about_area';
    ?>

    <!-- about_area_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row align-items-center">
                <?php
                    $this->ararat_get_about_img_section( $about_img, $exp_val, $exp_txt );
                    $this->ararat_get_about_text_section( $sub_title, $sec_title, $about_text, $btn_text, $btn_url );
                ?>  
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <?php
    }
}