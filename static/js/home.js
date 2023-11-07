function putRestaurant() {
    $.post(
        "../php/show_restaurant.php",
        "",
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let DESCRIPTION = response["data"]["description"];
                    //餐廳簡介
                    let des = document.getElementById("description");
                    des.innerHTML = `${DESCRIPTION}`;
                    //餐廳基本資訊
                    let RESTAURANT = response["data"];
                    let base = document.getElementById("restaurant").getElementsByTagName("span");
                    base[0].textContent += `${RESTAURANT["name"]}`;
                    base[1].textContent += `${RESTAURANT["location"]}`;
                    base[2].textContent += `${RESTAURANT["phone"]}`;
                    base[3].textContent += `${RESTAURANT["mail"]}`;
                    base[4].textContent += `${RESTAURANT["opening_hour"]}`;
                }
            }
        }
    )
}
function editRestaurant() {
    let url = "../php/edit_restaurant.php"
    let data = {
        "desc" : $("#description").text(),
        "tel" : $("span[name='tel']").text(),
        "mail" : $("span[name='mail']").text(),
        "location" : $("span[name='location']").text(),
        "hour" : $("span[name='openinghour']").text(),
    }
    $.post(
        url,
        data,
        (response, status) => {
            console.log(response);
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("已儲存變更")
                    window.location.reload();
                }
            }
        }
    )
}




function putNews() {
    $.post(
        "../php/show_news.php",
        "",
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    //餐廳最新消息
                    let NEWS = response["data"]
                    let news = document.getElementById("news");
                    for (let i=0; i<NEWS.length; i++){
                        news.innerHTML += `<tr><td>${i+1}</td><td>${NEWS[i]["content"]}</td><td>${NEWS[i]["date"]}</td></tr>`;
                    }   
                   
                }
            }
        }
    )
}
window.onload = function() {
    putRestaurant();
    putNews();
}