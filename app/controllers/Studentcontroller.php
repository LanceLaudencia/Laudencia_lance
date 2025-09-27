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

   
    }

   public function show()
{
    $this->call->model('Studentmodel');

    // Check kung may naka-login
    if (!isset($_SESSION['user'])) {
        redirect('/auth/login');
        exit;
    }

    // Kunin info ng naka-login na user
    $logged_in_user = $_SESSION['user']; 
    $data['logged_in_user'] = $logged_in_user;





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
        $this->call->model('Studentmodel'); // load model

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);

            $data = [
                'username' => $username,
                'email'    => $this->io->post('email'),
                'password' => $password,
                'role'     => $this->io->post('role'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->Studentmodel->insert($data)) {
                redirect('/auth/login');
            }
        }

        $this->call->view('/auth/register');
    }


        public function login()
        {
            $this->call->library('auth');

            $error = null; // prepare error variable

            if ($this->io->method() == 'post') {
                $username = $this->io->post('username');
                $password = $this->io->post('password');

                $this->call->model('Studentmodel');
                $user = $this->Studentmodel->get_user_by_username($username);

                if ($user) {
                    if ($this->auth->login($username, $password)) {
                        // Set session
                        $_SESSION['user'] = [
                            'id'       => $user['id'],
                            'username' => $user['username'],
                            'role'     => $user['role']
                        ];

                        if ($user['role'] == 'admin') {
                            redirect('/user');
                        } else {
                            redirect('/user');
                        }
                    } else {
                        $error = "Incorrect password!";
                    }
                } else {
                    $error = "Username not found!";
                }
            }

            // Pass error to view
            $this->call->view('auth/login', ['error' => $error]);
        }



    public function dashboard()
    {
        $this->call->model('Studentmodel');
        $data['user'] = $this->Studentmodel->get_all_users(); // fetch all users

        $this->call->model('Studentmodel');

        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $user = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $user['records'];
        $total_rows = $user['total_rows'];

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

        $this->call->view('user/dashboard', $data);
    }


    public function logout()
    {
        $this->call->library('auth');
        $this->auth->logout();
        redirect('auth/login');
    }




}