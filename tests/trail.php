<?php

$target = mktime(0, 0, 0, 10, 10, 2017) ;

$today = time () ;

$difference =($target-$today) ;

$days =(int) ($difference/86400) ;

print "Our event will occur in $days days";

?>