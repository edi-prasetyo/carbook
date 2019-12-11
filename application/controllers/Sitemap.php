<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Sitemap extends CI_Controller {

    public function index()

    {
        $this->load->database();
        $query = $this->db->get("berita");
        $data['berita'] = $query->result();
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view('sitemap', $data);

    }

}
