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
        $this->load->view($this->header,['current' => 'Moments']);
        $this->load->view($page);
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
        foreach ($data as $value) {
            $timestamp = strtotime($value->date);
            $value->day = date('d', $timestamp);
            $value->month = date('M', $timestamp);
        }
        return $data;
    }

    function _load_gallery()
    {
        $data = $this->gallery->with_file()->limit(8)->order_by('id','DESC')->get_all();
        return array_chunk($data, 4);
    }

}