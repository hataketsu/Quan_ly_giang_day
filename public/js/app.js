$(document).ready(function () {

    $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]'
    });

    reset_comment();


    //make image square
    $('.square').height($('.square').width());
    num = $('#menu_tab').offset().top;

    $(window).bind('scroll', function() {
        if ($(window).scrollTop() > num) {
            $('#menu_tab').addClass('fixed');
            $('#menu_holder').removeClass('hidden');
        }
        else {
            $('#menu_holder').addClass('hidden');
            $('#menu_tab').removeClass('fixed');
        }
    });
});


function open_new_spa() {
    $.get('/spas/create', function (html_content) {
        _modal = $("#new_spa_modal");
        _modal.html(html_content);
        _modal.modal('show');
    });
}

function reset_comment() {
    $('.comment_form').on('submit', function (e) {
        e.preventDefault();
        cm_box = $(this).parent().prev();
        input_box = $(this).find('#comment_input');
        $.post('/comments', $(this).serialize(), function (data) {
            cm_box.parent().replaceWith(data);
            input_box.val('');
        });
    });
}

function confirm_delete_share(id) {
    bootbox.confirm("Xóa bài chia sẻ này?", function (result) {
        if (result)
            $.get('/shares/' + id + '/delete/', function (res) {
                if (res == "deleted")
                    $("#share_" + id).remove();
            });
    })
}


function follow(friend_id) {
    $.get('/profile/follow/' + friend_id, function (data) {
        $(".profile_box_" + friend_id).replaceWith(data);
    });
}

function unfollow(friend_id) {
    $.get('/profile/unfollow/' + friend_id, function (data) {
        $(".profile_box_" + friend_id).replaceWith(data);
    });
}

function like(share_id) {
    $.get('/shares/' + share_id + '/like', function (data) {
        $("#share_" + share_id).replaceWith(data);
    });
}

function unlike(share_id) {
    $.get('/shares/' + share_id + '/unlike', function (data) {
        $("#share_" + share_id).replaceWith(data);
    });
}


$("#submit_vote").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/shares/save",
        data: new FormData($("#vote_form")[0]), // serializes the form's elements.
        statusCode: {
            422: function (data) {
                $("#errors_block").text("Hãy nhập nội dung đánh giá");
            }
        },
        success: function (data) {

            $("#vote_box").after(data);
            $("#vote_box").hide();
        }, cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});

current_news = 6;
function load_more_news() {
    current_news += 6;
    $.get('/home/load_more_news/' + current_news, function (data) {
        $("#news_section").replaceWith(data);
    });
}

current_hots = 6;
function load_more_hots() {
    current_hots += 6;
    $.get('/load_more_hots/' + current_hots, function (data) {
        $("#hots_section").replaceWith(data);
    });
}


function save_spa(spa_id) {
    $.get('/spas/' + spa_id + '/add_to_saved_spas', function (data) {
        $("._spa_" + spa_id).replaceWith(data);
    });
}

function edit_spa(id) {
    $.get('/spas/'+id+'/edit', function (res) {
        d = $("#edit_spa_modal");
        d.html(res);
        d.modal('show');
    });
}

function edit_comment(share_id, comment_id, comment_content) {
    var txt = prompt('Chỉnh sửa bình luận', comment_content);
    if (txt != null && txt != '') {
        $.post('/_api/update_comment/' + comment_id, {content: txt, _token: _token}).done(function (data) {
            $("#share_" + share_id).replaceWith(data);
        });
    }
}
function delete_comment(share_id, comment_id) {
    if (confirm('Xóa bình luận?')) {
        $.get('/_api/delete_comment/' + comment_id).done(function (data) {
            $("#share_" + share_id).replaceWith(data);
        });
    }
}


function delete_notifications() {
    if (confirm('Xóa tất cả thông báo?')) {
        $.get('/_api/delete_notifications').done(function (data) {
            if (data == 'deleted')
                location.reload();
            else
                alert('Lỗi khi xóa thông báo');
        });
    }
}