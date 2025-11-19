<!DOCTYPE html>
<html>
<head>
    <title>Lowongan Kerja Baru: {{ $karier->posisi }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f4f4f4; padding: 20px; text-align: center; }
        .content { margin: 20px 0; }
        .footer { margin-top: 30px; font-size: 0.9em; color: #666; text-align: center; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #2B1A6C;
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin: 0;">Lowongan Kerja Baru</h2>
            <p style="margin: 5px 0 0; font-size: 1.2em;">{{ $karier->posisi }}</p>
            <p style="margin: 5px 0 0; color: #666;">{{ $karier->nama_kota }}</p>
        </div>
        
        <div class="content">
            <p>Halo,</p>
            <p>Berikut adalah detail lowongan kerja yang baru saja diposting:</p>
            
            <h3>Posisi: {{ $karier->posisi }}</h3>
            <p><strong>Lokasi:</strong> {{ $karier->nama_kota }}</p>
            
            <h4>Tanggung Jawab:</h4>
            {!! $karier->responsibilities !!}
            
            <h4>Kualifikasi:</h4>
            {!! $karier->qualifications !!}
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ config('app.url') }}/karier/{{ $karier->slug }}" class="button">Lihat Detail Lowongan</a>
            </div>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
