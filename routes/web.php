<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

setlocale(LC_TIME, 'de_DE.UTF8');
function dtformat(string $input): string {
    $d = new \Carbon\Carbon(intval($input) / 1000);
    $d->addHours(3);

    $allMonths = ["months-are-one-indexed", "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"];
    return str_replace("%", $allMonths[$d->month], $d->format("d. % Y"));
}

Route::get('/', function (Request $request) {
    $number_of_attendants = $request->get("num_attendants");

    $num_pages = ceil($number_of_attendants / 15);
    $num_rows = 15 * $num_pages;

    $settings = [
        "num_pages" => $num_pages,
        "num_rows" => $num_rows,

        "name" => $request->get("name"),
        "location" => $request->get("location"),
        "start" => dtformat($request->get("start")),
        "end" => dtformat($request->get("end")),
    ];

    if ($request->has("print")) {
        return Pdf::loadView('tabletemplate', $settings)
            ->setPaper('a4', 'landscape')
            ->stream();
//            ->download(
//                sprintf(
//                    'Zuschussliste-%s.pdf', 'WiLa Pfadis 2023'
//                )
//            );
    }

    return view("tabletemplate", $settings);
});
