<?php
/**
 * Created by PhpStorm.
 * User: psybo-03
 * Date: 12/7/17
 * Time: 6:17 PM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->timestamps = false;
    }
}
