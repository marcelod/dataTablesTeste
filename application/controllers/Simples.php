<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simples extends MY_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->helper('language');

        $this->lang->load('simples');

        $this->load->model('simples_m');
    }

	public function index()
	{
		$this->data['css'] = load_css(array('datatables-bootstrap'));
		$this->data['js']  = load_js(array(
			'jquery.form', 'jquery.dataTables.1.10.min', 'datatables-bootstrap', 'datatables.fnReloadAjax',
			'exemplos/actionDatatables',
			'exemplos/dtSimples'
			));

		$this->data['navigation'] = array(
				array('icon' => 'fa fa-home fa-fw', 'href' => 'home', 'text' => 'Home'),
				array('class' => 'active', 'text' => lang('label_simples'))
			);

		$this->set_view('simples/home');
		$this->sb_admin();
	}

	/**
	 * seleciona as roles para exibir no DataTables
	 */
	public function getDataTable()
	{
		$data = $this->simples_m->getDataTable();
		if ($this->is_ajax()) {
			echo $data;
		}
	}

	/**
	 * gera a view (formulário) para criação de uma nova simples
	 *
	 * @return html
	*/
	public function create()
	{
		$data_modal = array(
			'title_modal'   => lang('title_modal_create_simples'),
			'content_modal' => $this->load->view('simples/create', [], TRUE),
			'buttons_modal' => array('close', 'save')
		);

		$this->load->view('layouts/modal', $data_modal);
	}

	/**
     * validação dos dados enviados
     *
     * salva na base de dados oa nova simples
     */
	public function send()
	{
		$confValid = array(
			array(
				'field'=>'titulo',
				'label'=>lang('label_simples'),
				'rules'=>"required|trim|max_length[255]"
			),
    	);
    	$this->form_validation->set_rules($confValid);

        if($this->form_validation->run() == FALSE) {
			$return['success'] = FALSE;
			$return['msg']	   = validation_errors();
        } else {

        	$return['success'] = TRUE;
			$return['msg']	   = lang('success_save_simples');

            $dados = array(
                'titulo'            => $this->input->post('titulo')
            );

			$this->db->trans_start();

			$save = $this->simples_m->save($dados);

            if ($this->db->trans_complete() === FALSE) {
	            $return['success'] = FALSE;
    			$return['msg']	   = cAlerts(lang('error_save_simples'), 'alert-danger');
            }
        }

	    if ($this->is_ajax()) {
			echo json_encode($return);
	    }
	}

	/**
	 * gera a view (formulário) para edição de uma simples passada
	 *
	 * @return html
	*/
	public function edit()
	{
		$id = $this->input->post('id');

		$data['simples'] = $this->simples_m->get_alter($id);

		$data_modal = array(
			'title_modal'   => lang('title_modal_edit_simples'),
			'content_modal' => $this->load->view('simples/edit', $data, TRUE),
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
			array(
				'field'=>'titulo',
				'label'=>lang('label_simples'),
				'rules'=>"required|trim|max_length[255]"
			),
    	);
    	$this->form_validation->set_rules($confValid);

        if ($this->form_validation->run() == FALSE) {
        	$return['success'] = FALSE;
			$return['msg']	   = validation_errors();
        } else {
        	$return['success'] = TRUE;
			$return['msg']	   = lang('success_update_simples');

            $dados = array(
                'id'                => $id,
                'titulo'            => $this->input->post('titulo')
            );

            $this->db->trans_start();

            $save = $this->simples_m->save($dados);

			if ($this->db->trans_complete() === FALSE) {
	            $return['success'] = FALSE;
				$return['msg']	   = cAlerts(lang('error_update_simples'), 'alert-danger');
            }
        }

        if ($this->is_ajax()) {
			echo json_encode($return);
        }
    }


    /**
	 * gera a view confirmação de exclusão de uma simples passada
	 *
	 * @return html
	*/
	public function delete()
	{
		$id = $this->input->post('id');

		$data['simples'] = $this->simples_m->get_alter($id);

		$data_modal = array(
			'title_modal'   => lang('title_modal_delete_simples'),
			'content_modal' => $this->load->view('simples/delete', $data, TRUE),
			'buttons_modal' => array('close' => 'Cancelar', 'delete')
		);

		$this->load->view('layouts/modal', $data_modal);
	}

	/**
	 * remove um dado da base de dados conforme id passado
	 */
	public function deleteRow()
	{
		$id = $this->input->post('id');

		$this->simples_m->delete($id);

		$return['success'] = TRUE;

	    if ($this->is_ajax()) {
			echo json_encode($return);
	    }
	}

}
