const getImg = async (e) => {
    e.preventDefault();
    var idStorage = localStorage.getItem("id");

    var id = {
        "id" : "29un7l7snkqpu5t505n5ok770b" //Cambiar este id por el obtenido de localStorage
    }
            const getApi = await fetch('../utils/updateImg.php', {
            method: "POST",
            body : JSON.stringify(id)
        })
        const resApi = await getApi.json();


    for (let i = 0; i < resApi.length; i++){
        var img = document.createElement("img");
        img.src = resApi[i].url;
        document.body.appendChild(img);
    }
}