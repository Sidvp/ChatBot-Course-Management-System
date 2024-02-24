<!doctype html>
<html>
<head>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon_prerna.jpg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon_prerna.jpg') }}">

    <title>CARES-GOA</title>
    <meta charset="UTF-8">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.min.css') }}">
</head>
<body>

</body>

<script>
    // require(base_path('routes/botman.php'));
    var botmanWidget = {
        // frameEndpoint: '/botman/chat',
        // chatServer: '/botman',

        // frameEndpoint: 'http://127.0.0.1:8000',
        // chatServer : 'http://127.0.0.1:8000/botman',

    }
</script>
{{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}
{{-- <script src="{{ asset('web-widget\src\widget\widget.tsx') }}"></script> --}}
<script src="{{ asset('js\widget.js') }}"></script>
{{-- <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> --}}

<script>
setInterval(function () {
    var msg = document.querySelector('ol.chat li:last-child');
    if(msg) {
        if(msg.className  === 'visitor') {

            var node_li = document.createElement('li');
            node_li.className = 'indicator';

            var node_div = document.createElement('div');
            node_div.className = 'loading-dots';

            var node_span1 = document.createElement('span');
            var node_span2 = document.createElement('span');
            var node_span3 = document.createElement('span');
            node_span1.className = 'dot';
            node_span2.className = 'dot';
            node_span3.className = 'dot';

            node_div.appendChild(node_span1);
            node_div.appendChild(node_span2);
            node_div.appendChild(node_span3);
            node_li.appendChild(node_div);

            document.querySelector('ol.chat').appendChild(node_li);

        } else {
            var isbot = document.querySelector('ol.chat li:nth-last-child(2)');
            if(msg.className  === 'indicator' && isbot.className === 'chatbot') {
                document.querySelector('ol.chat li .loading-dots').parentNode.remove();
            }

        }

    }
}, 10);

// https://github.com/botman/web-widget/issues/20
</script>
<script>
    // when button is clicked, change class to visitor
    $( ".btn" ).click(function(){
        $( "ol.chat li.chatbot:last-child" ).has( "div div.btn" ).removeClass("chatbot").addClass("visitor");
      });

        // check if last message is by visitor. If yes, show indicator
        if($( "ol.chat li:last-child" ).attr('class') ==='visitor')
        {
            $( "ol.chat" ).append('<li class="indicator"><div class="loading-dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div></li>');
        }

        else
        {
            // if last message is by bot and indicator is shown, then remove indicator from conversation
            if($( "ol.chat li:last-child" ).attr('class') ==='indicator' && $("ol.chat li:nth-last-child(2)").attr('class') ==='chatbot'){
                $("ol.chat li .loading-dots").parent().remove();
              }

        }
    }, 10); 
</script>
</html>