function validarUser(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    if (tecla==48) return true;
    if (tecla==49) return true;
    if (tecla==50) return true;
    if (tecla==51) return true;
    if (tecla==52) return true;
    if (tecla==53) return true;
    if (tecla==54) return true;
    if (tecla==55) return true;
    if (tecla==56) return true;
    if (tecla==57) return true;
    patron = /1/; 
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
function valiLog()
{
    var us=document.getElementById("user").value;
    var pas=document.getElementById("pas").value;
    if(us.length<8 || us.length>10)
    {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'El usuario no existe'
        })
        return false
    }
    else if(pas.length<8 || pas.length>45)
    {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La contrase&ntilde es incorrecta'
          })
        return false
    }
    else
    {
        return true;
    }
}
function viewPass()
{
    let pass=document.getElementById("pas");
    let eye=document.getElementById("eye");
    if(eye.classList.contains("ac"))
    {
        eye.classList.remove("ac");
        eye.classList.add("nac");
        pass.type="password";
        eye.innerHTML="visibility_off"
    }else{
        eye.classList.add("ac");
        eye.classList.remove("nac");
        pass.type="text";
        eye.innerHTML="visibility"
    }
}