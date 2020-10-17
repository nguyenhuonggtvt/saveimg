$(document).ready(function() {
    // getListImage();

    $("#button-save").click(function(e) {
        if (!validate()) {
            return false;
        }
        $("#box-alert").removeClass('d-none');
        $.ajax({
            url: 'get_img_from_page.php',
            type: 'POST',
            dataType: 'html',
            data: {
                txtLink: $("#txtLinkImg").val()
            },
            success: function(response) {
                $("#box-alert").addClass('d-none');
                buildListImage(response);
            }
        });
    });

    function validate() {
        var isValid = true;
        var txtLink = $("#txtLinkImg").val();
        if (txtLink === "") {
            alert("Please paste the link before copy");
            isValid = false;
        }
        return isValid;
    }

    function buildListImage(response) {
        var aryImgs = $.parseJSON(response);
        var countImg = '';
        console.log(aryImgs);
        var html = "";
        if (aryImgs.length == 0) {
            html = "<div>This page don't have image</div>";
        } else {
            countImg = aryImgs.length;
        }
        aryImgs.forEach((img) => {
            html += '<div class="col-3 item-image"><img src="' + img + '"></div>';
        });

        $("#count_img").text(countImg);
        $("#list-img").html(html);
    }

    function getListImage() {
        $.ajax({
            url: 'get_list_images.php',
            type: 'POST',
            dataType: 'html',
            data: {},
            success: function(response) {
                var html = "";
                var files = $.parseJSON(response);
                files.forEach((file) => {
                    html += '<div class="col-3 item-image"><img src="/images/' + file + '"></div>';
                });
                $("#list-img").html(html);
                $("#txtLinkImg").val("");
                $("#box-alert").addClass('d-none');
            }
        });
    }
});