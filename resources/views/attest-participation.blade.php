<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badge A6</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .badge {
            width: 297mm;
            /* A6 width */
            height: 210mm;
            /* A6 height */
            text-align: center;
            position: relative;
        }

        .badge-content {
            position: absolute;
        }

        /* You can style the badge content further */
        .badge-content h1 {
            font-size: 24px;
            margin: 0;
        }

        .badge-content p {
            font-size: 16px;
            margin: 0;
        }

        strong {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="badge">

        <img src="{{asset('storage/'.$evt->att_pres)}}" alt="" style="top:0;left:0;width: 100%;position: absolute;">
        <div style="height:80mm"></div>

        <div class="badge-content" style="width: 100%;">
            <div class="badge-content" style="width: 100%;color:{{$evt->code_couleur ? $evt->code_couleur : '#000000' }}">
            @php
                $text = $evt->text_att_pres;
                $text = str_replace('TITRE:', $evt->titre, $text);
                $text = str_replace('AUTEURS:', $evt->auteur, $text);
                if (!empty($evt->moderateurs)) {
                    $text = str_replace('Moderateurs:', 'Moderateurs: ' . $evt->moderateurs, $text);
                } else {
                    $text = str_replace('Moderateurs:', '', $text);
                }
            @endphp
            {!! $text !!}
        </div>
          
           
           


        </div>


    </div>
</body>

</html>
