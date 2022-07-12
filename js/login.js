async function login(e){
    e.preventDefault()

    var email = document.getElementById("email").value;
    var contraseña = document.getElementById("password").value;
    const jsondata = await fetch("../miniredsocial/json/data.json")
    const data = await jsondata.json()

    
    const user = userexists(data, email, contraseña);
    
    if(user == false){
        let modal = document.getElementById('modal')
        modal.showModal();
        setTimeout(()=>{
            modal.close();
              },5000);
    }

    if(user)
    {
        var direccion = "../miniredsocial/pages/perfilpropio.php?email=" + email;
        window.location.href = direccion;
    }
    else
    {
        var errorSpan = document.getElementById("formError");
        errorSpan.innerHTML = "<p class='error'>Error en contraseña o nombre de usuario. Por favor revisa y prueba nuevamente.</p>"; 
    }
    
}

function userexists(data, email, contraseña){
    for (let i = 0; i < data.length; i++){
        if (data[i].email == email && data[i].password == contraseña){
            return true;
        }    
    }
    return false
}



