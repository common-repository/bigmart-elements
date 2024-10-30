<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

class Bigmart_Cta_Widget extends Widget_Base {

    /** Widget Name * */
    public function get_name() {
        return 'bm-cta';
    }

    /** Widget Title * */
    public function get_title() {
        return esc_html__('Call To Action', 'bigmart-elements');
    }

    /** Widget Icon * */
    public function get_icon() {
        return 'eicon-instagram-gallery';
    }

    /** Categories * */
    public function get_categories() {
        return ['bigmart-elements'];
    }

    /** Widget Controls * */
    protected function register_controls() {

        $this->start_controls_section(
                'cta_content_section', [
            'label' => __('CTA', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'image', [
            'label' => __('Choose Image', 'plugin-domain'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
                ]
        );

        $this->add_control(
                'subtitle', [
            'label' => __('Sub Title', 'bigmart-elements'),
            'type' => Controls_Manager::TEXTAREA,
            'rows' => 3,
            'default' => __('Exclusive 25% Discount', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'title', [
            'label' => __('Title', 'bigmart-elements'),
            'type' => Controls_Manager::TEXTAREA,
            'rows' => 4,
            'separator' => 'before',
            'default' => __('Best Furniture To Buy in 2020', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'title_tag', [
            'label' => __('Title Tag', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'h3',
            'options' => bigmart_elements_tag_lists(),
                ]
        );

        $this->add_control(
                'button_text', [
            'label' => __('Button Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Discover Now', 'bigmart-elements'),
            'separator' => 'before',
                ]
        );

        $this->add_control(
                'button_link', [
            'label' => __('Button Link', 'bigmart-elements'),
            'type' => Controls_Manager::URL,
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'cta_additional_section', [
            'label' => __('Additional Settings', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'hover_effect', [
            'label' => __('Hover Effect', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'effect-bubba',
            'options' => [
                'effect-bubba' => __('Bubba', 'bigmart-elements'),
                'effect-lily' => __('Lily', 'bigmart-elements'),
                'effect-roxy' => __('Roxy', 'bigmart-elements'),
                'effect-bubba' => __('Bubba', 'bigmart-elements'),
                'effect-layla' => __('Layla', 'bigmart-elements'),
                'effect-oscar' => __('Oscar', 'bigmart-elements'),
                'effect-ruby' => __('Ruby', 'bigmart-elements'),
                'effect-milo' => __('Milo', 'bigmart-elements'),
                'effect-sarah' => __('Sarah', 'bigmart-elements'),
                'effect-chico' => __('Chico', 'bigmart-elements'),
            ],
                ]
        );

        $this->add_control(
                'content_position', [
            'label' => __('Content Position', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'center-center',
            'options' => [
                'top-left' => __('Top Left', 'bigmart-elements'),
                'top-center' => __('Top Center', 'bigmart-elements'),
                'top-right' => __('Top Right', 'bigmart-elements'),
                'center-left' => __('Center Left', 'bigmart-elements'),
                'center-center' => __('Center Center', 'bigmart-elements'),
                'center-right' => __('Center Right', 'bigmart-elements'),
                'bottom-left' => __('Bottom Left', 'bigmart-elements'),
                'bottom-center' => __('Bottom Center', 'bigmart-elements'),
                'bottom-right' => __('Bottom Right', 'bigmart-elements'),
            ]
                ]
        );

        $this->add_control(
                'caption_position', [
            'label' => __('Caption Offset', 'bigmart-elements'),
            'description' => __('Move caption horizontally and vertically from current position', 'bigmart-elements'),
            'type' => Controls_Manager::POPOVER_TOGGLE,
            'label_off' => __('None', 'bigmart-elements'),
            'label_on' => __('Custom', 'bigmart-elements'),
            'return_value' => 'yes'
                ]
        );

        $this->start_popover();

        $this->add_responsive_control(
                'caption_offset_y', [
            'label' => __('Vertical', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -500,
                    'max' => 500,
                ],
            ],
            'default' => [
                'size' => 0,
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta.bm-enable-offset figure figcaption .captions' => 'transform:translate({{caption_offset_x.SIZE}}{{caption_offset_x.UNIT}}, {{SIZE}}{{UNIT}});',
            ],
                ]
        );

        $this->add_responsive_control(
                'caption_offset_x', [
            'label' => __('Horizontal', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => -500,
                    'max' => 500,
                ],
            ],
            'default' => [
                'size' => 0,
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta.bm-enable-offset figure figcaption .captions' => 'transform:translate({{SIZE}}{{UNIT}}, {{caption_offset_y.SIZE}}{{caption_offset_y.UNIT}});'
            ],
                ]
        );

        $this->end_popover();

        $this->add_control(
                'caption_text_align', [
            'label' => __('Caption Text Alignment', 'bigmart-elements'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', 'bigmart-elements'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'bigmart-elements'),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __('Right', 'bigmart-elements'),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .captions' => 'text-align: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
            'name' => 'image',
            'exclude' => ['custom'],
            'include' => [],
            'default' => 'large',
            'separator' => 'before'
                ]
        );

        $this->add_responsive_control(
                'image_height', [
            'label' => __('Image Height', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 1000,
                    'step' => 5,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 360,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta' => 'height: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'general_style', [
            'label' => __('General', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'frame_heading', [
            'label' => __('Frame', 'bigmart-elements'),
            'type' => Controls_Manager::HEADING,
            'condition' => [
                'hover_effect' => ['effect-bubba', 'effect-roxy', 'effect-layla', 'effect-oscar', 'effect-chico']
            ]
                ]
        );


        $this->add_control(
                'frame_spacing', [
            'label' => __('Frame Spacing', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'condition' => [
                'hover_effect' => ['effect-bubba', 'effect-roxy', 'effect-oscar', 'effect-chico']
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure.effect-bubba figcaption::before,{{WRAPPER}} .bm-cta figure.effect-bubba figcaption::after,{{WRAPPER}} .bm-cta figure.effect-roxy figcaption::before, {{WRAPPER}} .bm-cta figure.effect-oscar figcaption::before, {{WRAPPER}} .bm-cta figure.effect-chico figcaption::before, {{WRAPPER}} .bm-cta figure.effect-chico p' => 'top: {{SIZE}}{{UNIT}}; right: {{SIZE}}{{UNIT}}; bottom: {{SIZE}}{{UNIT}}; left: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'frame_spacing_vertical', [
            'label' => __('Frame Spacing (Vertical)', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 50,
            ],
            'condition' => [
                'hover_effect' => 'effect-layla',
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure.effect-layla figcaption::before' => 'top: {{SIZE}}{{UNIT}}; bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'frame_spacing_horizontal', [
            'label' => __('Frame Spacing (Horizontal)', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'condition' => [
                'hover_effect' => 'effect-layla',
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure.effect-layla figcaption::before' => 'right: {{SIZE}}{{UNIT}}; left: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'frame_size', [
            'label' => __('Frame Size', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 5,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 2,
            ],
            'condition' => [
                'hover_effect' => ['effect-bubba', 'effect-roxy', 'effect-layla', 'effect-oscar', 'effect-chico']
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure.effect-bubba figcaption::before, {{WRAPPER}} .bm-cta figure.effect-bubba figcaption::after, {{WRAPPER}} .bm-cta figure.effect-roxy figcaption::before, {{WRAPPER}} .bm-cta figure.effect-layla figcaption::before, {{WRAPPER}} .bm-cta figure.effect-layla figcaption::after, {{WRAPPER}} .bm-cta figure.effect-oscar figcaption::before, {{WRAPPER}} .bm-cta figure.effect-chico figcaption::before' => 'border-width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'frame_color', [
            'label' => __('Frame Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .bm-cta:before' => 'background: {{VALUE}}',
            ],
            'condition' => [
                'hover_effect' => ['effect-bubba', 'effect-roxy', 'effect-layla', 'effect-oscar', 'effect-chico']
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure.effect-bubba figcaption::before, {{WRAPPER}} .bm-cta figure.effect-bubba figcaption::after, {{WRAPPER}} .bm-cta figure.effect-roxy figcaption::before, {{WRAPPER}} .bm-cta figure.effect-layla figcaption::before, {{WRAPPER}} .bm-cta figure.effect-layla figcaption::after, {{WRAPPER}} .bm-cta figure.effect-oscar figcaption::before, {{WRAPPER}} .bm-cta figure.effect-chico figcaption::before' => 'border-color: {{VALUE}};',
            ],
                ]
        );

        $this->start_controls_tabs(
                'general_tabs'
        );

        $this->start_controls_tab(
                'general_normal_tab', [
            'label' => __('Normal', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'overlay_color_normal', [
            'label' => __('Overlay', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => 'rgba(0,0,0,0.2)',
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure:before' => 'background: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'general_hover_tab', [
            'label' => __('Hover', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'overlay_color_hover', [
            'label' => __('Overlay', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'alpha' => true,
            'default' => 'rgba(0,0,0,0.4)',
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure:hover:before' => 'background: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
                'subtitle_style', [
            'label' => __('Sub Title', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'subtitle_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .subtitle' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-cta figure figcaption .subtitle',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'title_style', [
            'label' => __('Title', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'default' => '#FFFFFF',
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .title' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-cta figure figcaption .title',
                ]
        );

        $this->add_control(
                'title_spacing', [
            'label' => __('Spacing', 'plugin-domain'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'button_style', [
            'label' => __('Button', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'button_padding', [
            'label' => __('Padding', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'default' => [
                'top' => 6,
                'right' => 20,
                'bottom' => 6,
                'left' => 20,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-cta figure figcaption .btn',
                ]
        );

        $this->add_control(
                'border_radius', [
            'label' => __('Border Radius', 'plugin-domain'),
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
                'size' => 5,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .btn' => 'border-radius: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs(
                'button_tabs'
        );

        $this->start_controls_tab(
                'buttons_normal_tab', [
            'label' => __('Normal', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'button_color_normal', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .btn' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'button_bgcolor_normal', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .btn' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'buttons_hover_tab', [
            'label' => __('Hover', 'bigmart-elements'),
                ]
        );


        $this->add_control(
                'button_color_hover', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .btn:hover' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'button_bgcolor_hover', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-cta figure figcaption .btn:hover' => 'background-color: {{VALUE}}',
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
        $image = $this->get_image_url();
        $content_postition = $settings['content_position'] ? $settings['content_position'] : 'center-center';
        $title_tag = isset($settings['title_tag']) ? $settings['title_tag'] : 'h3';
        $hover_effect = isset($settings['hover_effect']) ? $settings['hover_effect'] : 'effect-bubba';
        $caption_position = $settings['caption_position'] == 'yes' ? 'bm-enable-offset' : '';

        $before_title = '<' . esc_attr($title_tag) . ' class="title">';
        $after_title = '</' . esc_attr($title_tag) . '>';

        $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div
            class="bm-cta <?php echo esc_attr($content_postition) . ' ' . esc_attr($hover_effect) . ' ' . esc_attr($caption_position); ?>"
            id="bm-cta-<?php echo esc_attr($this->get_id()); ?>"
            >
                <?php if ($image['url']) : ?>
                <figure class="<?php echo esc_attr($hover_effect); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                    <figcaption>
                        <div class="captions">
                            <?php
                            if ($settings['subtitle']) {
                                echo '<span class="subtitle">' . wp_kses($settings['subtitle'], array('br' => array(), 'strong' => array())) . '</span>';
                            }

                            if ($settings['title']) {
                                echo $before_title . wp_kses($settings['title'], array('br' => array(), 'strong' => array())) . $after_title;
                            }

                            if ($settings['button_link']['url'] && $settings['button_text']) {
                                echo '<a class="btn" href="' . esc_url($settings['button_link']['url']) . '"' . $target . $nofollow . '>' . esc_html($settings['button_text']) . '</a>';
                            }
                            ?>
                        </div>
                    </figcaption>     
                </figure>
            <?php endif; ?>
        </div>
        <?php
    }

    protected function get_image_url() {
        $settings = $this->get_settings_for_display();

        $image = $settings['image'] ? $settings['image'] : '';
        $image_size = $settings['image_size'] ? $settings['image_size'] : 'large';
        $imggg = array(
            'url' => '',
            'alt' => ''
        );
        if (!empty($image)) {
            if (isset($image['id']) && $image['id']) {
                $img = wp_get_attachment_image_src($image['id'], $image_size);
                if ($img) {
                    $imggg['url'] = $img[0];
                }
                $imggg['alt'] = get_post_meta($image['id'], '_wp_attachment_image_alt', TRUE);
            } else {
                $imggg['url'] = isset($image['url']) ? $image['url'] : '';
                $imggg['alt'] = '';
            }
        }

        return $imggg;
    }

}
