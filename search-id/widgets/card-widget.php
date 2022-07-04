<?php 

 if (! defined ('ABSPATH')) {
    exit; // Exit if accessed directly.
 }

 /**
  * Search ID
  *
  * Search any post by the ID
  *
  * @since 1.0.0
  */

  class Essential_Elementor_Card_Widget extends \Elementor\Widget_Base {

	public function get_script_depends() {

		wp_register_script( 'widget-script-1', plugins_url( 'assets/js/main.js', __FILE__ ) );

		return [
			'widget-script-1'
		];

	}

	public function get_style_depends() {

		wp_register_style( 'widget-style-1', plugins_url( 'assets/css/style.css', __FILE__ ) );

		return [
			'widget-style-1'
		];

	}

    public function get_name() {
		return 'Search ID';
	}

	public function get_title() {
		return esc_html__( 'Search ID', 'search-id' );
	}

	public function get_icon() {
		return 'eicon-search';
	}

	public function get_custom_help_url() {
		return '';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'search', 'id' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'search-id' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title','search-id'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'search-id' ),
			]
		);

		$this->add_control(
			'card_description',
			[
				'label' => esc_html__('Card Description','search-id'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your description goes here', 'search-id' ),
			]
		);


		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$card_title = $settings['title'];

		?>

		<!-- Start rendering the output -->
        <div class="card">

				<?php

						if(isset($_POST['post-id'])){
							$post_id = $_POST['post-id'];
							?> 
							<h1 class="card_title"><?php echo $card_title;  ?></h1>
							<div id="results-form">
								<p>
									The post title for the ID <?php echo $post_id ?> is: <i> <span id="id-numb"><?php echo get_the_title($post_id); ?></span></i>
								</p>
								<div>
									<button onclick="results.refresh()" id="btn-2">Search other post</button>
								</div>
							</div>
							<?php
						}
						else { ?>
							<h1 class="card_title"><?php echo $card_title;  ?></h1>
							<div id="search-form">
								<span>What is the post ID?</span>
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div>
												<input type="text" id="post-id" name="post-id" value="<?php echo $post_id ?>">
										</div>
										<div>
											<button onclick="results.refresh()" class="btn">Search other post</button>
										</div>
									</form>
							</div>
						<?php }
						?>
        </div>
        <!-- End rendering the output -->

		<?php
	}

	protected function content_template() {

	}
  }