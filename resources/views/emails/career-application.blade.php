<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamaran Baru: {{ $data['application']['name'] ?? 'Pelamar' }} - {{ $data['karier']->posisi ?? 'Lowongan Kerja' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #28a745, #218838);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .content {
            padding: 30px;
        }
        
        .section-title {
            color: #28a745;
            font-size: 18px;
            font-weight: 600;
            margin: 25px 0 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e9ecef;
        }
        
        .detail-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .detail-item:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            color: #495057;
            font-weight: 500;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .detail-value {
            color: #212529;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.5;
        }
        
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
        }
        
        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        
        .status-badge {
            display: inline-block;
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            margin-top: 10px;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f5f7fa;">
    <div class="container">
        <div class="header">
            <h2>Lamaran Baru Diterima</h2>
            <div class="status-badge">Status: Baru</div>
        </div>
        
        <div class="content">
            <div class="detail-item">
                <div class="detail-label">Posisi yang Dilamar</div>
                <div class="detail-value" style="color: #28a745; font-weight: 500; font-size: 18px;">
                    {{ $data['karier']->posisi ?? 'Tidak ada data' }}
                    @if(!empty($data['karier']->nama_kota))
                        <span style="display: block; color: #6c757d; font-size: 14px; margin-top: 3px;">
                            <i class="fas fa-map-marker-alt" style="margin-right: 5px;"></i>
                            {{ $data['karier']->nama_kota }}
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="section-title">Informasi Pribadi</div>
            
            <div class="detail-item">
                <div class="detail-label">Nama Lengkap</div>
                <div class="detail-value">
                    <i class="fas fa-user" style="color: #28a745; margin-right: 8px; width: 20px; text-align: center;"></i>
                    {{ $data['application']['name'] ?? 'Tidak ada data' }}
                </div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Email</div>
                <div class="detail-value">
                    <i class="fas fa-envelope" style="color: #28a745; margin-right: 8px; width: 20px; text-align: center;"></i>
                    <a href="mailto:{{ $data['application']['email'] ?? '' }}" style="color: #28a745; text-decoration: none;">
                        {{ $data['application']['email'] ?? 'Tidak ada data' }}
                    </a>
                </div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Nomor Telepon</div>
                <div class="detail-value">
                    <i class="fas fa-phone" style="color: #28a745; margin-right: 8px; width: 20px; text-align: center;"></i>
                    {{ $data['application']['phone'] ?? 'Tidak ada data' }}
                </div>
            </div>
            
            <div class="section-title">Detail Lamaran</div>
            
            <div class="detail-item">
                <div class="detail-label">Lama Pengalaman</div>
                <div class="detail-value">
                    <i class="fas fa-briefcase" style="color: #28a745; margin-right: 8px; width: 20px; text-align: center;"></i>
                    {{ $data['application']['experience'] ?? 'Tidak ada data' }}
                </div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Pemberitahuan Kerja</div>
                <div class="detail-value">
                    <i class="far fa-clock" style="color: #28a745; margin-right: 8px; width: 20px; text-align: center;"></i>
                    {{ $data['application']['notice_period'] ?? 'Tidak ada data' }}
                </div>
            </div>
            
            @if(!empty($data['application']['vacancy_source']))
            <div class="detail-item">
                <div class="detail-label">Sumber Lowongan</div>
                <div class="detail-value">
                    <i class="fas fa-info-circle" style="color: #28a745; margin-right: 8px; width: 20px; text-align: center;"></i>
                    {{ $data['application']['vacancy_source'] }}
                </div>
            </div>
            @endif
            
            <div class="detail-item">
                <div class="detail-label">Motivasi Bergabung</div>
                <div class="detail-value" style="background-color: #f8f9fa; padding: 15px; border-radius: 6px; margin-top: 8px; border-right: 3px solid #28a745;">
                    {{ $data['application']['motivation'] ?? 'Tidak ada data' }}
                </div>
            </div>
            
            <div class="detail-item" style="margin-top: 25px; padding: 15px; background-color: #e8f5e9; border-radius: 6px; text-align: center;">
                <i class="fas fa-file-pdf" style="color: #d32f2f; font-size: 24px; margin-bottom: 10px; display: block;"></i>
                <div style="font-weight: 500; margin-bottom: 5px;">CV Pelamar</div>
                <div style="font-size: 13px; color: #6c757d;">File CV terlampir dalam email ini</div>
            </div>
        </div>
        
        <div class="footer">
            <p style="margin: 0 0 10px 0;">Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
            <p style="margin: 0; font-size: 12px;">&copy; {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>