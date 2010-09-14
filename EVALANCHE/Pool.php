<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Pool
{
    private $_evalanche;
    private $_id;
    private $_name;
    private $_comment;
    private $_url;
    private $_admin_url;
    private $_attributes = false;

    public function __construct(EVALANCHE $evalanche, $poolId)
    {
        $this->_evalanche = $evalanche;
        $this->_id = $poolId;
    }

    private function apiCall($method, $args = array())
    {
        $arglist = array_merge(array($this->_id), $args);
        return $this->_evalanche->apiCall($method, $arglist);
    }

    public function setData($data)
    {
        $this->_name = $data['name'];
        $this->_comment = $data['comment'];
        $this->_url = $data['url'];
        $this->_admin_url = $data['admin_url'];
        return $this;
    }

    public function getAttributes()
    {
        if (!$this->_attributes) {
            $raw = $this->apiCall('getPoolAttributes');
            $list = array();
            foreach($raw as $id => $data) {
                $attr = new EVALANCHE_Pool_Attribute($this, $id);
                $attr->setData($data);
                array_push($list, $attr);
            }
            $this->_attributes = $list;
            return $list;
        } else {
            return $this->_attributes;
        }
    }
}
