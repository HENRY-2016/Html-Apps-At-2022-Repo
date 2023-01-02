


<?php

// $url = 'https://mogahenze.com';
$url = 'http://10.42.0.1'; 


// dirs
$html_pages_source_dir = '/parish-dir/parish-repo/';
$php_scripts_dir = '/parish-dir/parish-php/';




// PHP GUIS
$AdminLogIn = $url.$php_scripts_dir.'processlogin.php'; 
//$ClientLogInPage = $url.$php_scripts_dir.'login_user.php'; 



// HTML FILES GUI.....
$ClientLogInPage= $url.$html_pages_source_dir.'index.html';
$ClientIndexPage = $url.$html_pages_source_dir.'user_informention.html';

$AdminIndexPage = $url.$html_pages_source_dir.'admin_create.html'; // Entery Point ..... 



/* 

    Configuring apach2 to run php inside .html file
        cd /etc/apache2/mods-available$ sudo nano php7.0.conf

            # Then add the following at the top of the file
            <FilesMatch ".+\.html$">
                SetHandler application/x-httpd-php
            </FilesMatch>

*/
?>

