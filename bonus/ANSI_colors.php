<?php

#That is : \033[48;5;<BG COLOR>m
printf("\033[48;5;32mTesting color background\033[0m" . PHP_EOL);
printf("\033[48;5;33mTesting color background\033[0m" . PHP_EOL);
printf("\033[48;5;69mTesting color background\033[0m" . PHP_EOL);
printf("\033[48;5;68mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;104mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;105mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;140mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;141mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;176mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;177mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;212mTesting color background\033[0m" . PHP_EOL);
// printf("\033[48;5;213mTesting color background\033[0m" . PHP_EOL);

$clear = "\033[0m";
$bg_gradient1 = "\033[48:5:⟨32⟩m";
$bg_gradient1_5 = "\033[48:5:⟨33⟩m";
$bg_gradient2 = "\033[48:5:⟨68⟩m";
$bg_gradient2_5 = "\033[48:5:⟨69⟩m";
$bg_gradient3 = "\033[48:5:⟨104⟩m";
$bg_gradient3_5 = "\033[48:5:⟨105⟩m";
$bg_gradient4 = "\033[48:5:⟨140⟩m";
$bg_gradient4_5 = "\033[48:5:⟨141⟩m";
$bg_gradient5 = "\033[48:5:⟨176⟩m";
$bg_gradient5_5 = "\033[48:5:⟨177⟩m";
$bg_gradient6 = "\033[48:5:⟨212⟩m";
$bg_gradient6_5 = "\033[48:5:⟨213⟩m";