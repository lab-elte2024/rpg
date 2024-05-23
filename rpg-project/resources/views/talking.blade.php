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

        .div1 {
            grid-area: 5 / 2 / 6 / 3;
        }

        .div2 {
            grid-area: 5 / 4 / 6 / 5;
        }

        .div3 {
            grid-area: 3 / 3 / 4 / 4;
        }

        .div4 {
            grid-area: 2 / 3 / 3 / 4;
        }
    </style>

</head>

<body>
    <div class="parent">
        <div class="div1"> </div>
        <div class="div2"> </div>
        <div class="div3"> </div>
        <div class="div4"> </div>
    </div>
</body>

</html>
