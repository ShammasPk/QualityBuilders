<?php
/**
 * Created by PhpStorm.
 * User: psybo-03
 * Date: 1/7/17
 * Time: 3:00 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_Model extends MY_Model
{


    function __construct()
    {
        $this->has_one('File_model');
        parent::__construct();
        $this->timestamps = FALSE;
    }
}