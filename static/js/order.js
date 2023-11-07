// if checked
// 要資料改input的value

function postMember() {
    $.post(
        "../php/show_customer.php",
        "",
        (response, status) => {
            if (status == "success") {
                console.log(response);
                if (response["status"] == "success") {
                    let MEMBER = response["data"][0];
                    putMemberInfo(MEMBER)
                }
            }
        }
    )
}
function putMemberInfo(MEMBER) {
    let member = document.getElementById("member").getElementsByTagName("small");
    member[0].textContent += `${MEMBER["c_name"]}`;
    member[1].textContent += `${MEMBER["c_phone"]}`;
    member[2].textContent += `${MEMBER["c_mail"]}`;
}

function order() {
    let url = "../php/insert_order.php";
    let meal_date = $("input[name='meal_date']").val();
    let meal_time= $('#inputState').val();
    let data = {
        "time" : `${meal_date} ${meal_time}`,
        "people" : $("input[name='people']").val(),
        "seat" : "A1",
        "adopt" : $("input[name='inlineRadioOptions']:checked").val(),
        "note" : $("#textarea").val(),
    }
    console.log(data);
    $.post(
        url,
        data,
        (response, status) => {
            if (status == "success") {
                if (response["status"] == "success") {
                    alert("已成功收到您的訂單，到時見~");
                    window.location.href = "../member";
                }
                else {
                    alert("請確認所有資料皆已填寫");
                }
            }
        }
    )
}


$(document).ready(() => {
    postMember();
    $("#submit").click(() => {
        order();
    })
});