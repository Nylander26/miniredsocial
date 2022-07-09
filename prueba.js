const register = () =>{
   const info = document.getElementById("espacioTexto");
   info.innerHTML=`
   <form actions="www.google.com" method="POST">
      <input type="text" placeholder="nombre">
      <input type="text" placeholder="apellidos">
      <input type="email" placeholder="nombre de usuari@">
      <input type="email" placeholder="email">
      <button type="submit">Enviar</button>
   </form>
   `
}

/*fetch("./json/postsUsers/29un7l7snkqpu5t505n5ok770b.json")
.then(response => {
   return response.json();
})
.then(jsondata => console.log(jsondata)

);*/

