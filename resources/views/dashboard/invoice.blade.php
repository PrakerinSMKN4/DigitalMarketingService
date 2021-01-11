<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body style="
width: 90%;
height: 95%;
margin-left: 50px; /* Space from this element (entire page) and others*/
padding: 0px; /*space from content and border*/
border: solid black;
border-width: thick;
display:block;">
    <center>
        <h1>
            Invoice Paket
        </h1>
    </center>
    <table style="padding-left: 2rem; padding-right: 2rem; width: 100%;">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>Dari</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>Digital Marketing Service</td>
                    </tr>
                    <tr>
                        <td>No. Klien</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->id_user  }}</td>
                    </tr>
                    <tr>
                        <td>Nama klien</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->no_handphone }}</td>
                    </tr>
                    <tr>
                        <td>Email klien</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->email }}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="margin-top: -43px;">
                    <tr>
                        <td>No. Invoice</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->no_invoice }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->created_at->format("d-M-Y") }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Berakhir</td>
                        <td style="padding-left: 3rem; padding-right: 1rem;">:</td>
                        <td>{{ $data->tanggal_berakhir->format("d-M-Y") }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
    <center style="margin: 1rem;">
        <table style="width: 99%; height: 100%; text-align: center;" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Paket</th>
                    <th>Fitur</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $data->paket }}</td>
                    <td>{{ $data->deskripsi }}</td>
                    <td>1</td>
                    <td>Rp. {{ number_format($data->harga,2,',','.') }}</td>
                    <td>Rp. {{ number_format($data->harga,2,',','.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold;">Total Bayar</td>
                    <td>Rp. {{ number_format($data->harga,2,',','.') }}</td>
                </tr>
            </tfoot>
        </table>
    </center>
    
</body>
</html>