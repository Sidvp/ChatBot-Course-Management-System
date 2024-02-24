<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon_prerna.jpg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon_prerna.jpg') }}">
<link rel="stylesheet" href="{{ asset('web-widget\src\assets\css\chat.css') }}">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
    <title>CARES-GOA</title>
</head>
<body>
    <div>
    <script>
        var botmanWidget = {
            // frameEndpoint: '/iFrameUrl'   
            aboutText:'Powered by CARES-Goa', 
            introMessage:'CARES-Goa Welcomes you 😊',
            aboutLink:'https://cares.goa.gov.in/',
            title: 'CARES-Goa',
            mainColor: '#6C4AB6',
            headerTextColor: '#fff',
            // bubbleBackground:'#c02026',
            bubbleBackground:'#402591',
            // desktopHeight: '450px',
            desktopWidth: '370px',
            // introMessage: 'Hi, Welcome...',
            bubbleAvatarUrl:'https://media.istockphoto.com/id/1191411962/vector/cute-robot.jpg?s=612x612&w=0&k=20&c=KelCNJMam1XGwVM0HclQtHIHZxByJZOtnRjkBbHrAKw='
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    {{-- <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> --}}
    </div>
</body>

</html>