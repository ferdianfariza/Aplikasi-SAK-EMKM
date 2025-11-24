<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Posisi Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-period {
            font-size: 11px;
            margin-bottom: 20px;
        }
        .content {
            display: flex;
            gap: 40px;
        }
        .column {
            flex: 1;
        }
        .section-title {
            font-size: 12px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 8px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            padding: 0 5px;
        }
        .row.indent-1 {
            padding-left: 20px;
        }
        .row.total {
            font-weight: bold;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            margin-top: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 12px;
        }
        .amount {
            text-align: right;
            min-width: 120px;
        }
        .label {
            flex: 1;
        }
        @media print {
            body { margin: 10px; }
            .content { display: block; }
            .column { margin-bottom: 30px; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="company-name">ES TEH SUPER</div>
        <div class="report-title">LAPORAN POSISI KEUANGAN</div>
        <div class="report-period">
            Untuk Periode Yang Berakhir {{ $data['as_of_date_formatted'] }}
        </div>
    </div>

    <!-- Balance Sheet Content -->
    <div class="content">
        <!-- LEFT SIDE - ASSETS -->
        <div class="column">
            <div class="section-title">ASET</div>
            
            <div>
                <div style="font-weight: bold; margin-bottom: 8px;">Aset Lancar</div>
                
                <div class="row indent-1">
                    <span class="label">Kas</span>
                    <span class="amount">Rp {{ number_format($data['cash'], 0, ',', '.') }}</span>
                </div>
                
                <div class="row indent-1">
                    <span class="label">Persediaan Bahan Baku</span>
                    <span class="amount">Rp {{ number_format($data['raw_material_inventory_value'], 0, ',', '.') }}</span>
                </div>
            </div>

            <div>
                <div style="font-weight: bold; margin: 15px 0 8px 0;">Aset Tetap</div>
                
                <div class="row indent-1">
                    <span class="label">Peralatan, Bangunan, Kendaraan</span>
                    <span class="amount">Rp {{ number_format($data['fixed_assets_value_total'], 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="row total">
                <span class="label">Total Aset</span>
                <span class="amount">Rp {{ number_format($data['total_assets'], 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- RIGHT SIDE - LIABILITIES & EQUITY -->
        <div class="column">
            <div class="section-title">KEWAJIBAN & EKUITAS</div>
            
            <div>
                <div style="font-weight: bold; margin-bottom: 8px;">Kewajiban</div>
                
                <div class="row indent-1">
                    <span class="label">Utang</span>
                    <span class="amount">Rp {{ number_format($data['total_liabilities'], 0, ',', '.') }}</span>
                </div>
            </div>

            <div>
                <div style="font-weight: bold; margin: 15px 0 8px 0;">Ekuitas</div>
                
                <div class="row indent-1">
                    <span class="label">Modal (dari Laporan Ekuitas)</span>
                    <span class="amount">Rp {{ number_format($data['equity'], 0, ',', '.') }}</span>
                </div>
                
                <div class="row indent-1" style="border-top: 1px solid #000; padding-top: 5px; font-weight: bold;">
                    <span class="label">Total Ekuitas</span>
                    <span class="amount">Rp {{ number_format($data['total_equity'], 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="row total">
                <span class="label">Total Kewajiban & Ekuitas</span>
                <span class="amount">Rp {{ number_format($data['total_liabilities'] + $data['total_equity'], 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

</body>
</html>
