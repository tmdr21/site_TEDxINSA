$("#name").keypress(function() {
    $("#name").removeClass("required");
});

function updateSponsor($id){
    if(!$("#name")[0].value){
        $("#name").addClass("required");
        return ;
    }

    let formData = new FormData();
    formData.append("name", $("#name")[0].value);
    formData.append("link", $("#link")[0].value);
    formData.append("description_fr", $("#description_fr")[0].value);
    formData.append("description_en", $("#description_en")[0].value);
    formData.append("year", $("#year")[0].value);
    formData.append("photo_file", document.getElementById('photo_file').files[0]);
    formData.append("id", $id);
	
    $.ajax({
        type: "POST",
        url: 'controller/sponsor_update.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log(data);
            if(data == 1 || data == 0){
              window.location.href = "sponsor_view.php?id=" + $id;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function createSponsor(){
    if(!$("#name")[0].value){
        $("#name").addClass("required");
        return ;
    }

    let formData = new FormData();
    formData.append("name", $("#name")[0].value);
    formData.append("link", $("#link")[0].value);
    formData.append("description_fr", $("#description_fr")[0].value);
    formData.append("description_en", $("#description_en")[0].value);
    formData.append("year", $("#year")[0].value);
    formData.append("photo_file", document.getElementById('photo_file').files[0]);
        
    $.ajax({
        type: "POST",
        url: 'controller/sponsor_create.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {console.log(data);
            if(data){
              window.location.href = "sponsor_view.php?id=" + data;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function deleteSponsor($id){
    let formData = new FormData();
    formData.append("id", $id);

    $.ajax({
        type: "POST",
        url: 'controller/sponsor_delete.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log("data");
			console.log(data);
            if(data == 1){
                window.location.href = "sponsors_list.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
