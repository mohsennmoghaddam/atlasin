@php
    $fontR = public_path('font/BRoya.ttf');
    $fontB = public_path('font/BRoyaBd.ttf');
@endphp
    <!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'BRoya';
            src: url('{{ $fontR }}') format('truetype');
            font-weight: normal;
        }
        @font-face {
            font-family: 'BRoya';
            src: url('{{ $fontB }}') format('truetype');
            font-weight: bold;
        }
        body {
            font-family: 'BRoya';
            direction: rtl;
            background: #111;
            color: #fff;
            margin: 0;
            padding: 70px;
        }
        .certificate {
            border: 6px solid #666;
            border-radius: 20px;
            padding: 60px 50px;
            position: relative;
            min-height: 85vh;
            text-align: center;
        }
        .logo-right, .logo-left {
            position: absolute;
            top: 40px;
            width: 120px;
        }
        .logo-right { right: 40px; }
        .logo-left  { left: 40px; }

        h1 { font-size: 28px; margin-top: 100px; }
        h2 { font-size: 22px; font-weight: bold; margin: 30px 0; }
        p  { font-size: 18px; line-height: 2; }

        .meta {
            margin-top: 30px;
            font-size: 17px;
            color: #ccc;
        }

        .signatures {
            position: absolute;
            bottom: 80px;
            right: 60px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 40px;
        }
        .signatures img {
            width: 120px;
            opacity: 0.9;
        }
        .signature img {
            transform: rotate(-3deg);
        }
        .footer {
            position: absolute;
            bottom: 40px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 16px;
            color: #bbb;
        }
    </style>
</head>
<body>
<div class="certificate">
    <img src="{{ $training->logoRightUrl }}" class="logo-right">
    <img src="{{ $training->logoLeftUrl }}" class="logo-left">

    <h1>بسمه‌تعالی</h1>
    <h2>گواهینامه حضور در دوره آموزشی</h2>
    <p>بدین‌وسیله گواهی می‌شود که</p>
    <p><strong>{{ $participant_name }}</strong></p>
    <p>در دوره آموزشی <strong>{{ $course_title }}</strong> شرکت نموده است.</p>

    <div class="meta">
        تاریخ: {{ $date }} &nbsp; | &nbsp;
        مدت: {{ $duration }} ساعت &nbsp; | &nbsp;
        کد پیگیری: {{ $tracking }}
    </div>

    <div class="signatures">
        <div class="stamp">
            <img src="{{ $training->stampUrl }}" alt="مهر">
        </div>
        <div class="signature">
            <img src="{{ $training->signatureUrl }}" alt="امضا">
        </div>
    </div>

    <div class="footer">
        برگزارکننده: {{ $organizer }} <br>
        محل خدمت: {{ $workplace }}
    </div>
</div>
</body>
</html>
