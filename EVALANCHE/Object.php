<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EVALANCHE_Object
{
    /**
     *
     * @var integer
     */
    private $_id;

    /**
     *
     * @var EVALANCHE_Object
     */
    private $_parent;

    public function __construct($parent, $id)
    {
        $this->_id = $id;
        $this->_parent = $parent;
    }

    protected function apiCall($method, $args=array())
    {
        $arglist = array_merge(array($this->_id), $args);
        return $this->_parent->apiCall($method, $arglist);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getParent()
    {
        return $this->_parent;
    }
}
