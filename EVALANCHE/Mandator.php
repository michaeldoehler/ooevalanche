<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Mandator
{
    private $_evalanche;
    private $_id;

    public function __construct(EVALANCHE $evalanche, $mandatorId = 0)
    {
        $this->_evalanche = $evalanche;
        $this->_id = $mandatorId;
    }

    private function apiCall($method, $args = array())
    {
        $arglist = array_merge(array($this->_id), $args);
        return $this->_evalanche->apiCall($method, $arglist);
    }

    public function getPools()
    {
        $raw = $this->apiCall('getPools');
        $list = array();
        foreach($raw as $poolId => $data) {
            $pool = new EVALANCHE_Pool($this->_evalanche, $poolId);
            $pool->setData($data);
            array_push($list, $pool);
        }
        return $list;
    }

}
