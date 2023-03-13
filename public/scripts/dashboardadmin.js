$("#lokasi_search").change(function()
{
    $(this).find("option:selected").each(function(){
        var optionValue = $(this).attr("value");
        console.log(optionValue)
    });
}).change();
