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

    /**
     *
     * @var array
     */
    protected $_dataFields = array();

    /**
     *
     * @var array
     */

    public function __construct($parent, $id)
    {
        $this->_id = $id;
        $this->_parent = $parent;
        foreach($this->_dataFields as $key) {
            $ikey = '_'.$key;
            $this->$ikey = null;
        }
    }

    public function setData($data)
    {
        foreach($data as $key => $value) {
            $ikey = '_'.$key;
            if (in_array($key, $this->_dataFields)) {
                $this->$ikey = $value;
            }
        }
        return $this;
    }

    protected function apiCall($method, $args=array())
    {
        $arglist = array_merge(array($this->_id), $args);
        return $this->_parent->apiCall($method, $arglist);
    }

    protected function processApiCallResult($result, $resultClass = 'EVALANCHE_Object', $listClass = 'ArrayObject', $parent = null)
    {
        $list = array();
        if (is_null($parent)) {
            $parent = $this;
        }
        
        foreach($result as $id => $data) {
            $obj = new $resultClass($parent, $id);
            $obj->setData($data);
            array_push($list, $obj);
        }
        return new $listClass($list);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getParent()
    {
        return $this->_parent;
    }

    public function dump()
    {
        unset($this->_parent);
        Zend_Debug::dump($this);
    }

}
