<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Reset</title>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&display=swap');
            * {
                font-family: 'Open Sans', sans-serif;
            }

            :root {
                --green: #46ceac;
                --green_h: #35ba9b;
                --green_l: #61ddbc;
            }

            .example {
                padding-bottom: calc(33.33% - 30px);
                background: var(--green);
            }
        </style>
    </head>

    <body>
        <div class="container">
            <header>
                <h1>Lorem Ipsum has been the industry's standard</h1>
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                <a href="" title="">Lorem Ipsum has</a>
            </header>

            <img alt="" title="" src="https://www.aprendizdeviajante.com/wp-content/uploads/2016/02/pordosolsiestakey.jpg">
            <div class="embed-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Jvy97TlG1l0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="flex">
                <div class="flex_3 rounded example">Rounded</div>
                <div class="flex_3 radius example">Radius</div>
                <div class="flex_3 transition example h">Transition</div>
            </div>
        </div>

    </body>
</html>
