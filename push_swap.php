<?php

require("bonus/ANSI_colors.php");
$bonus = false;

class Pushswap
{

    public function __construct($input)
    {

        $this->la = array_reverse($input);
        $this->lb = [];
    }

    public function sa()
    {
        global $bonus;
        global $bg_gradient1;
        global $clear;

        // Swap the first 2 elements at the top of A and put it at the top of A
        if (count($this->la) >= 2) {
            $arraysize = count($this->la);
            $element = $this->la[$arraysize - 1];
            $swap_element = $this->la[$arraysize - 2];
            $this->la[$arraysize - 1] = $swap_element;
            $this->la[$arraysize - 2] = $element;
        }

        if ($bonus) {
            return $bg_gradient1 . "sa" . $clear;
        }
        return "sa";
    }

    public function sb()
    {
        global $bonus;
        global $bg_gradient1_5;
        global $clear;

        // Swap the first 2 elements at the top of B and put it at the top of B
        if (count($this->lb) >= 2) {
            $arraysize = count($this->lb);
            $element = $this->lb[$arraysize - 1];
            $swap_element = $this->lb[$arraysize - 2];
            $this->lb[$arraysize - 1] = $swap_element;
            $this->lb[$arraysize - 2] = $element;
        }

        if ($bonus) {
            return $bg_gradient1_5 . "sb" . $clear;
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
        global $bonus;
        global $bg_gradient1;
        global $clear;

        // Take the first element at the top of B and put it at the top of A.
        // Do nothing if B is empty
        if (!empty($this->lb)) {
            $element = array_pop($this->lb);
            array_push($this->la, $element);
        }

        if ($bonus) {
            return $bg_gradient1 . "pa" . $clear;
        }
        return "pa";
    }

    public function pb()
    {
        global $bonus;
        global $bg_gradient2_5;
        global $clear;

        // Take the first element at the top of A and put it at the top of B.
        // Do nothing if A is empty
        if (!empty($this->la)) {
            $element = array_pop($this->la);
            array_push($this->lb, $element);
        }
        if ($bonus) {
            return $bg_gradient2_5 . "pb" . $clear;
        }
        return "pb";
    }

    public function ra()
    {
        global $bonus;
        global $bg_gradient3;
        global $clear;

        // First element becomes last
        $element = array_pop($this->la);
        array_unshift($this->la, $element);
        if ($bonus) {
            return $bg_gradient3 . "ra" . $clear;
        }
        return "ra";
    }

    public function rb()
    {
        global $bonus;
        global $bg_gradient3_5;
        global $clear;

        // First element becomes last
        $element = array_pop($this->lb);
        array_unshift($this->lb, $element);
        if ($bonus) {
            return $bg_gradient3_5 . "rb" . $clear;
        }
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
        global $bonus;
        global $bg_gradient4;
        global $clear;

        // Last element becomes first
        $element = array_shift($this->la);
        array_push($this->la, $element);
        if ($bonus) {
            return $bg_gradient4 . "rra" . $clear;
        }
        return "rra";
    }

    public function rrb()
    {
        global $bonus;
        global $bg_gradient4_5;
        global $clear;

        // Last element becomes first
        $element = array_shift($this->lb);
        array_push($this->lb, $element);
        if ($bonus) {
            return $bg_gradient4_5 . "rrb" . $clear;
        }
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

    public function sort()
    {
        // Check if already sorted
        $result = "";
        $sorted = true;
        for ($i = 0; $i < count($this->la) - 1; $i++) {
            if ($this->la[$i] < $this->la[$i + 1]) {
                $sorted = false;
                break;
            }
        }

        if ($sorted) {
            return $result . PHP_EOL;
        }

        $result .= $this->insertionSort();

        // Remove first " " space
        return substr($result, 1) . PHP_EOL;
    }

    public function insertionSort()
    {
        $resultString = "";
        $laInitSize = count($this->la);
        for ($nb = 0; $nb < $laInitSize; $nb++) {
            // Look for min index
            $minIndex = 0;
            $minValue = PHP_INT_MAX;
            for ($i = 0; $i < count($this->la); $i++) {
                if ($this->la[$i] < $minValue) {
                    $minIndex = $i;
                    $minValue = $this->la[$i];
                }
            }

            // Put min value at the top
            if ($minIndex < count($this->la) / 2) {
                // Rotate from bot to top
                for ($i = $minIndex; $i >= 0; $i--) {
                    $resultString .= " " . $this->rra();
                }
            } else {
                // Rotate from top to bot
                for ($i = $minIndex; $i < count($this->la) - 1; $i++) {
                    $resultString .= " " . $this->ra();
                }
            }

            // Send to top B
            $resultString .= " " . $this->pb();
        }

        // Stack B sorted
        // Send back to Stack A
        $lbInitSize = count($this->lb);
        for ($nb = 0; $nb < $lbInitSize; $nb++) {
            $resultString .= " " . $this->pa();
        }
        return $resultString;
    }

    public function show_bonus()
    {
        global $bonus;
        $bonus = true;
    }
}

// Remove first element of $argv
array_shift($argv);

// Check if input is numeric ?
foreach ($argv as $input) {
    if (!is_numeric($input)) {
        echo $input . " is not a number!" . PHP_EOL;
        exit(-1);
    }
}

$pushswap = new Pushswap($argv);
$actions = $pushswap->show_bonus();
$actions = $pushswap->sort();
echo $actions;
