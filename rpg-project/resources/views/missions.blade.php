<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mission.css') }}" rel="stylesheet">
    <title>Küldetések</title>
</head>
<body>
    <div class="parent">
        <div class="div1">jelenlegi küldetésed</div>
        <div class="div2">teljesített küldetéseid</div>
        <div class="div4"><a href="/village">exit</a></div>
        </div>

        <ul>
            @foreach ($missions as $mission)
            <li onclick="sortLink({{$mission->type}})">{{ $mission->name }}</li>
        @endforeach
        </ul>

        <script>
            function sortLink(type){
                if(type == 0){
                    window.location.href = "/battle";
                }
                else{
                    window.location.href = "/menu";
                }
            }
        </script>



</body>
</html>
