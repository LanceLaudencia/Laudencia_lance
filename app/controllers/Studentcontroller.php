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
    $this->call->library('pagination');
    $this->call->library('auth');  // ✅ load Auth.php
    $this->auth->check();
    }

   public function show()
{
    // Safely get page, default to 1 if not present
    $page = (int) ($this->io->get('page') ?? 1);

    // Safely get search query
    $q = trim($this->io->get('q') ?? '');

    $records_per_page = 10;

    // Get paginated students
    $result = $this->Studentmodel->page($q, $records_per_page, $page);
    $data['students'] = $result['records'];
    $total_rows       = $result['total_rows'];

    // Pagination setup
    $this->pagination->set_options([
        'first_link'     => '⏮ First',
        'last_link'      => 'Last ⏭',
        'next_link'      => 'Next →',
        'prev_link'      => '← Prev',
        'page_delimiter' => '&page='
    ]);
    $this->pagination->set_theme('bootstrap');
    $this->pagination->initialize($total_rows, $records_per_page, $page, 'user/show?q='.$q);
    $data['page'] = $this->pagination->paginate();

    // Auth check
    $this->call->library('auth');

    if (!$this->auth->is_logged_in()) {
        redirect('user/login'); // fixed: redirect to your login route
    }

    if (!$this->auth->has_role('admin')) {
        echo 'Access denied!';
        exit;
    }

    // Load only the students view
    $this->call->view('user/show', $data);
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


public function register()
    {
        $this->call->library('auth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');
            $role = $this->io->post('role') ?? 'user';

            if ($this->auth->register($username, $password, $role)) {
                redirect('auth/login');
            }
        }

        $this->call->view('auth/register');
    }

    public function login()
    {
        $this->call->library('auth');

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($this->auth->login($username, $password)) {
                redirect('auth/dashboard');
            } else {
                echo 'Login failed!';
            }
        }

        $this->call->view('auth/login');
    }



    public function logout()
    {
        $this->call->library('auth');
        $this->auth->logout();
        redirect('auth/login');
    }
}








