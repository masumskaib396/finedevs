<?php

namespace Finestdevs\Addons;

// Elementor Classes
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) exit; // If this file is called directly, abort.



class Finestdevs_Changelogs extends Widget_Base
{

	public function get_name()
	{
		return 'fsd-changelog';
	}

	public function get_title()
	{
		return esc_html__('Changelog','finestdevs',);
	}

	public function get_icon()
	{
		return 'eicon-history';
	}

	public function get_categories()
	{
		return ['finestdevs'];
	}

	protected function _register_controls()
	{

		/**
		 * Master Headlines Content Section
		 */
		$this->start_controls_section(
			'finestdevs_changelog_content',
			[
				'label' => esc_html__('Changelog Content','finestdevs',),
			]
		);

		$this->add_control(
			'finestdevs_changelog_heading',
			[
				'label' => esc_html__('Heading','finestdevs',),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('1.1.1 [20th March 2021]','finestdevs',),
			]
		);



		$this->add_control(
			'finestdevs_changelog_sub_title',
			[
				'label'   => esc_html__('Sub Heading','finestdevs',),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Added',
			]
		);
		$repeater = new Repeater();



		$repeater->add_control(
			'finestdevs_changelog_title',
			[
				'label'   => esc_html__('Title','finestdevs',),
				'type'    => Controls_Manager::SELECT,
				'default' => 'Fixed',
				'options' => [
					'Added'  => esc_html__('Added','finestdevs',),
					'Fixed' => esc_html__('Fixed','finestdevs',),
					'Updated' => esc_html__('Updated','finestdevs',),
					'Removed' => esc_html__('Removed','finestdevs',),
					'Changed' => esc_html__('Changed','finestdevs',),
				]
			]
		);
		$repeater->add_control(
			'finestdevs_changelog_content',
			[
				'label'                 => __('Content','finestdevs',),
				'type'                  => Controls_Manager::TEXTAREA,
				'default'               => __(
					'Changelog Contents. If you want to link them, enable option below.','finestdevs'
				),
				'dynamic'               => [
					'active'   => true,
				],
			]
		);
		$this->add_control(
			'changelog_tabs',
			[
				'type'                  => Controls_Manager::REPEATER,
				'default'               => [
					['finestdevs_changelog_title' => esc_html__('Added','finestdevs',)],
					['finestdevs_changelog_title' => esc_html__('Fixed','finestdevs',)],
				],
				'fields' 				=> $repeater->get_controls(),
				'title_field'           => '{{finestdevs_changelog_title}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'headding_section',
			[
				'label' => __( 'Heading > Sub Heading', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		/* 
		* Headding
		*/
		$this->add_control(
			'headding_color',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '#333333',
				'selectors'	=> [
					'{{WRAPPER}} .changelog-heading' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'headding_typo',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .changelog-heading',
			]
		);
		$this->add_responsive_control(
			'headding_margin',
			[
				'label'                 => esc_html__('Margin','finestdevs'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', 'em', '%'],
				'selectors'             => [
					'{{WRAPPER}} .changelog-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'sub_headding_options',
			[
				'label' => __( 'Sub Headding Style', 'finestdevs' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		/* 
		* Sub Headding
		*/
		$this->add_control(
			'sub_headding_color',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '#333333',
				'selectors'	=> [
					'{{WRAPPER}} .changelog-sub-headding' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'sub_headding_typo',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .changelog-sub-headding',
			]
		);
		$this->add_responsive_control(
			'sub_headding_margin',
			[
				'label'                 => esc_html__('Margin','finestdevs'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', 'em', '%'],
				'selectors'             => [
					'{{WRAPPER}} .changelog-sub-headding' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'discription_section',
			[
				'label' => __( 'Discription', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		/* 
		* Discription
		*/
		$this->add_control(
			'discription_color',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '#333333',
				'selectors'	=> [
					'{{WRAPPER}} .finedev-content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'discription_typo',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-content',
			]
		);
		$this->add_responsive_control(
			'discription_margin',
			[
				'label'                 => esc_html__('Margin','finestdevs'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', 'em', '%'],
				'selectors'             => [
					'{{WRAPPER}} .finedev-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		/* 
		* Label 
		*/
		$this->start_controls_section(
			'log_label _section',
			[
				'label' => __( 'Label', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'log_label_typo',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'                  => 'log_label_border',
				'label'                 => esc_html__('Border','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label',
			]
		);
		$this->add_responsive_control(
			'finedev_changelog_align',
			array(
				'label'       => __('Alignment','finestdevs',),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => array(
					'flex-start' => array(
						'title' => __('Top','finestdevs',),
						'icon' => 'eicon-h-align-top',
					),
					'center' => array(
						'title' => __('Center','finestdevs',),
						'icon' => 'eicon-h-align-cnter',
					),
					'flex-end' => array(
						'title' => __('Bottom','finestdevs',),
						'icon' => 'eicon-h-align-bottom',
					)
				),
				'toggle'      => true,
				'selectors'   => array(
					'{{WRAPPER}} .finedev-changelog ul li' => 'align-items: {{VALUE}};',
				)
			)
		);
		$this->add_responsive_control(
			'log_label_border_radius',
			[
				'label'                 => esc_html__('Border Radius','finestdevs'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', 'em', '%'],
				'selectors'             => [
					'{{WRAPPER}} .finedev-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'log_label_margin',
			[
				'label'                 => esc_html__('Margin','finestdevs'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', 'em', '%'],
				'selectors'             => [
					'{{WRAPPER}} .finedev-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'log_label_padding',
			[
				'label'                 => esc_html__('Padding','finestdevs'),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => ['px', 'em', '%'],
				'selectors'             => [
					'{{WRAPPER}} .finedev-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		
		/* 
		 Added 
		*/
		$this->start_controls_section(
			'label_style_section_added',
			[
				'label' => __( 'Added', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'label_color_added',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-added' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'label_bg_color_added',
			[
				'label'                 => esc_html__('Background Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-added' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'label_typo_added',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label.finedev-added',
			]
		);

		$this->end_controls_section();
		/* 
		 Fixed 
		*/
		$this->start_controls_section(
			'label_style_fixed',
			[
				'label' => __( 'Fixed', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'label_color_fixed',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-fixed' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'label_bg_color_fixed',
			[
				'label'                 => esc_html__('Background Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-fixed' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'label_typo_fixed',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label.finedev-fixed',
			]
		);
		$this->end_controls_section();

		/* 
		 Updated 
		*/
		$this->start_controls_section(
			'label_style_section_update',
			[
				'label' => __( 'Update', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'label_color_updated',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-updated' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'label_bg_color_updated',
			[
				'label'                 => esc_html__('Background Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-updated' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'label_typo_updated',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label.finedev-updated',
			]
		);
		$this->end_controls_section();

		/* 
		 Removed 
		*/
		$this->start_controls_section(
			'label_style_section_removed',
			[
				'label' => __( 'Removed', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'label_color_removed',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-removed' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'label_bg_color_removed',
			[
				'label'                 => esc_html__('Background Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-removed' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'label_typo_removed',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label.finedev-removed',
			]
		);
		$this->end_controls_section();

		/* 
		 Changed 
		*/
		$this->start_controls_section(
			'label_style_section_changed',
			[
				'label' => __( 'Changed', 'finestdevs' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'label_color_changed',
			[
				'label'                 => esc_html__('Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-changed' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'label_bg_color_changed',
			[
				'label'                 => esc_html__('Background Color','finestdevs'),
				'type'                  => Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .finedev-label.finedev-changed' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'label_typo_changed',
				'label'                 => esc_html__('Typography','finestdevs'),
				'selector'              => '{{WRAPPER}} .finedev-label.finedev-changed',
			]
		);
		$this->end_controls_section();




	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
	?>
		<div id="finedev-changelog-<?php echo esc_attr($this->get_id()); ?>" class="finedev-changelog">
			<?php if ($settings['finestdevs_changelog_heading']) { ?>
				<h2 class="changelog-heading"><?php echo $settings['finestdevs_changelog_heading']; ?></h2>
			<?php } ?>

			<?php if ($settings['finestdevs_changelog_sub_title']) { ?>
				<h3 class="changelog-sub-headding"><?php echo $settings['finestdevs_changelog_sub_title']; ?></h3>
			<?php } ?>

			<?php foreach ($settings['changelog_tabs'] as $index => $tab) { ?>
				<ul>
					<li>
						<div class="finedev-label finedev-<?php echo strtolower($tab['finestdevs_changelog_title']); ?>">
							<?php echo $tab['finestdevs_changelog_title']; ?>
						</div>
						
						<div class="finedev-content finedev-<?php echo strtolower($tab['finestdevs_changelog_title']); ?>">
							<?php echo finedev_get_meta($tab['finestdevs_changelog_content']); ?>
						</div>
					</li>
				</ul>

			<?php } ?>
		</div>
	<?php
	}
}
$widgets_manager->register_widget_type( new Finestdevs_Changelogs() );