function ResFunc() {
    var x = document.getElementById("navBar");
    if (x.className === "NavBar") {
        x.className += " responsive";
    } else {
        x.className = "NavBar";
    }
}