
<?php
    // include "db_write_to.php";
    include "View.php";

    $request_url = $_SERVER['REQUEST_URI'];
    // echo $request_url;
    
    $admin_register_member = "/sjmda-dir/sjmda-php/ApiController.php/AdminCreateMemberEndpoint";
    $admin_record_expenditures = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordExpendituresEndpoint";
    $admin_record_pledges = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordPledgesEndpoint";
    $admin_record_received_pledges = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordReceivePledgesEndpoint";
    $admin_record_fees = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordFeesEndpoint";
    $admin_user = "/sjmda-dir/sjmda-php/ApiController.php/AdminCreateMemberUerNameEndpoint";
    $admin_record_saving = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordSavingEndpoint";
    $admin_record_details = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordDetailsEndpoint";
    $admin_record_summary = "/sjmda-dir/sjmda-php/ApiController.php/AdminRecordSummaryEndpoint";
    $update_user_details_url = "/sjmda-dir/sjmda-php/ApiController.php/UpdateUserDetailsEndpoint";

    
    // deleting...
    $admin_delete_username = "/sjmda-dir/sjmda-php/ApiController.php/AdminDeleteUsernameEndpoint";
    $ViewAllPaidPledges = "/sjmda-dir/sjmda-php/ApiController.php/ViewAllPaidPledgesEndpoint";
    $DeleteFromPaidPledges = "/sjmda-dir/sjmda-php/ApiController.php/DeleteFromPaidPledgesEndpoint";

    /**
     *          ======================================================
     *                          USER READ FROM DB
     *          =====================================================
     */
    
    $administration_fees= "/sjmda-dir/sjmda-php/ApiController.php/SendUserAdministrativeDataEndpoint";
    $saving_data = "/sjmda-dir/sjmda-php/ApiController.php/GetSavingsDataEndpoint"; // 
    $paver_pledges = "/sjmda-dir/sjmda-php/ApiController.php/GetPaverProjectPledgesEndpoint";
    $paver_pledges_received = "/sjmda-dir/sjmda-php/ApiController.php/GetPaverProjectPledgesReceivedEndpoint";

    $club_pledges = "/sjmda-dir/sjmda-php/ApiController.php/GetClubPledgesEndpoint";
    $club_pledges_received = "/sjmda-dir/sjmda-php/ApiController.php/GetClubPledgesReceivedEndpoint";
    $sugarcanes_pledges = "/sjmda-dir/sjmda-php/ApiController.php/GetSugarcanesProjectPledgesEndpoint";
    $summary_data = "/sjmda-dir/sjmda-php/ApiController.php/GetSummaryDataEndpoint"; //
    $login_user = "/sjmda-dir/sjmda-php/ApiController.php/LogInUserEndpoint"; //
    $pledges_cleared_summary_data = "/sjmda-dir/sjmda-php/ApiController.php/GetPledgesClearedSummaryDataEndpoint"; //
    $pledges_balance_summary_data = "/sjmda-dir/sjmda-php/ApiController.php/GetPledgesBalanceSummaryDataEndpoint"; //
    $pledges_pending_summary_data = "/sjmda-dir/sjmda-php/ApiController.php/GetPledgesPendingSummaryDataEndpoint"; //
    $pavers_summary_data = "/sjmda-dir/sjmda-php/ApiController.php/GetPaversSummaryDataEndpoint"; //
    $pavers_details_data = "/sjmda-dir/sjmda-php/ApiController.php/GetPaversDetailsDataEndpoint"; //
    $expenditure_data = "/sjmda-dir/sjmda-php/ApiController.php/GetExpendituresDataEndpoint"; //
    $member_names = "/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaMemberNamesDataEndpoint";
    $pledge_names = "/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaPledgeNamesDataEndpoint";
    $total_saving = "/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaMemberProfileSummaryEndpoint";
    $total_fees = "/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaMemberTotalFeesEndpoint";
    $at_hand_url = "/sjmda-dir/sjmda-php/ApiController.php/GetSummaryAtHandDataEndpoint";
    
    /**
     *          ======================================================
     *                          ADMIN READ FROM DB
     *          =====================================================
     */
    
    $admin_memebers = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetMembersEndpoint";
    $admin_memeber_details = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberDetailsEndpoint";
    $admin_username_details = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetUsernameDetailsEndpoint";
    $admin_member_saving = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberSavingsDataEndpoint";
    $admin_member_fees = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberFeesDataEndpoint";
    $admin_expense = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetExpenseDataEndpoint";
    $admin_pledges = "/sjmda-dir/sjmda-php/ApiController.php/AdminGetPledgesEndpoint";



    /**
     *          ======================================================
     *                          USER READ FROM DB
     *          =====================================================
     */
    
    if ($request_url === $administration_fees){SendUserAdministrativeDataEndpoint ($request_url);}
    elseif ($request_url === $paver_pledges){GetPaverProjectPledgesEndpoint ($requesturl);}
    elseif ($request_url === $paver_pledges_received){GetPaverProjectPledgesReceivedEndpoint ($requesturl);}

    elseif ($request_url === $club_pledges){GetClubPledgesEndpoint ($requesturl);}
    elseif ($request_url === $club_pledges_received){GetClubPledgesReceivedEndpoint ($requesturl);}
    
    elseif ($request_url === $sugarcanes_pledges){GetSugarcanesProjectPledgesEndpoint ($request_url);}
    elseif ($request_url === $summary_data){GetSummaryDataEndpoint ($request_url);}
    elseif ($request_url === $login_user){LogInUserEndpoint ($request_url);}
    elseif ($request_url === $pledges_cleared_summary_data){GetPledgesClearedSummaryDataEndpoint ($request_url);}
    elseif ($request_url === $pledges_balance_summary_data){GetPledgesBalanceSummaryDataEndpoint ($request_url);}
    elseif ($request_url === $pledges_pending_summary_data){GetPledgesPendingSummaryDataEndpoint ($request_url);}
    elseif ($request_url === $pavers_summary_data){GetPaversSummaryDataEndpoint ($request_url);}
    elseif ($request_url === $pavers_details_data){GetPaversDetailsDataEndpoint ($request_url);}
    elseif ($request_url === $at_hand_url){GetSummaryAtHandDataEndpoint ($request_url);}
    elseif ($request_url === $expenditure_data){GetExpendituresDataEndpoint ($request_url);}
    elseif ($request_url === $saving_data){GetSavingsDataEndpoint ($request_url);}
    elseif ($request_url === $member_names){GetSjmdaMemberNamesDataEndpoint ($request_url);}
    elseif ($request_url === $pledge_names){GetSjmdaPledgeNamesDataEndpoint ($request_url);}
    elseif ($request_url === $total_saving){GetSjmdaMemberProfileSummaryEndpoint ($request_url);}
    elseif ($request_url === $total_fees){GetSjmdaMemberTotalFeesEndpoint ($request_url);}

    /**
     *          ======================================================
     *                          ADMIN READ FROM DB
     *          =====================================================
     */

    elseif ($request_url === $admin_memebers){AdminGetMembersEndpoint ($requesturl);}
    elseif ($request_url === $admin_memeber_details){AdminGetMemberDetailsEndpoint ($requesturl);}
    elseif ($request_url === $admin_username_details){AdminGetUsernameDetailsEndpoint ($requesturl);}
    elseif ($request_url === $admin_member_saving){AdminGetMemberSavingsDataEndpoint ($request_url);}
    elseif ($request_url === $admin_member_fees){AdminGetMemberFeesDataEndpoint ($requesturl);}
    elseif ($request_url === $admin_expense){AdminGetExpenseDataEndpoint ($requesturl);}
    elseif ($request_url === $admin_pledges){AdminGetPledgesEndpoint ($request_url);}
    elseif ($request_url === $ViewAllPaidPledges){ViewAllPaidPledgesEndpoint ($request_url);}
    elseif ($request_url === $DeleteFromPaidPledges){DeleteFromPaidPledgesEndpoint($request_url);}


    // ////////////////////////////////////
    // ////////////////////////////////////
    elseif ($request_url === $admin_register_member){AdminCreateMemberEndpoint ($request_url);}
    elseif ($request_url === $admin_record_expenditures){AdminRecordExpendituresEndpoint ($request_url);}
    elseif ($request_url === $admin_record_pledges){AdminRecordPledgesEndpoint ($request_url);}
    elseif ($request_url === $admin_record_received_pledges){AdminRecordReceivePledgesEndpoint ($request_url);}
    elseif ($request_url === $admin_record_fees){AdminRecordFeesEndpoint ($request_url);}
    elseif ($request_url === $admin_user){AdminCreateMemberUerNameEndpoint ($request_url);}
    elseif ($request_url === $admin_record_saving){AdminRecordSavingEndpoint ($request_url);}
    elseif ($request_url === $admin_record_summary){AdminRecordSummaryEndpoint ($request_url);}
    elseif ($request_url === $admin_record_details){AdminRecordDetailsEndpoint ($request_url);}
    elseif ($request_url === $admin_record_details){AdminRecordDetailsEndpoint ($request_url);}

    elseif ($request_url ===  $update_user_details_url){UpdateUserDetailsEndpoint($request_url);}
    // deleting ..
    elseif ($request_url === $admin_delete_username){AdminDeleteUsernameEndpoint ($request_url);}

    else {echo "Invalid url specified ...";}

?>