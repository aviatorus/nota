<?php # -*- coding: utf-8 -*-
/**
 * Translation object
 *
 * @version 2014.09.22
 * @author  Inpsyde GmbH, toscho
 * @license GPL
 */
class Mlp_Translation implements Mlp_Translation_Interface {

	/**
	 * @type Mlp_Language_Interface
	 */
	private $language;

	/**
	 * @type Mlp_Url_Interface
	 */
	private $remote_url = '';

	/**
	 * @type Mlp_Url_Interface
	 */
	private $icon_url = '';

	/**
	 * @type int
	 */
	private $source_site_id = 0;

	/**
	 * @type int
	 */
	private $target_site_id = 0;

	/**
	 * @type string
	 */
	private $page_type = '';

	/**
	 * @type int
	 */
	private $target_content_id;

	/**
	 * @type string
	 */
	private $target_title;

	/**
	 * @param array        $params
	 * @param Mlp_Language_Interface $language
	 */
	public function __construct( Array $params, Mlp_Language_Interface $language ) {

		$this->source_site_id    = $params['source_site_id'];
		$this->target_site_id    = $params['target_site_id'];
		$this->target_content_id = $params['target_content_id'];
		$this->target_title      = $params['target_title'];
		$this->remote_url        = $params['target_url'];
		$this->page_type         = $params['type'];
		$this->icon_url          = $params['icon'];
		$this->language          = $language;
	}

	/**
	 * @return Mlp_Language_Interface
	 */
	public function get_language() {

		return $this->language;
	}

	/**
	 * @return int
	 */
	public function get_target_content_id() {

		return $this->target_content_id;
	}

	/**
	 * @return string
	 */
	public function get_target_title() {

		return $this->target_title;
	}

	/**
	 * @return Mlp_Url_Interface
	 */
	public function get_icon_url() {

		return $this->icon_url;
	}

	/**
	 * @return string
	 */
	public function get_page_type() {

		return $this->page_type;
	}

	/**
	 * @return string
	 */
	public function get_remote_url() {

		return apply_filters(
			'mlp_linked_element_link',
			(string) $this->remote_url,
			$this->get_target_site_id(),
			$this->get_target_content_id()
		);
	}

	/**
	 * @return int
	 */
	public function get_source_site_id() {

		return $this->source_site_id;
	}

	/**
	 * @return int
	 */
	public function get_target_site_id() {

		return $this->target_site_id;
	}
}