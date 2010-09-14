<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Pool_Attribute
{
    private $_id;
    private $_name;
    private $_type_id;
    private $_label;
    private $_mandatory;

    public function __construct(EVALANCHE_Pool $pool, $attributeId)
    {
        //$this->_pool = $pool;
        $this->_id = $attributeId;
    }

    public function setData($data)
    {
        $this->_name = $data['name'];
        $this->_type_id = $data['type_id'];
        $this->_label = $data['label'];
        $this->_mandatory = $data['mandatory'];
        return $this;
    }

}
