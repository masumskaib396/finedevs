<?php 
// Add Alignment Feature on counter
add_action('elementor/element/counter/section_title/after_section_end', function ($element, $args) {
    // add a control
    $element->start_controls_section(
        'section_extra',
        [
            'label' => __('Industy Extra Style', 'industy'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );
    $element->add_responsive_control(
        'counter_align',
        [
            'label' => __('Counter Alignment', 'industy'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'start' => [
                    'title' => __('Left', 'industy'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'industy'),
                    'icon' => 'eicon-text-align-center',
                ],
                'flex-end' => [
                    'title' => __('Right', 'industy'),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-counter .elementor-counter-number-wrapper ' => 'justify-content: {{VALUE}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'title_align',
        [
            'label' => __('Title Alignment', 'industy'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', 'industy'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'industy'),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __('Right', 'industy'),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => __('Justified', 'industy'),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-counter .elementor-counter-title ' => 'text-align: {{VALUE}};',
            ],
        ]
    );
   
    $element->add_responsive_control(
        'counter_gap',
        [
            'label'      => __('Counter Gap', 'finisys'),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors'  => [
                '{{WRAPPER}} .elementor-counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                'body.rtl {{WRAPPER}} .elementor-counter-title' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
            ],
        ],
    );

    $element->start_controls_tabs(
        'counter_tabs'
    );
        $element->start_controls_tab(
            'counter_normal',
            [
                'label' => __('Normal', 'shadepro-ts'),
            ]
        );
        $element->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'counter_border',
                'selector'  => '{{WRAPPER}} .elementor-counter',
                'separator' => 'after',
            ]
        );
        $element->end_controls_tab();

        $element->start_controls_tab(
            'counter_hover',
            [
                'label' => __('Hover', 'shadepro-ts'),
            ]
        );
        $element->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'counter_border_hover',
                'selector'  => '{{WRAPPER}} .elementor-counter:hover',
                'separator' => 'before',
            ]
        );
        $element->end_controls_tab();
    $element->end_controls_tabs();
    

    $element->end_controls_section();
}, 10, 2);