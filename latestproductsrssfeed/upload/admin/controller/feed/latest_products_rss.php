<?php

class ControllerFeedLatestProductsRSS extends Controller {

    private $error = array();

    public function index() {

	$this->load->language('feed/latest_products_rss');
	$this->load->model('setting/setting');

	if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
	    $this->load->model('setting/setting');
	    $this->model_setting_setting->editSetting('latest_products_rss', $this->request->post);
	    $this->session->data['success'] = $this->language->get('text_success');
	    $this->redirect($this->url->link('extension/feed', 'token=' . $this->session->data['token'], 'SSL'));
	}

	$this->document->setTitle($this->language->get('heading_title'));

	$data['heading_title'] = $this->language->get('heading_title');
	$data['button_save'] = $this->language->get('button_save');
	$data['button_cancel'] = $this->language->get('button_cancel');
	$data['text_enabled'] = $this->language->get('text_enabled');
	$data['text_disabled'] = $this->language->get('text_disabled');

	$data['entry_status'] = $this->language->get('entry_status');
	$data['entry_data_feed'] = $this->language->get('entry_data_feed');
	$data['entry_limit'] = $this->language->get('entry_limit');
	$data['entry_show_image'] = $this->language->get('entry_show_image');
	$data['entry_show_price'] = $this->language->get('entry_show_price');
	$data['entry_include_tax'] = $this->language->get('entry_include_tax');

	$data['entry_image_size'] = $this->language->get('entry_image_size');
	
	$data['action'] = $this->url->link('feed/latest_products_rss', 'token=' . $this->session->data['token'], 'SSL');
	$data['cancel'] = $this->url->link('extension/feed', 'token=' . $this->session->data['token'], 'SSL');
	$data['data_feed'] = HTTP_CATALOG . 'index.php?route=feed/latest_products_rss';

	if (isset($this->request->post['latest_products_rss_status'])) {
	    $data['latest_products_rss_status'] = $this->request->post['latest_products_rss_status'];
	} else {
	    $data['latest_products_rss_status'] = $this->config->get('latest_products_rss_status');
	}

	if (isset($this->request->post['latest_products_rss_limit'])) {
	    $data['latest_products_rss_limit'] = $this->request->post['latest_products_rss_limit'];
	} else {
	    $data['latest_products_rss_limit'] = $this->config->get('latest_products_rss_limit');
	}

	if (isset($this->request->post['latest_products_rss_show_image'])) {
	    $data['latest_products_rss_show_image'] = $this->request->post['latest_products_rss_show_image'];
	} else {
	    $data['latest_products_rss_show_image'] = $this->config->get('latest_products_rss_show_image');
	}

	if (isset($this->request->post['latest_products_rss_show_price'])) {
	    $data['latest_products_rss_show_price'] = $this->request->post['latest_products_rss_show_price'];
	} else {
	    $data['latest_products_rss_show_price'] = $this->config->get('latest_products_rss_show_price');
	}

	if (isset($this->request->post['latest_products_rss_include_tax'])) {
	    $data['latest_products_rss_include_tax'] = $this->request->post['latest_products_rss_include_tax'];
	} else {
	    $data['latest_products_rss_include_tax'] = $this->config->get('latest_products_rss_include_tax');
	}

	if (isset($this->request->post['latest_products_rss_image_width'])) {
	    $data['latest_products_rss_image_width'] = $this->request->post['latest_products_rss_image_width'];
	} else {
	    $data['latest_products_rss_image_width'] = $this->config->get('latest_products_rss_image_width') ? $this->config->get('latest_products_rss_image_width') : 100;
	}

	if (isset($this->request->post['latest_products_rss_image_height'])) {
	    $data['latest_products_rss_image_height'] = $this->request->post['latest_products_rss_image_height'];
	} else {
	    $data['latest_products_rss_image_height'] = $this->config->get('latest_products_rss_image_height') ? $this->config->get('latest_products_rss_image_height') : 100;
	}

	if (isset($this->error['limit'])) {
	    $data['error_limit'] = $this->error['limit'];
	} else {
	    $data['error_limit'] = '';
	}

	if (isset($this->error['image_dimensions'])) {
	    $data['error_image_dimensions'] = $this->error['image_dimensions'];
	} else {
	    $data['error_image_dimensions'] = '';
	}

	$data['breadcrumbs'] = array();

	$data['breadcrumbs'][] = array(
		'text'      => $this->language->get('text_home'),
		'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
		'separator' => false
	);

	$data['breadcrumbs'][] = array(
		'text'      => $this->language->get('text_feed'),
		'href'      => $this->url->link('extension/feed', 'token=' . $this->session->data['token'], 'SSL'),
		'separator' => ' :: '
	);

	$data['breadcrumbs'][] = array(
		'text'      => $this->language->get('heading_title'),
		'href'      => $this->url->link('feed/latest_products_rss', 'token=' . $this->session->data['token'], 'SSL'),
		'separator' => ' :: '
	);

	$this->template = 'feed/latest_products_rss.tpl';

	$this->children = array(
	    'common/header',
	    'common/footer'
	);

	$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
    }

    private function validate() {
	
	if ((!$this->request->post['latest_products_rss_limit']) || (!is_numeric($this->request->post['latest_products_rss_limit']))) {
	    $this->error['limit'] = $this->language->get('error_integer');
	}

	if ((!$this->request->post['latest_products_rss_image_width']) || (!is_numeric($this->request->post['latest_products_rss_image_width'])) || (!$this->request->post['latest_products_rss_image_height']) || (!is_numeric($this->request->post['latest_products_rss_image_height']))) {
	    $this->error['image_dimensions'] = $this->language->get('error_integer');
	}

	if (!$this->error) {
	    return TRUE;
	} else {
	    return FALSE;
	}

	return TRUE;
    }

}