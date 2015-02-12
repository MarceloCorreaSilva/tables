
/*
    
*/

function sendUpdadeAjax(url,formData, objectContent)
{
    var uploadURL =url;
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
        url: uploadURL,
        type: "POST",
        contentType:false,
        processData: false,
        cache: false,
        data: formData,
        success: function(data){
            if (objectContent) {
                objectContent.html(data);
            };
        }
    });
}

$(document).ready(function() {

    $(".rwd-table tbody tr").each(function () {


        var tr = $(this);
        var controller = $(this).attr('controller');

        tr.find("td[column]").dblclick(function () { 

            var td = $(this);
            var column = td.attr('column');

            // alert( controller + '/' + column );

            var firstContent = td.text(); 
            td.addClass("cellEdit"); 
            td.html("<input type='text' value='" + firstContent + "' />"); 
            td.children().first().focus(); 

            td.children().first().bind('keypress blur', function (e) { 
                if (e.which == 13 || e.type == "blur" ) {
                    var newData = $(this).val();
                    
                    // prepares data
                    var formData = new FormData();
                    formData.append('column', column);
                    formData.append('value', newData);
                    
                    // Send data
                    sendUpdadeAjax(controller, formData, $(this).parent());

                    // $(this).parent().text(newData); 
                    $(this).parent().removeClass("cellEdit"); 
                }
            }); 
        });
    })
});