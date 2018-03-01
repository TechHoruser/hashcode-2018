<?php

namespace src;

include_once 'Proccess.php';

if ( isset( $_GET['test'] ) ){
    new Proccess($_GET['test'].'.in');

} else {
    echo '<button onclick="window.location.href=\'http://localhost/HashCode/code/src/?test=a_example\'">A</button>';
    echo '<button onclick="window.location.href=\'http://localhost/HashCode/code/src/?test=b_should_be_easy\'">B</button>';
    echo '<button onclick="window.location.href=\'http://localhost/HashCode/code/src/?test=c_no_hurry\'">C</button>';
    echo '<button onclick="window.location.href=\'http://localhost/HashCode/code/src/?test=d_metropolis\'">D</button>';
    echo '<button onclick="window.location.href=\'http://localhost/HashCode/code/src/?test=e_high_bonus\'">E</button>';
}

?>