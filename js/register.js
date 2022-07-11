const form = document.querySelector('#form');
const image = document.querySelector("#image")



const register = async (e) => {
    e.preventDefault()


    let name = document.getElementById("name").value 
    let username = document.getElementById("username").value      
    let email = document.getElementById("email").value   
    let birthday = document.getElementById("birthday").value
    let password = document.getElementById("password").value
    let passwordCheck = document.getElementById("passCheck").value      
    let data = {
        name,
        username,
        email,
        birthday,
        password,
        passwordCheck
    }
    
    const getApi = await fetch('../php/createUser.php',{
        method : 'POST',
        body: JSON.stringify(data)
    })
    const resApi = await getApi.json()
    console.log(resApi);
    
}


image.addEventListener ("change", async () => {
    const dataForm = new FormData(form)
    
    const getApi = await fetch('../php/uploadImg.php',{
        method : 'POST',
        body: dataForm
    })

    const resApi = await getApi.json()

    console.log(resApi);

   })