
const login = async (e) =>{
  
    e.preventDefault()

    let email = document.getElementById("email").value
    let password = document.getElementById("password").value


    const jsondata = await fetch("./json/data.json");
    const data = await jsondata.json();
    
    const resUser = existUsers(data, email, password)

/*Verificacion si el usuario existe para que aparezca el modal*/
    if(resUser){
        let modal = document.getElementById("modal")
        modal.close()
    }else{
        let modal = document.getElementById("modal")
        modal.showModal()
    }
}


const existUsers = (data, email, password) =>{

    for (let i = 0; i < data.length; i++) {
        
        if (data[i].email == email && data[i].password == password) {
            return true
        }

        } 

        return false
    
    }


