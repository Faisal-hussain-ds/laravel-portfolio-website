<html>
    <head>
        <style type='text/css'>
            body, html {
                margin: 0;
                padding: 0;
            }
            body {
                color: black;

                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
                background-color:#f6f6f6;
            }
            .container {
                border: 20px solid tan;
                width: 750px;
                height: 563px;

                vertical-align: middle;
            }
            .logo {
                color: tan;
            }

            .marquee {
                color: tan;
                font-size: 48px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;
            }
            .reason {
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWXQ1S0JX3vUu4QTdzK-OjCaA-Gr-OxTEayw&usqp=CAU"></img>
            </div>

            <div class="marquee">
                Certificate of Completion
            </div>

            <div class="assignment">
                This certificate is presented to
            </div>

            <div class="person">
           
               {{ $name ?? $data2['name']??''}}
            </div>

            <div class="reason">
                for completing course of {{ $course ?? $data2['course']??''}}<br/>
                From <span class="assignment">{{ $start_date ?? $data2['start_date']??''}} </span> To  <span class="assignment">{{ $end_date ?? $data2['end_date']??''}} </span><br/>
                with score of <b> {{ $score ?? $data2['score']??''}}/100</b>
            </div>
        </div>
    </body>
</html>