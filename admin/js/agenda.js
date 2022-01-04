
var month_fr = ['JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUN', 'JUL', 'AOU', 'SEP', 'OCT', 'NOV', 'DEC'];
var month_en = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

function updateAgenda($id){
    let formData = new FormData();
    formData.append("day", $("#day")[0].value);
    formData.append("month_fr", month_fr[$("#month")[0].value - 1]);
    formData.append("month_en", month_en[$("#month")[0].value - 1]);
    formData.append("title_fr", $("#title_fr")[0].value);
    formData.append("title_en", $("#title_en")[0].value);
    formData.append("info_fr", $("#info_fr")[0].value);
    formData.append("info_en", $("#info_en")[0].value);
    formData.append("id", $id);
        
    $.ajax({
        type: "POST",
        url: 'controller/agenda_update.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data == 1 || data == 0){
              window.location.href = "agenda.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function createAgenda(){
    let formData = new FormData(); 
    formData.append("day", $("#day")[0].value);
    formData.append("month_fr", month_fr[$("#month")[0].value - 1]);
    formData.append("month_en", month_en[$("#month")[0].value - 1]);
    formData.append("title_fr", $("#title_fr")[0].value);
    formData.append("title_en", $("#title_en")[0].value);
    formData.append("info_fr", $("#info_fr")[0].value);
    formData.append("info_en", $("#info_en")[0].value);
        console.log(formData);
    $.ajax({
        type: "POST",
        url: 'controller/agenda_create.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data){
              window.location.href = "agenda.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function deleteAgenda($id){
    let formData = new FormData();
    formData.append("id", $id);

    $.ajax({
        type: "POST",
        url: 'controller/agenda_delete.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log("data");
			console.log(data);
            if(data == 1){
                window.location.href = "agenda.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
