<?php

/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-23
 * Time: 15:48
 */
class PersonProjectModel extends CI_Model
{
    public function insert($personId, $projectId)
    {
        $this->db->insert(PPTABLE, array(
            'personId' => $personId,
            'projectId' => $projectId
        ));
        return $this->db->insert_id();
    }

    public function search($personId)
    {
        $query = $this->db->get_where(PPTABLE, array('personId' => $personId));
        return $query->row_array();   //若一人可对应多个项目，则加上分页与result_array
    }

    public function delete($personId)
    {
        $this->db->delete(PPTABLE, array('personId' => $personId));
        return $this->db->affected_rows();
    }
}