<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badge A6</title>
   <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center; /* Center content horizontally */
        }
        .badge {
            width: 105mm; /* A6 width */
            height: 148mm; /* A6 height */
            border: 0;
            text-align: center;
            position: relative;
            margin: 0 auto; /* Center the badge on the page horizontally */
        }
        .badge-content {
            position: absolute;
            top: 35%;
            left: 25%;
            transform: translate(-50%, -50%);
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
    </style>
</head>
<body>
    <div class="badge">
        <H1 style="z-index: 2;position: absolute;color:white;font-size: 16px;top: 20px;right: 40px;">Société Algérienne de Psychaitrie</H1>
        <p style="position: absolute; z-index: 2; color:white;top:80px;right: 40px;font-size: 11px;font-weight: 800; text-align: left;">Le 30 Novembre et le 01 Décembre 2023 <br> à l'hôtel El Aurassi, Alger</p>
        <p style="position: absolute;z-index: 2;color:white;top: 90px;left: 20px;text-align: left;font-size: 19px;font-weight: 900;">24 èmes <br> Journées Nationales <br> de Psychaitrie</p>
    
     
          
             <div class="badge-content" style="z-index:3;">
            @php
            $answers = json_decode($evt->answers);
            $prenom = $answers->Prénom ?? $answers->prénom ?? $answers->Prenom ?? $answers->prenom ?? '';
        @endphp
        
        <h1>{{ $answers->nom }}<br>{{ $prenom }}</h1>
        <p></p>
            <!-- Add additional information as needed -->
           
        </div>
        <div style="position: absolute;top: 35%; right: 0;transform: translate(-50%, -50%);">
           
             <img src="data:image/png;base64, {!! base64_encode($link) !!} ">
             
            
        </div>
        <div style="position: absolute; bottom: 20px;width: 100%;">
            <H2 style="color: white;font-size: xxx-large;margin: 5px;"></H2>
        </div>
             

    </div>
</body>
</html>