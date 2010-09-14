<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Pool extends EVALANCHE_Object
{
    protected $_dataFields = array('name', 'comment', 'url', 'admin_url');

    public function getAttributes()
    {
        return $this->processApiCallResult($this->apiCall('getPoolAttributes'), 'EVALANCHE_Pool_Attribute');
    }
}
