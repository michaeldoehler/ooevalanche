<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Pool_Attribute extends EVALANCHE_Object
{
    protected $_dataFields = array('name', 'type_id', 'label', 'mandatory');

    public function getOptions()
    {
        return $this->processApiCallResult($this->apiCall('doPoolAttributeGetOptions'), 'EVALANCHE_Pool_Attribute_Option');
    }

}
