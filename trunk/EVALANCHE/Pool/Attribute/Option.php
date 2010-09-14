<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Pool_Attribute_Option extends EVALANCHE_Object
{
    protected $_dataFields = array('label');

    public function setData($data)
    {
        $this->_label = $data;
        return $this;
    }
}
