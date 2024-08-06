<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Números Romanos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #e9ecef;
            font-family: "Roboto", sans-serif;
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: 500;
            color: #343a40;
            background-color: #f8f9fa;
            border-bottom: 2px solid #007bff;
            border-radius: 8px 8px 0 0;
            padding: 10px 15px;
            text-align: center;
        }
        .card-header h4 {
            margin: 0;
            font-size: 1.25rem;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #343a40;
        }
        .result h4 {
            margin: 0;
            font-size: 1.25rem;
        }
        .result p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h4>Conversor de Números Romanos</h4>
        </div>
        <form id="converterForm" action="{{ route('convert') }}" method="POST" onsubmit="return validateInput()">
            @csrf
            <div class="form-group">
                <label class="mt-3" for="direction">Escolha a direção da conversão:</label>
                <select name="direction" id="direction" class="form-control" required>
                    <option value="toRoman">Arábico para Romano</option>
                    <option value="toArabic">Romano para Arábico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="number">Insira um número:</label>
                <input type="text" id="number" name="number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Converter</button>
        </form>
        @if(isset($output))
            <div class="result text-center">
                <h4>Resultado:</h4>
                <p>{{ $input }} = {{ $output }}</p>
            </div>
        @endif
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateInput() {
            const direction = document.getElementById('direction').value;
            const number = document.getElementById('number').value.trim();
            const romanRegex = /^[IVXLCDM]+$/i;
            const arabicRegex = /^\d+$/;

            if (direction === 'toRoman' && !arabicRegex.test(number)) {
                alert('Por favor, insira um número inteiro positivo para conversão de Arábico para Romano.');
                return false;
            }

            if (direction === 'toArabic' && !romanRegex.test(number)) {
                alert('Por favor, insira um número romano válido para conversão de Romano para Arábico.');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
