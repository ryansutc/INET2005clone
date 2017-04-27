/**
 * Created by inet2005 on 10/1/16.
 */


function editRecords(){
    /*
     Handle edit button click.
     Enable edit textboxes
     */
    firstName = document.getElementById("first_name").value; //global variable
    lastName = document.getElementById("last_name").value; //global variable

    var editFields = document.getElementsByClassName('update');
    for(i=0;i<editFields.length;i++){
        editFields[i].disabled=false;
    }
    /*
     var inputs = document.getElementsByClassName('find');
     for(i=0;i<inputs.length;i++){
     inputs[i].disabled=true;
     }
     */

    var submit = document.getElementById("Save");
    submit.disabled = false;

    var btnCancelEdit = document.getElementById("cancelEdit");
    btnCancelEdit.disabled = false;

    var btnEdit = document.getElementById("Edit");
    btnEdit.disabled = true;

}
function cancelEditRecords(){
    /*
     Handle cancel button click.
     Disable edit textboxes
     */
    var inputs = document.getElementsByClassName('update');
    for(i=0;i<inputs.length;i++){
        inputs[i].disabled=true;
    }
    var fnameTag = document.getElementById("first_name");
    fnameTag.value = firstName;
    var lnameTag = document.getElementById("last_name");
    lnameTag.value = lastName;
    var btnCancelEdit = document.getElementById("cancelEdit");
    btnCancelEdit.disabled = true;
    var btnEdit = document.getElementById("Edit");
    btnEdit.disabled = false;
    var btnSave = document.getElementById("Save");
    btnSave.disabled = true;

    document.getElementById("first_name_err").innerHTML = "";
    document.getElementById("last_name_err").innerHTML = "";
}
function saveEditRecords(){
    /*Handles save records event for form validation
     If records are empty, returns false to cancel submit function
     */
    var valid = true;

    if (!warningDate(document.getElementById('birth_date'),
            'Please enter a valid birth date',
            'birth_date_err')) {
        valid = false;
    }

    if (!warningText(document.getElementById('first_name'),
                'Please enter a first name',
                'first_name_err')) {
        valid = false;
    }

    if (!warningText(document.getElementById('last_name'),
            'Please enter a last name',
            'last_name_err')) {
        valid = false;
    }

    if (!warningDate(document.getElementById('hire_date'),
            'Please enter a valid hire date',
            'hire_date_err')) {
        valid = false;
    }


    if (valid == false) {
        alert("Invalid Actor data");
        return false;
    }
    else {
        //document.forms["updateActorForm"].first_name.disabled = true;
        //document.forms["updateActorForm"].last_name.disabled = true;
        return true;
    }
}

function warningText(field,messageText,targetID)
/*
function to handle onBlur event (cursor leave) for text inputs
in various data forms. Does basic validation for various data types
 */
{
    var targetSpan = document.getElementById(targetID);
    if (targetSpan != null) {
        if (field.value.length == 0) {
            targetSpan.innerHTML = messageText;
            return false;
        }
        else
        {
            targetSpan.innerHTML = "";
        }
    }
    return true;

}

function warningDate(field,messageText,targetID)
/*
 function to handle onBlur event (cursor leave) for text inputs
 in various data forms. Does basic validation for various data types
 */
{
    var targetSpan = document.getElementById(targetID);
    if (targetSpan != null) {
        var str = field.value;
        //test if date text matches [####-##-##] format see: https://regex101.com/
        var valid = str.match(/^(\d{4})-(\d{2})-(\d{1,2})$/);
        if (valid ==  null) {
            targetSpan.innerHTML = messageText;
            return false;
        }
        else
        {
            targetSpan.innerHTML = "";
        }
    }
    return true;

}
//Additional JavaScript functions for input focus and blur events..copied from example
function focusItem(fieldID) {
    var myFormItem = document.getElementById(fieldID);
    myFormItem.style.borderColor = "black";
}

function unfocusItem(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if (myFormItem != null) {
        myFormItem.value = toTitleCase(myFormItem.value);
    }
}

//copied shamelessly from here: http://stackoverflow.com/questions/196972/convert-string-to-title-case-with-javascript/196991#196991
function toTitleCase(str)
    //Make string words start with caps. hello world = Hello World.
{
    return str.replace(/\w\S*/g,
        function(txt){
            return txt.charAt(0).toUpperCase() +
                txt.substr(1).toLowerCase();
        });
}

function confirmDelete() {
    //Handles the delete submit form function to confirm deletion of a record

    return confirm("Are you sure you want to delete this record?");

}