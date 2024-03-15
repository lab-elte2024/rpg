<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
.parent {
display: grid;
grid-template-columns: repeat(7, 1fr);
grid-template-rows: repeat(4, 1fr);
grid-column-gap: 4px;
grid-row-gap: 4px;
}

.div1 { grid-area: 3 / 2 / 4 / 3; }
.div2 { grid-area: 2 / 3 / 3 / 4; }
.div3 { grid-area: 2 / 5 / 3 / 6; }
.div4 { grid-area: 3 / 6 / 4 / 7; }
.div5 { grid-area: 4 / 1 / 5 / 8; text-align: center; margin-top: 10%}


    </style>


</head>
<body>
    <div class="parent">
        <div class="div1"> blacksmith</div>
        <div class="div2"> tavern</div>
        <div class="div3"> quests</div>
        <div class="div4"> -random house-</div>
        <div class="div5"> player menu?</div>
        </div>
</body>
</html>
