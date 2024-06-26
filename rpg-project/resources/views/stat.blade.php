<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/playerstat.css') }}" rel="stylesheet">



    <title>Karakter lap</title>
</head>

<body>



    @foreach ($player as $p)
        @php
            $lvlCap = $p->lvl * 100;
            $speed = $p->speed;
            $maxHP = $p->maxHP;
            $at = $p->attack;
            $def = $p->defense;
            $tp = $p->points;

        @endphp
        <a href = "/village">Vissza</a>

        <div class="parent">
            <div class="karakter"><img src="{{ asset('images/classes/' . $p->classID . '.png') }}"alt="kep"></div>
            <div class="fegyver"><img
                    src="{{ asset('images/weapons/' . $p->classID . '/' . $weapon->pictureID . '.png') }}">
            </div>
            <div class="pancel"><img
                    src="{{ asset('images/armors/' . $p->classID . '/' . $armor->pictureID . '.png') }}"></div>
            <div class="tp">
                <div id="tp" data-points="{{ $p->points }}">Tapasztalat pontjaid: {{ $p->points }}</div>

                Xp: {{ $p->xp_count }}/{{ $lvlCap }}
            </div>
            <div class="stat">

                <div class="stats">
                    <div class="hp_lbl">HP: </div>

                    <div id="hp" data-hp="{{ $maxHP }}" class="hp_stat">HP: {{ $maxHP }}</div>
                    <div class="hp_btn">
                        @if ($p->points > 0)
                            <button onclick="add(3,'+')">+</button>
                            <button onclick="add(3,'-')">-</button>
                        @endif


                    </div>

                    <div class="attack_lbl">Támadás</div>
                    <div class="attack_stat" id="at">{{ $at }} </div>
                    <div class="attack_btn">
                        @if ($p->points > 0)
                            <button onclick="add(1,'+')">+</button>
                            <button onclick="add(1,'-')">-</button>
                        @endif
                    </div>
                    <div class="defense_lbl">Védelem:</div>
                    <div class="defense_stat" id="def">{{ $def }}</div>
                    <div class="defense_btn">
                        @if ($p->points > 0)
                            <button onclick="add(2,'+')">+</button>
                            <button onclick="add(2,'-')">-</button>
                        @endif
                    </div>
                    <div class="speed_lbl">Gyorsaság</div>
                    <div class="speed_stat" id="spd">{{ $speed }}</div>
                    <div class="speed_btn">
                        @if ($p->points > 0)
                            <button onclick="add(4,'+')">+</button>
                            <button onclick="add(4,'-')">-</button>
                        @endif
                    </div>
                    <form action="/update" method="POST">
                        @csrf
                        <input type="hidden" name="playerID" value="{{ $p->ID }}">
                        <input type="hidden" name="attack" id="attack" value="{{ $at }}">
                        <input type="hidden" name="defense" id="defense" value="{{ $def }}">
                        <input type="hidden" name="speed" id="speed" value="{{ $speed }}">
                        <input type="hidden" name="tpoint" id="tpoint" value="{{ $tp }}">
                        <input type="hidden" name="maxHP" id="maxHP" value="{{ $maxHP }}">

                        <input type="submit" id = "btn" value="Mentés">

                    </form>

                </div>
            </div>

        </div>
    @endforeach



    <script>
        var at = {{ $at }};
        var def = {{ $def }};
        var maxHP = {{ $maxHP }};
        var spd = {{ $speed }};
        var tp = {{ $tp }};

        function add(stat, type) {

            if (type == '+') {

                if (tp > 0) {
                    tp--;
                    document.getElementById('tp').innerHTML = "Tapasztalat pontjaid: " + tp;
                    switch (stat) {
                        case 1:
                            at++;
                            document.getElementById('at').innerHTML = at;
                            break;
                        case 2:
                            def++;
                            document.getElementById('def').innerHTML = def;
                            break;
                        case 3:
                            maxHP++;
                            document.getElementById('hp').innerHTML = maxHP;
                            break;

                        default:
                            spd++;
                            document.getElementById('spd').innerHTML = spd;
                            break;
                    }
                }
            } else {
                if (tp < {{ $tp }}) {
                    tp++;
                    document.getElementById('tp').innerHTML = "Tapasztalat pontjaid: " + tp;
                    switch (stat) {
                        case 1:
                            at--;
                            document.getElementById('at').innerHTML = at;
                            break;
                        case 2:
                            def--;
                            document.getElementById('def').innerHTML = def;
                            break;
                        case 3:
                            maxHP--;
                            document.getElementById('hp').innerHTML = maxHP;
                            break;

                        default:
                            spd--;
                            document.getElementById('spd').innerHTML = spd;
                            break;

                    }

                }
            }

            document.getElementById('maxHP').value = maxHP;
            document.getElementById('attack').value = at;
            document.getElementById('defense').value = def;
            document.getElementById('speed').value = spd;
            document.getElementById('tpoint').value = tp;


        }
    </script>
</body>

</html>
