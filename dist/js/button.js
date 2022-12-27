
$(document).ready(function(){
    $('.tooltipped').tooltip();
});

function toolopen()
{
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('#tool1').tooltip('open');
    });
}

function toolclose()
{
   
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('#tool1').tooltip('close');
    });
    pages('admin_VI/savingListPerson');
}
function toolclose1()
{

    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('#tool2').tooltip('close');
    });
    pages('cuenta_VI/principal');
}
