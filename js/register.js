const register = async (e) => {
    e.preventDefault()
    let name = document.getElementById("name").value 
    let lastName = document.getElementById("lastName").value 
    let userName = document.getElementById("userName").value      
    let email = document.getElementById("email").value   
    let password = document.getElementById("password").value   
    let data = {
        name,
        lastName,
        userName,
        email,
        password
    }
    const getApi = await fetch('../php/createUser.php',{
        method : 'POST',
        body: JSON.stringify(data)
    })
    const resApi = await getApi.json()
    console.log(resApi);
}
    //console.log(name, lastName, userName, email, password);