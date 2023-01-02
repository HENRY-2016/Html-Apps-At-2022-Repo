
<?php
    include "db_crud.php";

    $request_url = $_SERVER['REQUEST_URI'];
    // echo $request_url;
    
    $user_donation = "/parish-dir/parish-php/routes_incoming.php/RecordUserDonationEndpoint";
    $donations_status_url = "/parish-dir/parish-php/routes_request.php/GetUserDonationStatusEndpoint";

    

    if ($request_url === $user_donation){RecordUserDonationEndpoint ($request_url);}


    elseif ($request_url === $donations_status_url){GetUserDonationStatusEndpoint ($request_url);}
    

    else {echo "Invalid url specified ...";}

?>