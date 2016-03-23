<?php

/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-23
 * Time: 15:56
 */
class UserController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('FormPersonModel');
        $this->load->model('FormProjectModel');
        $this->load->model('PersonProjectModel');
    }

    public function addUser()
    {
        $openId = $this->input->post('openId');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $school = $this->input->post('school');
        $city = $this->input->post('city');
        $projectName = $this->input->post('projectName');
        $projectArea = $this->input->post('projectArea');
        $projectInfo = $this->input->post('projectInfo');
        $projectStatus = $this->input->post('projectStatus');
        $projectIfCost = $this->input->post('projectIfCost');
        $projectCosted = $this->input->post('projectCosted');
        $projectCost = $this->input->post('projectCost');

        if($openId == null || $name == null || $phone == null || $email == null || $school == null || $city == null || $projectName == null || $projectArea == null || $projectInfo == null ||
        $projectStatus == null || $projectIfCost == null || $projectCosted == null || $projectCost == null)
        {
            echo toJsonFail(NO_INPUT);
            return;
        }
        $this->db->trans_start();
        $personId = $this->FormPersonModel->insert($openId, $name, $phone, $email, $school, $city);
        $projectId = $this->FormProjectModel->insert($projectName, $projectArea, $projectInfo, $projectStatus, $projectIfCost, $projectCosted, $projectCost);
        $this->PersonProjectModel->insert($personId, $projectId);
        $this->db->trans_complete();
        if($this->db->trans_status() === false){
            echo toJsonFail(FAIL_TO_INSERT);
        }else{
            echo toJsonSuccess($personId);
        }
    }
}