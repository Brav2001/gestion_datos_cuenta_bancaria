
function pages(url){
    document.getElementById('content').innerHTML=`
    <div class="gooey">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
`;
    
    $.post(url,function(respuesta)
    {
        $('#content').html(respuesta);
    })
}
function log_out()
{
    document.getElementById('content').innerHTML=`
    <div class="gooey">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
`;
    $.post('user_CO/log_out',function()
    {
        location.href="index.php";
    })
} 
