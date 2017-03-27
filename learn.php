<?php

class SiteOrigin_Learn_Dialog {

	private $courses;
	const SUBMIT_URL = 'https://siteorigin.com/wp-admin/admin-ajax.php?action=course_signup_submit';

	function __construct(){
		$this->courses = array();
		add_action( 'admin_footer', array( $this, 'admin_footer' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
	}

	public static function single() {
		static $single;
		return empty( $single ) ? $single = new self() : $single;
	}

	/**
	 * Add a course that we might display
	 *
	 * @param $id
	 * @param $data
	 */
	public function add_course( $id, $data ) {
		$this->courses[$id] = $data;
	}

	/**
	 * Get all the available courses
	 *
	 * @return mixed|void
	 */
	public function get_courses(){
		return apply_filters( 'siteorigin_learn_courses', $this->courses );
	}

	/**
	 * Add the dialog to the footer when this is setup
	 */
	public function admin_footer(){
		include plugin_dir_path( __FILE__ ) . 'tpl/dialog.php';
	}

	public function enqueue_scripts(){
		wp_enqueue_script( 'siteorigin-learn', plugin_dir_url( __FILE__ ) . 'js/learn.js', array( 'jquery' ), false, true );
		wp_enqueue_style( 'siteorigin-learn', plugin_dir_url( __FILE__ ) . 'css/learn.css', array( ) );

		wp_localize_script( 'siteorigin-learn', 'soLearn', array(
			'courses' => $this->get_courses(),
		) );
	}

	public static function get_youtube_iframe( $video_id ) {
		return '<iframe src="https://www.youtube.com/embed/' . urlencode( $video_id ) . '?ecver=2&autoplay=1" width="640" height="360" frameborder="0" style="width:100%;height:100%;" allowfullscreen></iframe>';
	}
}
