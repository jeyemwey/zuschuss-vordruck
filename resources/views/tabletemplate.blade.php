<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Träwelling Export</title>
    <style>
        @page {
            margin: 4cm 1cm 1cm 1cm;
        }

        body {
            padding: 0;
            margin: 0;

            font-size: 12.8px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', 'Helvetica', 'Arial', sans-serif;
        }

        .export-container {
            width: 100%;
            margin: 0;
            /*color: #555;*/
        }

        .export-container .top {
            page-break-after: avoid;
        }

        .export-container table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .export-container table thead th {
            background: #CCC;
            border: 1px solid #222;
            font-weight: bold;
        }

        table#entry-table td {
            border: 1px solid #222;
            height: 2em;
            vertical-align: middle;
            text-align: center;
        }

        .export-container table td {
            padding: 5px;
            vertical-align: top;
        }

        .page-number:after {
            content: counter(page);
        }

        /*.footer {*/
        /*    font-size: 16px;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    margin: 0;*/
        /*}*/

        /*.footer-wrapper {*/
        /*    position: fixed;*/
        /*    bottom: -2em;*/
        /*    left: 0;*/
        /*    right: 0;*/
        /*    height: 2em;*/
        /*}*/

        .header-wrapper {
            position: fixed;
            top: -3cm;
            left: 0;
            right: 0;
        }

        .header-wrapper table {
            width: 100%;
        }

        .header-wrapper .page-number-wrapper {
            text-align: right;
        }

        .header-wrapper .logo {
            vertical-align: middle;
            text-align: center;
            width: 128px;
        }

        .header-wrapper .heading h1 {
            font-size: 2em;
            font-weight: bold;
            margin: 0;
        }

        .right {
            float: right;
        }
    </style>
</head>
<body>
{{--<div class="footer-wrapper">--}}
{{--    <div class="footer fixed-section">--}}
{{--        <div class="right">--}}
{{--            <span class="page-number">Seite </span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="header-wrapper">
    <table class="top">
        <tr>
            <td class="logo">
                <img src="./dpsg-kempen-seit-1946.png" style="width: 96px; height: 96px"/>
            </td>
            <td class="heading">
                <h1>Teilnahmeliste für Stammesaktionen</h1>
                <b>Name:</b> <?=$name?>, <b>Ort:</b> <?=$location?>, <b>Datum der Aktion:</b> <?=$start?> &ndash;  <?=$end?><br/>
                <b>T</b> = Teilnehmer*in; <b>L</b> = Leiter*in; <b>H</b> = Helfer*in
            </td>
            <td class="page-number-wrapper"><span class="page-number">Seite </span>/<?= $num_pages ?></td>
        </tr>
    </table>
</div>

<div class="export-container">

    <table id="entry-table">
        <thead>
        <tr>
            <th width="20px">Nr.</th>
            <th width="50px">T / L / H</th>
            <th width="170px">Name</th>
            <th width="170px">Vorname</th>
            <th width="200px">Stra&szlig;e, Hausnummer</th>
            <th width="130px">PLZ, Stadt</th>
            <th width="120px">Geburtsdatum</th>
            <th>Unterschrift</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 1;
                   $i < $num_rows + 1;
                   $i++): ?>
        <tr>
            <td><?= $i ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php endfor; ?>
        </tbody>
    </table>
</div>

</body>
</html>
