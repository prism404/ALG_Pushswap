<?php

class FunctionSwap {

    public $la;
    public $lb;

    function __construct()
    {
        $this->_la = [];
        $this->_lb = [];
    }

    function sa() 
    {
        // Swap the first 2 elements at the top of A and put it at the top of B
        if (count($this->_la) >= 2) {
            $temporary = $this->_la[0];
            $this->_la[0] = $this->_la[1];
            $this->_la[1] = $temporary;
        }
    }
    
    function sb()
    {
        // Swap the first 2 elements at the top of B and put it at the top of A
        if (count($this->_lb) >= 2) {
            $temporary = $this->_lb[0];
            $this->_lb[0] = $this->_lb[1];
            $this->_lb[1] = $temporary;
        }
    }
    
    function sc()
    {
        // Use both sa and sb at the same time
        $this->sa();
        $this->sb();
    }
    
    function pa()
    {
        // Take the first element at the top of B and put it at the top of A.
        // Do nothing if B is empty
        if (!empty($this->_lb)) {
            $element = array_shift($this->_lb);
            array_unshift($this->_la, $element);
        }
    }
    
    function pb()
    {
        // Take the first element at the top of A and put it at the top of B.
        // Do nothing if A is empty
        if (!empty($this->_la)) {
            $element = array_shift($this->_la);
            array_unshift($this->_lb, $element);
        }
    }
    
    function ra()
    {
        // Shift all elements of A up by 1. The first element becomes the last one.
        $element = array_shift($this->_la);
        array_push($this->_la, $element);
    }
    
    function rb()
    {
        // Shift all elements of B up by 1. The first element becomes the last one.
        $element = array_shift($this->_lb);
        array_push($this->_lb, $element);
    }
    
    function rr()
    {
        // Use both ra and rb at the same time
        $this->ra();
        $this->rb();
    }
    
    function rra()
    {
        // Shift all elements of list A down by 1. The last element becoms first.
        $element = array_pop($this->_la);
        array_unshift($this->_la, $element);
    }
    
    function rrb()
    {
        // Shift all elements of list B down by 1. The last element becoms first.
        $element = array_pop($this->_lb);
        array_unshift($this->_lb, $element);
    }
    
    function rrr()
    {
        // Use both rra and rrb at the same time
        $this->rra();
        $this->rrb();
    }
}

$swap = new FunctionSwap();

