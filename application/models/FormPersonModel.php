<?php

/**
 * Created by PhpStorm.
 * User: Augustus
 * Date: 2016-03-21
 * Time: 21:33
 */
class FormPersonModel extends CI_Model
{
    public function insert($openId, $name, $phone, $email, $school, $city)
    {
        $this->db->insert(FPETABLE, array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'school' => $school,
            'city' => $city,
            'openId' => $openId
        ));
        return $this->db->insert_id();
    }

    public function search($id)
    {
        $query = $this->db->get_where(FPETABLE, array('Id' => $id));
        return $query->row_array();
    }

    public function searchAll($limit = FORM_LIMIT, $offset = 0)
    {
        $query = $this->db->get(FPETABLE, $limit, $offset);
        return $query->result_array();
    }

    public function getCount()
    {
        return $this->db->count_all(FPETABLE);
    }

    public function delete($id)
    {
        $this->db->delete(FPETABLE, array('Id' => $id));
        return $this->db->affected_rows();
    }

    public function update($openId, $name, $phone, $email, $school, $city)
    {
        $this->db->update(FPETABLE, array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'school' => $school,
            'city' => $city
        ), array('openId' => $openId));
        return $this->db->affected_rows();
    }

    public function updateEmailStatus($id)
    {
        $this->db->update(FPETABLE, array(
            'email_status' => 1
        ), array('Id' => $id));
        return $this->db->affected_rows();
    }
}