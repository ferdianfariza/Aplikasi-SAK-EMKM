<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Perubahan Ekuitas</title>
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
        .section {
            margin-bottom: 10px;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            padding: 0 10px;
        }
        .row.indent-1 {
            padding-left: 30px;
        }
        .row.bold {
            font-weight: bold;
        }
        .row.total {
            font-weight: bold;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            margin-top: 15px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 13px;
        }
        .amount {
            text-align: right;
            min-width: 150px;
        }
        .label {
            flex: 1;
        }
        .green {
            color: #22863a;
        }
        .red {
            color: #cb2431;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="company-name">ES TEH SUPER</div>
        <div class="report-title">LAPORAN PERUBAHAN EKUITAS</div>
        <div class="report-period">
            Untuk Periode Yang Berakhir {{ $data['end_date_formatted'] }}
        </div>
    </div>

    <!-- Equity Statement -->
    <div class="section">
        <div class="row">
            <span class="label">Modal Awal</span>
            <span class="amount">Rp {{ number_format($data['initial_capital'], 0, ',', '.') }}</span>
        </div>

        @if($data['additional_capital'] > 0)
            <div class="row indent-1 green">
                <span class="label">Tambahan Modal</span>
                <span class="amount">+ Rp {{ number_format($data['additional_capital'], 0, ',', '.') }}</span>
            </div>
        @endif

        <div class="row indent-1 {{ $data['net_income'] >= 0 ? 'green' : 'red' }}">
            <span class="label">{{ $data['net_income'] >= 0 ? 'Laba Bersih' : 'Rugi Bersih' }}</span>
            <span class="amount">{{ $data['net_income'] >= 0 ? '+' : '-' }} Rp {{ number_format(abs($data['net_income']), 0, ',', '.') }}</span>
        </div>

        <div class="row total">
            <span class="label">Modal Akhir</span>
            <span class="amount">Rp {{ number_format($data['ending_equity'], 0, ',', '.') }}</span>
        </div>
    </div>

</body>
</html>
