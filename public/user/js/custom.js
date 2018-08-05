function setCookie(name, value, days) {
    var d = new Date;
    d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
    document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
}

function getCookie(name) {
    var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return v ? v[2] : null;
}

var delete_cookie = function (name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

const g_token = getCookie('g_token');

function buyShopCart(token, id, qty) {
    var buy_url = window.location.origin + '/buy-cart/';
    var result = { id: id, qty: qty };
    $.ajax({
        url: buy_url,
        type: 'GET',
        cache: false,
        data: { '_token': token, 'result': result },
        success: function (data) {
            if (data.status == true) {
                alert('SUCCESS!');
            }
            else
                alert('ERROR!');
        }
    })
    return;
};


function delShopCart(token, id) {
    var del_url = window.location.origin + '/delete-cart/' + id;
    $.ajax({
        url: del_url,
        type: 'GET',
        cache: false,
        success: function (data) {
            if (data.status == true) {
                alert('SUCCESS!');
                location.reload();
            }
            else
                alert('ERROR!');
        }
    })
    return;
};

function updateShopCart(token) {
    var update_url = window.location.origin + '/update-cart/';

    var result = [];
    $("table.table.table-responsive tr").each(function () {
        var arrayOfThisRow = [];
        var rowID = $(this).find('.cart_rowid_input');
        var qty = $(this).find('.qty-text');
        if (rowID.length > 0 && qty.length > 0) {
            var arrayOfThisRow = { rowid: rowID.val(), qty: qty.val() };
            result.push(arrayOfThisRow);
        }
    });

    $.ajax({
        url: update_url,
        type: 'GET',
        cache: false,
        data: { '_token': token, 'result': result },
        success: function (data) {
            if (data.status == true) {
                alert('SUCCESS!');
                location.reload();
            }
            else
                alert('ERROR!');
        }
    })
};

function createOrder(token) {
    var result = [];
    $("table.table.table-responsive tr").each(function () {
        var arrayOfThisRow = [];
        // var rowID = $(this).find('.cart_rowid_input');
        var id = $(this).find('.cart_id_input');
        var qty = $(this).find('.qty-text');
        if (qty.length > 0 && id.length > 0) {
            var arrayOfThisRow = { id: id.val(), qty: qty.val() };
            result.push(arrayOfThisRow);
        }
    });
    if (token) {
        var create_url = window.location.origin + '/checkout';
        var g_user = JSON.parse(localStorage.getItem('g_user'));
        var g_user_id = JSON.parse(g_user).id;
        var result = { g_user_id: g_user_id };

        $.ajax({
            url: create_url,
            type: 'POST',
            cache: false,
            headers: {
                'Authorization': "Bearer " + g_token
            },
            data: { '_token': token, 'result': result },
            success: function (data) {
                if (data.status == true) {
                    alert('SUCCESS!');
                    location.reload();
                }
                else
                    alert('ERROR!');
            }
        })
    }
    else
        alert('Please, login');
};

