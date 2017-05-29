<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colorpicker extends MY_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper('language');

        $this->lang->load('colorpicker');

        $this->load->model('color_picker_m');
    }

	public function index()
	{
		$this->data['css'] = load_css(array('datatables-bootstrap', 'jquery.minicolors.min'));
		$this->data['js']  = load_js(array(
			'jquery.form', 'jquery.dataTables.1.10.min', 'datatables-bootstrap', 'datatables.fnReloadAjax',
			'jquery.minicolors-min',
			'exemplos/actionDatatables',
			'exemplos/dtColorPicker'
			));

		$this->data['navigation'] = array(
				array('icon' => 'fa fa-home fa-fw', 'href' => 'home', 'text' => 'Home'),
				array('class' => 'active', 'text' => lang('title_color_picker'))
			);

		$this->set_view('color_picker/home');
		$this->sb_admin();
	}

	/**
	 * seleciona as roles para exibir no DataTables
	 */
	public function getDataTable()
	{
		$data = $this->color_picker_m->getDataTable();
		if ($this->is_ajax()) {
			echo $data;
		}
	}


	/**
	 * gera a view (formulário) para edição de uma origem passada
	 *
	 * @return html
	*/
	public function edit()
	{
		$id = $this->input->post('id');

		$data['colorpicker'] = $this->color_picker_m->get_alter($id);

		$data_modal = array(
			'title_modal'   => lang('title_modal_edit_color_picker'),
			'content_modal' => $this->load->view('color_picker/edit', $data, TRUE),
			'buttons_modal' => array('close', 'saveEdit')
		);

		$this->load->view('layouts/modal', $data_modal);
	}

	/**
     * verificacao dos dados enviados
     *
     * salva na base de dados
     */
    public function editDB()
    {
    	$id = $this->input->post('id');

    	$confValid = array(
			array('field'=>'titulo', 'label'=>lang('label_color_picker'), 'rules'=>'required|trim|max_length[100]'),
			array('field'=>'cor', 'label'=>lang('label_cor_text'), 'rules'=>'required|trim|exact_length[7]'),
			array('field'=>'bg_cor', 'label'=>lang('label_bg_cor'), 'rules'=>'required|trim|exact_length[7]')
    	);

    	$this->form_validation->set_rules($confValid);

        if ($this->form_validation->run() == FALSE) {
        	$return['success'] = FALSE;
			$return['msg']	   = validation_errors();
        } else {
        	$return['success'] = TRUE;
			$return['msg']	   = lang('success_update_color_picker');

			$dados = array(
                'id'                => $id,
                'titulo'            => $this->input->post('titulo'),
                'cor'               => $this->input->post('cor'),
                'bg_cor'            => $this->input->post('bg_cor'),
            );

            $this->db->trans_start();

            $save = $this->color_picker_m->save($dados);

			if ($this->db->trans_complete() === FALSE) {
	            $return['success'] = FALSE;
				$return['msg']	   = cAlerts(lang('error_update_color_picker'), 'alert-danger');
            }
        }

        if ($this->is_ajax()) {
			echo json_encode($return);
        }
    }


}
