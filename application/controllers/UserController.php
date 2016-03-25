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
        $city = $this->input->post('province').$this->input->post('city');
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
            //echo toJsonSuccess($personId);
            $this->load->view('success');
        }
    }

    public function getSimpleList()
    {
        $page = ($this->input->get('page') == null)? 0 : $this->input->get('page');
        $person = $this->FormPersonModel->searchAll(FORM_LIMIT, $page * FORM_LIMIT);
        $data = array();
        foreach($person as $key){
            $projectId = $this->PersonProjectModel->search($key['Id'])['projectId'];
            $project = $this->FormProjectModel->searchLittle($projectId);
            array_push($data, array_merge($key, $project));
        }
        echo toJsonSuccess($data);
    }

    public function getDetailInfo($id)
    {
        $person = $this->FormPersonModel->search($id);
        $projectId = $this->PersonProjectModel->search($id)['projectId'];
        $project = $this->FormProjectModel->search($projectId);
        $data = array_merge($person, $project);
        echo toJsonSuccess($data);
    }

    public function deleteUser($id)
    {
        $this->db->trans_start();
        $projectId = $this->PersonProjectModel->search($id)['projectId'];
        $this->PersonProjectModel->delete($id);
        $this->FormPersonModel->delete($id);
        $this->FormProjectModel->delete($projectId);
        $this->db->trans_complete();
        if($this->db->trans_status() === false){
            echo toJsonFail(FAIL_TO_DELETE);
        }else{
            echo toJsonSuccessNoData();
        }
    }

    public function sendEmail($id)
    {
        $email = $this->FormPersonModel->search($id)['email'];
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['mailpath'] = "/usr/bin/sendmail";
        $config['smtp_host'] = 'smtp.163.com';
        $config['smtp_user'] = EMAIL_ACCOUNT;//这里写上你的163邮箱账户
        $config['smtp_pass'] = EMAIL_PASSWORD;//这里写上你的163邮箱密码
        $config['smtp_port'] = 25;
        $config['mailtype'] = 'text';
        $config['validate'] = true;
        $config['priority'] = 1;
        $config['crlf']  = "\r\n";
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        $this->email->from(EMAIL_ACCOUNT, '创业红娘公益服务中心');//发件人
        $this->email->to($email);
        $this->email->subject('"创业红娘"创业项目信息登记表');
        $this->email->message('这是一条测试邮件');//正文
        $this->email->attach('./res/cyhn.docx');
        if ( ! $this->email->send())
        {
            echo toJsonFail(FAIL_TO_SEND_MAIL);
//            echo $this->email->print_debugger();   //调试用
        }else{
            echo toJsonSuccessNoData();
        }
    }
}