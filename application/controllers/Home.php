<?php
/**
 * Created by PhpStorm.
 * User: psybo-03
 * Date: 11/5/17
 * Time: 4:47 PM
 */
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Home extends CI_Controller
{
    protected $header = 'templates/header';
    protected $footer = 'templates/footer';
    protected $slider = 'templates/slider';
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model', 'portfolio');
        $this->load->model('Portfolio_file_model', 'portfolio_file');
        $this->load->model('gallery_model', 'gallery');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function index($page = 'index')
    {
        $data['gallery'] = $this->_load_gallery();
        $data['portfolio'] = $this->_load_portfolio(3);
        $this->load->view($this->header,['current' => 'Home']);
        $this->load->view($this->slider);
        $this->load->view($page, $data);
        $this->load->view($this->footer);
    }

    public function about($page = 'about')
    {
        $this->load->view($this->header,['current' => 'About Us']);
        $this->load->view($page);
        $this->load->view($this->footer);
    }

    public function portfolio($page = 'portfolio')
    {
        $data['portfolio'] = $this->_load_portfolio();

        $this->load->view($this->header,['current' => 'Portfolio']);
        $this->load->view($page, $data);
        $this->load->view($this->footer);
    }

    public function portfolioDetails($page = 'portfolioDetails')
    {
        $this->load->view($this->header,['current' => 'Portfolio']);
        $this->load->view($page);
        $this->load->view($this->footer);
    }

    public function moments($page = 'moments')
    {
        $data['gallery'] = $this->_load_gallery();
        $this->load->view($this->header,['current' => 'Moments']);
        $this->load->view($page, $data);
        $this->load->view($this->footer);
    }

    public function contact($page = 'contact')
    {
        $this->load->view($this->header,['current' => 'Contact Us']);
        $this->load->view($page);
        $this->load->view($this->footer);
    }

    function _load_portfolio($limit="")
    {
        $data = $this->portfolio_file->select($limit);
        if ($data != FALSE) {
            foreach ($data as $value) {
                $timestamp = strtotime($value->date);
                $value->day = date('d', $timestamp);
                $value->month = date('M', $timestamp);
            }
        }
        return $data;
    }

    function _load_gallery($limit="")
    {
        if ($limit != "") {
            $data = $this->gallery->with_file()->limit(8)->order_by('id','DESC')->get_all();
        } else {
            $data = $this->gallery->with_file()->order_by('id','DESC')->get_all();
        }
        if ($data != false) {
            return array_chunk($data, 4);
        }else
            return $data;
    }

    function send_message()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('phone', 'Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->output->set_status_header(400, 'Validation error');
        } else {
            $name = $this->input->post('name');
            $place = $this->input->post('place');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $comments = $this->input->post('message');

            $comments = wordwrap($comments, 70, "<br>");
            $subject = 'Comments from : ' . $name;

            $message = 'name  :  ' . $name . PHP_EOL . PHP_EOL;
            $message .= 'Place  :  ' . $place . PHP_EOL . PHP_EOL;
            $message .= 'Phone  :   ' . $phone . PHP_EOL . PHP_EOL;
            $message .= 'comments from  :   ' . $email . PHP_EOL . PHP_EOL;
            $message .= 'Comments   :   ' . $comments . PHP_EOL . PHP_EOL;

            $message = str_replace("\n.", "\n..", $message);

            $to = 'info@accountsandtaxd.in';

            $headers = 'From: comments@accountsandtax.in';

            if (mail($to, $subject, $message, $headers)) {
                $this->output->set_output('success');
            } else {
//                $this->output->set_status_header(101, 'Mail server connect error');
                $this->output->set_output('error');
            }
        }
    }


    function send_comment()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->output->set_status_header(400, 'Validation error');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $comments = $this->input->post('message');

            $comments = wordwrap($comments, 70, "<br>");
            $subject = 'Comments from : ' . $name;

            $message = 'name  :  ' . $name . PHP_EOL . PHP_EOL;
            $message .= 'comments from  :   ' . $email . PHP_EOL . PHP_EOL;
            $message .= 'Comments   :   ' . $comments . PHP_EOL . PHP_EOL;

            $message = str_replace("\n.", "\n..", $message);

            $to = 'info@accountsandtaxd.in';

            $headers = 'From: comments@accountsandtax.in';

            if (mail($to, $subject, $message, $headers)) {
                $this->output->set_output('success');
            } else {
                $this->output->set_status_header(101, 'Mail server connect error');
                $this->output->set_output('error');
            }
        }
    }


}