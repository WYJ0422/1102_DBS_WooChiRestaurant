function searchMember() {
    // console.log("click")
    url = "../php/search_member.php";
    data = {
        "content" : $("input[name='searchMember']").val(),
    }
    console.log(data)
    $.post(
        url,
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    $("#member").css("visibility","visible");
                    putMember(response["data"][0]);
                }
                else {
                    alert("查無此會員");
                }
            }
        }
    )
}

function putMember(MEMBER) {
    console.log(MEMBER);
    let member = document.getElementById("member").getElementsByTagName("span");
    member[0].textContent = `姓名 : ${MEMBER["c_name"]}`;
    member[1].textContent = `電話 : ${MEMBER["c_phone"]}`;
    member[2].textContent = `信箱 : ${MEMBER["c_mail"]}`;
    member[3].textContent = `點數 : ${MEMBER["c_points"]} pt`;
    
}


function searchOrder() {
    // console.log("click")
    url = "../php/search_order.php";
    data = {
        "content" : $("input[name='searchOrder']").val(),
    }
    $.post(
        url,
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    if(response["type"] == "name") {
                        $("#orderdetailbyid").css("display","none");
                        $("#hide").css("display","block");
                        putOrderList(response["data_order"]);
                    }
                    else if(response["type"] == "date") {
                        $("#orderdetailbyid").css("display","none");
                        $("#hide").css("display","block");
                        putOrderList(response["data_order"]);
                    }
                    else if(response["type"] == "ID") {
                        // console.log(response)
                        $("#hide").css("display","none");
                        $("#orderdetailbyid").css("display","block");
                        putOrderDetailById(response["data_order"][0]);
                    }
                }
                else {
                    alert("查無此訂單");
                    $("#hide").css("display","none");
                    $("#orderdetailbyid").css("display","none");
                }
            }
        }
    )
}

function putOrderList(ORDERS) {
    let list = document.getElementById("orderlist");
    list.innerHTML = "";
    for(let i=0; i<ORDERS.length; i++) {
        let text = `
                    <tr>
                        <td>${i+1}</td> 
                        <td>${ORDERS[i]['meal_time']}</td>
                        <td>${ORDERS[i]['name']}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" id="orderDetail-${ORDERS[i]['o_id']}" onclick="showOrderDetail();postOrderId(${ORDERS[i]['o_id']})">詳細資料</button>
                        </td>   
                    </tr>        
                    `
        list.innerHTML += text;
    }
}
function postOrderId(id) {
    let url = "../php/show_order_detail.php";
    let data = {
        "o_id" : id
    }
    $.post(
        url,
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let ORDERDETAIL = response
                    putOrderDetail(ORDERDETAIL);
                }
                else {
                    console.log(response["error"]);
                }
            }
        }
    ) 
}
function putOrderDetail(ORDERDETAIL){
    // console.log(ORDERDETAIL);
    
    let dataorder = ORDERDETAIL["data_order"][0];
    let orderdetail = document.getElementById("orderDetail");
    let orderdetailmember = orderdetail.getElementsByTagName("h5")[0];
    orderdetailmember.innerHTML = `#&emsp;${dataorder["meal_time"]}`;
    
    let orderdetailcontent = orderdetail.getElementsByTagName("span");
    orderdetailcontent[0].innerHTML = `用餐人數 : ${dataorder["num_of_people"]}`;
    orderdetailcontent[1].innerHTML = `用餐區域 : ${dataorder["seat"]}`;
    orderdetailcontent[2].innerHTML = `領養意願 : ${dataorder["adoption"]}`;
    orderdetailcontent[3].innerHTML = `備註 : ${dataorder["note"]}`;
}

function putOrderDetailById(ORDERDETAILBYID) {
    // console.log(ORDERDETAILBYID);

    let dataorder = ORDERDETAILBYID;
    let orderdetail = document.getElementById("orderdetailbyid").getElementsByTagName("span");
    
    orderdetail[0].innerHTML = `姓名 : ${dataorder["c_name"]}`;
    orderdetail[1].innerHTML = `時間 : ${dataorder["meal_time"]}`;
    orderdetail[2].innerHTML = `用餐人數 : ${dataorder["num_of_people"]}`;
    orderdetail[3].innerHTML = `用餐區域 : ${dataorder["seat"]}`;
    orderdetail[4].innerHTML = `領養意願 : ${dataorder["adoption"]}`;
    orderdetail[5].innerHTML = `備註 : ${dataorder["note"]}`;
    orderdetail[6].innerHTML = `連絡電話 : ${dataorder["c_phone"]}`;
    orderdetail[7].innerHTML = `聯絡信箱 : ${dataorder["c_mail"]}`;
}

//顯示詳細資訊
function showOrderDetail() {
    let pageHeight = Math.max($("#v-pills-tabContent").outerHeight(), $("html").outerHeight());  // 取得內容或html的最大高度
    let nowPosition = document.documentElement.scrollTop;  // 取得滾動高度
    let windowPosition = nowPosition + 53;  // 設定 window 距離上方的位置
    $('.cover').css("display", "block");
    $('.cover').outerHeight(pageHeight + nowPosition);  // 蓋住整個頁面
    $('.window').css("display", "block");
    $('.window').css("top", windowPosition);  // 重設 top
    $("body").css("overflow-y", "hidden");  // 固定頁面
    $("#orderDetail").css("display", "block");
}
//關閉詳細資訊
function closeOrderDetail() {
    $(".cover").css("display", "none");
    $(".window").css("display", "none");
    $("body").css("overflow-y", "auto");
    $("#orderDetail").css("display", "none");
}

window.onload = function() {
    $(".row").outerHeight($("html").outerHeight() - $("nav").outerHeight());

}