<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kwitansi Untuk {{$transaksi->muzakki->name}}</title>
    
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            padding-bottom: 1%;
        }
        
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 10px;
            color: #333;
        }
        
        .invoice-box table tr.information table td {
            padding-bottom: 1%;
        }
        
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }
        
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .ttd{
            float: right;
        }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    @media print {
        @page { margin: 0; }
        body { 
            margin: 0.6cm;
         }
    }
    </style>
</head>

<body onload="window.print();">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('logo.png')}}" style="width:20%; max-width:150px;">
                            </td>
                            
                            <td>
                                INVOICE-00{{$transaksi->id}}<br>
                                Jakarta, {{\UserAgent::tanggalIndo(date('Y-m-d'))}}<br>
                                {{--  Due: February 1, 2015  --}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                PRISMA<br>
                                Masjid Al - Mustaqim<br>
                                Jl. Al - Mustaqim, JAK-SEL 12790
                            </td>
                            
                            <td>
                                {{$transaksi->muzakki->name}}<br>
                                {{$transaksi->muzakki->alamat}}<br>
                                {{$transaksi->muzakki->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Jumlah
                </td>
            </tr>
            
            @isset($transaksi->jiwa)
                <tr class="item">
                    <td>
                        Jiwa
                    </td>
                    
                    <td>
                        {{$transaksi->jiwa}}
                    </td>
                </tr>
            @endisset
            
            @isset($transaksi->beras_fitrah)
                <tr class="item">
                    <td>
                        Beras Zakat Fitrah
                    </td>
                    
                    <td>
                        {{$transaksi->beras_fitrah}} Liter
                    </td>
                </tr>
            @endisset
            
            @isset($transaksi->uang_fitrah)
                <tr class="item">
                    <td>
                        Uang Zakat Fitrah
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->uang_fitrah,0,'',',')}}
                    </td>
                </tr>
            @endisset

            @isset($transaksi->fidyah)
                <tr class="item">
                    <td>
                        Fidyah
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->fidyah,0,'',',')}}
                    </td>
                </tr>
            @endisset

            @isset($transaksi->zakat_maal)
                <tr class="item">
                    <td>
                        Zakat Maal
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->zakat_maal,0,'',',')}}
                    </td>
                </tr>
            @endisset
            
            @isset($transaksi->infaq)
                <tr class="item">
                    <td>
                        Infaq
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->infaq,0,'',',')}}
                    </td>
                </tr>
            @endisset

            @if($data > 0)
                <tr class="total">
                    <td></td>
                    
                    <td>
                    Total: Rp. {{number_format($data,0,'',',')}}
                    </td>
                </tr>
            
                {{-- <tr class="heading" colspan="10">
                    <td>
                        Terbilang
                    </td>
                </tr>
                
                <tr class="details">
                    <td>
                    {{strtoupper(\App\Http\Controllers\ZakatController::convertBilanganToKalimat($data))}} RUPIAH
                    </td>
                </tr> --}}
            @endif
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr class="heading">
                <td><p>{{strtoupper(\App\Http\Controllers\ZakatController::convertBilanganToKalimat($data))}} RUPIAH</p></td>
                <td colspan="10">
                    <p>{{$transaksi->user->name}}</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('logo.png')}}" style="width:20%; max-width:150px;">
                            </td>
                            
                            <td>
                                INVOICE-00{{$transaksi->id}}<br>
                                Jakarta, {{\App\Http\Controllers\ZakatController::tanggalIndo(date('Y-m-d'))}}<br>
                                {{--  Due: February 1, 2015  --}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                PRISMA<br>
                                Masjid Al - Mustaqim<br>
                                Jl. Al - Mustaqim, JAK-SEL 12790
                            </td>
                            
                            <td>
                                {{$transaksi->muzakki->name}}<br>
                                {{$transaksi->muzakki->alamat}}<br>
                                {{$transaksi->muzakki->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Jumlah
                </td>
            </tr>
            
            @isset($transaksi->jiwa)
                <tr class="item">
                    <td>
                        Jiwa
                    </td>
                    
                    <td>
                        {{$transaksi->jiwa}}
                    </td>
                </tr>
            @endisset
            
            @isset($transaksi->beras_fitrah)
                <tr class="item">
                    <td>
                        Beras Zakat Fitrah
                    </td>
                    
                    <td>
                        {{$transaksi->beras_fitrah}} Liter
                    </td>
                </tr>
            @endisset
            
            @isset($transaksi->uang_fitrah)
                <tr class="item">
                    <td>
                        Uang Zakat Fitrah
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->uang_fitrah,0,'',',')}}
                    </td>
                </tr>
            @endisset

            @isset($transaksi->fidyah)
                <tr class="item">
                    <td>
                        Fidyah
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->fidyah,0,'',',')}}
                    </td>
                </tr>
            @endisset

            @isset($transaksi->zakat_maal)
                <tr class="item">
                    <td>
                        Zakat Maal
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->zakat_maal,0,'',',')}}
                    </td>
                </tr>
            @endisset
            
            @isset($transaksi->infaq)
                <tr class="item">
                    <td>
                        Infaq
                    </td>
                    
                    <td>
                        Rp. {{number_format($transaksi->infaq,0,'',',')}}
                    </td>
                </tr>
            @endisset

            @if($data > 0)
                <tr class="total">
                    <td></td>
                    
                    <td>
                    Total: Rp. {{number_format($data,0,'',',')}}
                    </td>
                </tr>
            
                {{--  <tr class="heading" colspan="8">
                    <td>
                        Terbilang
                    </td>
                </tr>
                
                <tr class="details">
                    <td>
                    {{strtoupper(\App\Http\Controllers\ZakatController::convertBilanganToKalimat($data))}} RUPIAH
                    </td>
                </tr> --}}
            @endif
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr class="heading">
                <td><p>{{strtoupper(\App\Http\Controllers\ZakatController::convertBilanganToKalimat($data))}} RUPIAH</p></td>
                <td colspan="10">
                    <p>{{$transaksi->muzakki->name}}</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>