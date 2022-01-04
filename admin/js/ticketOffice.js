
console.log("hey");

function toggleAvailability() {
    var chkBox = document.getElementById("availability");
    if (chkBox.checked)
    {
        document.getElementById("ticketOfficeLink").disabled = false;
    } else {
        document.getElementById("ticketOfficeLink").disabled = true;
        console.log("coucou");
    }

}
