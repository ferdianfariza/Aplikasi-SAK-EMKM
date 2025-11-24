<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Laba Rugi</title>
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
            padding: 0 10px;
        }
        .row.indent-1 {
            padding-left: 30px;
        }
        .row.indent-2 {
            padding-left: 50px;
        }
        .row.bold {
            font-weight: bold;
            margin-top: 10px;
        }
        .row.total {
            font-weight: bold;
            border-top: 1px solid #000;
            border-bottom: 2px solid #000;
            margin-top: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .row.net-income {
            font-weight: bold;
            font-size: 13px;
            margin-top: 15px;
        }
        .amount {
            text-align: right;
            min-width: 150px;
        }
        .label {
            flex: 1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table tr td {
            padding: 4px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="company-name">ES TEH SUPER</div>
        <div class="report-title">LAPORAN LABA RUGI</div>
        <div class="report-period">
            Untuk Periode Yang Berakhir {{ $data['end_date_formatted'] }}
        </div>
    </div>

    <!-- Revenue Section -->
    <div class="section-title">Pendapatan</div>
    <div class="row indent-1">
        <span class="label">Pendapatan Penjualan</span>
        <span class="amount">Rp {{ number_format($data['sales_revenue'], 0, ',', '.') }}</span>
    </div>
    <div class="row total">
        <span class="label">Total Pendapatan</span>
        <span class="amount">Rp {{ number_format($data['total_revenue'], 0, ',', '.') }}</span>
    </div>

    <!-- Expenses Section -->
    <div class="section-title">Beban</div>
    
    <!-- Production Expenses -->
    <div class="row bold">
        <span class="label">Beban Produksi</span>
    </div>
    
    @if($data['raw_material_usage_details']->count() > 0)
        <div style="padding: 0 10px;">
            <div style="font-weight: bold; font-size: 11px; margin-bottom: 5px;">Bahan Baku yang Digunakan:</div>
            @foreach($data['raw_material_usage_details'] as $material)
                <div class="row indent-2">
                    <span class="label">{{ $material['name'] }} ({{ number_format($material['quantity'], 2) }} {{ $material['unit'] }})</span>
                    <span class="amount">Rp {{ number_format($material['amount'], 0, ',', '.') }}</span>
                </div>
            @endforeach
        </div>
    @endif

    @if($data['production_expenses'] > 0)
        <div class="row indent-1">
            <span class="label">Beban Produksi Lainnya</span>
            <span class="amount">Rp {{ number_format($data['production_expenses'], 0, ',', '.') }}</span>
        </div>
    @endif

    <div class="row bold" style="border-top: 1px solid #000; padding-top: 5px;">
        <span class="label">Total Beban Produksi</span>
        <span class="amount">Rp {{ number_format($data['total_production_expenses'], 0, ',', '.') }}</span>
    </div>

    <!-- Other Expenses -->
    @foreach($data['expenses'] as $expense)
        <div class="row indent-1">
            <span class="label">{{ $expense['category'] }}</span>
            <span class="amount">Rp {{ number_format($expense['amount'], 0, ',', '.') }}</span>
        </div>
    @endforeach

    <div class="row total">
        <span class="label">Total Beban</span>
        <span class="amount">Rp {{ number_format($data['total_expenses'], 0, ',', '.') }}</span>
    </div>

    <!-- Net Income -->
    <div class="row net-income" style="color: {{ $data['net_income'] >= 0 ? '#22863a' : '#cb2431' }};">
        <span class="label">{{ $data['net_income'] >= 0 ? 'Laba Bersih' : 'Rugi Bersih' }}</span>
        <span class="amount">Rp {{ number_format(abs($data['net_income']), 0, ',', '.') }}</span>
    </div>

</body>
</html>
