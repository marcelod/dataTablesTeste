<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rowgroup extends MY_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper('language');

        $this->lang->load('row_group');

        $this->load->model('row_group_m');
    }

	public function index()
	{
		$this->data['css'] = load_css(array('datatables-bootstrap'));
		$this->data['js']  = load_js(array(
			'jquery.form', 'jquery.dataTables.1.10.min', 'datatables-bootstrap', 'datatables.fnReloadAjax',
			'exemplos/actionDatatables',
			'exemplos/dtRowGroup'
			));

		$this->data['navigation'] = array(
				array('icon' => 'fa fa-home fa-fw', 'href' => 'home', 'text' => 'Home'),
				array('class' => 'active', 'text' => lang('dt_row_group'))
			);

		$this->set_view('row_group/home');
		$this->sb_admin();
	}

	/**
	 * seleciona as roles para exibir no DataTables
	 */
	public function getDataTable()
	{
		$data = $this->row_group_m->getDataTable();
		if ($this->is_ajax()) {
			echo $data;
		}
	}


}
