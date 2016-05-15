<?php 
 	$nav_names = array();

    // Returns an array of the menu key and values.

    function nav_print(){
        $nav_names['Home'] = '#home';
        $nav_names['About'] = '#about';
        $nav_names['Characters'] = '#characters';
        $nav_names['Instructions'] = '#instructions';
        $nav_names['Gallery'] = '#gallery';
        $nav_names['Team'] = '#team';
        $nav_names['Contact'] = '#contact';

        return $nav_names;
                        
        }

    $navig = nav_print();

    foreach ($navig as $title => $link){
        echo "<li><a href='$link' >$title</a></li>";
    }
?>