<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/logic.css') }}" rel="stylesheet">
    <title>q&a</title>
</head>

<body>
    @php
        $missionId = $id;

        $questions = [
            1 => 'Eltereled az őr figyelmét, hogyan hajtod végre?',
            2 => 'Ki vagy te?',
            3 => 'Hova rejtözől?',
            4 => 'Merre próbálsz beosonni?',
        ];

        $answers = [
            1 => ['Elhajítasz egy követ', 'Fütyszóval', 'Hangutánzással', 'Nem csinálsz semmit'],
            2 => ['A pizzafutár', 'Barát', 'Egy közületek, nem ismersz meg?', 'Nem látsz a szemedtől?'],
            3 => ['Üres hordóba', 'Ládányi hal közé', 'Kardokkal teli hordó', 'Egy zsákba'],
            4 => ['Ablakon', 'Kis ajtón', 'Az őr mellett', 'Haza mész inkább'],
        ];

        $currentAnswers = [];
        switch ($missionId) {
            case 2:
                $question = $questions[1];
                $currentAnswers = $answers[1];
                break;
            case 4:
                $question = $questions[2];
                $currentAnswers = $answers[2];
                break;
            case 7:
                $question = $questions[3];
                $currentAnswers = $answers[3];
                break;
            default:
                echo 'Ismeretlen mission id.';
                break;
        }
    @endphp


    <div class="question-container">
        <div class="question">{{ $question }}</div>

        <form id="answer-form" method="POST" action="{{ route('checkAnswer') }}">
            @csrf
            <input type="hidden" name="answer" id="answer-input">
            <button type="button" class="answer-button" onclick="submitAnswer('{{ $currentAnswers[0] }}')">{{ htmlspecialchars($currentAnswers[0]) }}</button>
            <button type="button" class="answer-button" onclick="submitAnswer('{{ $currentAnswers[1] }}')">{{ htmlspecialchars($currentAnswers[1]) }}</button>
            <button type="button" class="answer-button" onclick="submitAnswer('{{ $currentAnswers[2] }}')">{{ htmlspecialchars($currentAnswers[2]) }}</button>
            <button type="button" class="answer-button" onclick="submitAnswer('{{ $currentAnswers[3] }}')">{{ htmlspecialchars($currentAnswers[3]) }}</button>
        </form>
    </div>
</body>

<script>
    function submitAnswer(answer) {
        document.getElementById('answer-input').value = answer;
        document.getElementById('answer-form').submit();
    }
</script>

</html>
