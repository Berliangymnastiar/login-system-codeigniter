<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_logged_in();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->Menu_model->_deleteSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete success!</div>');
        redirect('menu/submenu');
    }

    public function deleteMenu($id)
    {
        $this->Menu_model->_deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete success!</div>');
        redirect('menu');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'menu_id' => $menu_id,
            'role_id' => $role_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
    }


    // public function getedit()
    // {
    //     echo json_encode($this->Menu_model->getMenuById($_POST['id']));
    // }

    // public function edit()
    // {
    //     if ($this->Menu_model->editDataMenu($_POST) > 0) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu failed to edit!</div>');
    //         header('Location:' . base_url() . 'menu');
    //         exit;
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu successfully edited!</div>');
    //         header('Location:' . base_url() . 'menu');
    //         exit;
    //     }
    // }

    // public function geteditSubMenu()
    // {
    //     echo json_encode($this->Menu_model->getSubMenuById($_POST['id']));
    // }

    // public function editSubMenu()
    // {
    //     if ($this->Menu_model->editDataSubMenu($_POST) > 0) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Submenu failed to edit!</div>');
    //         header('Location:' . base_url() . 'menu/submenu');
    //         exit;
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu successfully edited!</div>');
    //         header('Location:' . base_url() . 'menu/submenu');
    //         exit;
    //     }
    // }
}
