$("#firstname").keypress(function() {
    $("#firstname").removeClass("required");
});

$("#lastname").keypress(function() {
    $("#lastname").removeClass("required");
});

function updateMember($id){
    if(!$("#firstname")[0].value){
        $("#firstname").addClass("required");
        if(!$("#lastname")[0].value){
            $("#lastname").addClass("required");
        }
        return ;
    }

    let formData = new FormData();
    formData.append("firstname", $("#firstname")[0].value);
    formData.append("lastname", $("#lastname")[0].value);
    formData.append("title_fr", $("#title_fr")[0].value);
    formData.append("title_en", $("#title_en")[0].value);
    formData.append("year", $("#year")[0].value);
    formData.append("photo_file", document.getElementById('photo_file').files[0]);
    formData.append("id", $id);
        
    $.ajax({
        type: "POST",
        url: 'controller/member_update.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log(data);
            if(data == 1 || data == 0){
              window.location.href = "member_view.php?id=" + $id;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function createMember(){
    if(!$("#firstname")[0].value){
        $("#firstname").addClass("required");
        if(!$("#lastname")[0].value){
            $("#lastname").addClass("required");
        }
        return ;
    }

    let formData = new FormData();
    formData.append("firstname", $("#firstname")[0].value);
    formData.append("lastname", $("#lastname")[0].value);
    formData.append("title_fr", $("#title_fr")[0].value);
    formData.append("title_en", $("#title_en")[0].value);
    formData.append("year", $("#year")[0].value);
    formData.append("photo_file", document.getElementById('photo_file').files[0]);
        
    $.ajax({
        type: "POST",
        url: 'controller/member_create.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log(data);
            if(data){
              window.location.href = "member_view.php?id=" + data;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function deleteMember($id){
    let formData = new FormData();
    formData.append("id", $id);

    $.ajax({
        type: "POST",
        url: 'controller/member_delete.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log("data");
			console.log(data);
            if(data == 1){
                window.location.href = "members_list.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
