<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Mandator extends EVALANCHE_Object
{
    public function getPools()
    {
        return $this->processApiCallResult($this->apiCall('getPools'), 'EVALANCHE_Pool', 'ArrayObject', $this->getParent());
    }
}
