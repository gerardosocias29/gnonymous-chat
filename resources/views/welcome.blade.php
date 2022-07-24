<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gnonymous Chat</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://twemoji.maxcdn.com/v/14.0.2/twemoji.min.js" integrity="sha384-32KMvAMS4DUBcQtHG6fzADguo/tpN1Nh6BAJa2QqZc6/i0K+YPQE+bWiqBRAWuFs" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/notify.min.js')}}"></script>
        <style>
            body {
                font-family: 'Space Grotesk', sans-serif;
                background: #f4f4f4;
            }
            .custom-input {
                resize: none;
                border-radius: 18px;
                border: 2px solid #000;
                
            }
            .bg-error {
                background: #e23636;
                color: white;
                font-weight: 500;
            }
            input {
                padding-left: 15px !important;
            }
            textarea {
                padding-left: 15px !important;
                padding-top: 20px !important;
            }
            .big-title-recent {
                font-weight: 700;
                color: #333;
            }
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }
            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
            textarea:focus, 
            textarea.form-control:focus, 
            input.form-control:focus, 
            input.form-control:active, 
            input[type=text]:focus, 
            input[type=password]:focus, 
            input[type=email]:focus, 
            input[type=number]:focus, 
            [type=text].form-control:focus, 
            [type=password].form-control:focus, 
            [type=email].form-control:focus, 
            [type=tel].form-control:focus, 
            [contenteditable].form-control:focus {
                outline: none !important;
                border: none;
                border-radius: 18px;
                box-shadow: 5px 6px 0 2px rgb(0 0 0), 0 0 0 2px rgb(0 0 0) !important;
            }
            img.emoji {
            height: 1em;
            width: 1em;
            margin: 0 .05em 0 .1em;
            vertical-align: -0.1em;
            }
            .card-post {
                border-radius: 24px;
            }
        </style>
    </head>
    <body class="antialiased">
    <div class="container mt-5">
        <div class="row">
            <h3 class="fw-bold">Write Post</h3>
            <div class="col-12 col-md-7 col-md-7 mb-5">
                <form class="form" action="" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="text" name="username" class="form-control bg-transparent custom-input mb-4" placeholder="Enter your username" value="{{$username}}" maxlength="10" size="10" autocomplete="off">
                    <textarea name="post_content" class="form-control bg-transparent custom-input mb-4" cols="30" rows="10" placeholder="Share anonymously!"></textarea>
                    <div class="row mb-4">
                        <div class="col-5 col-md-3 col-md-3">
                            {!! $captcha !!}
                        </div>
                        <div class="col-5 col-md-3 col-md-3">
                            <input type="number" name="captcha" class="form-control bg-transparent custom-input mb-2" placeholder="Answer:" autocomplete="off">
                        </div>
                    </div>
                    <input type="submit" name="submit" class="form-control btn custom-input" style="background: #E9EFC0;">
                </form>
            </div>
            <div class="col-12 col-md-5 col-md-5 mb-5">
                <h2 class="display-4 big-title-recent m-0">Recent Posts</h2><br>
                <div class="list-post"></div>
            </div>
        </div>
    </div>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

        function error_close() {
        var x = document.getElementById("error-state");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }



        twemoji.parse(document.body);
        // var img = document.querySelector('img');
        // // note the div is preserved
        // img.parentNode === div; // true
        // img.src;        // https://twemoji.maxcdn.com/v/latest/72x72/2764.png
        // img.alt;        // \u2764\uFE0F
        // img.className;  // emoji
        // img.draggable;  // false
    </script>
    </body>
</html>
