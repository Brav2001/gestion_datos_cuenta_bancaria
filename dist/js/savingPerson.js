function infSavingPerson(pers_id)
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
    $.post("admin_VI/infSavingPerson",{pers_id:pers_id},function(respuesta){
        $('#content').html(respuesta);
      })
}