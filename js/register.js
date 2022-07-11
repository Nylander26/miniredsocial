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

    const getApi = await fetch('../php/createUser.php', {
        method: 'POST',
        body: JSON.stringify(data)
    })
    const resApi = await getApi.json()
    console.log(resApi);

}


image.addEventListener("change", async () => {
    const dataForm = new FormData(form)

    const getApi = await fetch('../php/uploadImg.php', {
        method: 'POST',
        body: dataForm
    })

    const resApi = await getApi.json()

    console.log(resApi);

})

/*Previsualizacion de Imagen Registro*/

document.getElementById('image').onchange = function (e) {
    var lector = new FileReader();
    if (lector) {
        lector.readAsDataURL(e.target.files[0]);
        lector.onload = function () {
            let cajaPadre = document.getElementById('padrePreview')
            let preview = document.createElement('div')
            let divINPUT = document.getElementById('cajaFile');

            divINPUT.style.display = "none";
            preview.classList.add('preview');
            preview.setAttribute("id", "previewDIV");
            cajaPadre.appendChild(preview);

            imagen = document.createElement('img');
            imagen.src = lector.result;
            preview.appendChild(imagen);

            document.getElementById('padrePreview').onclick = function (e) {
                this.firstChild.remove();
                let divINPUT = document.getElementById('cajaFile')
                divINPUT.style.display = "flex";
            };
        }
    }
}

