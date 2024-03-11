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
grid-template-columns: repeat(5, 1fr);
grid-template-rows: repeat(5, 1fr);
grid-column-gap: 0px;
grid-row-gap: 0px;
}

.div1 { grid-area: 2 / 2 / 3 / 3; }
.div2 { grid-area: 4 / 2 / 5 / 3; }
.div3 { grid-area: 2 / 4 / 3 / 5; }
.div4 { grid-area: 4 / 4 / 5 / 5; }
.div5 { grid-area: 5 / 4 / 6 / 5; }
.div6 { grid-area: 5 / 5 / 6 / 6; }
.div7 { grid-area: 2 / 3 / 3 / 4; }
.div8 { grid-area: 4 / 3 / 5 / 4; }
    </style>

</head>
<body>




    <div class="parent">
        <div class="div1">1 </div>
        <div class="div2">2 </div>
        <div class="div3">3 </div>
        <div class="div4">4 </div>
        <div class="div5">5 </div>
        <div class="div6">6 </div>
        <div class="div7">7 </div>
        <div class="div8">8 </div>
        </div>
</body>
</html>
