<?php
    use Elementor\Controls_Manager;
    use Elementor\Group_Control_Base;

    if (!defined('ABSPATH'))
        exit;

    class Group_Control_Header extends Group_Control_Base {

        protected static $fields;

        public static function get_type() {
            return 'bigmart-header';
        }

        protected function init_fields() {
            $fields = [];

            $fields['title'] = [
                'label' => __('Title', 'bigmart-elements'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ];

            $fields['link'] = [
                'label' => __('Link', 'bigmart-elements'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => true,
                ],
            ];

            $fields['tag'] = [
                'label' => __('Tag', 'bigmart-elements'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => esc_html__('H1', 'bigmart-elements'),
                    'h2' => esc_html__('H2', 'bigmart-elements'),
                    'h3' => esc_html__('H3', 'bigmart-elements'),
                    'h4' => esc_html__('H4', 'bigmart-elements'),
                    'h5' => esc_html__('H5', 'bigmart-elements'),
                    'h6' => esc_html__('H6', 'bigmart-elements'),
                    'span' => esc_html__('span', 'bigmart-elements'),
                    'div' => esc_html__('div', 'bigmart-elements')
                ],
                'default' => 'h4',
            ];

            return $fields;
        }

        protected function get_default_options() {
            return [
                'popover' => false,
            ];
        }

    }
