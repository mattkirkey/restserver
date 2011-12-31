<?php
if(file_exists("restserver.phar")) unlink("restserver.phar");
$phar = new Phar("restserver.phar",0,"restserver.phar");
$phar->buildFromDirectory(dirname(__FILE__),"/\.class\.php$/");
$stub = <<<EOSTUB
    <?php
    Phar::mapPhar("restserver.phar");
    \$file = "phar://restserver.phar/RestServer.class.php";
    if(file_exists(\$file)) include \$file;
    __HALT_COMPILER();
    STUB;
EOSTUB;
$phar->setStub($stub);

?>
