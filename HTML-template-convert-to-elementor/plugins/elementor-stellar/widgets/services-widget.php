<?php
class Elementor_Services_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'services';
    }

    public function get_title()
    {
        return esc_html__('Services Stellar', 'elementor-stellar');
    }

    public function get_icon()
    {
        return 'eicon-wrench';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Title', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'service_content',
            [
                'label' => esc_html__('Content', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__('Icon class', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'show_label' => true,
            ]
        );

        $this->add_control(
            'service',
            [
                'label' => esc_html__('Services', 'elementor-stellar'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ service_title }}}',
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

        <section id="first" class="main special">
            <header class="major">
                <h2><?php echo $settings['title']; ?></h2>
            </header>
            <ul class="features">

                <?php $services = $settings['service'];
                foreach ($services as $service) { ?>
                    <li>
                        <span class="<?php echo $service['service_icon'] ?>"></span>
                        <h3><?php echo $service['service_title'] ?></h3>
                        <p><?php echo $service['service_content'] ?></p>
                    </li>

                <?php }
                ?>
            </ul>
            <footer class="major">
                <ul class="actions special">
                    <li><a href="<?php echo $settings['link']; ?>" class="button"><?php esc_html_e('Learn More', 'elementor-stellar'); ?></a></li>
                </ul>
            </footer>
        </section>

<?php
    }
}
