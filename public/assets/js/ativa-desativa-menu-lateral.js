
        //Controla o estado do menu lateral
        
$(window).on("load", function(){
    // Handler when all assets (including images) are loaded
    carregaestadomenu()
});

function salvaestadomenu(){
    //document.body.className = 'light sidebar-mini loaded'
    if(document.body.className == 'light sidebar-mini loaded sidebar-collapse'){
        valor = 'light sidebar-mini loaded'
    }else{
        valor = 'light sidebar-mini loaded sidebar-collapse'
    }
    // Check browser support
    if (typeof(Storage) !== "undefined") {
        // Store
        localStorage.setItem("hamburgermenu", valor);
    } else {
        console.log("Sorry, your browser does not support Web Storage...")
    }

}
function carregaestadomenu(){

    // Retrieve
    if (typeof(Storage) !== "undefined") {
        document.body.className = localStorage.getItem("hamburgermenu");
    } else {
        console.log("Sorry, your browser does not support Web Storage...")
    }

}