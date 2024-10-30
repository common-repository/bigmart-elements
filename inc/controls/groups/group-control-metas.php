<?php
    use Elementor\Controls_Manager;
    use Elementor\Group_Control_Base;

    if (!defined('ABSPATH'))
        exit;

    class Group_Control_Metas extends Group_Control_Base {

        protected static $fields;

        public static function get_type() {
            return 'bigmart-metas';
        }

        protected function init_fields() {
            $fields = [];

                $fields['show_metas'] = [
                    'label' => __('Post Meta', 'bigmart-elements'),
                    'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'bigmart-elements' ),
                        'label_off' => __( 'Hide', 'bigmart-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                ];

                $fields['show_author'] = [
                    'label' => __('Post Author', 'bigmart-elements'),
                    'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'bigmart-elements' ),
                        'label_off' => __( 'Hide', 'bigmart-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                ];

                $fields['show_date'] = [
                    'label' => __('Post Date', 'bigmart-elements'),
                    'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'bigmart-elements' ),
                        'label_off' => __( 'Hide', 'bigmart-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                ];

                $fields['show_comments'] = [
                    'label' => __('Post Comments', 'bigmart-elements'),
                    'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'bigmart-elements' ),
                        'label_off' => __( 'Hide', 'bigmart-elements' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                ];

            return $fields;
        }

        protected function get_default_options() {
            return [
                'popover' => false,
            ];
        }

    }
