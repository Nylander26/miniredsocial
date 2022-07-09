
const login = async (e) =>{
  
    e.preventDefault()

    let email = document.getElementById("email").value
    let password = document.getElementById("password").value


    const jsondata = await fetch("./json/data.json");
    const data = await jsondata.json();
    
    const resUser = existUsers(data, email, password)


  
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