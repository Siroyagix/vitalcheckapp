$(function(){
    var id = $("tr").attr("id");
    $('#'+id).mouseover(function(){
        $('#'+id).css("backgroundColor","yellow");
    })
    $('#'+id).mouseout(function(){
        $('#'+id).css("backgroundColor","white");
    })
})
