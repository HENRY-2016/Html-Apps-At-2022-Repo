
<?php

include "configfile.php";
$db_path = 'data_base/sjmda.db';
$db = new SQLite3($db_path);

if (!$db) {echo $db->lastErrorMsg();}
// else {echo "Opened Data Base Successfully\n";}

function CreateDataBaseTables ()
{
    global $db;

    $membership_table = "CREATE TABLE IF NOT EXISTS membership (NAMES TEXT PRIMARY KEY,DATES TEXT, FEES TEXT,BALANCE TEXT)";
    $users_table = "CREATE TABLE IF NOT EXISTS users (ID TEXT, MEMBERNAME TEXT PRIMARY KEY,USERNAME TEXT,CONTACT TEXT,COMMUNITY TEXT,UPASSWORD TEXT)";
    // $users_table = "ALTER TABLE users ADD MEMBER_NAME TEXT";// Add a new column
    $pledges_table = "CREATE TABLE IF NOT EXISTS pledges (ITEM TEXT,NAMES TEXT,PLEDGE TEXT,DATES TEXT)";
    //$pledges_table = "ALTER TABLE pledges ADD ID TEXT";// Add a new column
    // $paid_pledges_table = "CREATE TABLE IF NOT EXISTS paidpledges (ITEM TEXT,NAMES TEXT,PAID TEXT,DATES TEXT)";
    //$paid_pledges_table = "ALTER TABLE paidpledges ADD ID TEXT";// Add a new column
    // $paid_pledges_table = "ALTER TABLE paidpledges ADD MONTHS TEXT";// Add a new column
    $expenditure_table = "CREATE TABLE IF NOT EXISTS expenditure (ITEM TEXT,AMOUNT TEXT, DATES TEXT, RECIEPT TEXT)";
    //$expenditure_table = "ALTER TABLE expenditure ADD ID TEXT";// Add a new column
    $savings_table = "CREATE TABLE IF NOT EXISTS savings (NAMES TEXT,DATES TEXT,AMOUNT TEXT, YEARS TEXT, MONTHS TEXT)";
    //$savings_table = "ALTER TABLE savings ADD ID TEXT";// Add a new column
    $administrative_fees_table = "CREATE TABLE IF NOT EXISTS administrative_fees (NAMES TEXT,DATES TEXT,AMOUNT TEXT,YEARS TEXT, MONTHS TEXT)";
    //$administrative_fees_table = "ALTER TABLE administrative_fees ADD ID TEXT";// Add a new column


    // 12/05/2022
    $details_table = "CREATE TABLE IF NOT EXISTS details (ID TEXT PRIMARY KEY, ITEAM TEXT, DATES TEXT, PLACEHOLDER_1 TEXT, PLACEHOLDER_2 TEXT, PLACEHOLDER_3 TEXT, PLACEHOLDER_4 TEXT, PLACEHOLDER_5 TEXT,PLACEHOLDER_6 TEXT, PLACEHOLDER_7 TEXT)";
    $summary_table = "CREATE TABLE IF NOT EXISTS summary (ID TEXT PRIMARY KEY, ITEAM TEXT, DATES TEXT, PLACEHOLDER_1 TEXT, PLACEHOLDER_2 TEXT, PLACEHOLDER_3 TEXT, PLACEHOLDER_4 TEXT, PLACEHOLDER_5 TEXT,PLACEHOLDER_6 TEXT, PLACEHOLDER_7 TEXT)";

    $tables = array($summary_table,$details_table,$membership_table,$users_table,$pledges_table,$paid_pledges_table,$expenditure_table,$expenditure_table,$savings_table,$administrative_fees_table);

    foreach ($tables as $table_name)
    {
        $table_name_length = strlen('$table_name');
        $created_table = substr($table_name, 26,$table_name_length);
        $create_table_cmd = $db->exec($table_name);
        if (!$create_table_cmd) {echo $db->lastErrorMsg();}
        else {echo $created_table."...Created Very Well\n";echo"";}
    }
    $db->close();

}

/** 
 *          ==============
 *          WRITTING TO DB
 *          ==============
*/

function AdminRegisterNewUser ($name,$date, $fees,$balance)
{
    global $db;
    $insert_cmd = "INSERT INTO membership VALUES ('$name','$date', '$fees','$balance')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}

function AdminRecordExpenditures ($item, $amount, $date, $reciept,$id)
{

    global $db;
    $insert_cmd = "INSERT INTO expenditure VALUES ('$item', '$amount', '$date', '$reciept','$id')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}

function AdminRecordDetailsAndSummary ($tableName,$id,$name,$date,$placeholder_1,$placeholder_2,$placeholder_3,$placeholder_4,$placeholder_5,$placeholder_6,$placeholder_7)
{

    global $db;
    $insert_cmd = "INSERT INTO '$tableName' VALUES ('$id','$name','$date','$placeholder_1','$placeholder_2','$placeholder_3','$placeholder_4','$placeholder_5','$placeholder_6','$placeholder_7')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}
function AdminRecordPledges ($item,$names,$pledge,$dates,$id)
{
    global $db;
    $insert_cmd = "INSERT INTO pledges VALUES ('$item','$names','$pledge','$dates','$id')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}
function AdminRecordReceivePledges ($item,$names,$pledge,$dates,$id,$month)
{
    global $db;
    $insert_cmd = "INSERT INTO paidpledges VALUES ('$item','$names','$pledge','$dates','$id','$month')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}


function AdminRegisterSavings ($names,$dates,$amount,$years,$months,$id)
{

    global $db;
    $insert_cmd = "INSERT INTO savings VALUES ('$names','$dates','$amount','$years','$months','$id')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}
function AdminRegisterAdminstrativeFess ($names,$dates,$amount,$years,$months,$id)
{

    global $db;
    $insert_cmd = "INSERT INTO administrative_fees VALUES ('$names','$dates','$amount','$years','$months','$id')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}

function AdminCreateMemberUerName ($id,$memberName, $username,$password)
{
    global $db;
    $id = date("dh-is");
    $insert_cmd = "INSERT INTO users VALUES ('$id','$memberName','$username','none','none','$password')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}


/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              DELETING FROM DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/
function AdminDeleteUserName ($name)
{
    
    global $db;
    $delete_cmd = "DELETE FROM users WHERE MEMBERNAME = '$name'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}

function DeleteFromDataBase ($table_name, $id)
{
    global $db;
    $delete_cmd = "DELETE FROM '$table_name' WHERE ID = '$id'";
    $delete_excution = $db->exec($delete_cmd);
    if (!$delete_excution) 
    {
        $message = "Data Base <br>Error<br>". $db->lastErrorMsg();
        echo $message;
        exit();
    }
    else {echo "Success";}
}
/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ================
 *              UPDATING DB
 *              ================
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/

function UpdateUserDetails ($password,$name,$id)
{
    global $db;
    $update_cmd = "UPDATE users SET USERNAME = '$name', UPASSWORD='$password' WHERE ID = '$id'";

    $update_cmd_excution = $db->exec($update_cmd);
    if (!$update_cmd_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}


    /**
     *          ======================================================
     *                          USER READING FROM DB
     *          =====================================================
     */

function LogInUser ($UserName,$Password)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM users WHERE USERNAME = '$UserName' AND UPASSWORD = '$Password'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $name = $row['MEMBERNAME']; 
            $username = $row['USERNAME']; 
            $id = $row['ID']; 
            $results[] = array('NAME' => $name,'USERNAME'=>$username,'ID'=>$id);
        }
    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function GetAdministrativeFees ($name, $year)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM administrative_fees WHERE NAMES = '$name' AND YEARS = '$year'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES']; 
            $DATES = $row['DATES'];
            $AMOUNT = $row['AMOUNT'];
            $YEARS = $row['YEARS']; 
            $MONTHS = $row['MONTHS'];

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES, 
                                'DATE' => $DATES,
                                'AMOUNT' => $AMOUNT,
                                'YEAR' => $YEARS, 
                                'MONTH' => $MONTHS
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}



/*
    =====================
    READING RFOM DATABASE
    =====================
*/
function GetSavingsData ($name,$year)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM savings WHERE NAMES = '$name' AND YEARS = '$year'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // NAMES TEXT,DATES TEXT,AMOUNT TEXT, YEARS TEXT, MONTHS
            $NAMES = $row['NAMES']; 
            $DATES = $row['DATES'];
            $AMOUNT = $row['AMOUNT'];
            $YEARS = $row['YEARS']; 
            $MONTHS = $row['MONTHS'];

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES, 
                                'DATE' => $DATES,
                                'AMOUNT' => $AMOUNT,
                                'YEAR' => $YEARS, 
                                'MONTH' => $MONTHS
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function GetPledgesDetails ($tableName,$itemName)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$tableName' WHERE ITEM = '$itemName'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES'];
            $DATES = $row['DATES'];
            $PLEDGE = $row['PLEDGE']; 

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES,
                                'DATE' => $DATES,
                                'PLEDGE' => $PLEDGE, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}
function GetReceivedPledges ($tableName,$itemName)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$tableName' WHERE ITEM = '$itemName'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES'];
            $DATES = $row['DATES'];
            $PLEDGE = $row['PAID']; 
            $MONTH = $row['MONTHS']; 

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES,
                                'DATE' => $DATES,
                                'PLEDGE' => $PLEDGE, 
                                'MONTH'=>$MONTH,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function GetPaversSummary ($tableName,$itemName)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$tableName' WHERE ITEAM = '$itemName'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $DATES = $row['DATES'];
            $PLACEHOLDER_1 = $row['PLACEHOLDER_1']; 
            $PLACEHOLDER_2 = $row['PLACEHOLDER_2']; 
            $PLACEHOLDER_3 = $row['PLACEHOLDER_3']; 
            $PLACEHOLDER_4 = $row['PLACEHOLDER_4']; 
            $PLACEHOLDER_5 = $row['PLACEHOLDER_5']; 
            $PLACEHOLDER_6 = $row['PLACEHOLDER_6']; 
            $PLACEHOLDER_7 = $row['PLACEHOLDER_7']; 
            $results[] = array( 
                            'DATES' => $DATES,
                            'PLACEHOLDER_1' => $PLACEHOLDER_1, 
                            'PLACEHOLDER_2' => $PLACEHOLDER_2, 
                            'PLACEHOLDER_3' => $PLACEHOLDER_3, 
                            'PLACEHOLDER_4' => $PLACEHOLDER_4, 
                            'PLACEHOLDER_5' => $PLACEHOLDER_5, 
                            'PLACEHOLDER_6' => $PLACEHOLDER_6, 
                            'PLACEHOLDER_7' => $PLACEHOLDER_7, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function GetSugarcaneProjectPledges ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM pledges WHERE ITEM = 'sugarcanes'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES'];
            $DATES = $row['DATES'];
            $PLEDGE = $row['PLEDGE']; 
            $PAID = $row['PAID'];
            $BALANCE = $row['BALANCE']; 

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES,
                                'DATE' => $DATES,
                                'PLEDGE' => $PLEDGE, 
                                'PAID' => $PAID,
                                'BALANCE' => $BALANCE, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function GetSummaryData ()
{
    global $db,$ClubItemName,$PaversItemName;

    $membership_results = array();
    $savings_results = array();
    $fees_results = array();
    $pavers_results = array();
    $club_results = array();

    $results = array();



    $membership_total = 0;
    $club_total = 0;
    $pavers_total = 0;
    $savings_total = 0;
    $fees_total = 0;
    $Senkubuge = 168500;

    $membership_cmd = "SELECT FEES FROM membership";
    $savings_cmd = "SELECT AMOUNT FROM savings";
    $fees_cmd = "SELECT AMOUNT FROM administrative_fees";
    $pavers_cmd = "SELECT PAID FROM paidpledges WHERE ITEM = '$PaversItemName'";
    $club_cmd = "SELECT PAID FROM paidpledges WHERE ITEM = '$ClubItemName';";


    $membership_query = $db->query($membership_cmd);
    $savings_query = $db->query($savings_cmd);
    $club_query = $db->query($club_cmd);
    $pavers_query = $db->query($pavers_cmd);
    $fees_query = $db->query($fees_cmd);

    while ($row = $membership_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['FEES'];$membership_results[] = $AMOUNT;}
    while ($row = $savings_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$savings_results[] = $AMOUNT;}
    while ($row = $fees_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fees_results[] = $AMOUNT;}
    while ($row = $pavers_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$pavers_results[] = $AMOUNT;}
    while ($row = $club_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$club_results[] = $AMOUNT;}


    foreach($membership_results as $amount)
        {$formatamount = str_replace(',','',$amount); $membership_total += $formatamount;}
    foreach($savings_results as $amount)
        {$formatamount = str_replace(',','',$amount); $savings_total += $formatamount;}
    foreach($fees_results as $amount)
        {$formatamount = str_replace(',','',$amount); $fees_total += $formatamount;}
    foreach($pavers_results as $amount)
        {$formatamount = str_replace(',','',$amount); $pavers_total += $formatamount;}
    foreach($club_results as $amount)
        {$formatamount = str_replace(',','',$amount); $club_total += $formatamount;}


        $formated_membership_total = number_format($membership_total);
        $formated_pavers_total = number_format($pavers_total);
        $formated_club_total = number_format($club_total);
        $formated_savings_total = number_format($savings_total);
        $formated_fees_total = number_format($fees_total);
        $total_collections = $Senkubuge + $club_total + $pavers_total + $membership_total + $savings_total + $fees_total;
        $formated_total_collections = number_format($total_collections);
        $formated_Senkubuge_total = number_format($Senkubuge);
        $results[] = array(
                        'MEMBERSHIP' => $formated_membership_total,
                        'PAVERS' => $formated_pavers_total,
                        'CLUB' => $formated_club_total,
                        'SENKUBUGE' => $formated_Senkubuge_total,
                        'SAVINGS' => $formated_savings_total,
                        'FEES'  => $formated_fees_total,
                        'TOTAL' => $formated_total_collections,
                        );
        echo json_encode($results);
        $db->close();
}


function GetPledgesPendingSummaryData ()
{
    global $db, $PledgesTable, $ClubItemName,$PaversItemName, $SugarCanesItemName;

    $pavers_results = array();
    $club_results = array();
    $sugar_canes_results = array();
    $results = array();


    $pavers_total = 0;
    $club_total = 0;
    $sugar_cane_total = 0;

    $pavers_cmd = "SELECT * FROM '$PledgesTable' WHERE ITEM = '$PaversItemName'";
    $club_cmd = "SELECT * FROM '$PledgesTable' WHERE ITEM = '$ClubItemName';";
    $sugar_cane_cmd = "SELECT * FROM '$PledgesTable' WHERE ITEM ='$SugarCanesItemName'";

    $pavers_query = $db->query($pavers_cmd);
    $club_query = $db->query($club_cmd);
    $sugar_cane_query = $db->query($sugar_cane_cmd);

    while ($row = $pavers_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PLEDGE'];$pavers_results[] = $AMOUNT;}
    while ($row = $club_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PLEDGE'];$club_results[] = $AMOUNT;}
    // while ($row = $sugar_cane_query ->fetchArray(SQLITE3_ASSOC))
    //     {$AMOUNT = $row['PLEDGE'];$sugar_canes_results[] = $AMOUNT;}


    foreach($pavers_results as $amount)
        {$formatamount = str_replace(',','',$amount); $pavers_total += $formatamount;}
    foreach($club_results as $amount)
        {$formatamount = str_replace(',','',$amount); $club_total += $formatamount;}
    // foreach($sugar_canes_results as $amount)
    //     {$formatamount = str_replace(',','',$amount); $sugar_cane_total += $formatamount;}


        $formated_pavers_total = number_format($pavers_total);
        $formated_club_total = number_format($club_total);
        $formated_fees_total = number_format($sugar_cane_total);
        $total_collections = $pavers_total + $club_total + $sugar_cane_total;
        $formated_total_collections = number_format($total_collections);

        $results[] = array(
                        'PAVERS' => $formated_pavers_total,
                        'CLUB' => $formated_club_total,
                        'SUGARCANE'  => $sugar_cane_total,
                        'TOTAL' => $formated_total_collections,
                        );
        echo json_encode($results);
        $db->close();
}

function GetPledgesClearedSummaryData ()
{
    global $db, $PaidPledgesTable, $ClubItemName,$PaversItemName, $SugarCanesItemName;

    $pavers_results = array();
    $club_results = array();
    $sugar_canes_results = array();
    $results = array();


    $pavers_total = 0;
    $club_total = 0;
    $sugar_cane_total = 0;

    $pavers_cmd = "SELECT * FROM '$PaidPledgesTable' WHERE ITEM = '$PaversItemName'";
    $club_cmd = "SELECT * FROM '$PaidPledgesTable' WHERE ITEM = '$ClubItemName';";
    $sugar_cane_cmd = "SELECT * FROM '$PaidPledgesTable' WHERE ITEM ='$SugarCanesItemName'";

    $pavers_query = $db->query($pavers_cmd);
    $club_query = $db->query($club_cmd);
    $sugar_cane_query = $db->query($sugar_cane_cmd);

    while ($row = $pavers_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$pavers_results[] = $AMOUNT;}
    while ($row = $club_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$club_results[] = $AMOUNT;}
    // while ($row = $sugar_cane_query ->fetchArray(SQLITE3_ASSOC))
    //     {$AMOUNT = $row['PAID'];$sugar_canes_results[] = $AMOUNT;}


    foreach($pavers_results as $amount)
        {$formatamount = str_replace(',','',$amount); $pavers_total += $formatamount;}
    foreach($club_results as $amount)
        {$formatamount = str_replace(',','',$amount); $club_total += $formatamount;}
    // foreach($sugar_canes_results as $amount)
    //     {$formatamount = str_replace(',','',$amount); $sugar_cane_total += $formatamount;}


        $formated_pavers_total = number_format($pavers_total);
        $formated_club_total = number_format($club_total);
        $formated_fees_total = number_format($sugar_cane_total);
        $total_collections = $pavers_total + $club_total + $sugar_cane_total;
        $formated_total_collections = number_format($total_collections);

        $results[] = array(
                        'PAVERS' => $formated_pavers_total,
                        'CLUB' => $formated_club_total,
                        'SUGARCANE'  => $sugar_cane_total,
                        'TOTAL' => $formated_total_collections,
                        );
        echo json_encode($results);
        $db->close();
}


function GetPledgesBalanceSummaryData ()
{
    global $db, $PledgesTable,$PaidPledgesTable;
    global $ClubItemName,$PaversItemName, $SugarCanesItemName;

    $results = array();

    $pavers_results = array();
    $club_results = array();
    $sugar_canes_results = array();
    $pavers_pledge_results = array();
    $club_pledge_results = array();
    $sugar_canes_pledges_results = array();


    $pavers_total = 0;
    $club_total = 0;
    $sugar_cane_total = 0;
    $pavers_pledges_total = 0;
    $club_pledges_total = 0;
    $sugar_cane_pledges_total = 0;

    $pavers_cmd = "SELECT * FROM '$PaidPledgesTable' WHERE ITEM = '$PaversItemName'";
    $club_cmd = "SELECT * FROM '$PaidPledgesTable' WHERE ITEM = '$ClubItemName';";
    $sugar_cane_cmd = "SELECT * FROM '$PaidPledgesTable' WHERE ITEM ='$SugarCanesItemName'";

    $pavers_pledges_cmd = "SELECT * FROM '$PledgesTable' WHERE ITEM = '$PaversItemName'";
    $club_pledges_cmd = "SELECT * FROM '$PledgesTable' WHERE ITEM = '$ClubItemName';";
    $sugar_cane_pledges_cmd = "SELECT * FROM '$PledgesTable' WHERE ITEM ='$SugarCanesItemName'";

    $pavers_query = $db->query($pavers_cmd);
    $club_query = $db->query($club_cmd);
    $sugar_cane_query = $db->query($sugar_cane_cmd);

    $pavers_pledge_query = $db->query($pavers_pledges_cmd);
    $club_pledges_query = $db->query($club_pledges_cmd);
    $sugar_cane_query = $db->query($sugar_cane_pledges_cmd);

    while ($row = $pavers_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$pavers_results[] = $AMOUNT;}
    while ($row = $club_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$club_results[] = $AMOUNT;}
    // while ($row = $sugar_cane_query ->fetchArray(SQLITE3_ASSOC))
    //     {$AMOUNT = $row['PAID'];$sugar_canes_results[] = $AMOUNT;}

    while ($row = $pavers_pledge_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PLEDGE'];$pavers_pledge_results[] = $AMOUNT;}
    while ($row = $club_pledges_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PLEDGE'];$club_pledge_results[] = $AMOUNT;}
    // while ($row = $sugar_cane_query ->fetchArray(SQLITE3_ASSOC))
    //     {$AMOUNT = $row['PLEDGE'];$sugar_canes_pledges_results[] = $AMOUNT;}


    foreach($pavers_results as $amount)
        {$formatamount = str_replace(',','',$amount); $pavers_total += $formatamount;}
    foreach($club_results as $amount)
        {$formatamount = str_replace(',','',$amount); $club_total += $formatamount;}
    // foreach($sugar_canes_results as $amount)
    //     {$formatamount = str_replace(',','',$amount); $sugar_cane_total += $formatamount;}


    foreach($pavers_pledge_results as $amount)
        {$formatamount = str_replace(',','',$amount); $pavers_pledges_total += $formatamount;}
    foreach($club_pledge_results as $amount)
        {$formatamount = str_replace(',','',$amount); $club_pledges_total += $formatamount;}
    // foreach($sugar_canes_pledges_results as $amount)
    //     {$formatamount = str_replace(',','',$amount); $sugar_cane_pledges_total += $formatamount;}



        $pavers_balance = $pavers_pledges_total - $pavers_total; 
        $club_balance = $club_pledges_total - $club_total; 
        $sugar_cane_balance = $sugar_cane_pledges_total - $sugar_cane_total; 


        $formated_pavers_balance_total = number_format($pavers_balance);
        $formated_club_balance_total = number_format($club_balance);
        $formated_sugar_cane_balance_total = number_format($sugar_balance);

        $total_balance = $pavers_balance + $club_balance + $sugar_cane_balance;
        $formated_total_balance = number_format($total_balance);

        $results[] = array(
                        'PAVERSBALANCE' => $formated_pavers_balance_total,
                        'CLUBBALANCE' => $formated_club_balance_total,
                        'SUGARCANEBALANCE'  => $formated_sugar_cane_balance_total,
                        'TOTALBALANCE' => $formated_total_balance,
                        );
        echo json_encode($results);
        $db->close();
}

function GetSummaryAtHandData ()
{
    global $db,$ClubItemName,$PaversItemName;
    $membership_results = array();
    $pavers_results = array();
    $club_results = array();
    $savings_results = array();
    $fees_results = array();
    $expenditure_results = array();
    $results = array();


    $membership_total = 0;
    $savings_total = 0;
    $club_total = 0;
    $pavers_total = 0;
    $fees_total = 0;
    $expenditure_total = 0;
    $Senkubuge = 168500;

    $membership_cmd = "SELECT FEES FROM membership";
    $savings_cmd = "SELECT AMOUNT FROM savings";
    $fees_cmd = "SELECT AMOUNT FROM administrative_fees";
    $expenditure_cmd = "SELECT AMOUNT FROM expenditure";
    $pavers_cmd = "SELECT PAID FROM paidpledges WHERE ITEM = '$PaversItemName'";
    $club_cmd = "SELECT PAID FROM paidpledges WHERE ITEM = '$ClubItemName';";


    $membership_query = $db->query($membership_cmd);
    $savings_query = $db->query($savings_cmd);
    $fees_query = $db->query($fees_cmd);
    $expenditure_query = $db->query($expenditure_cmd);
    $club_query = $db->query($club_cmd);
    $pavers_query = $db->query($pavers_cmd);


    while ($row = $membership_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['FEES'];$membership_results[] = $AMOUNT;}
    while ($row = $savings_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$savings_results[] = $AMOUNT;}
    while ($row = $fees_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$fees_results[] = $AMOUNT;}
    while ($row = $expenditure_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$expenditure_results[] = $AMOUNT;}
    while ($row = $pavers_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$pavers_results[] = $AMOUNT;}
    while ($row = $club_query ->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['PAID'];$club_results[] = $AMOUNT;}


    foreach($membership_results as $amount)
        {$formatamount = str_replace(',','',$amount); $membership_total += $formatamount;}
    foreach($savings_results as $amount)
        {$formatamount = str_replace(',','',$amount); $savings_total += $formatamount;}
    foreach($fees_results as $amount)
        {$formatamount = str_replace(',','',$amount); $fees_total += $formatamount;}
    foreach($expenditure_results as $amount)
        {$formatamount = str_replace(',','',$amount); $expenditure_total += $formatamount;}
    foreach($pavers_results as $amount)
        {$formatamount = str_replace(',','',$amount); $pavers_total += $formatamount;}
    foreach($club_results as $amount)
        {$formatamount = str_replace(',','',$amount); $club_total += $formatamount;}
    

        $formated_membership_total = number_format($membership_total);
        $formated_savings_total = number_format($savings_total);
        $formated_fees_total = number_format($fees_total);
        $formated_pavers_total = number_format($pavers_total);
        $formated_club_total = number_format($club_total);
        
        $total_collections =  $Senkubuge + $club_total + $pavers_total + $membership_total + $savings_total + $fees_total;
        $at_hand_total = $total_collections - $expenditure_total -$fees_total; //
        
        $formated_total_collections = number_format($total_collections);
        $formated_expenditure_total = number_format($expenditure_total);
        $formated_fees_total = number_format($fees_total);
        $formated_at_hand_total = number_format($at_hand_total);


        $results[] = array(
                        'TOTAL' => $formated_total_collections,
                        'EXPENDITURES'  => $formated_expenditure_total,
                        'FEES'  => $formated_fees_total,
                        'ATHANDTOTAL' => $formated_at_hand_total
                        );

        echo json_encode($results);
        $db->close();
}


function GetExpendituresData ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM expenditure";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ITEM = $row['ITEM']; 
            $AMOUNT = $row['AMOUNT'];
            $DATES = $row['DATES'];
            $RECIEPT = $row['RECIEPT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ITEM' => $ITEM, 
                                'AMOUNT' => $AMOUNT,
                                'DATES' => $DATES,
                                'RECIEPT' => $RECIEPT, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function GetSjmdaMemberNamesData ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT NAMES FROM membership";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES']; 
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}
function GetSjmdaPledgeNamesData ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT NAMES FROM pledges";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            
            $NAMES = $row['NAMES']; 
            $results[] = $NAMES;
        }
    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

// function GetSjmdaMemberTotalSavings ($table1,$table2,$table3,$name)
// {
//     global $db;
//     $results = array();
//     $savings = array();
//     $membership = array();
//     $administrative = array();

//     $savingsSelect_cmd = "SELECT AMOUNT FROM $table1 WHERE NAMES ='$name'";
//     $savings_cmd = $db->query($savingsSelect_cmd);
//     while ($row = $savings_cmd->fetchArray(SQLITE3_ASSOC))
//             {$AMOUNT = $row['AMOUNT']; $savings[] = $AMOUNT;}
//     $savingsTotal = 0;
//     foreach($savings as $amount)
//         {
//             $formatamount = str_replace(',','',$amount); // remove comas 
//             $savingsTotal += $formatamount;
//         }
//         $savingsFormatedTotal = number_format($savingsTotal);
//         // $savingsResults = json_encode($formatedSavingsTotal);


//         $AdministrativeSelect_cmd = "SELECT AMOUNT FROM $table2 WHERE NAMES ='$name'";
//         $administrative_cmd = $db->query($AdministrativeSelect_cmd);
//         while ($row = $administrative_cmd->fetchArray(SQLITE3_ASSOC))
//             {$AMOUNT = $row['AMOUNT'];$administrative[] = $AMOUNT;}
//         $administrativeTotal = 0;
//         foreach($administrative as $amount)
//             {
//                 $formatamount = str_replace(',','',$amount); // remove comas 
//                 $administrativeTotal += $formatamount;
//             }
//             $administrativeFormatedTotal = number_format($administrativeTotal);

//     $membershipSelect_cmd = "SELECT FEES FROM membership WHERE NAMES ='$name'";
//     $membership_cmd = $db->query($membershipSelect_cmd);
//     while ($row = $membership_cmd->fetchArray(SQLITE3_ASSOC))
//     {$AMOUNT = $row['FEES'];$membership[] = $AMOUNT;}
//     $membershipTotal = implode("",$membership); // convert to a str    
//     $membershipTotalInt = str_replace(',','',$membershipTotal);

//     $finalTotal = (int)$membershipTotalInt + $administrativeTotal + $savingsTotal;
//     $TotalSavingMembership = (int)$membershipTotalInt + $savingsTotal;
//     $finalFormatedTotal = number_format($finalTotal);
//     $SavingAndMembershipFormatedTotal = number_format($TotalSavingMembership);

//     $results[] = array( 
//         "TotalSavings"=>$savingsFormatedTotal,
//         "TotalAdministrative"=>$administrativeFormatedTotal,
//         "TotalMembership"=>$membershipTotal,
//         "FinalTotal" => $finalFormatedTotal,
//         "TotalSavingAndMembership"=>$SavingAndMembershipFormatedTotal,

//     );

//         $json_results  = json_encode($results);
//         echo $json_results;
//         $db->close();
// }

function GetSjmdaMemberTotalSavings ($table1,$table2,$table3,$table4,$name)
{
    global $db;
    $results = array();
    $savings = array();
    $membership = array();
    $administrative = array();
    $pledges = array();


    $savingsSelect_cmd = "SELECT AMOUNT FROM $table1 WHERE NAMES ='$name'";
    $savings_cmd = $db->query($savingsSelect_cmd);
    while ($row = $savings_cmd->fetchArray(SQLITE3_ASSOC))
            {$AMOUNT = $row['AMOUNT']; $savings[] = $AMOUNT;}
    $savingsTotal = 0;
    foreach($savings as $amount)
        {
            $formatamount = str_replace(',','',$amount); // remove comas 
            $savingsTotal += $formatamount;
        }
        // $savingsFormatedTotal = number_format($savingsTotal);
        // $savingsResults = json_encode($formatedSavingsTotal);


    $AdministrativeSelect_cmd = "SELECT AMOUNT FROM $table2 WHERE NAMES ='$name'";
    $administrative_cmd = $db->query($AdministrativeSelect_cmd);
    while ($row = $administrative_cmd->fetchArray(SQLITE3_ASSOC))
        {$AMOUNT = $row['AMOUNT'];$administrative[] = $AMOUNT;}
    $administrativeTotal = 0;
    foreach($administrative as $amount)
        {
            $formatamount = str_replace(',','',$amount); // remove comas 
            $administrativeTotal += $formatamount;
        }
        $administrativeFormatedTotal = number_format($administrativeTotal);

    $pledgesSelect_cmd = "SELECT PAID FROM $table4 WHERE NAMES ='$name'";
    $pledges_cmd = $db->query($pledgesSelect_cmd);
    while ($row = $pledges_cmd->fetchArray(SQLITE3_ASSOC))
            {$AMOUNT = $row['PAID']; $pledges[] = $AMOUNT;}
    $pledgesTotal = 0;
    foreach($pledges as $amount)
        {
            $formatamount = str_replace(',','',$amount); // remove comas 
            $pledgesTotal += $formatamount;
        }
        $pledgesFormatedTotal = number_format($pledgesTotal);
        // $pledgesResults = json_encode($formatedpledgesTotal);
    
    $membershipSelect_cmd = "SELECT FEES FROM membership WHERE NAMES ='$name'";
    $membership_cmd = $db->query($membershipSelect_cmd);
    while ($row = $membership_cmd->fetchArray(SQLITE3_ASSOC))
    {$AMOUNT = $row['FEES'];$membership[] = $AMOUNT;}
    $membershipTotal = implode("",$membership); // convert to a str    
    $membershipTotalInt = str_replace(',','',$membershipTotal);

    $finalTotal = (int)$membershipTotalInt + $administrativeTotal + $savingsTotal+$pledgesTotal;
    $TotalSavingMembership = (int)$membershipTotalInt + $savingsTotal+$pledgesTotal;
    $savingsAndPledgesTotal =  $pledgesTotal + $savingsTotal;
    $finalFormatedTotal = number_format($finalTotal);
    $SavingAndMembershipFormatedTotal = number_format($TotalSavingMembership);
    $savingsAndPledgesFormatedTotal =  number_format($savingsAndPledgesTotal);
    $results[] = array( 
        "TotalSavings"=>$savingsAndPledgesFormatedTotal,
        "TotalAdministrative"=>$administrativeFormatedTotal,
        "TotalMembership"=>$membershipTotal,
        "FinalTotal" => $finalFormatedTotal,
        "TotalSavingAndMembership"=>$SavingAndMembershipFormatedTotal,

    );

        $json_results  = json_encode($results);
        echo $json_results;
        $db->close();
}



    /**
     *          ======================================================
     *                          ADMIN READ FROM DB
     *          =====================================================
     */

function AdminGetMembers ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM membership";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES'];
            $BALANCE = $row['BALANCE'];
            $FEES = $row['FEES'];
            $results[] = array( 'NAME' => $NAMES, 'BALANCE'=>$BALANCE,'FEES'=>$FEES);
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function ViewFromPledges ($table_name)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM '$table_name'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $row['ID'];
            $NAME = $row['NAMES']; 
            $ITEM = $row['ITEM'];
            $MONTHS = $row['MONTHS'];
            $PAID = $row['PAID'];
            $DATE = $row['DATES'];

            $results[] = array( 
                                'ID' => $ID, 
                                'NAME' => $NAME, 
                                'ITEM' => $ITEM,
                                'MONTHS' => $MONTHS,
                                'PAID' => $PAID,
                                'DATE' => $DATE,
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
}

function AdminGetMemberDetails ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM membership";
    $query_cmd = $db->query($select_cmd);
    $rowid = 1;
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $rowid++;
            $NAME = $row['NAMES'];
            $DATE = $row['DATES'];
            $FEES = $row['FEES'];
            $BALANCE = $row['BALANCE'];

            // NAMES TEXT PRIMARY KEY,DATES TEXT, FEES TEXT,BALANCE TEXT
            // create an array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'NAME' => $NAME,
                                'DATE' => $DATE,
                                'FEES' => $FEES,
                                'BALANCE' => $BALANCE,
                                );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}
function AdminGetUsernameDetails ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM users ";
    $query_cmd = $db->query($select_cmd);
    $rowid = 1;
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ID = $rowid++;
            $MEMBERNAME = $row['MEMBERNAME'];
            $USERNAME = $row['USERNAME'];
            $PASSWORD = $row['UPASSWORD'];

            // create an array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'MEMBERNAME' => $MEMBERNAME,
                                'USERNAME' => $USERNAME,
                                'PASSWORD' => $PASSWORD,
                                );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function AdminGetMemberSavingsData ($name,$year)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM savings WHERE NAMES = '$name' AND YEARS = '$year'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // NAMES TEXT,DATES TEXT,AMOUNT TEXT, YEARS TEXT, MONTHS
            $NAMES = $row['NAMES']; 
            $DATES = $row['DATES'];
            $AMOUNT = $row['AMOUNT'];
            $YEARS = $row['YEARS']; 
            $MONTHS = $row['MONTHS'];

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES, 
                                'DATE' => $DATES,
                                'AMOUNT' => $AMOUNT,
                                'YEAR' => $YEARS, 
                                'MONTH' => $MONTHS
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}


function AdminGetMemberFeesData ($name,$year)
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM administrative_fees WHERE NAMES = '$name' AND YEARS = '$year'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // NAMES TEXT,DATES TEXT,AMOUNT TEXT, YEARS TEXT, MONTHS
            $NAMES = $row['NAMES']; 
            $DATES = $row['DATES'];
            $AMOUNT = $row['AMOUNT'];
            $YEARS = $row['YEARS']; 
            $MONTHS = $row['MONTHS'];

            // create an array(key:value) to results
            $results[] = array( 
                                'NAME' => $NAMES, 
                                'DATE' => $DATES,
                                'AMOUNT' => $AMOUNT,
                                'YEAR' => $YEARS, 
                                'MONTH' => $MONTHS
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

function AdminGetExpenseData  ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM expenditure";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $ITEM = $row['ITEM']; 
            $AMOUNT = $row['AMOUNT'];
            $DATES = $row['DATES'];
            $RECIEPT = $row['RECIEPT'];

            // create an assoicative array(key:value) to results
            $results[] = array( 
                                'ITEM' => $ITEM, 
                                'AMOUNT' => $AMOUNT,
                                'DATES' => $DATES,
                                'RECIEPT' => $RECIEPT, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}
function AdminGetPledgesData ()
{
    global $db;
    $results = array();
    $select_cmd = "SELECT * FROM pledges WHERE ITEM = 'Pavers'";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            $NAMES = $row['NAMES'];
            $DATES = $row['DATES'];
            $PLEDGE = $row['PLEDGE']; 
            $ID = $row['ID'];

            // create an array(key:value) to results
            $results[] = array( 
                                'ID' => $ID,
                                'NAME' => $NAMES,
                                'DATE' => $DATES,
                                'PLEDGE' => $PLEDGE, 
                            );
        }

    $json_results = json_encode($results);
    echo $json_results;
    $db->close();
}

// CreateDataBaseTables ();
// GetPledgesDetails ();

// Insert_Into_Summary_Table ('100000','7000', '5000');
// GetSummaryData ()
// GetSavingsData ();
// GetSjmdaNamesData ();
// GetSjmdaMemberSavingsTotal ()
?>