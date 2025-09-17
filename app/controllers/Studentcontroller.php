<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: Studentcontroller
 * 
 * Automatically generated via CLI.
 */
class Studentcontroller extends Controller {
    public function __construct()
    {
        parent::__construct();
         $this->call->database();
        $this->call->model('Studentmodel');
    }

    public function show()
    {
        $this->call->database();
        $this->call->model('Studentmodel');
        $data['students'] = $this->Studentmodel->all();
        $this->call->view('show', $data);

          
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $all = $this->Studentmodel->page($q, $records_per_page, $page);
        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('students').'?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('students', $data);
    }
  
    

    public function create()
    {
       if ($this->io->method() == 'post') 
        {
        $last_name = $this->io->post('last_name');
        $first_name = $this->io->post('first_name');
        $email = $this->io->post('email');
        $data = array(
            'last_name' => $last_name,
            'first_name' => $first_name,
            'email' => $email,
        );
        if($this->Studentmodel->insert($data))
        {
            redirect('user/show');
        }else{
            echo 'Something went wrong';
        }
    
    }else {
        $this->call->view('user/create');
    }
    
    }

    public function update($id)
    {
        $data['students'] = $this->Studentmodel->find($id);
        if ($this->io->method() == 'post') 
        {
        $last_name = $this->io->post('last_name');
        $first_name = $this->io->post('first_name');
        $email = $this->io->post('email');
        $data = array(
            'last_name' => $last_name,
            'first_name' => $first_name,
            'email' => $email,
        );
        if($this->Studentmodel->update($id, $data))
        {
            redirect('user/show');
        }else{
            echo 'Something went wrong';
        }
    
    }else {

        $this->call->view('update' , $data);
    }
}

    public function delete($id)
    {
        if($this->Studentmodel->delete($id)) {
            redirect('user/show');

        } else {
            echo 'Something went wrong';
        }
    }
}



