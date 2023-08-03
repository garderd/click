function isValidUrl(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
    return !!pattern.test(str);
}



$(document).ready(function () {
    $('input[name="link"]').on('input keyup', function () {
        if ($(this).val() != '') {
            $('.link-form__button').addClass('active').removeAttr('disabled');
        }
        else {
            $('.link-form__button').removeClass('active').attr('disabled');
        }
    });
    $('.link-form__text').on('focus keydown', function () {
        $('.link-form__alarm-text').fadeOut(300);
        $('.link-form__text').removeClass('error');
    });

    $('.link-form').submit(function (e) {
        if (isValidUrl($('input[name="link"]').val())) {
            $.ajax({
                url: $(this).attr('action'),
                method: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (result) {
                    if (result['status'] == "novalid") {
                        $('.link-form__alarm-text').fadeIn(300);
                        $('.link-form__text').addClass('error');
                    }
                    if(result['status'] == "success"){
                        $('.link-short').fadeIn(300);
                        $('.link-short__result').text(result['short_link']);
                    }
                    console.log(result);
                }
            });
        }
        else {
            $('.link-form__alarm-text').fadeIn(300);
            $('.link-form__text').addClass('error');
        }
        e.preventDefault();
        return false;
    });
});