
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

    let message;

    data.map(info => {
        if (email == info.email && password == info.password) {
            message = true
        }else{
           message= false
        }
       
    } )

    return message



}
