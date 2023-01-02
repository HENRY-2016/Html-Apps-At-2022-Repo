
var payment_url = "http://10.42.0.1/parish-dir/parish-php/routes_request.php/RecordUserDonationEndpoint";
var donations_status_url = "http://10.42.0.1/parish-dir/parish-php/routes_request.php/GetUserDonationStatusEndpoint";



function Show_Parish_Div ()
{
    document.getElementById('ssisa-div').style.display='none';
    document.getElementById('bweya-div').style.display='none';
    document.getElementById('lumuli-div').style.display='none';
    document.getElementById('nganjo-div').style.display='none';
    document.getElementById('akright-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='none';
    document.getElementById('parish-div').style.display='block';
}

function Show_Ssisa_Div ()
{
    document.getElementById('parish-div').style.display='none';
    document.getElementById('bweya-div').style.display='none';
    document.getElementById('lumuli-div').style.display='none';
    document.getElementById('nganjo-div').style.display='none';
    document.getElementById('akright-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='none';
    document.getElementById('ssisa-div').style.display='block';
}
function Show_Bweya_Div ()
{
    document.getElementById('parish-div').style.display='none';
    document.getElementById('ssisa-div').style.display='none';
    document.getElementById('lumuli-div').style.display='none';
    document.getElementById('nganjo-div').style.display='none';
    document.getElementById('akright-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='none';
    document.getElementById('bweya-div').style.display='block';

}
function Show_Lumuli_Div ()
{
    document.getElementById('parish-div').style.display='none';
    document.getElementById('ssisa-div').style.display='none';
    document.getElementById('bweya-div').style.display='none';
    document.getElementById('nganjo-div').style.display='none';
    document.getElementById('akright-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='none';
    document.getElementById('lumuli-div').style.display='block';
}
function Show_Nganjo_Div ()
{
    document.getElementById('parish-div').style.display='none';
    document.getElementById('ssisa-div').style.display='none';
    document.getElementById('bweya-div').style.display='none';
    document.getElementById('lumuli-div').style.display='none';
    document.getElementById('akright-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='none';
    document.getElementById('nganjo-div').style.display='block';
}
function Show_Akright_Div ()
{
    document.getElementById('parish-div').style.display='none';
    document.getElementById('ssisa-div').style.display='none';
    document.getElementById('bweya-div').style.display='none';
    document.getElementById('lumuli-div').style.display='none';
    document.getElementById('nganjo-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='none';
    document.getElementById('akright-div').style.display='block';
}
function Show_Kabulamuliro_Div ()
{
    document.getElementById('parish-div').style.display='none';
    document.getElementById('ssisa-div').style.display='none';
    document.getElementById('bweya-div').style.display='none';
    document.getElementById('lumuli-div').style.display='none';
    document.getElementById('nganjo-div').style.display='none';
    document.getElementById('akright-div').style.display='none';
    document.getElementById('kabulamuliro-div').style.display='block';
}

// ==================== donations page

function Show_Donations_Div ()
{
    document.getElementById('view-donations-div').style.display='none';
    document.getElementById('donations-div').style.display='block';
}
function Show_Donations_View_Div ()
{
    document.getElementById('donations-div').style.display='none';
    document.getElementById('view-donations-div').style.display='block';
}








function CreateCustomerBookingDynamicStatusTable (urlendpoint,htmlid,statusdivtag) 
{
    // tablestatus_to_clear = document.getElementById(tablestatus);
    // tablestatus_to_clear.innerHTML = " "; //clear table data fst
    let req = new XMLHttpRequest();
    req.open('post',urlendpoint,true)
    req.onload = function ()
        {
            let results = JSON.parse(this.responseText);
            if (! results || !results.length)
                {document.getElementById("id020").style.display="block";}
            else
                {
                    let table = document.getElementById(htmlid);
                    let rowCount = table.rows.length;

                    for (i=0;i<results.length;i++)
                        {
                            let row = table.insertRow(rowCount);
                            row.className='status-table-tr';
                            row.insertCell(0).innerHTML= '<label class="status-table-td"> '+ results[i][0] +'</label>';
                            row.insertCell(1).innerHTML= '<label class="status-table-td"> '+ results[i][1] +'</label>';
                        }
                }
                
        }
        let div_tag = document.getElementById(statusdivtag);
        req.send(div_tag);
}



function Submit_Customer_Payment_Details ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('donation-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
        console.log(data_array)
    // Send data
    $.post(payment_url,{data_array:data_array},
            function (response)
                {
                    console.log(response);
                    // document.getElementById('id01').style.display='none';
                    // document.getElementById('id02').style.display='none';
                    // response_display = document.getElementById('server-feedback-display');
                    // response_display.innerHTML = response
                    // Clear_All_Form_Inputs();
                }
            );
}





























function UpdateUserDetails ()
{
        const register_form = document.getElementById("user-details-form");
        register_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", update_user_details_url);
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


function UpdateUserPassword ()
{
        const html_form = document.getElementById("password-form");
        html_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();

            request.open ("post", updated_password_url);
            request.onload = function ()
            {
                let feedback = (request.responseText).trim(); 
                if (feedback !== 'Success')
                    {
                        document.getElementById('success-div').style.display = "none";
                        document.getElementById('error-div').style.display = "block";
                        document.getElementById('post-error-label-feedback').innerHTML=feedback;
                    }
                else if (feedback === 'Success')
                    {
                        document.getElementById('error-div').style.display = "none";
                        document.getElementById('success-div').style.display = "block";
                    }
            }
            request.send(new FormData(html_form))
        });
}

// informention page
// =================
function Show_Bank_Div ()
{
    document.getElementById("leader-ship-div").style.display="none";
    document.getElementById('id019').style.display='none';
    document.getElementById("bank-div").style.display="block";
}
function Show_Leader_Ship_Div ()
{
    document.getElementById("bank-div").style.display="none";
    document.getElementById('id019').style.display='none';
    document.getElementById("leader-ship-div").style.display="block";
}

// pledges page
// ===========
// function Hide_All_Divs ()
// {
//     document.getElementById('parish-div').style.display='none';
//     document.getElementById('ssisa-div').style.display='none';
//     document.getElementById('bweya-div').style.display='none';
//     document.getElementById('lumuli-div').style.display='none';
//     document.getElementById('nganjo-div').style.display='none';
//     document.getElementById('akright-div').style.display='none';
//     document.getElementById('kabulamuliro-div').style.display='none';
// }











function FetchSavingData ()
{
        const username_form = document.getElementById("saving-user-name-form");
        username_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();
            request.open ("post", saving_url);
            console.log(saving_url)
            request.onload = function ()
            {
                // console.log(request.responseText)
                response = JSON.parse(request.responseText);
                // console.log(response)
                let thead = '<tr class="table-thead">'+
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
                $('#saving-user-table tbody').append(tablerow);
                }
            }
            request.send(new FormData(username_form))
        });
}

function ShowAdministrativeFees ()
{
        const username_form = document.getElementById("admin-fees-user-name-form");
        username_form.addEventListener("submit",(event) => {
            event.preventDefault();
            const request = new  XMLHttpRequest ();
            request.open ("post", administration_fees_url);
            request.onload = function ()
            {
                response = JSON.parse(request.responseText);
                // console.log(response)
                let thead = '<tr>'+
                                '<th class="table-thead-th">'+'Name'+'</th>'+
                                '<th class="table-thead-th">'+'Date'+'</th>'+
                                '<th class="table-thead-th">'+'Amount'+'</th>'+
                                '<th class="table-thead-th">'+'Year'+'</th>'+
                                '<th class="table-thead-th">'+ 'Month'+'</th>'+
                            '</tr>';
                $('#admin-fees-user-table tbody').empty(); // clear space 
                $('#admin-fees-user-table tbody').append(thead); 
                
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
                $('#admin-fees-user-table tbody').append(tablerow);
                }
            }
            request.send(new FormData(username_form))
        });
}

function ComputePledgesBalance ()
{
    let pledges_received = document.getElementById("pavers-pledges-received-final-total-id").value;
    let pledges = document.getElementById("pavers-pledges-final-total-id").value;

    let pledges_received_int = Number(pledges_received.replace(/,/g,''));
    let pledges_int = Number(pledges.replace(/,/g,''));
    let balance = pledges_int - pledges_received_int
    let balance_with_commas = balance.toLocaleString(); 
    
    document.getElementById("pavers-pledges-balance").style.display='block';
    document.getElementById("pavers-pledges-balance").value=balance_with_commas;
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


function Show_Pavers_Pledges_Paid_Data ()
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


function Show_Sugarcane_Pledges_Data ()
{
    document.getElementById('sugarcane-tbody').innerHTML = '';
    $.ajax({
            url:sugarcanes_pledges_url,
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
                                '<th class="table-thead-th">'+'Pladge'+'</th>'+
                                '<th class="table-thead-th">'+'Paid'+'</th>'+
                                '<th class="table-thead-th">'+ 'Balance'+'</th>'+
                            '</tr>';
                $('#sugarcane-table tbody').append(thead); 
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let NAME = response[i].NAME; 
                    let DATE = response[i].DATE;
                    let PLEDGE = response[i].PLEDGE;
                    let PAID = response[i].PAID;
                    let BALANCE = response[i].BALANCE;

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  NAME + "</td>" + 
                                    '<td class="table-row-td">'  +  DATE + "</td>" +
                                    '<td class="table-row-td">'  +  PLEDGE + "</td>" +
                                    '<td class="table-row-td">'  +  PAID + "</td>" +
                                    '<td class="table-row-td">'  +  BALANCE + "</td>" +
                                "</tr>"
                $('#sugarcane-table tbody').append(tablerow);
                }
            }
            });
}



/* 
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                accounts page
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
*/

function Show_Summary_Data ()
{
    Show_Summary_Data_Table_One ();
    Show_Summary_Data_Table_Two ();
}


function Show_Summary_Data_Table_One ()
{
    document.getElementById('summary-tbody').innerHTML = '';
    $.ajax({
            url:summary_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Memberships'+'</th>'+
                                '<th class="table-thead-th">'+'Savings'+'</th>'+
                                '<th class="table-thead-th">'+'Fees'+'</th>'+
                                '<th class="table-thead-th">'+'Total'+'</th>'+
                            '</tr>';
                $('#summary-table tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let MEMBERSHIP = response[i].MEMBERSHIP;
                    let SAVINGS = response[i].SAVINGS;
                    let FEES = response[i].FEES
                    let TOTAL = response[i].TOTAL;

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  MEMBERSHIP + "</td>" + 
                                    '<td class="table-row-td">'  +  SAVINGS + "</td>" +
                                    '<td class="table-row-td">'  +  FEES + "</td>" +
                                    '<td class="table-row-td">'  +  TOTAL + "</td>" +
                                "</tr>"
                $('#summary-table tbody').append(tablerow);
                }
            }
            });
}

function Show_Summary_Data_Table_Two ()
{
    document.getElementById('summary-tbody-2').innerHTML = '';
    $.ajax({
            url:at_hand_url,
            type:'get',
            dataType:'JSON',
            error: function ()
            {
                console.log("Request Unsuccessful")
            },
            success: function (response)
            {
                let thead = '<tr class="table-thead">'+
                                '<th class="table-thead-th">'+'Collections'+'</th>'+
                                '<th class="table-thead-th">'+'Expense'+'</th>'+
                                '<th class="table-thead-th">'+'Avialable'+'</th>'+
                            '</tr>';
                $('#summary-table-2 tbody').append(thead); 
                // $(htmltable-tbody).append(thead);
                
                let len = response.length;
                for (let i = 0; i<len; i++)
                {
                    let TOTAL = response[i].TOTAL;
                    let EXPENDITURES = response[i].EXPENDITURES
                    let ATHANDTOTAL = response[i].ATHANDTOTAL;

                let tablerow = '<tr class="table-row">'+
                                    '<td class="table-row-td">'  +  TOTAL + "</td>" + 
                                    '<td class="table-row-td">'  +  EXPENDITURES + "</td>" +
                                    '<td class="table-row-td">'  +  ATHANDTOTAL + "</td>" +
                                "</tr>"
                $('#summary-table-2 tbody').append(tablerow);
                }
            }
            });
}


function Show_Expenditures_Data ()
{
    document.getElementById('expenditures-tbody').innerHTML = '';
    $.ajax({
            url:expenditures_url,
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

function FetchTotalSavingData ()
{
    const username_form = document.getElementById("user-total-saving-name-form");
    username_form.addEventListener("submit",(event) => {
        event.preventDefault();
        const request = new  XMLHttpRequest ();
        request.open ("post", total_saving_url);
        request.onload = function ()
        {
            // console.log(request.responseText)
            response = JSON.parse(request.responseText);
            console.log(response)
            document.getElementById("user-total-savings-label").innerHTML =response
        }
        request.send(new FormData(username_form))
    });
}

function FetchTotalFeesData ()
{
    const username_form = document.getElementById("user-total-fees-name-form");
    username_form.addEventListener("submit",(event) => {
        event.preventDefault();
        const request = new  XMLHttpRequest ();
        request.open ("post", total_fees_url);
        request.onload = function ()
        {
            response = JSON.parse(request.responseText);
            document.getElementById("user-total-fees-label").innerHTML = "<br>"+response
        }
        request.send(new FormData(username_form))
    });
}






























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
