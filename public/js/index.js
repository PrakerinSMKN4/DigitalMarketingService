function openNav() {
    document.getElementById("sideBar").style.width = "15em";
    document.getElementById("toggle-button").setAttribute("onclick", "closeNav()");

    var x = document.getElementsByClassName("side-text");
    
    setTimeout(() => {
        for (let i = 0; i < x.length; i++) {
            x[i].style.display = "block";
        }
    }, 400);
    
    setTimeout(() => {
        for (let i = 0; i < x.length; i++) {
            x[i].style.opacity = "1";
        }
    }, 500);
}

function closeNav() {
    var x = document.getElementsByClassName("side-text");
    for (let i = 0; i < x.length; i++) {
        x[i].style.opacity = "0";
    }
    
    setTimeout(() => {
        document.getElementById("sideBar").style.width = "5em";
        document.getElementById("toggle-button").setAttribute("onclick", "openNav()");
        for (let i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
    }, 400);
    
}

function logout() {
    event.preventDefault(); 
    document.getElementById('logout').submit();
}