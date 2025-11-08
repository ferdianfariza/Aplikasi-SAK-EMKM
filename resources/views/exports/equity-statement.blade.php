<table>
    <thead>
        <tr>
            <th colspan="2" style="font-weight:bold; font-size:14px; text-align:center; border:1px solid #000;">
                LAPORAN PERUBAHAN EKUITAS
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
        <tr><th style="border:1px solid #000;">Keterangan</th><th style="border:1px solid #000;">Jumlah (Rp)</th></tr>
        <tr><td style="border:1px solid #000;">Modal Awal</td><td style="border:1px solid #000;">{{ number_format($data['initial_capital'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Tambahan Modal</td><td style="border:1px solid #000;">{{ number_format($data['additional_capital'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Laba Bersih</td><td style="border:1px solid #000;">{{ number_format($data['net_income'], 0, ',', '.') }}</td></tr>
        <tr><td style="border:1px solid #000;">Prive (Pengambilan Pemilik)</td><td style="border:1px solid #000;">{{ number_format($data['owner_withdrawals'], 0, ',', '.') }}</td></tr>
        <tr>
            <td style="font-weight:bold; border:1px solid #000;">Modal Akhir</td>
            <td style="font-weight:bold; border:1px solid #000;">{{ number_format($data['ending_equity'], 0, ',', '.') }}</td>
        </tr>
    </tbody>
</table>
