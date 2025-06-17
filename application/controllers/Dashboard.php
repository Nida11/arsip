<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function index() {
        $data['totalSlot']       = $this->Dashboard_model->getTotalSlotToday();
        $data['growthSlot']      = $this->Dashboard_model->getGrowthSlot();
        $data['totalNumbering']  = $this->Dashboard_model->getTotalNumberingToday();
        $data['growthNumbering'] = $this->Dashboard_model->getGrowthNumbering();
        $data['totalSpecimen']   = $this->Dashboard_model->getTotalSpecimenToday();
        $data['growthSpecimen']  = $this->Dashboard_model->getGrowthSpecimen();

        $this->load->view('dashboard', $data);
    }
}
