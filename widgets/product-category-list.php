<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

class Bigmart_Product_Category_List_Widget extends Widget_Base {

    /** Widget Name * */
    public function get_name() {
        return 'bm-product-category-list';
    }

    /** Widget Title * */
    public function get_title() {
        return esc_html__('Product Category List', 'bigmart-elements');
    }

    /** Widget Icon * */
    public function get_icon() {
        return 'eicon-post-list';
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
                'product_cat', [
            'label' => __('Product Category', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'options' => bigmart_elements_get_woo_categories()
                ]
        );

        $this->add_control(
                'no_of_products', [
            'label' => __('No. of products', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['no'],
            'range' => [
                'no' => [
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'no',
                'size' => 3,
            ],
                ]
        );

        $this->add_control(
                'orderby', [
            'label' => __('Order By', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'none',
            'options' => [
                'none' => __('None', 'bigmart-elements'),
                'ID' => __('ID', 'bigmart-elements'),
                'date' => __('Date', 'bigmart-elements'),
                'name' => __('Name', 'bigmart-elements'),
                'title' => __('Title', 'bigmart-elements'),
                'rand' => __('Random', 'bigmart-elements'),
                'comment_count' => __('Comment Count', 'bigmart-elements'),
            ],
                ]
        );

        $this->add_control(
                'order', [
            'label' => __('Order By', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
                'ASC' => __('Ascending', 'bigmart-elements'),
                'DESC' => __('Descending', 'bigmart-elements'),
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'additional_settings', [
            'label' => esc_html__('Additional Settings', 'bigmart-elements'),
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

        $this->add_control(
                'image_aheight', [
            'label' => __('Image Height', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'auto',
            'options' => [
                'auto' => __('Auto', 'bigmart-elements'),
                'custom' => __('Custom', 'bigmart-elements'),
            ],
                ]
        );

        $this->add_control(
                'image_width', [
            'label' => __('Width (px)', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 50,
                    'max' => 500,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 150,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list li .product-image' => 'width: {{SIZE}}{{UNIT}};',
            ]
                ]
        );

        $this->add_control(
                'image_height', [
            'label' => __('Height (px)', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 50,
                    'max' => 500,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 150,
            ],
            'condition' => [
                'image_aheight' => 'custom'
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list li .product-image' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after'
                ]
        );

        $this->add_control(
                'product_horizontal_gap', [
            'label' => __('Horizontal Gap', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 250,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 20,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_control(
                'product_vertical_gap', [
            'label' => __('Vertical Gap', 'bigmart-elements'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 250,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 20,
            ],
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list li .product-image' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
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
                '{{WRAPPER}} .bm-product-list .bm-header,{{WRAPPER}} .bm-product-list .bm-header a' => 'color: {{VALUE}}',
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
                '{{WRAPPER}} .bm-product-list .bm-header' => 'padding: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
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
                '{{WRAPPER}} .bm-product-list .bm-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'header_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-product-list .bm-header',
                ]
        );

        $this->add_control(
                'separator_color', [
            'label' => __('Separator Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .bm-header' => 'border-bottom-color: {{VALUE}}',
            ],
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'rating_style', [
            'label' => esc_html__('Rating', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'rating_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .star-rating span::before' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'rating_margin', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .star-rating' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
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
                '{{WRAPPER}} .bm-product-list .product-list .content h3 a' => 'color: {{VALUE}}',
            ],
                ]
        );
        
        $this->add_control(
                'title_hover_color', [
            'label' => __('Hover Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list .content h3 a:hover' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-product-list .product-list .content h3',
                ]
        );

        $this->add_control(
                'title_margin', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list .content h3' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
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
                '{{WRAPPER}} .bm-product-list .product-list .price' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'price_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-product-list .product-list .price',
                ]
        );

        $this->add_control(
                'price_margin', [
            'label' => __('Margin', 'bigmart-elements'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'allowed_dimensions' => 'vertical',
            'selectors' => [
                '{{WRAPPER}} .bm-product-list .product-list .price' => 'margin: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
            ],
                ]
        );

        $this->end_controls_section();
    }

    /** Render Layout * */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $term_id = isset($settings['product_cat']) ? $settings['product_cat'] : '';

        $args = $this->get_query_args($term_id);
        $image_size = $settings['image_size_size'] ? $settings['image_size_size'] : 'large';
        $product_query = new WP_Query($args);
        ?>
        <div class="bm-product-list" id="bm-product-list-<?php echo esc_attr($this->get_id()); ?>">
            <?php $this->render_header(); ?>

            <?php if ($product_query->have_posts()) : ?>
                <ul class="product-list">
                    <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                        <li class="product">
                            <div class="product-wrap">
                                <div class="product-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php
                                        $img = wp_get_attachment_image_src(get_post_thumbnail_id(), $image_size);
                                        ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr(bigmart_elements_get_altofimage(absint(get_post_thumbnail_id()))); ?>">
                                        </a>
                                    </div>
                                    <div class="content">

                                        <?php woocommerce_template_loop_rating(); ?>

                                        <h3>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <?php woocommerce_template_loop_price(); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <?php
    }

    /** Query Arguments */
    protected function get_query_args($term_id) {
        $settings = $this->get_settings_for_display();
        $no_of_products = ( $settings['no_of_products']['size'] ) ? $settings['no_of_products']['size'] : 4;
        $orderby = ( $settings['orderby'] ) ? $settings['orderby'] : 'none';
        $order = ( $settings['order'] ) ? $settings['order'] : 'DESC';

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $no_of_products,
            'orderby' => $orderby,
            'order' => $order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $term_id,
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
