window.onload = function() {
    // date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
    //固定頁面大小
    setTimeout(() => {
        let currentPageSize = Math.max($("html").outerHeight(), $(".container").outerHeight())
        $(".container").outerHeight(currentPageSize);
    }, 100);
}