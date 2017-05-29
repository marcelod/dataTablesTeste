<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Color_picker_m extends MY_Model {

    public function __construct(){
        parent::__construct();

        $this->table = "color_picker";
    }


    public function getDataTable()
    {
        $this->load->library('Datatables');
        $this->load->helper(array('datatables'));

        $this->datatables
            ->select('id, titulo, cor, bg_cor')
            ->from($this->table)
            ->edit_column("titulo", "$1", "cLabelStatusCor('titulo', 'cor', 'bg_cor')")
            ->add_column("actions", "$1", "actionsDataTable('id', 'rowgroup', 0, 1, 0)")
            ->unset_column('id')
            ->unset_column('cor')
            ->unset_column('bg_cor');

        return $this->datatables->generate();
    }


}