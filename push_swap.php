<?php

class Pushswap
{

    public function __construct($input)
    {

        $this->la = array_reverse($input);
        $this->lb = [];
    }

    public function sa()
    {
        // Swap the first 2 elements at the top of A and put it at the top of A
        if (count($this->la) >= 2) {
            $arraysize = count($this->la);
            $element = $this->la[$arraysize - 1];
            $swap_element = $this->la[$arraysize - 2];
            $this->la[$arraysize - 1] = $swap_element;
            $this->la[$arraysize - 2] = $element;
        }
        return "sa";
    }

    public function sb()
    {
        // Swap the first 2 elements at the top of B and put it at the top of B
        if (count($this->lb) >= 2) {
            $arraysize = count($this->lb);
            $element = $this->lb[$arraysize - 1];
            $swap_element = $this->lb[$arraysize - 2];
            $this->lb[$arraysize - 1] = $swap_element;
            $this->lb[$arraysize - 2] = $element;
        }
        return "sb";
    }

    public function sc()
    {
        $this->sa();
        $this->sb();
        return "sc";
    }

    public function pa()
    {
        // Take the first element at the top of B and put it at the top of A.
        // Do nothing if B is empty
        if (!empty($this->lb)) {
            $element = array_pop($this->lb);
            array_push($this->la, $element);
        }
        return "pa";
    }

    public function pb()
    {
        // Take the first element at the top of A and put it at the top of B.
        // Do nothing if A is empty
        if (!empty($this->la)) {
            $element = array_pop($this->la);
            array_push($this->lb, $element);
        }
        return "pb";
    }

    public function ra()
    {
        // First element becomes last
        $element = array_pop($this->la);
        array_unshift($this->la, $element);
        return "ra";
    }

    public function rb()
    {
        // First element becomes last
        $element = array_pop($this->lb);
        array_unshift($this->lb, $element);
        return "rb";
    }

    public function rr()
    {
        $this->ra();
        $this->rb();
        return "rr";
    }

    public function rra()
    {
        // Last element becomes first
        $element = array_shift($this->la);
        array_push($this->la, $element);
        return "rra";
    }

    public function rrb()
    {
        // Last element becomes first
        $element = array_shift($this->lb);
        array_push($this->lb, $element);
        return "rrb";
    }

    public function rrr()
    {
        $this->rra();
        $this->rrb();
        return "rrr";
    }

    public function dump()
    {
        var_dump($this->la);
    }

    public function insertionSort()
    {
        $resultString = "";
        $laInitSize = count($this->la);
        for ($nb = 0; $nb < $laInitSize; ++$nb) {
            // Step 1: look for max index
            $minIndex = 0;
            $minValue = PHP_INT_MAX;
            for ($index = 0; $index < count($this->la); ++$index) {
                if ($this->la[$index] < $minValue) {
                    $minIndex = $index;
                    $minValue = $this->la[$index];
                }
            }

            // Step 2: Put max value at the top
            if ($minIndex < count($this->la) / 2) {
                // rotate from bot to top is faster
                for ($i = $minIndex; $i >= 0; --$i) {
                    $resultString .= " " . $this->rra();
                }
            } else {
                // rotate from top to bot is faster
                for ($i = $minIndex; $i < count($this->la) - 1; ++$i) {
                    $resultString .= " " . $this->ra();
                }
            }

            // Step 3 send to top b
            $resultString .= " " . $this->pb();
        }

        // LB sorted
        // Send back to LA
        $lbInitSize = count($this->lb);
        for ($nb = 0; $nb < $lbInitSize; ++$nb) {
            $resultString .= " " . $this->pa();
        }
        return $resultString;
    }

    public function sort()
    {
        $result = "";
        // check if already sorted
        $sorted = true;
        for ($index = 0; $index < count($this->la) - 1; ++$index) {
            if ($this->la[$index] < $this->la[$index + 1]) {
                $sorted = false;
                break;
            }
        }

        // return if already sorted
        if ($sorted) {
            return $result . PHP_EOL;
        }

        $result .= $this->insertionSort();

        // Remove first " " space
        return substr($result, 1) . PHP_EOL;
    }
}

// Remove program name (first element of $argv)
array_shift($argv);

// check if input is numeric
foreach ($argv as $input) {
    if (!is_numeric($input)) {
        echo $input . " is not a number!" . PHP_EOL;
        exit(-1);
    }
}

$pushswap = new Pushswap($argv);
$actions = $pushswap->sort();
echo $actions;
