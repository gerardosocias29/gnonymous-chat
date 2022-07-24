$(document).ready(function() {

    $('.form').submit(function( event ) {
        event.preventDefault();
        var object = {
            username: $('[name=username]').val(),
            post_content: $('[name=post_content]').val(),
            captcha: $('[name=captcha]').val(),
            _token: $('[name=_token]').val()
        }

        $.post("chat", object, function( data ) {
            if(data.status){
                window.location.reload();
            } else {
                notify(data.message, "error");
            }
        });

    });


    function getPosts(){
        $.get("posts", function( data ) {
            if(data.status){
                $('.list-post').empty();
                data.posts.forEach(data=>{
                    $('.list-post').append(`
                        <div class="p-5 bg-white card-post mb-3">
                            <h5 style="color:#B85C38;">${data.username}</h5>
                            <p>${data.post_content}</p>
                        </div>
                    `);
                })
                twemoji.parse(document.body);
            }
        });
    }

    function notify(message, type){
        $.notify(
            message, 
            { 
                position:"top center",
                className: type,
                autoHide: true,
                autoHideDelay: 3000,
            }
        );
    }

    getPosts();
});