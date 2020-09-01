$(document).ready(function()
{
    $("#showHide").click(function()
    {
        if($("#password").attr("type")=="password")
        {
            $("#password").attr("type","text");
            $('span').text('Hide Password');
        }
        else
        {
          $("#password").attr("type","password");
          $('span').text('Show Password');
        }
    });
});