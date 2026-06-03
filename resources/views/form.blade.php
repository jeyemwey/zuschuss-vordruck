<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zuschussliste erstellen</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            max-width: 540px;
            margin: 3em auto;
            padding: 0 1em;
            color: #222;
            line-height: 1.5;
        }

        h1 {
            font-size: 1.5em;
            margin-bottom: 1em;
        }

        label {
            display: block;
            margin-top: 1em;
            font-weight: bold;
        }

        input[type=text],
        input[type=number],
        input[type=date] {
            display: block;
            width: 100%;
            padding: 0.5em;
            margin-top: 0.25em;
            border: 1px solid #aaa;
            border-radius: 3px;
            font-size: 1em;
            box-sizing: border-box;
        }

        .actions {
            margin-top: 2em;
            display: flex;
            gap: 0.5em;
        }

        button {
            padding: 0.6em 1.2em;
            font-size: 1em;
            border: 1px solid #444;
            background: #f4f4f4;
            border-radius: 3px;
            cursor: pointer;
        }

        button.primary {
            background: #444;
            color: #fff;
        }

        button:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>
    <h1>Zuschussliste erstellen</h1>

    <form id="vordruck-form" action="/vordruck" method="get" target="_blank">
        <label>
            Name
            <input type="text" name="name" required>
        </label>

        <label>
            Ort
            <input type="text" name="location" required>
        </label>

        <label>
            Anzahl Teilnehmer
            <input type="number" name="num_attendants" min="15" value="15" step="15" required>
        </label>

        <label>
            Beginn
            <input type="date" id="start-input" required>
        </label>

        <label>
            Ende
            <input type="date" id="end-input" required>
        </label>

        <input type="hidden" name="start">
        <input type="hidden" name="end">

        <div class="actions">
            <button type="submit" class="primary">Anzeigen</button>
            <button type="submit" name="print" value="1">Als PDF herunterladen</button>
        </div>
    </form>

    <script>
        const form = document.getElementById('vordruck-form');
        form.addEventListener('submit', function () {
            const startEl = document.getElementById('start-input');
            const endEl = document.getElementById('end-input');
            form.elements['start'].value = new Date(startEl.value).getTime();
            form.elements['end'].value = new Date(endEl.value).getTime();
        });
    </script>
</body>
</html>
