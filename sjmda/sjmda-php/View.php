
<?php

    include "db.php";
    include "configfile.php";

    /**
     *          ======================================================
     *                          USER READ FROM DB
     *          =====================================================
     */
    function SendUserAdministrativeDataEndpoint ($requesturl)
    {
        $row_data  = file_get_contents('php://input');
        $json_data = json_decode($row_data); // convert to json 

        $name = trim($json_data->Name);
        $year = trim($json_data->Year);
        GetAdministrativeFees ($name,$year);
    }

    function GetSavingsDataEndpoint ($requesturl) 
    {
        $row_data  = file_get_contents('php://input');
        $json_data = json_decode($row_data); // convert to json 

        $name = trim($json_data->Name);
        $year = trim($json_data->Year);

        GetSavingsData($name,$year);
    }
    // function GetSjmdaMemberProfileSummaryEndpoint ($requesturl) 
    // {
    //     global $SavingTable ,$Administrative,$MembershipTable;
    //     $row_data  = file_get_contents('php://input');
    //     $json_data = json_decode($row_data); // convert to json 

    //     $name = trim($json_data->Name);
    //     GetSjmdaMemberTotalSavings($SavingTable,$Administrative,$MembershipTable,$name);
    // }
    function GetSjmdaMemberProfileSummaryEndpoint ($requesturl) 
    {
        global $SavingTable ,$Administrative,$MembershipTable,$PaidPledgesTable;
        $row_data  = file_get_contents('php://input');
        $json_data = json_decode($row_data); // convert to json 

        $name = trim($json_data->Name);
        GetSjmdaMemberTotalSavings($SavingTable,$Administrative,$MembershipTable,$PaidPledgesTable,$name);
    }
    function GetSjmdaMemberTotalFeesEndpoint ($requesturl) 
    {
        $row_data  = file_get_contents('php://input');
        $json_data = json_decode($row_data); // convert to json 

        $name = trim($json_data->Name);
        GetSjmdaMemberTotalFees($name);
    }
    function LogInUserEndpoint ($requesturl)
    {
        $row_data  = file_get_contents('php://input');
        $json_data = json_decode($row_data); // convert to json 

        $name = trim($json_data->Name);
        $password= trim($json_data->Password);
        LogInUser ($name,$password);
    }


    // APis .....
    function GetPaverProjectPledgesEndpoint ($requesturl) {global $PledgesTable, $PaversItemName; GetPledgesDetails($PledgesTable, $PaversItemName);}
    function GetPaverProjectPledgesReceivedEndpoint ($requesturl) { global $PaidPledgesTable, $PaversItemName; GetReceivedPledges($PaidPledgesTable,$PaversItemName);}
    function GetClubPledgesEndpoint ($requesturl) { global $PledgesTable, $ClubItemName; GetPledgesDetails ($PledgesTable,$ClubItemName);}
    function GetClubPledgesReceivedEndpoint ($requesturl) { global $PaidPledgesTable,$ClubItemName; GetReceivedPledges($PaidPledgesTable, $ClubItemName);}
    function GetSugarcanesProjectPledgesEndpoint ($requesturl) {GetSugarcaneProjectPledges();}
    function GetSummaryDataEndpoint ($requesturl){GetSummaryData ();}
    function GetPledgesPendingSummaryDataEndpoint ($requesturl){GetPledgesPendingSummaryData ();}
    function GetPaversSummaryDataEndpoint ($requesturl){ global $SummaryTable,$PaversItemName; GetPaversSummary ($SummaryTable,$PaversItemName);}
    function GetPaversDetailsDataEndpoint ($requesturl){global $DetailsTable,$PaversItemName; GetPaversSummary ($DetailsTable,$PaversItemName);}
    function GetPledgesClearedSummaryDataEndpoint ($requesturl){GetPledgesClearedSummaryData ();}
    function GetPledgesBalanceSummaryDataEndpoint ($requesturl){GetPledgesBalanceSummaryData ();}
    function GetSummaryAtHandDataEndpoint ($requesturl){GetSummaryAtHandData ();}
    function GetExpendituresDataEndpoint ($requesturl){GetExpendituresData ();}
    function GetSjmdaMemberNamesDataEndpoint (){GetSjmdaMemberNamesData ();}
    function GetSjmdaPledgeNamesDataEndpoint (){GetSjmdaPledgeNamesData ();}


    /**
     *          ======================================================
     *                          ADMIN READ FROM DB
     *          =====================================================
     */

    function AdminGetMemberSavingsDataEndpoint ($requesturl) 
    {
        $name = trim($_POST['name']);
        $year = trim($_POST['year']);
        AdminGetMemberSavingsData($name,$year);
    }
    function AdminGetMemberFeesDataEndpoint ($requesturl) 
    {
        $name = trim($_POST['name']);
        $year = trim($_POST['year']);
        AdminGetMemberFeesData($name,$year);
    }
    function AdminGetMembersEndpoint ($requesturl) {AdminGetMembers();}
    function AdminGetMemberDetailsEndpoint ($requesturl) {AdminGetMemberDetails();}
    function AdminGetUsernameDetailsEndpoint ($requesturl) {AdminGetUsernameDetails();}
    function AdminGetExpenseDataEndpoint ($requesturl){AdminGetExpenseData ();}
    function AdminGetPledgesEndpoint ($requesturl) {AdminGetPledgesData();}
    function ViewAllPaidPledgesEndpoint ($requesturl){ global $PaidPledgesTable; ViewFromPledges ($PaidPledgesTable);}







        /**
     *          ======================================================
     *                          USER WRITE TO DB
     *          =====================================================
     * 
     * 
     */

function UpdateUserDetailsEndpoint ($requesturl)
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $id = $json_data->Id;
    $password = trim($json_data->Password);
    $name = trim($json_data->Name);

    UpdateUserDetails ($password,$name,$id);
}

function AdminCreateMemberEndpoint ($requesturl)
{

    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $name = trim($json_data->Name);
    $fee = trim($json_data->Fee);

    $bal = $fee - 50000;
    $balance = number_format($bal);
    $fees = number_format($fee);

    $date= date("d/m/Y");
    AdminRegisterNewUser ($name,$date, $fees,$balance);
}
function AdminRecordReceivePledgesEndpoint ($requesturl)
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $item = trim($json_data->Item);
    $names = trim($json_data->Name);
    $amount = trim($json_data->Amount);
    $month = trim($json_data->Month);

    $pledge = number_format($amount);
    $id = date("dh-is");
    $dates= date("d/m/Y");
    AdminRecordReceivePledges ($item,$names,$pledge,$dates,$id,$month);
}
function AdminRecordPledgesEndpoint ($requesturl)
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $item = trim($json_data->Item);
    $names = trim($json_data->Name);
    $amount = trim($json_data->Amount);

    $pledge = number_format($amount);
    $id = date("dh-is");
    $dates= date("d/m/Y");
    AdminRecordPledges ($item,$names,$pledge,$dates,$id);
}

function AdminRecordSummaryEndpoint ($requesturl)
{
    global $SummaryTable;
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $name = $json_data->Name;
    $placeholder_1 = trim($json_data->Placeholder_1);
    $placeholder_2 = trim($json_data->Placeholder_2);
    $placeholder_3 = trim($json_data->Placeholder_3);
    $placeholder_4 = trim($json_data->Placeholder_4);
    $placeholder_5 = trim($json_data->Placeholder_5);
    $placeholder_6 = trim($json_data->Placeholder_6);
    $placeholder_7 = trim($json_data->Placeholder_7);

    $id = date("dh-is");
    $date= date("d/m/Y");
    AdminRecordDetailsAndSummary ($SummaryTable,$id,$name,$date,$placeholder_1,$placeholder_2,$placeholder_3,$placeholder_4,$placeholder_5,$placeholder_6,$placeholder_7);
}

function AdminRecordDetailsEndpoint ($requesturl)
{
    // echo $requesturl;
    global $DetailsTable;
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    // echo json_encode($json_data);
    $name = $json_data->Name;
    $placeholder_1 = trim($json_data->Placeholder_1);
    $placeholder_2 = trim($json_data->Placeholder_2);
    $placeholder_3 = trim($json_data->Placeholder_3);
    $placeholder_4 = trim($json_data->Placeholder_4);
    $placeholder_5 = trim($json_data->Placeholder_5);
    $placeholder_6 = trim($json_data->Placeholder_6);
    $placeholder_7 = trim($json_data->Placeholder_7);

    // echo $name;
    $id = date("dh-is");
    $date= date("d/m/Y");
    AdminRecordDetailsAndSummary ($DetailsTable,$id,$name,$date,$placeholder_1,$placeholder_2,$placeholder_3,$placeholder_4,$placeholder_5,$placeholder_6,$placeholder_7);
}
function AdminCreateMemberUerNameEndpoint ()
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $memberName = trim($json_data->MemberName);
    $username = trim($json_data->UserName);
    $password = trim($json_data->Password);

    $id = date("dh-is");
    AdminCreateMemberUerName($id,$memberName, $username,$password);
}
function AdminRecordExpendituresEndpoint ($requesturl)
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $item = trim($json_data->Name);
    $cash = trim($json_data->Amount);
    $receipt = trim($json_data->Receipt);
    $amount = number_format($cash);

    $id = date("dh-is");
    $dates= date("d/m/Y");
    AdminRecordExpenditures ($item, $amount, $dates, $receipt,$id);
}

function AdminRecordSavingEndpoint ($requesturl)
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $name = trim($json_data->Name);
    $amount = trim($json_data->Amount);
    $year = trim($json_data->Year);
    $month = trim($json_data->Month);

    $id = date("dh-is");
    $dates= date("d/m/Y");
    AdminRegisterSavings ($name,$dates,$amount,$year,$month,$id);
}


function AdminRecordFeesEndpoint ()
{
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 

    $name = trim($json_data->Name);
    $amount = trim($json_data->Amount);
    $year = trim($json_data->Year);
    $month = trim($json_data->Month);


    $id = date("dh-is");
    $dates= date("d/m/Y");
    AdminRegisterAdminstrativeFess ($name,$dates,$amount,$year,$month,$id);
}




function DeleteFromPaidPledgesEndpoint ()
{
    global $PaidPledgesTable;
    $row_data  = file_get_contents('php://input');
    $json_data = json_decode($row_data); // convert to json 
    $id = trim($json_data->Id);
    DeleteFromDataBase ($PaidPledgesTable,$id);
    
}

?>
