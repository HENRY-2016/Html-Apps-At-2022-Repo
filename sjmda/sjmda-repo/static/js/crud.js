

let admin_php_url = "http://127.0.0.1/";
// let admin_php_url = "https://mogahenze.com/"
let admin_php_pages_source_dir = 'sjmda-dir/sjmda-php/';

var register_new_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminCreateMemberEndpoint";
var expenditure_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminRecordExpendituresEndpoint";
var pledges_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminRecordPledgesEndpoint";
var receive_pledges_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminRecordReceivePledgesEndpoint";
var fees_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminRecordFeesEndpoint";
var saving_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminRecordSavingEndpoint";
var member_names_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaMemberNamesDataEndpoint";
var pledge_names_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaPledgeNamesDataEndpoint";
var members_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetMembersEndpoint";
var member_details_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberDetailsEndpoint";
var username_details_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetUsernameDetailsEndpoint";
var member_saving_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberSavingsDataEndpoint";
var member_fees_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberFeesDataEndpoint";
var expense_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetExpenseDataEndpoint";
var paver_pledges_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminGetPledgesEndpoint";
var paver_pledges_received_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/GetPaverProjectPledgesReceivedEndpoint";
var delete_username_url = "http://127.0.0.1/sjmda-dir/sjmda-php/ApiController.php/AdminDeleteUsernameEndpoint";


// var register_new_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminCreateMemberEndpoint";
// var expenditure_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminRecordExpendituresEndpoint";
// var pledges_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminRecordPledgesEndpoint";
// var receive_pledges_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminRecordReceivePledgesEndpoint";
// var fees_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminRecordFeesEndpoint";
// var saving_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminRecordSavingEndpoint";
// var member_names_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaMemberNamesDataEndpoint";
// var pledge_names_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/GetSjmdaPledgeNamesDataEndpoint";
// var members_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetMembersEndpoint";
// var member_details_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberDetailsEndpoint";
// var username_details_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetUsernameDetailsEndpoint";
// var member_saving_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberSavingsDataEndpoint";
// var member_fees_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetMemberFeesDataEndpoint";
// var expense_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetExpenseDataEndpoint";
// var paver_pledges_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminGetPledgesEndpoint";
// var paver_pledges_received_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/GetPaverProjectPledgesReceivedEndpoint";
// var delete_username_url = "https://mogahenze.com/sjmda-dir/sjmda-php/ApiController.php/AdminDeleteUsernameEndpoint";






var member_names
function Load_Sjmda_Member_Names ()
{
    let member_names_req = new XMLHttpRequest ();
    member_names_req.open('get',member_names_url,true);
    member_names_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            member_names = results
        }
        member_names_req.send();
}

var pledge_names
function Load_Sjmda_Pledge_Names ()
{
    let member_names_req = new XMLHttpRequest ();
    member_names_req.open('get',pledge_names_url,true);
    member_names_req.onload = function ()
        {
            let results =  JSON.parse(this.responseText);
            pledge_names = results
        }
        member_names_req.send();
}

function Log_Out_Admin () {window.location= admin_php_url+admin_php_pages_source_dir+'signout.php'}
function Load_Admin_Load_Users_Page () 
    {window.location= admin_php_url+admin_php_pages_source_dir+'register_user.php'}

function Load_Admin_Create_Page ()
{
    window.location="admin_create.html";
    // if (!navigator.onLine){document.getElementById("offline-div-lable").style.display="block"}
    // else if (navigator.onLine){window.location="admin_create.html";}
}
function Load_Admin_Update_Page ()
{
    window.location="admin_update.html";
    // if (!navigator.onLine){document.getElementById("offline-div-lable").style.display="block"}
    // else if (navigator.onLine){window.location="admin_update.html";}
}

function Load_Admin_View_Page ()
{
    window.location="admin_view.html";
    // if (!navigator.onLine){document.getElementById("offline-div-lable").style.display="block"}
    // else if (navigator.onLine){window.location="admin_view.html";}
}




// MENU ...........
function Show_Add_Member_Panel_Div ()
{
    document.getElementById("add-fees-panel-div").style.display="none";
    document.getElementById("add-pledges-panel-div").style.display="none";
    document.getElementById("receive-pledges-panel-div").style.display="none";
    document.getElementById("add-expenditures-panel-div").style.display="none";
    document.getElementById("add-saving-panel-div").style.display="none";
    document.getElementById("add-member-panel-div").style.display = "block";
}


function Show_Add_Fees_Panel_Div ()
{
    document.getElementById("add-member-panel-div").style.display = "none";    
    document.getElementById("add-pledges-panel-div").style.display="none";
    document.getElementById("receive-pledges-panel-div").style.display="none";
    document.getElementById("add-expenditures-panel-div").style.display="none";
    document.getElementById("add-saving-panel-div").style.display="none";
    document.getElementById("add-fees-panel-div").style.display="block";
}

function Show_Add_Saving_Panel_Div ()
{
    document.getElementById("add-member-panel-div").style.display = "none";    
    document.getElementById("add-pledges-panel-div").style.display="none";
    document.getElementById("receive-pledges-panel-div").style.display="none";
    document.getElementById("add-expenditures-panel-div").style.display="none";
    document.getElementById("add-fees-panel-div").style.display="none";
    document.getElementById("add-saving-panel-div").style.display="block";
}

function Show_Add_Expenditures_Panel_Div ()
{
    document.getElementById("add-member-panel-div").style.display = "none";    
    document.getElementById("add-fees-panel-div").style.display="none";
    document.getElementById("add-pledges-panel-div").style.display="none";
    document.getElementById("receive-pledges-panel-div").style.display="none";
    document.getElementById("add-saving-panel-div").style.display="none";
    document.getElementById("add-expenditures-panel-div").style.display="block";
}

function Show_Add_Pledges_Panel_Div ()
{
    document.getElementById("add-member-panel-div").style.display = "none";    
    document.getElementById("add-fees-panel-div").style.display="none";
    document.getElementById("receive-pledges-panel-div").style.display="none";
    document.getElementById("add-expenditures-panel-div").style.display="none";
    document.getElementById("add-saving-panel-div").style.display="none";
    document.getElementById("add-pledges-panel-div").style.display="block";
}
function Show_Receive_Pledges_Panel_Div ()
{
    document.getElementById("add-member-panel-div").style.display = "none";    
    document.getElementById("add-fees-panel-div").style.display="none";
    document.getElementById("add-expenditures-panel-div").style.display="none";
    document.getElementById("add-pledges-panel-div").style.display="none";
    document.getElementById("add-saving-panel-div").style.display="none";
    document.getElementById("receive-pledges-panel-div").style.display="block";
}


// // Delete page functions
// function Show_Username_Details_Data_And_Delete ()
// {
//     document.getElementById('delete-username-tbody').innerHTML="";
//     Show_Username_Details_Data (); // call the view function
//     document.getElementById('delete-username-form').style.display="block";
// }

// function Show_Expense_Data_And_Delete ()
// {
//     document.getElementById('expenditures-tbody').innerHTML="";
//     ShowExpenseData (); // call the view function
//     document.getElementById('delete-expense-form').style.display="block";
// }
// function Show_Pledges_Data_And_Delete ()
// {
//     document.getElementById('pavers-tbody').innerHTML="";
//     Show_Pavers_Pledges_Data (); // call the view function
//     document.getElementById('delete-pavers-form').style.display="block";
// }

// function Show_Pledges_Data_And_Delete ()
// {
//     document.getElementById('pavers-paid-tbody').innerHTML="";
//     Show_Paid_Pledges_Data (); // call the view function
//     document.getElementById('delete-pavers-paid-form').style.display="block";
// }



function RegisterMember ()
{
        const register_form = document.getElementById("register-form");
        register_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", register_new_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('member-success-div').style.display = "none";
                        document.getElementById('member-error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('member-error-div').style.display = "none";
                        document.getElementById('member-success-div').style.display = "block";
                    }
            }
            request.send(new FormData(register_form))
        });
}
function SubmiteExpenditureData ()
{
        const expenditure_form = document.getElementById("expenditure-form");
        expenditure_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", expenditure_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('expense-success-div').style.display = "none";
                        document.getElementById('expense-error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('expense-error-div').style.display = "none";
                        document.getElementById('expense-success-div').style.display = "block";
                    }
            }
            request.send(new FormData(expenditure_form))
        });
}

function SubmitePledgesData ()
{
        const pledges_form = document.getElementById("pledges-form");
        pledges_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", pledges_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('pledges-success-div').style.display = "none";
                        document.getElementById('pledges-error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('pledges-error-div').style.display = "none";
                        document.getElementById('pledges-success-div').style.display = "block";
                    }
            }
            request.send(new FormData(pledges_form))
        });
}

function SubmiteReceivePledgesData ()
{
        const receive_pledges_form = document.getElementById("receive-pledges-form");
        receive_pledges_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", receive_pledges_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('receive-pledges-success-div').style.display = "none";
                        document.getElementById('receive-pledges-error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('receive-pledges-error-div').style.display = "none";
                        document.getElementById('receive-pledges-success-div').style.display = "block";
                    }
            }
            request.send(new FormData(receive_pledges_form))
        });
}
function SubmiteFeesData ()
{
        const fees_form = document.getElementById("fees-form");
        fees_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", fees_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('fees-success-div').style.display = "none";
                        document.getElementById('fees-error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('fees-error-div').style.display = "none";
                        document.getElementById('fees-success-div').style.display = "block";
                    }
            }
            request.send(new FormData(fees_form))
        });
}

function SubmiteSavingData ()
{
        const saving_form = document.getElementById("saving-form");
        saving_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", saving_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('saving-success-div').style.display = "none";
                        document.getElementById('saving-error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('saving-error-div').style.display = "none";
                        document.getElementById('saving-success-div').style.display = "block";
                    }
            }
            request.send(new FormData(saving_form))
        });
}


/**
 *  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *                      VIEW DATA
 *  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 */

function Show_Members_Data ()
{
    document.getElementById("admin-username-details-view-id").style.display = "none";
    document.getElementById("admin-member-details-view-id").style.display = "none";
    document.getElementById("admin-members-view-id").style.display = "block";
    $(".member-update-delete-btns").show();
    document.getElementById('members-tbody').innerHTML = '';
    $.ajax({
            url:members_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                            '</tr>';
                $('#members-table tbody').append(thead); 
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                "</tr>"
                                
                $('#members-table tbody').append(tablerow);
                }
            }

            });
}

function Show_Member_Details_Data ()
{
    document.getElementById("admin-username-details-view-id").style.display = "none";
    document.getElementById("admin-members-view-id").style.display = "none";
    document.getElementById("admin-member-details-view-id").style.display = "block";
    $(".member-details-update-delete-btns").show();
    document.getElementById('member-details-tbody').innerHTML = '';
    $.ajax({
            url:member_details_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Fees'+'</th>'+
                                '<th class="table-thead-th">'+'Balance'+'</th>'+
                            '</tr>';
                $('#member-details-table tbody').append(thead); 
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                    let DATE = response[i].DATE; 
                    let FEES = response[i].FEES; 
                    let BALANCE = response[i].BALANCE; 

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                    '<td class="table-row-td">'  +  DATE + "</td>" + 
                                    '<td class="table-row-td">'  +  FEES + "</td>" + 
                                    '<td class="table-row-td">'  +  BALANCE + "</td>" + 
                                "</tr>"
                                
                $('#member-details-table tbody').append(tablerow);
                }
            }

            });
}

function Show_Username_Details_Data ()
{
    document.getElementById("admin-members-view-id").style.display = "none";
    document.getElementById("admin-member-details-view-id").style.display = "none";
    document.getElementById("admin-username-details-view-id").style.display = "block";
    $(".username-update-delete-btns").show();
    document.getElementById('username-details-tbody').innerHTML = '';
    $.ajax({
            url:username_details_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Id'+'</th>'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Username'+'</th>'+
                                '<th class="table-thead-th">'+'Password'+'</th>'+
                            '</tr>';
                $('#username-details-table tbody').append(thead); 
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID;
                    let MEMBERNAME = response[i].MEMBERNAME; 
                    let USERNAME = response[i].USERNAME; 
                    let PASSWORD = response[i].PASSWORD; 

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  MEMBERNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  USERNAME + "</td>" + 
                                    '<td class="table-row-td">'  +  PASSWORD + "</td>" + 
                                "</tr>"
                                
                $('#username-details-table tbody').append(tablerow);
                }
            }

            });
}

function ShowMemberSavingData ()
{
        $(".saving-update-delete-btns").show();
        const username_form = document.getElementById("saving-form");
        username_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();
            request.open ("post", member_saving_url);
            request.onload = function ()
            {
                response = JSON.parse(request.responseText);
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Id'+'</th>'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Amount'+'</th>'+
                                '<th class="table-thead-th">'+'Year'+'</th>'+
                                '<th class="table-thead-th">'+ 'Month'+'</th>'+
                            '</tr>';
                $('#saving-user-table tbody').empty(); // clear space 
                $('#saving-user-table tbody').append(thead); 
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let ID = response[i].ID; 
                    let NAME = response[i].NAME; 
                    let DATE = response[i].DATE;
                    let AMOUNT = response[i].AMOUNT;
                    let YEAR = response[i].YEAR;
                    let MONTH = response[i].MONTH;

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ID + "</td>" + 
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                    '<td class="table-row-td">'  +  DATE + "</td>" +
                                    '<td class="table-row-td">'  +  AMOUNT + "</td>" +
                                    '<td class="table-row-td">'  +  YEAR + "</td>" +
                                    '<td class="table-row-td">'  +  MONTH + "</td>" +
                                "</tr>"
                $('#saving-user-table tbody').append(tablerow);
                }
            }
            request.send(new FormData(username_form))
        });
}




function ShowMemberFeesData ()
{
        const username_form = document.getElementById("fees-form");
        username_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();
            request.open ("post", member_fees_url);
            request.onload = function ()
            {
                response = JSON.parse(request.responseText);
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Amount'+'</th>'+
                                '<th class="table-thead-th">'+'Year'+'</th>'+
                                '<th class="table-thead-th">'+ 'Month'+'</th>'+
                            '</tr>';
                $('#fees-user-table tbody').empty(); // clear space 
                $('#fees-user-table tbody').append(thead); 
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                    let DATE = response[i].DATE;
                    let AMOUNT = response[i].AMOUNT;
                    let YEAR = response[i].YEAR;
                    let MONTH = response[i].MONTH;

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                    '<td class="table-row-td">'  +  DATE + "</td>" +
                                    '<td class="table-row-td">'  +  AMOUNT + "</td>" +
                                    '<td class="table-row-td">'  +  YEAR + "</td>" +
                                    '<td class="table-row-td">'  +  MONTH + "</td>" +
                                "</tr>"
                $('#fees-user-table tbody').append(tablerow);
                }
            }
            request.send(new FormData(username_form))
        });
}



function ShowExpenseData ()
{
    document.getElementById('expenditures-tbody').innerHTML = '';
    $.ajax({
            url:expense_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Item'+'</th>'+
                                '<th class="table-thead-th">'+'Amount'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Received'+'</th>'+
                            '</tr>';
                $('#expenditures-table tbody').append(thead); 
                
                let len = response.length;
                let total = 0;
                for (let i = 0; i<len; i++)
                {
                    let ITEM = response[i].ITEM; 
                    let AMOUNT = response[i].AMOUNT;
                    let DATES = response[i].DATES;
                    let RECIEPT = response[i].RECIEPT;

                    let figure = response[i].AMOUNT;
                    let intfigure = Number(figure.replace(/,/g,''));
                    total += intfigure;
                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  ITEM + "</td>" + 
                                    '<td class="table-row-td">'  +  AMOUNT + "</td>" +
                                    '<td class="table-row-td">'  +  DATES + "</td>" +
                                    '<td class="table-row-td">'  +  RECIEPT + "</td>" +
                                "</tr>"
                $('#expenditures-table tbody').append(tablerow);
                }
                let total_with_commas = total.toLocaleString(); 
                document.getElementById("expenditure-final-total-id").style.display='block';
                document.getElementById("expenditure-final-total-id").value=total_with_commas;
            }

            });
}

function Show_Pavers_Pledges () 
{
    // document.getElementById('sugarcanes-pledges-div').style.display='none';
    // document.getElementById('pavers-pledges-div').style.display="block";
    Show_Pavers_Pledges_Data ();
    Show_Pavers_Pledges_Paid_Data ();
    setTimeout(ComputePledgesBalance,2000)
}


function Show_Pavers_Pledges_Data ()
{
    document.getElementById('pavers-tbody').innerHTML = '';
    $.ajax({
            url:paver_pledges_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Amount'+'</th>'+
                            '</tr>';
                $('#pavers-table tbody').append(thead); 
                let total = 0;
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                    let DATE = response[i].DATE;
                    let PLEDGE = response[i].PLEDGE;

                    let figure = response[i].PLEDGE;
                    let intfigure = Number(figure.replace(/,/g,''));
                    total += intfigure;
                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                    '<td class="table-row-td">'  +  DATE + "</td>" +
                                    '<td class="table-row-td">'  +  PLEDGE + "</td>" +
                                "</tr>"
                $('#pavers-table tbody').append(tablerow);
                }
                let total_with_commas = total.toLocaleString(); 
                document.getElementById("pavers-pledges-final-total-id").style.display='block';
                document.getElementById("pavers-pledges-final-total-id").value=total_with_commas;
            }

            });
}

function Show_Paid_Pledges_Data ()
{
    document.getElementById('pavers-paid-tbody').innerHTML = '';
    $.ajax({
            url:paver_pledges_received_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Amount'+'</th>'+
                            '</tr>';
                $('#pavers-paid-table tbody').append(thead); 
                let total = 0;
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                    let DATE = response[i].DATE;
                    let PLEDGE = response[i].PLEDGE;

                    let figure = response[i].PLEDGE;
                    let intfigure = Number(figure.replace(/,/g,''));
                    total += intfigure;
                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                    '<td class="table-row-td">'  +  DATE + "</td>" +
                                    '<td class="table-row-td">'  +  PLEDGE + "</td>" +
                                "</tr>"
                $('#pavers-paid-table tbody').append(tablerow);
                }
                let total_with_commas = total.toLocaleString(); 
                document.getElementById("pavers-pledges-received-final-total-id").style.display='block';
                document.getElementById("pavers-pledges-received-final-total-id").value=total_with_commas;
            }

            });
}




/** 
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *              ===========
 *              DELETE PAGE
 *              ===========
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 *  
*/

// function DeleteUsernameData ()
function DeleteDataFunction (htmlform,url,successdiv,errordiv,posterrorlabel,)
{
        // const form = document.getElementById("delete-username-form");
        const form = document.getElementById(htmlform);
        form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        // document.getElementById('delete-username-success-div').style.display = "none";
                        // document.getElementById('delete-username-error-div').style.display = "block";
                        // document.getElementById('post-error-label-feedback').innerHTML=feedback;

                        document.getElementById(successdiv).style.display = "none";
                        document.getElementById(errordiv).style.display = "block";
                        document.getElementById(posterrorlabel).innerHTML=feedback;
                        
                    }
                else if (feedback === 'Success')
                    {
                        // document.getElementById('delete-username-error-div').style.display = "none";
                        // document.getElementById('delete-username-success-div').style.display = "block";
                        document.getElementById(errordiv).style.display = "none";
                        document.getElementById(successdiv).style.display = "block";
                        
                    }
            }
            request.send(new FormData(form))
        });
}



























var names = 
            [
                'Kinobi',
                'Omanyi Paul'
            ]

var years = 
[
    '2019',
    '2020',
    '2021',
    '2022',
    '2023',
    '2024',
    '2025',
    '2026',
    '2027',
    '2028',
    '2029',
    '2030',
]

var months = 
    [
        'January','February','March','April','May','June','July',
        'August','September','October','November','December',
    ]



function autocomplete(inp, arr) 
{
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) 
        {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) 
                {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) 
                    {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                            b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
        });
        

    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) 
        {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) 
                {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } 
            else if (e.keyCode == 38) 
            { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } 
            else if (e.keyCode == 13) 
            {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) 
                    {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
            }
        });

    function addActive(x) 
        {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
    function removeActive(x) 
        {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) 
                {
                    x[i].classList.remove("autocomplete-active");
                }
        }
    function closeAllLists(elmnt) 
        {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) 
                {
                    if (elmnt != x[i] && elmnt != inp) 
                    {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
        }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {closeAllLists(e.target);});
} 
