<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;

/**
 * Vertical Menu.
 */
class Bigmart_Vertical_Menu_Widget extends Widget_Base {

    /** Widget Name */
    public function get_name() {
        return 'bm-vertical-menu-widget';
    }

    /** Widget Title */
    public function get_title() {
        return __('Vertical Menu', 'bigmart-elements');
    }

    /** Icon */
    public function get_icon() {
        return 'eicon-posts-grid';
    }

    /** Category */
    public function get_categories() {
        return ['bigmart-elements'];
    }

    /** Controls */
    protected function register_controls() {
        $this->start_controls_section(
                'content_section', [
            'label' => __('Content', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'menu_heading', [
            'label' => __('Heading', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Menu', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'heading_icon', [
            'label' => __('Heading Icon', 'bigmart-elements'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-list-ul',
                'library' => 'solid',
            ],
                ]
        );

        $this->add_control(
                'heading_tag', [
            'label' => __('Heading Tag', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'h3',
            'options' => bigmart_elements_tag_lists(),
                ]
        );

        $this->add_control(
                'menu', [
            'label' => __('Menu', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'none',
            'options' => bigmart_elements_menulist(),
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'menu_heading_style', [
            'label' => __('Menu Heading', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'menu_heading_bgcolor', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu .heading' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'menu_heading_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu .heading, {{WRAPPER}} .bm-vertical-menu .heading .text' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'menu_heading_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-vertical-menu .heading .text',
                ]
        );

        $this->add_control(
                'menu_icon_size', [
            'label' => __('Icon Size', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu .heading .icon' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'menu_icon_spcing', [
            'label' => __('Icon Spacing', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu .heading .icon' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'menu_padding', [
            'label' => __('Padding', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'menu_block_style', [
            'label' => __('Menu Box', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'menu_block_bgcolor', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu ul' => 'background-color: {{VALUE}}'
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Menu Item Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-vertical-menu ul a',
                ]
        );

        $this->add_control(
                'enable_menu_border', [
            'label' => __('Enable Menu Item Border', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'menu_block_border_color', [
            'label' => __('Menu Item Border Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu.bm-enable-menu-border ul li:after' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .bm-vertical-menu.bm-enable-menu-border ul' => 'border-color: {{VALUE}}'
            ],
            'condition' => [
                'enable_menu_border' => 'yes',
            ],
                ]
        );

        $this->add_control(
                'menu_item_padding', [
            'label' => __('Menu Item Padding', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'submenu_width', [
            'label' => __('Sub Menu Width', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu.bm-enable-menu-border ul ul' => 'width: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->start_controls_tabs(
                'menu_items_tabs'
        );

        $this->start_controls_tab(
                'menu_items_normal_tab', [
            'label' => __('Normal', 'bigmart-elements-pro'),
                ]
        );

        $this->add_control(
                'menu_text_color', [
            'label' => __('Menu Item Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu ul a' => 'color: {{VALUE}}'
            ],
                ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
                'menu_item_hover_tab', [
            'label' => __('Hover', 'bigmart-elements-pro'),
                ]
        );

        $this->add_control(
                'menu_text_hover_color', [
            'label' => __('Menu Item Hover Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu ul a:hover' => 'color: {{VALUE}}'
            ],
                ]
        );

        $this->add_control(
                'menu_text_hover_bg_color', [
            'label' => __('Menu Item Hover Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-vertical-menu ul a:hover' => 'background: {{VALUE}}'
            ],
                ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    /** Render Layout */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $menu_heading = $settings['menu_heading'];
        $heading_icon = $settings['heading_icon'] ? $settings['heading_icon'] : 'fas fa-list-ul';
        $heading_tag = $settings['heading_tag'] ? $settings['heading_tag'] : 'h3';
        $menu = $settings['menu'] ? $settings['menu'] : 'none';
        $enable_menu_border = $settings['enable_menu_border'] == 'yes' ? 'bm-enable-menu-border' : '';

        $before_heading = '<' . esc_attr($heading_tag) . ' class="text">';
        $after_heading = '</' . esc_attr($heading_tag) . '>';

        if ($menu == 'none') {
            ?>
            <div class="bm-error"><?php esc_html_e('Select a Menu', 'bigmart-elements'); ?></div>
            <?php
        } else {
            ?>
            <div class="bm-vertical-menu <?php echo esc_attr($enable_menu_border); ?>" id="bm-vertical-menu-<?php echo esc_attr($this->get_id()) ?>">
                <?php if ($before_heading !== '') : ?>
                    <div class="heading">
                        <div class="icon">
                            <?php Icons_Manager::render_icon($settings['heading_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <?php echo $before_heading . esc_html($menu_heading) . $after_heading; ?>
                    </div>
                <?php endif; ?>
                <?php
                wp_nav_menu(array(
                    'menu' => $menu,
                    'container' => false
                ));
                ?>
            </div>
            <?php
        }
    }

}
