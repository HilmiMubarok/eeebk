<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if( ! $this->input->is_cli_request())
        {
            show_404();
        }
    }

    public function controller($controller_name = '', $dir = '')
    {
        if (empty($controller_name))
        {
            echo 'Please enter controller name!';
        }
        else
        {
            if ( ! empty($dir))
            {
                $dir = '/' . trim($dir, '/');
            }

            $fullpath = APPPATH . 'controllers' . $dir . '/' . ucfirst($controller_name) . '.php';

            if (file_exists($fullpath))
            {
                echo 'Filename exists.';
            }
            else
            {
                if ( ! is_dir(dirname($fullpath)) )
                {
                    mkdir(dirname($fullpath), 0777, true) or die("Unable to create a directory!");
                }

                $data = array('controller_name' => $controller_name);

                $template = $this->load->view('cli/controller', $data, true);

                $file = fopen($fullpath, "w") or die("Unable to create a file!");

                fwrite($file, html_entity_decode($template));

                echo $controller_name . ' created.';
            }
        }
    }

}