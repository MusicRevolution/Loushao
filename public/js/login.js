$(document).ready(function () {
    $('#identity').selectpicker();
    $('.reload-vify').click(function () {
        var url = $(this).find("img").data("url");
        $.ajax({
            url: url,
            type: "GET",
            async: true,
            success: function($data) {
                $('.reload-vify').find("img").attr("src", $data);
            }
        });
    });
});