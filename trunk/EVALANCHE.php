<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE
{
    private $_host;
    private $_cred;
    private $_server;

    public function  __construct($username, $password, $host='http://scnem.com') {
        $this->_host = $host;
        $this->_cred = array('username' => $username, 'password' => $password);
        $this->_server = new Zend_XmlRpc_Client($this->_host.'/xmlrpc.php');
    }

    public function apiCall($method, $args = array())
    {
        $arglist = array_merge(array($this->_cred), $args);
        return $this->_server->call($method, $arglist);
        
    }

    public function isAlive()
    {
        return $this->apiCall('isAlive');
    }
    
    public function getMandator($mandatorId = 0)
    {
        return new EVALANCHE_Mandator($this, $mandatorId);
    }


}
