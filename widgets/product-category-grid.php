<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

class Bigmart_Product_Category_Grid_Widget extends Widget_Base {

    /** Widget Name * */
    public function get_name() {
        return 'bm-product-category-grid';
    }

    /** Widget Title * */
    public function get_title() {
        return esc_html__('Product Category Grid', 'bigmart-elements');
    }

    /** Widget Icon * */
    public function get_icon() {
        return 'eicon-posts-grid';
    }

    /** Categories * */
    public function get_categories() {
        return ['bigmart-elements'];
    }

    /** Widget Controls * */
    protected function register_controls() {

        $this->start_controls_section(
                'header', [
            'label' => esc_html__('Header', 'bigmart-elements'),
                ]
        );

        $this->add_group_control(
                Group_Control_Header::get_type(), [
            'name' => 'header',
            'label' => esc_html__('Header', 'bigmart-elements'),
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'product_query', [
            'label' => esc_html__('Content', 'bigmart-elements'),
                ]
        );

        $this->add_control(
                'product_cats', [
            'label' => __('Choose Category', 'bigmart-elements'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'label_block' => true,
            'multiple' => true,
            'options' => bigmart_elements_get_woo_categories(),
                ]
        );

        $this->add_control(
                'products_no_of_products', [
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
                ]
        );

        $this->add_responsive_control(
                'products_column_layout', [
            'label' => __('Column Layout', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => '3',
            'tablet_default' => '2',
            'mobile_default' => '1',
            'options' => array(
                '1' => __('1 Column', 'bigmart-elements'),
                '2' => __('2 Column', 'bigmart-elements'),
                '3' => __('3 Column', 'bigmart-elements'),
                '4' => __('4 Column', 'bigmart-elements'),
                '5' => __('5 Column', 'bigmart-elements'),
                '6' => __('6 Column', 'bigmart-elements')
            )
                ]
        );

        $this->add_control(
                'products_orderby', [
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
                ]
        );

        $this->add_control(
                'products_order', [
            'label' => __('Order', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => array(
                'ASC' => __('Ascending', 'bigmart-elements'),
                'DESC' => __('Descending', 'bigmart-elements'),
            )
                ]
        );

        $this->add_group_control(
                Group_Control_Image_Size::get_type(), [
            'name' => 'image_size',
            'exclude' => ['custom'],
            'include' => [],
            'default' => 'woocommerce_thumbnail',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'header_style', [
            'label' => esc_html__('Header', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'header_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-product-cat-grid .bm-header,{{WRAPPER}} .bm-product-cat-grid .bm-header a' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'header_padding', [
            'label' => __('Padding', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .bm-product-cat-grid .bm-header' => 'padding: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->add_control(
                'header_spacing', [
            'label' => __('Bottom Spacing', 'bigmart-elements'),
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
                '{{WRAPPER}} .bm-product-cat-grid .bm-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'header_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-product-cat-grid .bm-header',
                ]
        );

        $this->add_control(
                'separator_color', [
            'label' => __('Separator Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-product-cat-grid .bm-header' => 'border-bottom-color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'product_box_style', [
            'label' => esc_html__('Product Box', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'product_box_bgcolor', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ul.products li.product .bm-product-block .bm-woocommerce-product-info' => 'background-color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
            'product_box_padding', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} ul.products li.product .bm-product-block .bm-woocommerce-product-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_control(
			'product_box_align',
			[
				'label' => esc_html__( 'Alignment', 'bigmart-elements' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bigmart-elements' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bigmart-elements' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bigmart-elements' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} ul.products li.product .bm-product-block .bm-woocommerce-product-info' => 'text-align: {{VALUE}}',
                ],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
                'title_style', [
            'label' => esc_html__('Product Title', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .products li.product .woocommerce-loop-product__title a' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'title_hover_color', [
            'label' => __('Hover Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .products li.product .woocommerce-loop-product__title a:hover' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .products li.product .woocommerce-loop-product__title a',
                ]
        );

        $this->add_control(
                'title_margin', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .products li.product .woocommerce-loop-product__title' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'price_style', [
            'label' => esc_html__('Price', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'price_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ul.products li.product .bm-woocommerce-product-info .price' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'price_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} ul.products li.product .bm-woocommerce-product-info .price',
                ]
        );

        $this->add_control(
            'price_margin', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} ul.products li.product .bm-woocommerce-product-info .price' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
        ]
    );

        $this->end_controls_section();

        $this->start_controls_section(
                'onsale_style', [
            'label' => esc_html__('On Sale', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'onsale_bgcolor', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .onsale' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .onsale:after' => 'border-left: 13px solid {{VALUE}}; border-right: 13px solid {{VALUE}}; border-bottom: 13px solid transparent',
            ],
                ]
        );

        $this->add_control(
                'onsale_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .onsale span' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'onsale_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .onsale span',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'cart_style', [
            'label' => esc_html__('Add to Cart', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'cart_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ul.products li.product .button' => 'border-color: {{VALUE}};color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'cart_hover_color', [
            'label' => __('Hover Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} ul.products li.product .button:hover' => 'border-color: {{VALUE}};color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'cart_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} ul.products li.product .button, {{WRAPPER}} ul.products li.product .added_to_cart',
                ]
        );

        $this->end_controls_section();
    }

    /** Render Layout * */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $product_cats = $settings['product_cats'] ? $settings['product_cats'] : '';
        $img_size = isset($settings['image_size_size']) ? $settings['image_size_size'] : 'woocommerce_thumbnail';
        $this->add_render_attribute('bm-product-class', 'class', [
            'product-type-wrap',
            'products',
            'bm-desktop-col-' . $settings['products_column_layout'],
            'bm-tablet-col-' . (isset($settings['products_column_layout_tablet']) ? $settings['products_column_layout_tablet'] : 2),
            'bm-mobile-col-' . (isset($settings['products_column_layout_mobile']) ? $settings['products_column_layout_mobile'] : 1),
                ]
        );
        ?>
        <div class="bm-product-cat-grid" id="bm-product-tabs-grid-<?php echo esc_attr($this->get_id()); ?>">
            <div class="products-wrap">
                <?php $this->render_header(); ?>
                <ul <?php echo $this->get_render_attribute_string('bm-product-class'); ?>>
                    <?php
                    $args = $this->get_query_args($product_cats);
                    $product_query = new \WP_Query($args);

                    if ($product_query->have_posts()) {
                        while ($product_query->have_posts()) {
                            $product_query->the_post();

                            bigmart_content_product($img_size);
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </ul>
            </div>
        </div>    
        <?php
    }

    /** Query Arguments */
    protected function get_query_args($product_cats) {
        $settings = $this->get_settings_for_display();
        $no_of_products = ( $settings['products_no_of_products']['size'] ) ? $settings['products_no_of_products']['size'] : 4;
        $orderby = ( $settings['products_orderby'] ) ? $settings['products_orderby'] : 'none';
        $order = ( $settings['products_order'] ) ? $settings['products_order'] : 'DESC';

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $no_of_products,
            'orderby' => $orderby,
            'order' => $order,
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $product_cats,
                ),
            ),
        );

        return $args;
    }

    /** Render Header */
    protected function render_header() {
        $settings = $this->get_settings();
        $this->add_render_attribute('header_attr', 'class', [
            'bm-header',
                ]
        );

        $link_open = $link_close = "";
        $target = $settings['header_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['header_link']['nofollow'] ? ' rel="nofollow"' : '';
        $header_tag = $settings['header_tag'] ? $settings['header_tag'] : 'h2';

        if ($settings['header_link']['url']) {
            $link_open = '<a href="' . $settings['header_link']['url'] . '"' . $target . $nofollow . '>';
            $link_close = '</a>';
        }

        if ($settings['header_title']) {
            ?>
            <?php echo '<' . esc_attr($header_tag) . ' ' . $this->get_render_attribute_string('header_attr') . '>' ?>
            <?php
            echo wp_kses($link_open, array(
                'a' => array(
                    'target' => array(),
                    'rel' => array(),
                    'href' => array()
                )
            ));
            echo esc_html($settings['header_title']);
            echo wp_kses($link_close, array(
                'a' => array()
            ));
            ?>
            <?php echo '</' . esc_attr($header_tag) . '>'; ?>
            <?php
        }
    }

}
