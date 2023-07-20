<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Laporan Akhir</title>
    <link rel="stylesheet" href="{{ asset('css/report-template.css') }}" media="all" />
  </head>
  <body onload="window.print();">
  {{--  @php
    $val = array($report->Uang,$report->Maal,$report->Fidyah,$report->Infaq);
    $data = array_sum($val);
  @endphp  --}}
    <header class="clearfix">
      <div id="logo">
        <img src="logolazismu.png">
      </div>
      <div id="company">
        <h2 class="name">{{ config('app.name', 'Laravel') }}</h2>
        <div>Jl. Al - Mustaqim no 20, Jak-Sel 12790, DKI Jakarta</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:lazismu@gmail.com">remajaprisma@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      {{--  <div id="details" class="clearfix">
        <div id="client">
          <div class="to">DIBUAT OLEH:</div>
          <h2 class="name">{{Auth::user()->name}}</h2>
          {{--  <div class="address">796 Silver Harbour, TX 79273, US</div>  --
          <div class="email"><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></div>
        </div>
        <div id="invoice">
          {{--  <h1>LAPORAN KE 3</h1>  --}
          <div class="date">Tanggal Cetak: {{\UserAgent::tanggalIndo(date('Y-m-d'))}}</div>
          {{--  <div class="date">Due Date: 30/06/2014</div>  --}
        </div>
      </div>  --}}
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">NO</th>
            <th class="desc">JENIS</th>
            <th class="unit">JUMLAH UANG</th>
            <th class="qty">JUMLAH BERAS</th>
            {{--  <th class="total">TOTAL</th>  --}}
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>ZAKAT FITRAH UANG</h3></td>
            <td class="unit">Rp. {{number_format($report->Uang,0,'',',')}}</td>
            <td class="qty">0</td>
            {{--  <td class="total">$1,200.00</td>  --}}
          </tr>
          <tr>
            <td class="no">02</td>
            <td class="desc"><h3>ZAKAT FITRAH BERAS</h3></td>
            <td class="unit">0</td>
            <td class="qty">{{$report->Beras}} Liter</td>
            {{--  <td class="total">$3,200.00</td>  --}}
          </tr>
          <tr>
            <td class="no">03</td>
            <td class="desc"><h3>ZAKAT MAAL</h3></td>
            <td class="unit">Rp. {{number_format($report->Maal,0,'',',')}}</td>
            <td class="qty">0</td>
            {{--  <td class="total">$800.00</td>  --}}
          </tr>
          {{-- <tr>
            <td class="no">04</td>
            <td class="desc"><h3>FIDYAH</h3></td>
            <td class="unit">Rp. {{number_format($report->Fidyah,0,'',',')}}</td>
            <td class="qty">0</td>
            {{--  <td class="total">$800.00</td>  --}}
          </tr>--}
          <tr>
            <td class="no">05</td>
            <td class="desc"><h3>INFAQ</h3></td>
            <td class="unit">Rp. {{number_format($report->Infaq,0,'',',')}}</td>
            <td class="qty">0</td>
            {{--  <td class="total">$800.00</td>  --}}
          </tr>
        </tbody>
        <tfoot>
          {{--  <tr>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>  --}}
          <tr>
            <td colspan="1"></td>
            <td colspan="1">TOTAL</td>
            <td colspan="1">Rp. {{number_format($data,0,'',',')}}</td>
            <td>{{$report->Beras}} Liter</td>
          </tr>
          <tr>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td></td>
          </tr>
        </tfoot>
      </table>
      <br><br><br><br>
      <div id="thanks">{{Auth::user()->name}}</div>
      {{--  <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>  --}}
    </main>
    <footer>
      Laporan dibuat di komputer dan valid walau tanpa tanda tangan.
    </footer>
  </body>
</html>