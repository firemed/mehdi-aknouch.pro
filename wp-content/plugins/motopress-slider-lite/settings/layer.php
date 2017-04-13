<?php
/** @var MPSLSlideOptions $this */
$sliderType = $this->getSliderType();

$result =  array(
    'general' => array(
        'title' => __('Layer General Parameters', 'motopress-slider-lite'),
        'icon' => null,
        'description' => '',
        'options' => array(
            'type' => array(
                'type' => 'select',
                'default' => 'html',
                'list' => array(
                    'html' => 'html',
                    'image' => 'image',
                    'button' => 'button',
                    'video' => 'video'
                ),
                'hidden' => true
            ),
//	        'id' => array(
//                'type' => 'text',
//                'default' => 0,
//                'hidden' => true
//            ),
//            'order' => array(
//                'type' => 'number',
//                'default' => 0,
//                'hidden' => true
//            ),
//            'style' => array(
//                'type' => 'select',
//                'label' => __('Style', 'motopress-slider-lite'),
//                'description' => __('Choose style', 'motopress-slider-lite'),
//                'default' => 'green',
//                'disabled' => false,
//                'list' => array(
//                    'red' => __('Red', 'motopress-slider-lite'),
//                    'blue' => __('Blue', 'motopress-slider-lite'),
//                    'green' => __('Green', 'motopress-slider-lite'),
//                )
//            ),
//            'alt' => array(
//                'type' => 'text',
//                'label' => __('Alt Text', 'motopress-slider-lite'),
//                'default' => '',
//                'dependency' => array(
//                    'parameter' => 'style',
//                    'value' => 'green'
//                )
//            ),

            'align' => array(
                'type' => 'align_table',
                'default' => array(
                    'vert' => 'middle',
                    'hor' => 'center'
                ),
                'options' => array(
                    'vert_align' => array(
                        'type' => 'hidden',
                        'default' => 'middle'
                    ),
                    'hor_align' => array(
                        'type' => 'hidden',
                        'default' => 'center'
                    ),
                    'offset_x' => array(
                        'type' => 'number',
                        'default' => 0,
                        'label2' => __('X:', 'motopress-slider-lite')
                    ),
                    'offset_y' => array(
                        'type' => 'number',
                        'default' => 0,
                        'label2' => __('Y:', 'motopress-slider-lite')
                    )
                )
            ),

            'start_animation' => $this->getOptionsByType('start', 'animation', false),
            'start_timing_function' => $this->getOptionsByType('start', 'easings', false),
            'start_duration' => $this->getOptionsByType('start', 'duration', false),
            'end_animation' => $this->getOptionsByType('end', 'animation', false),
            'end_timing_function' => $this->getOptionsByType('end', 'easings', false),
            'end_duration' => $this->getOptionsByType('end', 'duration', false),

            'start_animation_group' => array(
                'type' => 'animation_control',
                'id' => 'start_animation_btn',
                'animation_type' => 'start',
                'text' => __('Edit', 'motopress-slider-lite'),
                'skip' => true,
                'skipChild' => true,
                'options' => array(
                    'start_duration_clone' => $this->getOptionsByType('start', 'duration', true),
                    'start_timing_function_clone' => $this->getOptionsByType('start', 'easings',true),
                    'start_animation_clone' => $this->getOptionsByType('start', 'animation', true),
                ),
            ),
            'end_animation_group' => array(
                'type' => 'animation_control',
                'id' => 'end_animation_btn',
                'animation_type' => 'end',
                'text' => __('Edit', 'motopress-slider-lite'),
                'skip' => true,
                'skipChild' => true,
                'options' => array(
                    'end_duration_clone' => $this->getOptionsByType('end','duration', true),
                    'end_timing_function_clone' => $this->getOptionsByType('end', 'easings', true),
                    'end_animation_clone' => $this->getOptionsByType('end', 'animation', true),
                ),
            ),


            'start' => array(
                'type' => 'number',
                'label2' => __('Display at (ms): ', 'motopress-slider-lite'),
                'default' => 1000,
                'min' => 0,
//                'max' => 9000,
            ),
            'end' => array(
                'type' => 'number',
                'label2' => __('Hide at (ms): ', 'motopress-slider-lite'),
                'default' => 0,
                'min' => 0
            ),
            'text' => array(
                'type' => 'tiny_mce',
                'label' => __('Text/HTML', 'motopress-slider-lite'),
                'default' => __('lorem ipsum', 'motopress-slider-lite'),
                'plugins' => array(
                ),
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'html'
                )
            ),
            'button_text' => array(
                'type' => 'text',
                'label' => __('Button Text', 'motopress-slider-lite'),
                'default' => __('Button', 'motopress-slider-lite'),
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'button'
                )
            ),
            'button_link' => array(
                'type' => 'text',
                'label' => __('Link:', 'motopress-slider-lite'),
                'default' => '#',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'button'
                )
            ),
            'button_autolink' => array(
                'type' => 'action_group',
                'label' => __('To Post', 'motopress-slider-lite'),
                'default' => '',
                'list' => array(
                    'permalink' => __('#link to post', 'motopress-slider-lite')
                ),
	            'actions' => array(
                    'permalink' => array(
                        'button_link' => '%permalink%',
                    ),
                ),
                'classes' => 'button-link',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'button'
                )
            ),
            'button_target' => array(
                'type' => 'checkbox',
                'label2' => __('Open in new window', 'motopress-slider-lite'),
                'default' => 'false',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'button'
                )
            ),
            'image_id' => array(
                'type' => 'library_image',
//                'label2' => __('Image', 'motopress-slider-lite'),
                'default' => '',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                ),
                'helpers' => array('image_url'),
                'button_label' => __('Select Image', 'motopress-slider-lite'),
                'select_label' => __('Select Image', 'motopress-slider-lite')
            ),
            'image_url' => array(
                'type' => 'hidden',
                'default' => '',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                ),
            ),
	        'image_link' => array(
                'type' => 'text',
                'label' => __('Link:', 'motopress-slider-lite'),
                'default' => '',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                )
            ),
            'image_target' => array(
                'type' => 'checkbox',
                'label2' => __('Open in new window', 'motopress-slider-lite'),
                'default' => 'false',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                )
            ),
            'image_autolink' => array(
                'type' => 'action_group',
                'label' => __('To Post', 'motopress-slider-lite'),
                'default' => '',
                'list' => array(
                    'permalink' => __('#link to post', 'motopress-slider-lite')
                ),
                'actions' => array(
                    'permalink' => array(
                        'image_link' => '%permalink%',
                    ),
                ),
                'classes' => 'button-link',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                )
            ),

            'video_type' => array(
                'type' => 'button_group',
                'default' => 'youtube',
                'list' => array(
                    'youtube' => __('Youtube', 'motopress-slider-lite'),
                    'vimeo' => __('Vimeo', 'motopress-slider-lite'),
                    'html' => __('Media Library', 'motopress-slider-lite')
                ),
                'button_size' => 'large',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
//            'video_id' => array(
//                'type' => 'library_video',
//                'default' => '',
//                'dependency' => array(
//                    'parameter' => 'video_type',
//                    'value' => 'html'
//                ),
//                'button_label' => __('Select Video', 'motopress-slider-lite')
//            ),
            'video_src_mp4' => array(
                'type' => 'text',
                'default' => '',
                'label' => __('Source MP4: ', 'motopress-slider-lite'),
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'html'
                )
            ),
            'video_src_webm' => array(
                'type' => 'text',
                'default' => '',
                'label' => __('Source WEBM: ', 'motopress-slider-lite'),
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'html'
                )
            ),
            'video_src_ogg' => array(
                'type' => 'text',
                'default' => '',
                'label' => __('Source OGG: ', 'motopress-slider-lite'),
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'html'
                )
            ),
            'youtube_src' => array(
                'type' => 'text',
                'default' => '',
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'youtube'
                )
            ),
            'vimeo_src' => array(
                'type' => 'text',
                'default'=> '',
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'vimeo'
                )
            ),
            'video_preview_image' => array(
                'type' => 'text',
                'default' => '',
                'label' => __('Preview Image URL:', 'motopress-slider-lite'),
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
            'video_width' => array(
                'type' => 'number',
                'label2' => 'width',
                'default' => 1,
//                'min' => 1,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
            'video_height' => array(
                'type' => 'number',
                'label2' => 'height',
                'default' => 1,
//                'min' => 1,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
            'video_autoplay' => array(
                'type' => 'checkbox',
                'label' => __('Autoplay', 'motopress-slider-lite'),
                'default' => false,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
//            'video_loop' => array(
//                'type' => 'select',
//                'label' => __('Loop', 'motopress-slider-lite'),
//                'default' => 'disabled',
//                'list' => array(
//                    'disabled' => __('disabled', 'motopress-slider-lite'),
//                    'loop' => __('Loop', 'motopress-slider-lite')
//                ),
//                'dependency' => array(
//                    'parameter' => 'type',
//                    'value' => 'video'
//                )
//            ),
            'video_loop' => array(
                'type' => 'checkbox',
                'label' => __('Loop', 'motopress-slider-lite'),
                'default' => false,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
            'video_html_hide_controls' => array(
                'type' => 'checkbox',
                'label' => __('Hide Controls', 'motopress-slider-lite'),
                'default' => false,
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'html'
                )
            ),
            'video_youtube_hide_controls' => array(
                'type' => 'checkbox',
                'label' => __('Hide Controls', 'motopress-slider-lite'),
                'default' => false,
                'dependency' => array(
                    'parameter' => 'video_type',
                    'value' => 'youtube'
                )
            ),
            'video_mute' => array(
                'type' => 'checkbox',
                'label' => __('Mute', 'motopress-slider-lite'),
                'default' => false,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
            'video_disable_mobile' => array(
                'type' => 'checkbox',
                'label' => __('Disable Mobile', 'motopress-slider-lite'),
                'default' => false,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'video'
                )
            ),
            'width' => array(
                'type' => 'number',
                'label2' => __('width:', 'motopress-slider-lite'),
//                'default' => 300,
                'default' => '',
                'min' => 1,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                )
            ),
            'html_width' => array(
                'type' => 'number',
                'label2' => __('width:', 'motopress-slider-lite'),
                'default' => '',
                'min' => 1,
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'html'
                )
            ),
            'white-space' => array(
                'type' => 'select',
                'label' => __('Whitespace:', 'motopress-slider-lite'),
                'default' => 'normal',
                'list' => array(
	                'normal' => 'Normal',
	                'nowrap' => 'No-wrap'
                ),
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'html'
                )
            ),
            'preset' => array(
                'type' => 'style_editor',
                'label2' => __('Style: ', 'motopress-slider-lite'),
                'edit_label' => __('Edit', 'motopress-slider-lite'),
                'remove_label' => __('Remove', 'motopress-slider-lite'),
	            'helpers' => array('private_styles'),
	            'default' => '',
            ),
            'private_preset_class' => array(
                'type' => 'hidden',
                'default' => ''
            ),
            'private_styles' => array(
                'type' => 'multiple',
                'default' => array() // JSON
            ),
	        'classes' => array(
                'type' => 'text',
                'label2' => __('CSS Classes: ', 'motopress-slider-lite'),
                'default' => ''
            ),
	        'image_link_classes' => array(
                'type' => 'text',
                'label2' => __('Link Custom Classes: ', 'motopress-slider-lite'),
                'default' => '',
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'image'
                )
            ),

	        // Deprecated
	        'html_style' => array(
                'type' => 'select',
                'label' => __('Theme Styles (deprecated)', 'motopress-slider-lite'),
                'default' => '',
                'list' => array(
                    '' => __('none', 'motopress-slider-lite'),
                    'mpsl-header-dark' => __('Header Dark', 'motopress-slider-lite'),
                    'mpsl-header-white' => __('Header White', 'motopress-slider-lite'),
                    'mpsl-sub-header-dark' => __('Sub-Header Dark', 'motopress-slider-lite'),
                    'mpsl-sub-header-white' => __('Sub-Header White', 'motopress-slider-lite'),
                    'mpsl-text-dark' => __('Text Dark', 'motopress-slider-lite'),
                    'mpsl-text-white' => __('Text White', 'motopress-slider-lite'),
                ),
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'html'
                )
            ),
            'button_style' => array(
                'type' => 'select',
                'label' => __('Theme Styles (deprecated)', 'motopress-slider-lite'),
                'default' => '',
                'list' => array(
                    '' => __('none', 'motopress-slider-lite'),
                    'mpsl-button-blue' => __('Button Blue', 'motopress-slider-lite'),
                    'mpsl-button-green' => __('Button Green', 'motopress-slider-lite'),
                    'mpsl-button-red' => __('Button Red', 'motopress-slider-lite')
                ),
                'dependency' => array(
                    'parameter' => 'type',
                    'value' => 'button'
                )
            ),

        )
    ),
);

if ($sliderType === 'custom') {
    unset($result['general']['options']['button_autolink']);
    unset($result['general']['options']['image_autolink']);

} else { // post | woocommerce
	$result['general']['options']['text']['default'] = '%title%';
}

return $result;
