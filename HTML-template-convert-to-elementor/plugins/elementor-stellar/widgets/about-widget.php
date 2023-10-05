<?php
class Elementor_About_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'about';
    }

    public function get_title()
    {
        return esc_html__('About Stellar', 'elementor-stellar');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hello', 'world'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-stellar'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Ipsum sed adipiscing', 'elementor-stellar'),
                'placeholder' => esc_html__('Type your title here', 'elementor-stellar'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Default description', 'elementor-stellar'),
                'placeholder' => esc_html__('Type your description here', 'elementor-stellar'),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Content Tab End


        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'elementor-stellar'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <section id="intro" class="main">
            <div class="spotlight">
                <div class="content">
                    <?php if ($settings['title']) { ?>
                        <header class="major">
                            <h2><?php echo $settings['title']; ?></h2>
                        </header>
                    <?php } ?>
                    <?php if ($settings['description']) { ?>
                        <p><?php echo $settings['description']; ?></p>
                    <?php } ?>
                    <ul class="actions">
                        <li><a href="<?php echo $settings['link']; ?>" class="button"><?php esc_html_e('Learn More', 'elementor-stellar'); ?></a></li>
                    </ul>
                </div>
                <span class="image"><img src="<?php echo $settings['image']['url']; ?>" alt="" /></span>
            </div>
        </section>

<?php
    }
}
