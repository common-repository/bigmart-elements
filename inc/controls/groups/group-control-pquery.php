<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Base;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Group_Control_Produt_Query extends Group_Control_Base {

    protected static $fields;

    public static function get_type() {
        return 'bigmart-pquery';
    }

    protected function init_fields() {
        $fields = [];

        $fields['tabs'] = [
            'label' => __('Product Tabs', 'bigmart-elements'),
            'description' => __('Drag & Drop to reorder tabs', 'bigmart-elements'),
            'type' => \Selectize_Control::Selectize,
            'multiple' => true,
            'options' => [
                'latest' => __('Latest', 'bigmart-elements'),
                'featured' => __('Featured', 'bigmart-elements'),
                'best-selling' => __('Best Selling', 'bigmart-elements'),
                'sale' => __('Sale', 'bigmart-elements'),
                'top-rated' => __('Top Rated', 'bigmart-elements'),
            ],
            'default' => ['latest', 'featured'],
            'label_block' => true,
        ];

        $fields['no_of_products'] = [
            'label' => __('No. of products', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['no'],
            'range' => [
                'no' => [
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'no',
                'size' => 6,
            ],
        ];

        $fields['column_layout'] = [
            'label' => __('Column Layout', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => '3',
            'tablet_default' => '2',
            'mobile_default' => '1',
            'responsive' => true,
            'options' => array(
                '1' => __('1 Column', 'bigmart-elements'),
                '2' => __('2 Column', 'bigmart-elements'),
                '3' => __('3 Column', 'bigmart-elements'),
                '4' => __('4 Column', 'bigmart-elements'),
                '5' => __('5 Column', 'bigmart-elements'),
                '6' => __('6 Column', 'bigmart-elements')
            )
        ];

        $fields['orderby'] = [
            'label' => __('Order By', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'none',
            'options' => array(
                'none' => __('None', 'bigmart-elements'),
                'ID' => __('ID', 'bigmart-elements'),
                'date' => __('Date', 'bigmart-elements'),
                'name' => __('Name', 'bigmart-elements'),
                'title' => __('Title', 'bigmart-elements'),
                'rand' => __('Random', 'bigmart-elements'),
                'comment_count' => __('Comment Count', 'bigmart-elements'),
            )
        ];

        $fields['order'] = [
            'label' => __('Order', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => array(
                'ASC' => __('Ascending', 'bigmart-elements'),
                'DESC' => __('Descending', 'bigmart-elements'),
            )
        ];

        return $fields;
    }

    private static function get_post_types() {
        $post_type_args = [
            'show_in_nav_menus' => true,
        ];

        $_post_types = get_post_types($post_type_args, 'objects');

        $post_types = [];

        foreach ($_post_types as $post_type => $object) {
            $post_types[$post_type] = $object->label;
        }

        return $post_types;
    }

    protected function get_default_options() {
        return [
            'popover' => false,
        ];
    }

}
