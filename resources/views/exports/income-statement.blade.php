<table>
    <thead>
        <tr>
            <th colspan="2" style="font-weight:bold; font-size:14px; text-align:center; border:1px solid #000;">
                LAPORAN LABA RUGI
            </th>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center; border:1px solid #000;">
                Periode: {{ \Carbon\Carbon::parse($data['start_date'])->format('d M Y') }} -
                {{ \Carbon\Carbon::parse($data['end_date'])->format('d M Y') }}
            </th>
        </tr>
        <tr><td colspan="2"></td></tr>
    </thead>
    <tbody>
        <tr><th style="border:1px solid #000;">Pendapatan</th><th style="border:1px solid #000;">Jumlah (Rp)</th></tr>
        <tr><td style="border:1px solid #000;">Pendapatan Penjualan</td><td style="border:1px solid #000;">{{ number_format($data['sales_revenue'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Pendapatan Lain-lain</td><td style="border:1px solid #000;">{{ number_format($data['other_revenue'], 0, ',', '.') }}</td></tr>
        <tr><td style="font-weight:bold; border:1px solid #000;">Total Pendapatan</td><td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['total_revenue'], 0, ',', '.') }}</td></tr>

        <tr><td colspan="2"></td></tr>

        <tr><th style="border:1px solid #000;">Beban</th><th style="border:1px solid #000;">Jumlah (Rp)</th></tr>
        @foreach($data['expenses'] as $expense)
            <tr>
                <td style="border:1px solid #000;">{{ $expense['category'] }}</td>
                <td style="border:1px solid #000;">{{ number_format($expense['amount'], 0, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr><td style="font-weight:bold; border:1px solid #000;">Total Beban</td><td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['total_expenses'], 0, ',', '.') }}</td></tr>

        <tr><td colspan="2"></td></tr>

        <tr>
            <td style="font-weight:bold; border:1px solid #000;">Laba Bersih</td>
            <td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['net_income'], 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
