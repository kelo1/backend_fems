<?php
$v = Imagick::getVersion();
preg_match('/ImageMagick ([0-9]+\.[0-9]+\.[0-9]+)/', $v['versionString'], $v);
if(version_compare($v[1],'6.2.8')<=0){
   print "Your ImageMagick Version {$v[1]} is '6.2.8' or older, please upgrade!";
}
?>
