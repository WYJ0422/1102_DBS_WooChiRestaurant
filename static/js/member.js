/* 會員資料 */
function postMember() {
    $.post(
        "../php/show_customer.php",
        "",
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let MEMBER = response["data"];
                    putMemberInfo(MEMBER);
                    editMemberInfo(MEMBER);
                }
            }
        }
    )
}
//顯示會員資料
function putMemberInfo(MEMBER) {
    let member = document.getElementById("member").getElementsByTagName("span");
    member[0].textContent += `${MEMBER[1]["account"]}`;
    member[1].textContent += `${MEMBER[0]["c_name"]}`;
    member[2].textContent += `${MEMBER[0]["c_phone"]}`;
    member[3].textContent += `${MEMBER[0]["c_mail"]}`;
    member[4].textContent += `${MEMBER[0]["c_points"]}pt`;
}
//在編輯框裡顯示會員資料
function editMemberInfo(MEMBER) {
    let member = document.getElementById("editmember").getElementsByTagName("input");
    member[0].value = `${MEMBER[1]["account"]}`;
    member[1].value = `${MEMBER[0]["c_name"]}`;
    member[2].value = `${MEMBER[0]["c_phone"]}`;
    member[3].value = `${MEMBER[0]["c_mail"]}`;
}
//顯示編輯框
function showMemberEditBox() {
    document.getElementById("editmember").style.visibility = "visible";
}
//關閉編輯框
function closeMemberEditBox() {
    document.getElementById("editmember").style.visibility = "hidden";
}

//編輯會員資料
function postNewMemberInfo() {
    let url = "../php/edit_customer.php"
    let data = {
        "account" : $("input[name='account']").val(),
        "name" : $("input[name='name']").val(),
        "phone" : $("input[name='tel']").val(),
        "mail" : $("input[name='mail']").val(),
    }
    // console.log(data);
    $.post(
        url,
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("變更成功");
                    window.location.reload();
                }
                else {
                    console.log(response["error"]);
                }
            }
        }
    )
}

/* 訂單紀錄*/
function postOrder() {
    $.post(
        "../php/show_order.php",
        "",
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    let ORDERS = response['data_order']
                    //console.log(ORDERS);
                    putOrderList(ORDERS);
                }
            }
        }
    )
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
function putOrderList(ORDERS) {
    let list = document.getElementById("orderlist");
    for(let i=0; i<ORDERS.length; i++) {
        let text = `
                    <tr>
                        <td>${i+1}</td> 
                        <td>${ORDERS[i]['meal_time']}</td>
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
    let datacustomer = ORDERDETAIL["data_customer"][0];
    let dataorder = ORDERDETAIL["data_order"][0];
    let orderdetail = document.getElementById("orderDetail");
    let orderdetailmember = orderdetail.getElementsByTagName("h5")[0];
    orderdetailmember.innerHTML = `#&emsp;${dataorder["meal_time"]}`;
    
    let orderdetailcontent = orderdetail.getElementsByTagName("span");
    orderdetailcontent[0].innerHTML = `用餐人數 : ${dataorder["num_of_people"]}`;
    orderdetailcontent[1].innerHTML = `用餐區域 : ${dataorder["seat"]}`;
    orderdetailcontent[2].innerHTML = `領養意願 : ${dataorder["adoption"]}`;
    orderdetailcontent[3].innerHTML = `備註 : ${dataorder["note"]}`;
    orderdetailcontent[4].innerHTML = `聯絡電話 : ${datacustomer["c_phone"]}`;
    orderdetailcontent[5].innerHTML = `聯絡信箱 : ${datacustomer["c_mail"]}`;
}


window.onload = function() {
    postMember();
    postOrder();
    $(".row").outerHeight($("html").outerHeight() - $("nav").outerHeight());

}