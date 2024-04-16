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

            /*
                function sortLink(type) {
                    // Létrehozunk egy űrlapot
                    var form = document.createElement('form');
                    form.method = 'POST'; // Állítsuk be a POST módot

                    // A cselekvés URL-je a /battle vagy /menu lesz, attól függően, hogy a type értéke 0 vagy sem
                    var action = (type == 0) ? '/battle' : '/menu';
                    form.action = action;

                    // Adjunk hozzá egy rejtett inputot a type változó értékével
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'type';
                    input.value = type;
                    form.appendChild(input);

                    // Adjuk hozzá az űrlapot a dokumentumhoz és küldjük el
                    document.body.appendChild(form);
                    form.submit();
                }



            */
        </script>



</body>
</html>
