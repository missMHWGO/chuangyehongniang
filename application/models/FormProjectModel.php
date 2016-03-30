<?php

/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-23
 * Time: 15:37
 */
class FormProjectModel extends CI_Model
{
    public function insert($projectName, $projectArea, $projectInfo, $projectStatus, $projectIfCost, $projectCosted, $projectCost)
    {
        $this->db->insert(FPRTABLE, array(
            'projectName' => $projectName,
            'projectArea' => $projectArea,
            'projectInfo' => $projectInfo,
            'projectStatus' => $projectStatus,
            'projectIfCost' => $projectIfCost,
            'projectCosted' => $projectCosted,
            'projectCost' => $projectCost
        ));
        return $this->db->insert_id();
    }

    public function searchLittle($Id)
    {
        $this->db->select('projectName, projectArea');
        $query = $this->db->get_where(FPRTABLE, array('projectId' => $Id));
        return $query->row_array();
    }

    public function search($Id)
    {
        $query = $this->db->get_where(FPRTABLE, array('projectId' => $Id));
        return $query->row_array();
    }

    public function delete($Id)
    {
        $this->db->delete(FPRTABLE, array('projectId' => $Id));
        return $this->db->affected_rows();
    }

    public function update($Id, $projectName, $projectArea, $projectInfo, $projectStatus, $projectIfCost, $projectCosted, $projectCost)
    {
        $this->db->update(FPRTABLE, array(
            'projectName' => $projectName,
            'projectArea' => $projectArea,
            'projectInfo' => $projectInfo,
            'projectStatus' => $projectStatus,
            'projectIfCost' => $projectIfCost,
            'projectCosted' => $projectCosted,
            'projectCost' => $projectCost
        ))->where('projectId', $Id);
        return $this->db->insert_id();
    }
}