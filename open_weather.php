<?php
    $apiKey = "b5c72505ea0e9264b11e9c899028e342";
    $city   = "Jakarta";
    $lat    = "-6.194449";
    $lon    = "106.822920";

    // $url = "https://api.openweathermap.org/data/2.5/forecast?lat={$lat}&lon={$lon}&units=metric&appid={$apiKey}";
    $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&units=metric&appid={$apiKey}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    echo 'Nama : Erwin Santoso';
    echo '<br/><br/><br/>';

    if ($data['cod'] == 200) {
        echo "Ramalan Cuaca untuk Jakarta (5 Hari):<br/>";
        
        $forecast = [];
        foreach ($data['list'] as $entry) {
            $date = substr($entry['dt_txt'], 0, 10);

            if (!isset($forecast[$date])) {
                $forecast[$date]['main']    = $entry['main'];
                $forecast[$date]['weather'] = $entry['weather'][0];
            }
        }

        $no = 1;
        foreach ($forecast as $date => $val) {
            $dt = date_create($date);
            $dy = date_format($dt, 'D, d M Y');
            $temp = $val['main']['temp'];
            $weat = $val['weather']['main'] . ' - ' . $val['weather']['description'];

            echo "{$no}. {$dy} : {$temp} °C, {$weat}<br/>";
            $no++;
        }
    } else {
        echo "Gagal mengambil data: " . $data['message'];
    }
?>