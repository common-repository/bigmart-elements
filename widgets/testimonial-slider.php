<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

class Bigmart_Testimonial_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'bm-testimonial-slider';
    }

    public function get_title() {
        return esc_html__('Testimonial Slider', 'bigmart-elements');
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }

    public function get_categories() {
        return ['bigmart-elements'];
    }

    public function get_script_depends() {
        return ['owl-carousel'];
    }

    protected function register_controls() {

        $this->start_controls_section(
                'testimonial_section', [
            'label' => __('Testimonial', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
                'image', [
            'label' => __('Choose Image', 'bigmart-elements'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );

        $repeater->add_control(
                'name', [
            'label' => __('Client Name', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('John Doe', 'bigmart-elements'),
            'label_block' => true,
                ]
        );

        $repeater->add_control(
                'designation', [
            'label' => __('Designation', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Managing Director', 'bigmart-elements'),
            'label_block' => true,
                ]
        );

        $repeater->add_control(
                'testimony', [
            'label' => __('Testimony', 'bigmart-elements'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => __('John Doe has to say something about the co.', 'bigmart-elements'),
            'show_label' => false,
                ]
        );

        $repeater->add_control(
                'star_ratings', [
            'label' => __('Ratings', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '0' => __('0 Star', 'bigmart-elements'),
                '1' => __('1 Star', 'bigmart-elements'),
                '2' => __('2 Star', 'bigmart-elements'),
                '3' => __('3 Star', 'bigmart-elements'),
                '4' => __('4 Star', 'bigmart-elements'),
                '5' => __('5 Star', 'bigmart-elements'),
            ],
                ]
        );

        $this->add_control(
                'testimonials', [
            'label' => __('Testimonials', 'bigmart-elements'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'name' => __('John Doe', 'bigmart-elements'),
                    'designation' => __('Managing Director', 'bigmart-elements'),
                    'testimony' => __('John Doe has to say something about the business.', 'bigmart-elements'),
                ],
                [
                    'name' => __('Sarah Doe', 'bigmart-elements'),
                    'designation' => __('Blogger', 'bigmart-elements'),
                    'testimony' => __('Sarah has to say something about the business.', 'bigmart-elements'),
                ],
            ],
            'title_field' => '{{{ name }}}',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_carousel_section', [
            'label' => __('Carousel', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'autoplay', [
            'label' => esc_html__('Autoplay', 'viral-pro'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'viral-pro'),
            'label_off' => esc_html__('No', 'viral-pro'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'pause_duration', [
            'label' => esc_html__('Pause Duration(Sec)', 'viral-pro'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['s'],
            'range' => [
                's' => [
                    'min' => 1,
                    'max' => 20,
                    'step' => 1
                ],
            ],
            'default' => [
                'unit' => 's',
                'size' => 5,
            ],
            'condition' => [
                'autoplay' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'show_dots', [
            'label' => __('Show Dots', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_image_style', [
            'label' => __('Image', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
            'name' => 'testimony_image',
            'exclude' => ['custom'],
            'include' => [],
            'default' => 'medium',
                ]
        );

        $this->add_control(
                'testimony_image_width', [
            'label' => __('Height', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 50,
                    'max' => 250,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 55,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .name-design .image' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'testimony_image_gap', [
            'label' => __('Spacing', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 20,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .name-design .image' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_name_style', [
            'label' => __('Client Name', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'name_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .name-designation .name' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-testimonial-slider .name-designation .name',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_testimony_style', [
            'label' => __('Testimony', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'testimony_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .testimonial .testimony' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'testimony_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-testimonial-slider .testimonial .testimony',
                ]
        );

        $this->add_control(
                'testimony_margin', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'allowed_dimensions' => 'vertical',
            'size_units' => ['px', '%', 'em'],
            'default' => [
                'top' => 20,
                'right' => 0,
                'bottom' => 20,
                'left' => 0,
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .testimonial .testimony' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_designation_style', [
            'label' => __('Designation', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'design_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .name-designation .designation' => 'color: {{VALUE}}'
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'design_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-testimonial-slider .name-designation .designation',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_ratings_style', [
            'label' => __('Star Ratings', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'ratings_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .star-ratings span' => 'color: {{VALUE}}'
            ],
                ]
        );

        $this->add_control(
                'ratings_size', [
            'label' => __('Size', 'bigmart-elements'),
            'type' => Controls_Manager::NUMBER,
            'min' => 5,
            'max' => 100,
            'step' => 1,
            'default' => 18,
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .star-ratings span' => 'font-size: {{VALUE}}px'
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'testimonial_dots_style', [
            'label' => __('Dots', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'dots_size', [
            'label' => __('Size', 'bigmart-elements-pro'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 30,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 16,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .owl-dots button.owl-dot' => 'font-size: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'dots_spacing', [
            'label' => __('Top Margin', 'bigmart-elements-pro'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 40,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .owl-dots' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs(
                'dots_style_tabs'
        );

        $this->start_controls_tab(
                'dots_normal_tab', [
            'label' => __('Normal', 'bigmart-elements-pro'),
                ]
        );

        $this->add_control(
                'dot_color', [
            'label' => __('Normal Color', 'bigmart-elements-pro'),
            'type' => Controls_Manager::COLOR,
            'default' => '#DDD',
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .owl-dots button.owl-dot' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'dots_hover_tab', [
            'label' => __('Active', 'bigmart-elements-pro'),
                ]
        );

        $this->add_control(
                'dot_color_hover', [
            'label' => __('Hover/Active color', 'bigmart-elements-pro'),
            'type' => Controls_Manager::COLOR,
            'default' => '#000',
            'selectors' => [
                '{{WRAPPER}} .bm-testimonial-slider .owl-dots button.owl-dot:hover, {{WRAPPER}} .bm-testimonial-slider .owl-dots button.owl-dot.active' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /** Render Layout * */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $testimonials = $settings['testimonials'];
        $image_size = $settings['testimony_image_size'] ? $settings['testimony_image_size'] : 'medium';

        $slider_datas = $this->get_slider_datas();

        if (!empty($testimonials)) :
            ?>
            <div class="bm-testimonial-slider owl-carousel" id="bm-testimonial-slider-<?php echo esc_attr($this->get_id()); ?>" data-slider="<?php echo esc_attr($slider_datas); ?>">

                <?php foreach ($testimonials as $testimonial) : ?>
                    <div class="testimonial">

                        <?php if ($testimonial['star_ratings']) : ?>
                            <div class="star-ratings">
                                <?php for ($i = 1; $i <= $testimonial['star_ratings']; $i++) : ?>
                                    <span class="icon_star"></span>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($testimonial['testimony']) : ?>
                            <div class="testimony">
                                <?php
                                echo wp_kses($testimonial['testimony'], array(
                                    'br' => array()
                                ));
                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="name-design">
                            <?php if ($testimonial['image']) : ?>
                                <?php
                                $img = wp_get_attachment_image_src($testimonial['image']['id'], $image_size);
                                $img_src = $img ? $img[0] : $testimonial['image']['url'];
                                $img_alt = get_post_meta($testimonial['image']['id'], '_wp_attachment_image_alt', true);
                                ?>
                                <div class="image">
                                    <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($img_alt); ?>" />   
                                </div>
                            <?php endif; ?>

                            <?php if ($testimonial['name']) : ?>
                                <div class="name-designation">
                                    <?php if ($testimonial['name']) : ?>
                                        <span class="name"><?php echo esc_html($testimonial['name']); ?></span>
                                    <?php endif; ?>

                                    <?php if ($testimonial['designation']) : ?>
                                        <span class="designation"><?php echo esc_html($testimonial['designation']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <?php
        endif;
    }

    /** Render Element Javascript * */
    private function get_slider_datas() {
        $settings = $this->get_settings_for_display();
        $show_dots = ( $settings['show_dots'] ) ? 'true' : 'false';

        $slider_datas = array(
            'autoplay' => $settings['autoplay'] == 'yes' ? true : false,
            'pause' => (int) $settings['pause_duration']['size'] * 1000,
            'show_dots' => $show_dots,
        );

        return json_encode($slider_datas);
    }

}
