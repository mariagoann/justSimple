<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Content extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
        $this->load->helper('url');
    }
 
    public function index()
    {
        $this->load->view('content');
    }

    public function add_content(){
        $role = $_SESSION['role'];
        if($role!=2){
            $this->session->set_userdata(['warning_content'=>'Anda tidak memiliki akses untuk menambah content!']);
            redirect(site_url().'/content');
        }else{
            $this->load->view('form_content');
        }
        
    }

    public function add(){
        $content =$this->content_model->add($_POST);
        if($content!==false){
            redirect(site_url().'/content/view?id='.$content);
        }else{
            //give error
            $this->session->set_userdata(['error_content'=>'Gagal Menambahkan Content!']);
            $this->load->view('form_content');
        }
    }
 
    public function ajax_list()
    {
        $list = $this->content_model->get_datatables();
        $view = site_url()."/content/view?id=";
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $content) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $content->judul;
            $row[] = $content->tag;
            $row[] = $content->created_date;
            $row[] = $content->name;
            $row[] = "<a href='".$view.$content->content_id."'>View</a>";
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->content_model->count_all(),
                        "recordsFiltered" => $this->content_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
     public function view(){
        $content = $this->db->select('*')
                            ->from('content')
                            ->join('user','content.created_by = user.user_id')
                            ->where(['content.content_id'=>$_GET['id']])
                            ->get()
                            ->result_array();
        if($content==null){
            redirect(site_url().'/content');
        }else{
            $this->load->view('content_view',['content'=>$content]);
        }
    }
}