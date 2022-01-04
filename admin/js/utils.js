// Views

$(function(){
    autosize(document.querySelectorAll('textarea'));

    // Select lang
    $("#custom-select_talk").on('click', function(){
        if(!$(this).hasClass('disabled'))
        {
        if($("#custom-options_talk").css('display') == "block")
            $("#custom-options_talk").css('display', "none");
        else
            $("#custom-options_talk").css('display', "block");
        }
    }); 
    document.body.addEventListener('click', function(){
        if($("#custom-options_talk").css('display') == "block")
            $("#custom-options_talk").css('display', "none");
    }, true); 

    $(".custom-option-menu_talk").on('click', function(){
        $("#custom-select_talk img").attr('src',$(this).find(">:first-child").attr('src'));
        $("#lang")[0].dataset.lang = $(this).find(">:first-child")[0].dataset.lang;
        $("#custom-options_talk").css('display', "none");
    });
});

$("#photo").on('click', function(){
    $("#photo_file").click();
});

// Select picture preview
 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
		$("#photo").css("background-image", "url(" + e.target.result + ")");
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#photo_file").change(function() {
    readURL(this);
});

// Modal
$('#deleteModal').on('show.bs.modal', function (event) {
    var content = "";
    switch(event.relatedTarget.dataset.object){
        case 'talk':
            content = "Êtes vous sûr de vouloir supprimer le speaker <b>" + event.relatedTarget.dataset.name + "</b> ?";
            $('#deleteModal a').on('click', function(){
                deleteTalk(event.relatedTarget.dataset.id);
            });
            break;

        case 'sponsor':
            content = "Êtes vous sûr de vouloir supprimer le sponsor <b>" + event.relatedTarget.dataset.name + "</b> ?";
            $('#deleteModal a').on('click', function(){
                deleteSponsor(event.relatedTarget.dataset.id);
            });
            break;

        case 'member':
            content = "Êtes vous sûr de vouloir supprimer le membre <b>" + event.relatedTarget.dataset.name + "</b> ?";
            $('#deleteModal a').on('click', function(){
                deleteMember(event.relatedTarget.dataset.id);
            });
            break;

        case 'agenda':
            content = "Êtes vous sûr de vouloir supprimer l'evenement <b>" + event.relatedTarget.dataset.name + "</b> ?";
            $('#deleteModal a').on('click', function(){
                deleteAgenda(event.relatedTarget.dataset.id);
            });
            break;
        
        case 'code':
            content = "Êtes vous sûr de vouloir supprimer le code <b>" + event.relatedTarget.dataset.name + "</b> ?";
            $('#deleteModal a').on('click', function(){
                deleteCode(event.relatedTarget.dataset.id);
            });
            break;
        
        case 'allCode':
            content = "Êtes vous sûr de vouloir supprimer tous les codes ?";
            $('#deleteModal a').on('click',function(){
                deleteAllCodes();
            });
            break;
    }
    $('#deleteModal .modal-body').html(content);

});

$('#agendaFormModal').on('show.bs.modal', function (event) {
    $('#agendaFormModal #day').val('');
    $('#agendaFormModal #month').val('');
    $('#agendaFormModal #title_fr').val('');
    $('#agendaFormModal #title_en').val('');
    $('#agendaFormModal #info_fr').val('');
    $('#agendaFormModal #info_en').val('');
            console.log(event.relatedTarget.dataset.action);
    switch(event.relatedTarget.dataset.action){
        case 'edit':
            var id = event.relatedTarget.dataset.id;
            $('#agendaFormModal .modal-title').html("Modifier un événement");
            var month = month_fr.findIndex((elem) => elem == $('#agenda-'+id+' .agenda-date')[0].dataset.month);
            $('#agendaFormModal #day').val($('#agenda-'+id+' .agenda-date')[0].dataset.day);
            $('#agendaFormModal #month').val(month+1);
            $('#agendaFormModal #title_fr').val($('#agenda-'+id+' .agenda-title-fr')[0].dataset.value);
            $('#agendaFormModal #title_en').val($('#agenda-'+id+' .agenda-title-en')[0].dataset.value);
            $('#agendaFormModal #info_fr').val($('#agenda-'+id+' .agenda-info-fr')[0].dataset.value);
            $('#agendaFormModal #info_en').val($('#agenda-'+id+' .agenda-info-en')[0].dataset.value);
            
            $('#agendaFormModal a').on('click', function(){
                updateAgenda(event.relatedTarget.dataset.id);
            });
            break;
        case 'add':
            $('#agendaFormModal .modal-title').html("Nouvel événement");
            $('#agendaFormModal a').on('click', function(){
                createAgenda();
            });
            break;
    }
});

$('#addCodeModal').on('show.bs.modal', function (event) {
    $('#addCodeModal #code').val('');
    $('#addCodeModal #valid').val('');
            console.log(event.relatedTarget.dataset.action);
    switch(event.relatedTarget.dataset.action){
        case 'addCode':
            $('#addCodeModal .modal-title').html("Nouveau code");
            $('#addCodeModal a').on('click', function(){
                createCode();
            });
            break;
    }   
});

$('#genererCodeModal').on('show.bs.modal', function (event) {
    $('#genererCodeModal #number').val('');
            console.log(event.relatedTarget.dataset.action);
    switch(event.relatedTarget.dataset.action){
        case 'genererCode':
            $('#genererCodeModal .modal-title').html("Génerer des codes");
            $('#genererCodeModal .btn-primary').on('click', function(){
                generateCode();
            });
            break;
    }   
});