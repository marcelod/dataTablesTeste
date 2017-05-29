<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Row_group_m extends MY_Model {

    public function __construct(){
        parent::__construct();

        $this->table = "row_group";
    }

    public function getDataTable()
    {
        $this->load->library('Datatables');
        $this->load->helper(array('datatables'));

        $this->datatables
            ->select('id, agrupador, titulo')
            ->from($this->table)
            // ->add_column("actions", "$1", "actionsDataTable('id', 'rowgroup', 1, 1, 0)")
            ->unset_column('id');

        return $this->datatables->generate();
    }


}