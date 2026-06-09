function err(mess = "", ico="fa-solid fa-circle-xmark") {
    if (mess) {
    	let mensa = "<div class='error2'>";
    	mensa += "<div class='row'>";
    	mensa += "<div class='col-md-3'>";
    	mensa += "<i class='"+ico+" fa-3x'></i> ";
    	mensa += "</div>";
    	mensa += "<div class='col-md-9'>";
    	mensa += mess;
    	mensa += "</div>";
    	mensa += "</div>";
    	mensa += "</div>";
        document.getElementById("error").innerHTML = mensa;
    }
}