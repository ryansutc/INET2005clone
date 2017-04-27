/**
 * Created by inet2005 on 11/26/16.
 */
//really not sure where t o put my javascrupt functions to have them added. Use
//her efor now.

function confirmDelete() {
    //Handles the delete submit form function to confirm deletion of a record

    return confirm("Are you sure you want to delete this record?");

}

///validate the users page for edit
function validateUsers(user, authuser) {

    //if user is editing themselves and
    //removes their own admin priviledges
    //warn them
    //should return true or false

    var boolAdmin = document.getElementById('admin').checked;

    if (authuser == user && boolAdmin == false){
        return confirm("Are you sure you want to remove your own admin rights?"
        + " You will not be able to log into the backend next session");
    }
}

function validateNewUser(){
    var boolAdmin = document.getElementById('admin').checked;
    var boolEditor = document.getElementById('editor').checked;
    var boolAuthor = document.getElementById('author').checked;

    if (!boolAdmin && !boolEditor && !boolAuthor){
        return confirm("You have not assigned this user any priviledges."
            + " Are you sure you want to continue");
    }
}

function disableArticlePage(){
    var boolGlobal = document.getElementById('all_pages').checked;
    if(boolGlobal) {
        document.getElementById('articlepage').disabled = true;
    }
    else {
        document.getElementById('articlepage').disabled = false;
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
//JQuery Stuff
$(document).ready(function() {

    //hsuppsed to send a call to update database when active CSS sheet select is changed
    //in the CSS backend index page. Does not seem to make the call.
    $('.css_state').click(function (event) {
        $('.css_state').each(function(i, obj){
            obj.innerHTML = "";
        });
        event.target.innerHTML = "<img src='img/check.png' alt='Edit' style='width:10px' />";
        $id = event.target.id;
        updateCSS($id);
    });
});

function updateCSS($id) {
    $.ajax({
        type: 'POST',
        url: '/csssheets/updatecss/'.$id,
        success: function () {
            alert("data updated");
        }
    });
}



