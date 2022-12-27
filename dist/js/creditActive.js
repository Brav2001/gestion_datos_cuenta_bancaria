function infCreditActive(credit_id){
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
    $.post("admin_VI/infCreditActive",{credit_id:credit_id},function(respuesta){
        $('#content').html(respuesta);
      })
}
function back()
{
    pages('admin_VI/creditActiveList');
}