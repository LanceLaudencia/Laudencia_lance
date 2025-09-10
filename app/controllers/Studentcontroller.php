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



