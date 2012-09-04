<?php

namespace EasyCSV;

abstract class AbstractBase
{
    protected $_handle;
    protected $_delimiter = ',';
    protected $_enclosure = '"';

    public function __construct($path, $mode = 'r+', $delimiter = ',', $enclosure = '"')
    {
        if (!file_exists($path)) {
            touch($path);
        }
        $this->_handle = fopen($path, $mode);
        $this->_delimiter = $delimiter;
        $this->_enclosure = $enclosure;
    }

    public function __destruct()
    {
        if (is_resource($this->_handle)) {
            fclose($this->_handle);
        }
    }
    
    public function setDelimiter($delimiter)
    {
        $this->_delimiter = $delimiter;
    }
    
    public function setEnclosure($enclosure)
    {
        $this->_enclosure = $enclosure;
    }
}