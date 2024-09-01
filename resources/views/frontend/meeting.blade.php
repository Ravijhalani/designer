<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src='{{asset('openvidu-webcomponent-2.30.0.js')}}'></script>
        <link rel="stylesheet" href="{{asset('openvidu-webcomponent-2.30.0.css')}}">
        <style>
            body {
                overflow-y: scroll;
            }
        </style>
        <script>

            async function joinSession() {
                var participantName = document.getElementById('user').value;
                try {
                    let webToken = "{!!$booking['web_token']!!}";
                    let screenToken = "{!!$booking['screen_token']!!}";
                   console.log({webcam: webToken,screen:screenToken});


                    var webComponent = document.querySelector('openvidu-webcomponent');
                    webComponent.style.display = 'block';
                    webComponent.participantName = participantName;
                     webComponent.tokens = {webcam: webToken,screen:screenToken};
                    webComponent.prejoin = true;
                    // Hide the branding logo
                     webComponent.toolbarLogo = "{{asset('youAsk.png')}}";
                     webComponent.toolbarDisplayLogo = true;
                } catch (error) {
                    console.error("Error joining session:", error);
                }
            }
        </script>
    </head>
    <body>
        <div id="main" style="text-align: center;">
            <h1>Join a video session</h1>
            <form onsubmit="joinSession(); return false" style="padding: 80px; margin: auto">
                {{-- <p>
                    <label>Session:</label>
                    <input type="text" id="sessionName" value="{{rand(10000000,10000000000)}}" >
                </p>
                 --}}
                 <p>
                    <label>User:</label>
                    <input type="text" id="user" value="User1" >
                </p>
                <p>
                    <input type="submit" value="JOIN">
                </p>
            </form>
        </div>

        <!-- OpenVidu Web Component -->
        <openvidu-webcomponent style="display: none; height:100%" toolbar-display-logo="true"></openvidu-webcomponent>
    </body>
</html>
