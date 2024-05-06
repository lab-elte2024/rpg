<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/playerstat.css') }}" rel="stylesheet">

    <title>Karakter lap</title>
</head>

<body>



    @foreach ($player as $p)
        @php
            $lvlCap = $p->lvl * 100;

            //itt le kérne kérni a jelenlegi értékeket és ha nem egyezik akkor update
            $speed = $p->speed;
            $maxHP = $p->maxHP;
            $at = $p->attack;
            $def = $p->defense;


        @endphp
        <div class="parent">
            <div class="karakter">Karakter </div>
            <div class="fegyver">{{ $weapon->name }} </div>
            <div class="pancel">{{ $armor->name }} </div>
            <div class="tp">
                Tapasztalat pontjaid: {{ $p->points }}<br>
                Xp: {{ $p->xp_count }}/{{ $lvlCap }}
            </div>
            <div class="stat">

                <div class="stats">
                    <div class="hp_lbl">HP: </div>
                    <div class="hp_stat">{{ $p->hp }}</div>
                    <div class="hp_btn">
                        @if ($p->points > 0)
                            <button>+</button>
                            <button>-</button>
                        @endif


                    </div>

                    <div class="attack_lbl">Támadás</div>
                    <div class="attack_stat">{{ $p->attack }} </div>
                    <div class="attack_btn">
                        @if ($p->points > 0)
                            <button>+</button>
                            <button>-</button>
                        @endif
                    </div>
                    <div class="defense_lbl">Védelem:</div>
                    <div class="defense_stat">{{ $p->defense }}</div>
                    <div class="defense_btn">
                        @if ($p->points > 0)
                            <button>+</button>
                            <button>-</button>
                        @endif
                    </div>
                    <div class="speed_lbl">Gyorsaság</div>
                    <div class="speed_stat">{{ $p->speed }}</div>
                    <div class="speed_btn">
                        @if ($p->points > 0)
                            <button>+</button>
                            <button>-</button>
                        @endif
                    </div>
                    <button onclick="update()">
                        Mentés
                    </button>
                </div>
            </div>

        </div>
    @endforeach



    <script>
        /*

        add: itt kezeli a hozzáadott extra pontot
        update: végrehalytja az updatet


        */


        function add(){

        }

        function update(){

        }
    </script>

</body>

</html>
