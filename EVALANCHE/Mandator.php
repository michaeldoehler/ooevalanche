<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Mandator
{
    public function getPools()
    {
        $raw = $this->apiCall('getPools');
        $list = array();
        foreach($raw as $poolId => $data) {
            $pool = new EVALANCHE_Pool($this->getParent(), $poolId);
            $pool->setData($data);
            array_push($list, $pool);
        }
        return $list;
    }

}
