var path = window.location.pathname;

var urlCheck = path.split("/")[2]


if(urlCheck == "tang-thiet-bi" || urlCheck == "theo-doi-dieu-chuyen" || urlCheck == "ghi-nhan-thiet-bi-hong" || urlCheck == "ghi-nhan-thiet-bi-mat" || urlCheck == "sua-chua-thiet-bi" || urlCheck == "thanh-ly-thiet-bi"){
    var menu = document.getElementById("ml-menu-tb");
    menu.style.display = "block";
}

if(urlCheck == "muon-tra" || urlCheck == "muon-phong-hoc"){
    var menu = document.getElementById("ml-menu-mt");
    menu.style.display = "block";
}


if(urlCheck == "quan-ly-nguoi-dung"){
    var menu = document.getElementById("ml-menu-ht");
    menu.style.display = "block";
}

if(urlCheck == "bao-cao"){
    var menu = document.getElementById("ml-menu-bc");
    menu.style.display = "block";
}


