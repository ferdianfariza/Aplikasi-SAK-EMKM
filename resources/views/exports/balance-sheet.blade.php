<table>
    <thead>
        <tr>
            <th colspan="2" style="font-weight:bold; font-size:14px; text-align:center; border:1px solid #000;">
                LAPORAN POSISI KEUANGAN (NERACA)
            </th>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center; border:1px solid #000;">
                Per Tanggal: {{ \Carbon\Carbon::parse($data['as_of_date'])->format('d M Y') }}
            </th>
        </tr>
        <tr><td colspan="2"></td></tr>
    </thead>
    <tbody>
        <tr><th style="border:1px solid #000;">ASET</th><th style="border:1px solid #000;">Jumlah (Rp)</th></tr>
        <tr><td style="border:1px solid #000;">Kas</td><td style="border:1px solid #000;">{{ number_format($data['cash'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Persediaan Barang</td><td style="border:1px solid #000;">{{ number_format($data['inventory_value'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Aset Tetap (Peralatan)</td><td style="border:1px solid #000;">{{ number_format($data['assets_value'], 0, ',', '.') }}</td></tr>
        <tr><td style="font-weight:bold; border:1px solid #000;">Total Aset</td><td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['total_assets'], 0, ',', '.') }}</td></tr>

        <tr><td colspan="2"></td></tr>

        <tr><th style="border:1px solid #000;">KEWAJIBAN</th><th style="border:1px solid #000;">Jumlah (Rp)</th></tr>
        <tr><td style="border:1px solid #000;">Utang</td><td style="border:1px solid #000;">{{ number_format($data['total_liabilities'], 0, ',', '.') }}</td></tr>

        <tr><td colspan="2"></td></tr>

        <tr><th style="border:1px solid #000;">EKUITAS</th><th style="border:1px solid #000;">Jumlah (Rp)</th></tr>
        <tr><td style="border:1px solid #000;">Modal</td><td style="border:1px solid #000;">{{ number_format($data['equity'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Prive</td><td style="border:1px solid #000;">{{ number_format($data['owner_withdrawals'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Laba Ditahan</td><td style="border:1px solid #000;">{{ number_format($data['retained_earnings'], 0, ',', '.') }}</td></tr>
        <tr>
            <td style="font-weight:bold; border:1px solid #000;">Total Ekuitas</td>
            <td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['total_equity'] + $data['retained_earnings'], 0, ',', '.') }}</td>
        </tr>

        <tr><td colspan="2"></td></tr>

        <tr>
            <td style="font-weight:bold; border:1px solid #000;">Total Kewajiban dan Ekuitas</td>
            <td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['total_liabilities'] + $data['total_equity'] + $data['retained_earnings'], 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
