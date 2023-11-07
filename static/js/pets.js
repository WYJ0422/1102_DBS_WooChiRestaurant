function putPets() {
    $.post(
        "../php/show_pets.php",
        "",
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let DOGS = response["data"]["dogs"];
                    let CATS = response["data"]["cats"];
                    //寵物資料 - 狗狗
                    let dog = document.getElementById("pills-home");
                    for(let i=0; i<DOGS.length; i++){
                        //照片
                        let img = dog.getElementsByTagName("img");
                        img[i].src = `${DOGS[i]["photo"]}`;
                        //名字
                        let petname = dog.getElementsByClassName("card-title");
                        petname[i].textContent = `${DOGS[i]["name"]}`;
                        //細節
                        let pets = dog.getElementsByClassName("card-text")[i].getElementsByTagName("span");
                        pets[0].textContent += `${DOGS[i]["variety"]}`;
                        pets[1].textContent += `${DOGS[i]["size"]}`;
                        pets[2].textContent += `${DOGS[i]["gender"]}`;
                        pets[3].textContent += `${DOGS[i]["age"]}`;
                        pets[4].textContent += `${DOGS[i]["p_description"]}`;
                
                        let petss = dog.getElementsByClassName("card-text")[i].getElementsByTagName("small");
                        petss[0].textContent += `${DOGS[i]["microchip"]}`;
                        petss[1].textContent += `${DOGS[i]["ligation"]}`;
                    }
                
                    //寵物資料 - 貓貓
                    let cat = document.getElementById("pills-profile");
                    for(let i=0; i<CATS.length; i++){
                        //照片
                        let img = cat.getElementsByTagName("img");
                        img[i].src = `${CATS[i]["photo"]}`;
                        //名字
                        let petname = cat.getElementsByClassName("card-title");
                        petname[i].textContent = `${CATS[i]["name"]}`;
                        //細節
                        let pets = cat.getElementsByClassName("card-text")[i].getElementsByTagName("span");
                        pets[0].textContent += `${CATS[i]["variety"]}`;
                        pets[1].textContent += `${CATS[i]["size"]}`;
                        pets[2].textContent += `${CATS[i]["gender"]}`;
                        pets[3].textContent += `${CATS[i]["age"]}`;
                        pets[4].textContent += `${CATS[i]["p_description"]}`;
                
                        let petss = cat.getElementsByClassName("card-text")[i].getElementsByTagName("small");
                        petss[0].textContent += `${CATS[i]["microchip"]}`;
                        petss[1].textContent += `${CATS[i]["ligation"]}`;
                    }
                }
            }
        }
    )
}

function isRestaurant() {
    $.post(
        "../php/identify_role.php",
        "",
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    // console.log(response);
                    // console.log(response["data"]["u_id"]);
                }
                else {
                    // console.log(response);
                }
            }
        }
    )
}


window.onload = function() {
    putPets();
    isRestaurant();

}