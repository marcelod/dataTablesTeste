<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class MY_Controller extends CI_Controller {

    /**
    * @param: $data
    * @description: dados/informações passados para as views
    */
    public $data = array();


    /**
     * @param: $title
     * @description: title of page
     */
    private $title = "";

    /**
     * @param: $menu
     * @description: menu a ser usado em permissios
     */
    private $menu = "";

    /**
     * @param: $sidebar
     * @description: sidebar menu usando junto com sb_admin
     */
    private $sidebar = "";

    /**
     * @param: $view
     * @description: view a ser exibida
     */
    private $view = "";

    private $access = FALSE;


    public function __construct()
    {
        parent::__construct();

        $this->load->library('template');
    }


    public function sb_admin()
    {
        $this->template->set_layout('sb_admin');

        $this->get_title();
        $this->get_menu();
        $this->get_sidebar();
        $this->get_view();
    }

    protected function set_title($title)
    {
        $this->title = $title;
    }

    protected function get_title()
    {
        if($this->title === "")
        {
            $this->title = SITE_NAME  . " | " . ucfirst($this->router->class);
        }

        return $this->template->title($this->title);
    }

    protected function set_sidebar($sidebar)
    {
        $this->sidebar = $sidebar;
    }

    protected function get_sidebar()
    {
        $sidebar = "";

        if($this->sidebar == "")
        {
            $this->set_sidebar('sidebar_default');
        }

        $sidebar = $this->load->view($this->sidebar, $this->data, TRUE);

        return $this->template->inject_partial('sidebar', $sidebar);
    }

    protected function set_menu($menu = "")
    {
        $this->menu = $menu;
    }

    protected function get_menu()
    {
        $menu = $this->load->view('menu', [], TRUE);

        $this->template->inject_partial('menu', $menu);
    }


    protected function set_view($view)
    {
        $this->view = $view;
    }

    protected function get_view()
    {
        if($this->view === "")
        {
            $this->view = $this->router->class;
        }

        return $this->template->build($this->view, $this->data);
    }

    public function is_ajax()
    {
        if($this->input->is_ajax_request())
        {
            return TRUE;
        }
        else
        {
            $local = $this->router->directory . $this->router->class;
            redirect($local, 'refresh');
        }
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */