


function Open_Booking_Pop_Up_Window_Single_Service (servicename)
{
    let datedate_obj = new Date();
    let datedate = datedate_obj.toLocaleString('de-DE').replace('.','/').replace('.','/').replace(',',' ');
    // console.log (datedate) // 2/8/2021  04:13:09 format 2.8.2021 by /
    let fulldate = datedate.slice(0,10); // remove the time  04:13:09

    document.getElementById('date-input').value = fulldate;
    default_service_name_input = document.getElementById('default-service-name');
    default_service_name_input.value = servicename;
    document.getElementById('id01').style.display='block';
}

function Display_Customer_Booking_Details ()
{
// Check_For_Empty_Input ()
    let fname = document.getElementById("fname").value;
    let lname = document.getElementById("lname").value;
    let contact = document.getElementById("contact").value;
    let email = document.getElementById("email-input").value;

    if (fname == ""||lname == ""||contact == ""||email == "") 
        {document.getElementById("id080").style.display='block';return false;}
    else{DisplayBookingDetails (); return true;}
}

function DisplayBookingDetails ()
{
    document.getElementById('id02').style.display='block';
    let customer_display_area = document.getElementById('customer-details-display');
    let booking_display_area = document.getElementById('booking-details-display');
    // get all form inputs values...
    let inputvalues = document.getElementById('booking-form').elements;
    let data_array = [];

    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }

    // console.log(data_array);
    let  bookdate = data_array[0]
    let fname= data_array[1];
    let lname= data_array[2];
    let contact = data_array[3];
    let email = data_array[4];
    let fullname = fname+' '+ lname;

    booking_details = data_array.splice(5); // by deleting the firs 3 elements
    customer_details_string = '<br>'+fullname+'<br>'+ contact +'<br>'+ email+'<br>'+bookdate+'<br>';
    booking_details_string = booking_details.join(" ",' ')

    customer_display_area.innerHTML = "";
    booking_display_area.innerHTML = "";
    customer_display_area.innerHTML = customer_details_string;
    booking_display_area.innerHTML = booking_details_string;
}

function Animate_Booking_And_Submit_Customer_Details ()
{
    document.getElementById('id03').style.display='block';
    Submit_Customer_Booking_Details ()
    setTimeout(Display_Server_Feedback_Window,5000);
}
function Display_Server_Feedback_Window () 
{
    document.getElementById('id03').style.display='none';
    document.getElementById('id04').style.display='block';
}
function Submit_Customer_Booking_Details ()
{
    // get all form inputs values...
    let inputvalues = document.getElementById('booking-form').elements;
    let data_array = [];
    for (let i = 0; i<inputvalues.length;i++)
        {
            let item = inputvalues.item(i);
            data_array.push(item.value);
        }
    // Send data
    $.post(booking_url,{data_array:data_array},
            function (response)
                {
                    document.getElementById('id01').style.display='none';
                    document.getElementById('id02').style.display='none';
                    response_display = document.getElementById('server-feedback-display');
                    response_display.innerHTML = response
                    Clear_All_Form_Inputs();
                }
            );
}

function Clear_All_Form_Inputs ()
{
    document.getElementById('booking-form').reset(); // form reset
    document.getElementById('customer-details-display').innerHTML = '';
    document.getElementById('booking-details-display').innerHTML = '';
}