$("#name").keypress(function() {
    $("#name").removeClass("required");
});

function updateTalk($id){
    if(!$("#name")[0].value){
        $("#name").addClass("required");
        return ;
    }

    let formData = new FormData();
    formData.append("name", $("#name")[0].value);
    formData.append("video", $("#video")[0].value);
    formData.append("title_fr", $("#title_fr")[0].value);
    formData.append("title_en", $("#title_en")[0].value);
    formData.append("description_fr", $("#description_fr")[0].value);
    formData.append("description_en", $("#description_en")[0].value);
    formData.append("year", $("#year")[0].value);
    formData.append("lang", $("#lang")[0].dataset.lang);
    formData.append("photo_file", document.getElementById('photo_file').files[0]);
    formData.append("facebook", $("#facebook")[0].value);
    formData.append("twitter", $("#twitter")[0].value);
    formData.append("linkedin", $("#linkedin")[0].value);
    formData.append("youtube", $("#youtube")[0].value);
    formData.append("instagram", $("#instagram")[0].value);
    formData.append("website", $("#website")[0].value);
    formData.append("id", $id);
        
    $.ajax({
        type: "POST",
        url: 'controller/talk_update.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data == 1 || data == 0){
              window.location.href = "talk_view.php?id=" + $id;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function createTalk(){
    if(!$("#name")[0].value){
        $("#name").addClass("required");
        return ;
    }
    let formData = new FormData();
    formData.append("name", $("#name")[0].value);
    formData.append("video", $("#video")[0].value);
    formData.append("title_fr", $("#title_fr")[0].value);
    formData.append("title_en", $("#title_en")[0].value);
    formData.append("description_fr", $("#description_fr")[0].value);
    formData.append("description_en", $("#description_en")[0].value);
    formData.append("year", $("#year")[0].value);
    formData.append("lang", $("#lang")[0].dataset.lang);
    formData.append("photo_file", document.getElementById('photo_file').files[0]);
    formData.append("facebook", $("#facebook")[0].value);
    formData.append("twitter", $("#twitter")[0].value);
    formData.append("linkedin", $("#linkedin")[0].value);
    formData.append("youtube", $("#youtube")[0].value);
    formData.append("instagram", $("#instagram")[0].value);
    formData.append("website", $("#website")[0].value);
        
    $.ajax({
        type: "POST",
        url: 'controller/talk_create.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data){
              window.location.href = "talk_view.php?id=" + data;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function deleteTalk($id){
    let formData = new FormData();
    formData.append("id", $id);

    $.ajax({
        type: "POST",
        url: 'controller/talk_delete.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log("data");
			console.log(data);
            if(data == 1){
                window.location.href = "talks_list.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
