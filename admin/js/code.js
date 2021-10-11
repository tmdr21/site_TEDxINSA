$("#code").keypress(function() {
    $("#code").removeClass("required");
});

function createCode(){
    if(!$("#code")[0].value){
        $("#code").addClass("required");
        return ;
    }
    let formData = new FormData();
    formData.append("code", $("#code")[0].value);
    formData.append("valide", $("#valide")[0].value);
        
    $.ajax({
        type: "POST",
        url: 'controller/code_create.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            if(data){
              window.location.href = "codes.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function deleteCode($id){
    let formData = new FormData();
    formData.append("id", $id);

    $.ajax({
        type: "POST",
        url: 'controller/code_delete.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
			console.log("data");
			console.log(data);
            if(data == 1){
                window.location.href = "codes.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    }); 
}

function generateCode(){
    if(!$("#number")[0].value){
        $("#number").addClass("required");
        return ;
    }
    let formData = new FormData();
    formData.append("number", $("#number")[0].value);
        
    $.ajax({
        type: "POST",
        url: 'controller/code_generate.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log(data);
            if(data){
              window.location.href = "codes.php";
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function deleteAllCodes(){

    $.ajax({
        type: "GET",
        url: 'controller/code_deleteAll.php',
        success: function () {
            window.location.href = "codes.php";
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    }); 
}