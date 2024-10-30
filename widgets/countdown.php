<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Bigmart_Countdown_Widget extends Widget_Base {

    /** Widget Name * */
    public function get_name() {
        return 'bm-countdown';
    }

    /** Widget Title * */
    public function get_title() {
        return esc_html__('Countdown', 'bigmart-elements');
    }

    /** Widget Icon * */
    public function get_icon() {
        return 'eicon-countdown';
    }

    /** Categories * */
    public function get_categories() {
        return ['bigmart-elements'];
    }

    /** Widget Controls * */
    protected function register_controls() {

        $this->start_controls_section(
                'countdown_content_section', [
            'label' => __('Countdown', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'layout', [
            'label' => __('Layout', 'bigmart-elements'),
            'type' => Controls_Manager::SELECT,
            'default' => 'calender',
            'options' => [
                'calender' => __('Calender', 'bigmart-elements'),
                'boxer' => __('Boxer', 'bigmart-elements'),
                'circle' => __('Circular', 'bigmart-elements'),
                'simple' => __('Simple', 'bigmart-elements'),
            ],
                ]
        );

        $this->add_control(
                'countdown_date', [
            'label' => __('Countdown Date', 'bigmart-elements'),
            'type' => Controls_Manager::DATE_TIME,
            'placeholder' => '2020-11-21 12:00'
                ]
        );

        $this->add_control(
                'countdown_align', [
            'label' => __('Alignment', 'bigmart-elements'),
            'type' => Controls_Manager::CHOOSE,
            'options' => [
                'flex-start' => [
                    'title' => __('Left', 'bigmart-elements'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'bigmart-elements'),
                    'icon' => 'eicon-text-align-center',
                ],
                'flex-end' => [
                    'title' => __('Right', 'bigmart-elements'),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',
            'toggle' => true,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown' => 'justify-content: {{VALUE}}'
            ]
                ]
        );

        $this->add_control(
                'complete_msg', [
            'label' => __('Completion Message', 'bigmart-elements'),
            'description' => __('Message to display after countdown complettion', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Sale Offer Expired', 'bigmart-elements'),
            'separator' => 'before'
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'countdown_additional_settings', [
            'label' => __('Countdown', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_CONTENT,
                ]
        );

        $this->add_control(
                'show_year', [
            'label' => __('Show Year', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'no',
                ]
        );

        $this->add_control(
                'year_text', [
            'label' => __('Year Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Years', 'bigmart-elements'),
            'condition' => [
                'show_year' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'show_month', [
            'label' => __('Show Month', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'no',
                ]
        );

        $this->add_control(
                'month_text', [
            'label' => __('Month Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Months', 'bigmart-elements'),
            'condition' => [
                'show_month' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'show_week', [
            'label' => __('Show Week', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'no',
                ]
        );

        $this->add_control(
                'week_text', [
            'label' => __('Week Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Weeks', 'bigmart-elements'),
            'condition' => [
                'show_week' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'show_day', [
            'label' => __('Show Day', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'day_text', [
            'label' => __('Day Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Days', 'bigmart-elements'),
            'condition' => [
                'show_day' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'show_hours', [
            'label' => __('Show Hour', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'hour_text', [
            'label' => __('Hour Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Hours', 'bigmart-elements'),
            'condition' => [
                'show_hours' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'show_minutes', [
            'label' => __('Show Minutes', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'minute_text', [
            'label' => __('Minute Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Minutes', 'bigmart-elements'),
            'condition' => [
                'show_minutes' => 'yes'
            ]
                ]
        );

        $this->add_control(
                'show_seconds', [
            'label' => __('Show Seconds', 'bigmart-elements'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bigmart-elements'),
            'label_off' => __('No', 'bigmart-elements'),
            'return_value' => 'yes',
            'default' => 'yes',
                ]
        );

        $this->add_control(
                'second_text', [
            'label' => __('Seconds Text', 'bigmart-elements'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Seconds', 'bigmart-elements'),
            'condition' => [
                'show_seconds' => 'yes'
            ]
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'label_style', [
            'label' => __('Label', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'label_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown ul li .label' => 'color: {{VALUE}}',
            ],
                ]
        );

        $this->add_control(
                'label_bgcolor', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown ul li .label' => 'background-color: {{VALUE}}',
            ],
            'condition' => [
                'layout!' => ['simple', 'circle']
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'label_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-countdown ul li .label',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'counter_style', [
            'label' => __('Counter', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'counter_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown ul li .value' => 'color: {{VALUE}}'
            ],
                ]
        );

        $this->add_control(
                'counter_bgcolor', [
            'label' => __('Background Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown ul li .value' => 'background-color: {{VALUE}}',
                '{{WRAPPER}} .bm-countdown.circle ul li .value:before' => 'border-color: {{VALUE}}'
            ],
            'condition' => [
                'layout!' => 'simple'
            ]
                ]
        );

        $this->add_control(
                'counter_bordercolor', [
            'label' => __('Border Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown.calender ul li, {{WRAPPER}} .bm-countdown.boxer ul li, {{WRAPPER}} .bm-countdown.circle ul li .value' => 'border: 1px solid {{VALUE}}',
            ],
            'condition' => [
                'layout!' => 'simple'
            ]
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'counter_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-countdown ul li .value',
                ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
                'completion_msg_styles', [
            'label' => __('Completion Message', 'bigmart-elements'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'completion_color', [
            'label' => __('Color', 'bigmart-elements'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bm-countdown.complete' => 'color: {{VALUE}}'
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'completion_typography',
            'label' => __('Typography', 'bigmart-elements'),
            'selector' => '{{WRAPPER}} .bm-countdown.complete',
                ]
        );

        $this->end_controls_section();
    }

    /** Render Layout * */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $countdown_date = $settings['countdown_date'] ? $settings['countdown_date'] : '';
        $layout = $settings['layout'] ? $settings['layout'] : 'calender';
        $show_year = $settings['show_year'] == 'yes' ? true : false;
        $show_month = $settings['show_month'] == 'yes' ? true : false;
        $show_week = $settings['show_week'] == 'yes' ? true : false;
        $show_day = $settings['show_day'] == 'yes' ? true : false;
        $show_hours = $settings['show_hours'] == 'yes' ? true : false;
        $show_minutes = $settings['show_minutes'] == 'yes' ? true : false;
        $show_seconds = $settings['show_seconds'] == 'yes' ? true : false;

        $year_text = $settings['year_text'] ? $settings['year_text'] : esc_html__('Years', 'bigmart-elements');
        $month_text = $settings['month_text'] ? $settings['month_text'] : esc_html__('Months', 'bigmart-elements');
        $week_text = $settings['week_text'] ? $settings['week_text'] : esc_html__('Weeks', 'bigmart-elements');
        $day_text = $settings['day_text'] ? $settings['day_text'] : esc_html__('Days', 'bigmart-elements');
        $hour_text = $settings['hour_text'] ? $settings['hour_text'] : esc_html__('Hours', 'bigmart-elements');
        $minute_text = $settings['minute_text'] ? $settings['minute_text'] : esc_html__('Minutes', 'bigmart-elements');
        $second_text = $settings['second_text'] ? $settings['second_text'] : esc_html__('Seconds', 'bigmart-elements');
        $complete_msg = $settings['complete_msg'];

        $countdown_data = json_encode(array(
            'date' => $countdown_date,
            'layout' => esc_attr($layout),
            'complete_msg' => esc_html($complete_msg),
            'text' => array(
                'show_year' => $show_year,
                'show_month' => $show_month,
                'show_week' => $show_week,
                'show_day' => $show_day,
                'show_hours' => $show_hours,
                'show_minutes' => $show_minutes,
                'show_seconds' => $show_seconds,
                'year' => $year_text,
                'month' => $month_text,
                'week' => $week_text,
                'day' => $day_text,
                'hour' => $hour_text,
                'minute' => $minute_text,
                'second' => $second_text
            )
        ));
        if (!$countdown_date) {
            ?>
            <div class="bm-error"><?php esc_html_e('Set the valid countdown date', 'bigmart-elements'); ?></div>
            <?php
        }
        ?>
        <div
            class="bm-countdown <?php echo esc_attr($layout); ?>"
            id="bm-countdown-<?php echo esc_attr($this->get_id()); ?>"
            data-countdown="<?php echo esc_attr($countdown_data); ?>"
            ></div>
        <?php
    }

}
