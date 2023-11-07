// let MENU = [
//     {"image":'../static/img/menu/p1.png'},
//     {"image":'../static/img/menu/p2.png'},
//     {"image":'../static/img/menu/p3.png'},
//     {"image":'../static/img/menu/p4.png'},
//     {"image":'../static/img/menu/p5.png'},
//     {"image":'../static/img/menu/p6.png'},
//     {"image":'../static/img/menu/p7.png'},
//     {"image":'../static/img/menu/p8.png'},
//     {"image":'../static/img/menu/p9.png'},
//     {"image":'../static/img/menu/p10.png'},
//     {"image":'../static/img/menu/p11.png'},
// ]

function putImage() {
    $.post(
        "../php/show_menu.php",
        "",
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success"){
                    let MENU = response["data"];
                    //餐廳守則&菜單
                    let menu = document.getElementById("menu").getElementsByTagName("div");
                    for (let i=0; i<MENU.length; i++){
                        menu[i].innerHTML = `<img src="${MENU[i]["image"]}" class="d-block w-50" alt="Image"></img>`;
                    }
                }
            }
        }
    )
}
window.onload = function() {
    putImage();
}