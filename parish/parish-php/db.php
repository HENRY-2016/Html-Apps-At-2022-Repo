
<?php

$db_path = 'data_base/parish.db';
$db = new SQLite3($db_path);
if (!$db) {echo $db->lastErrorMsg();}
// else {echo "Opened Data Base Successfully\n";}

function CreateDataBaseTables ()
{
    global $db;

    $donations_parish_table = "CREATE TABLE IF NOT EXISTS donations_parish (UUID TEXT PRIMARY KEY,UNAME TEXT, UPASSWORD TEXT, UFULLNAME TEXT, UCONTACT TEXT, UAMOUNT TEXT, UREASON TEXT, UDATE TEXT,IPNSTATUS TEXT)";

    // $users_table = "CREATE TABLE IF NOT EXISTS users (ID TEXT, MEMBERNAME TEXT PRIMARY KEY,USERNAME TEXT,CONTACT TEXT,COMMUNITY TEXT,UPASSWORD TEXT)";
    // $users_table = "ALTER TABLE users ADD MEMBER_NAME TEXT";// Add a new column
    // $pledges_table = "CREATE TABLE IF NOT EXISTS pledges (ITEM TEXT,NAMES TEXT,PLEDGE TEXT,DATES TEXT)";
    // $pledges_table = "ALTER TABLE pledges ADD ID TEXT";// Add a new column
    // $paid_pledges_table = "CREATE TABLE IF NOT EXISTS paidpledges (ITEM TEXT,NAMES TEXT,PAID TEXT,DATES TEXT)";
    // $paid_pledges_table = "ALTER TABLE paidpledges ADD ID TEXT";// Add a new column
    // $expenditure_table = "CREATE TABLE IF NOT EXISTS expenditure (ITEM TEXT,AMOUNT TEXT, DATES TEXT, RECIEPT TEXT)";
    // $expenditure_table = "ALTER TABLE expenditure ADD ID TEXT";// Add a new column
    // $savings_table = "CREATE TABLE IF NOT EXISTS savings (NAMES TEXT,DATES TEXT,AMOUNT TEXT, YEARS TEXT, MONTHS TEXT)";
    // $savings_table = "ALTER TABLE savings ADD ID TEXT";// Add a new column
    // $administrative_fees_table = "CREATE TABLE IF NOT EXISTS administrative_fees (NAMES TEXT,DATES TEXT,AMOUNT TEXT,YEARS TEXT, MONTHS TEXT)";
    // $administrative_fees_table = "ALTER TABLE administrative_fees ADD ID TEXT";// Add a new column


    $tables = array($donations_parish_table);

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

function RecordUserDonation ($UUID,$UNAME, $UPASSWORD, $UFULLNAME, $UCONTACT, $UAMOUNT, $UREASON, $UDATE, $IPNSTATUS)
{
    global $db;
    $insert_cmd = "INSERT INTO donations_parish VALUES ('$UUID','$UNAME', '$UPASSWORD', '$UFULLNAME', '$UCONTACT', '$UAMOUNT', '$UREASON', '$UDATE', '$IPNSTATUS')";
    $insert_excution = $db->exec($insert_cmd);
    if (!$insert_excution) {echo $db->lastErrorMsg();}
    else {echo "Success";}
    $db->close();
}


/*
    =====================
    READING RFOM DATABASE
    =====================
*/
function GetUserDonationStatus ()
{
    global $db;
    $results = array();
    $status = 'Pending';
    $select_cmd = "SELECT * FROM donations_parish";
    $query_cmd = $db->query($select_cmd);
    while ($row = $query_cmd->fetchArray(SQLITE3_ASSOC))
        {
            // UUID,UNAME, UPASSWORD, UFULLNAME, UCONTACT, UAMOUNT, UREASON, UDATE,IPNSTATUS
            $UFULLNAME = $row['UFULLNAME']; 
            $UDATE = $row['UDATE'];
            $results[] = array($UFULLNAME, $UDATE);
        }
    $json_results = json_encode($results);
    echo $json_results;
}

















// CreateDataBaseTables ();
// GetPaverProjectPledges ();

// Insert_Into_Summary_Table ('100000','7000', '5000');
// GetSummaryData ()
// GetSavingsData ();
// GetSjmdaNamesData ();
// GetSjmdaMemberSavingsTotal ()
?>