<doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Invoice Untuk {{$transaksi->muzakki->name}}</title>
      <style> 	     .invoice-box{ 	    background-color: #FFFFFF;         max-width:800px;         margin:30px 0;         padding:30px;         border:1px solid #eee;         box-shadow:0 0 10px rgba(0, 0, 0, .15);         font-size:16px;         line-height:24px;         font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;         color:#555;     } 	 	.invoice-boxx{ 	    background-image: url("http://images.alphacoders.com/458/458169.jpg");         max-width:800px;         margin:auto;         padding:30px;         border:1px solid #eee;         box-shadow:0 0 10px rgba(0, 0, 0, .15);         font-size:16px;         line-height:24px;         font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;         color:#f7f7f7;     } 	 .btn {   background: #3cb0fd;   background-image: -webkit-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: -moz-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: -ms-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: -o-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: linear-gradient(to bottom, #3cb0fd, #3cb0fd);   -webkit-border-radius: 4;   -moz-border-radius: 4;   border-radius: 4px;   font-family: Arial;   color: #ffffff;   font-size: 35px;   padding: 6px 16px 10px 20px;   text-decoration: none; }  .btn:hover {   background: #3cb0fd;   background-image: -webkit-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: -moz-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: -ms-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: -o-linear-gradient(top, #3cb0fd, #3cb0fd);   background-image: linear-gradient(to bottom, #3cb0fd, #3cb0fd);   text-decoration: none; }  	     .invoice-box table{         width:100%;         line-height:inherit;         text-align:left;     }          .invoice-box table td{         padding:5px;         vertical-align:top;     }          .invoice-box table tr td:nth-child(2){         text-align:right;     }          .invoice-box table tr.top table td{         padding-bottom:20px;     }          .invoice-box table tr.top table td.title{         font-size:45px;         line-height:45px;         color:#333;     }          .invoice-box table tr.information table td{         padding-bottom:40px;     }          .invoice-box table tr.heading td{         background:#EEEEE0;         border-bottom:1px solid #ddd;         font-weight:bold;     }          .invoice-box table tr.details td{         padding-bottom:20px;     }          .invoice-box table tr.item td{         border-bottom:1px solid #eee;     }          .invoice-box table tr.item.last td{         border-bottom:none;     }          .invoice-box table tr.total td:nth-child(2){         border-top:2px solid #eee;         font-weight:bold;     }          @media only screen and (max-width: 600px) {         .invoice-box table tr.top table td{             width:100%;             display:block;             text-align:center;         }                  .invoice-box table tr.information table td{             width:100%;             display:block;             text-align:center;         }     }     </style>
   </head>
   @php
    $val = array($transaksi->uang_fitrah,$transaksi->fidyah,$transaksi->zakat_maal,$transaksi->infaq);
    $data = array_sum($val);
   @endphp
   <body>
      <div class="invoice-boxx">
      <h1 align = "center">{{ config('app.name', 'Laravel') }}</h1>
      <div class="invoice-box">
         <table cellpadding="0" cellspacing="0">
         <tr class="top">
            <td colspan="2">
               <table>
                  <tr>
                     <td class="title"><img src="{{ asset('logo.png')}}" style="width:50%; max-width:100px;"></td>
                     <td> No Invoice: INVOICE-00{{$transaksi->id}}<br>
                          Jakarta, {{\UserAgent::tanggalIndo(date('Y-m-d'))}}<br>
                          {{--  Due: {{{invoice_date_due}}}                             --}}
                      </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr class="information">
            <td>                     
              <tr>
                  <td>
                    PRISMA<br>
                    Jl. Al - Mustaqim no. 20 Jak-Sel 12790<br>
                    DKI Jakarta<br>                             
                  </td>
                  <td>
                    <strong>Diberikan Kepada:</strong><br>                               
                    {{$transaksi->muzakki->name}}<br> 								
                    {{$transaksi->muzakki->alamat}}<br>
                  </td>
              </tr>
            </td>	    		    
          </tr> 			
         <table>
            <tr class="heading">
               <td>                     Item                 </td>
               <td>                     Jumlah                 </td>
            </tr>

          @isset($transaksi->jiwa)
            <tr class="details">
              <td>               
                Jiwa                 
              </td>
              <td>                     
                {{$transaksi->jiwa}}                 
              </td>
            </tr>
          @endisset

          @isset($transaksi->beras_fitrah)
            <tr class="details">
              <td>               
                Zakat Fitrah Beras                 
              </td>
              <td>                     
                {{$transaksi->beras_fitrah}} Liter                
              </td>
            </tr>
          @endisset

          @isset($transaksi->uang_fitrah)
            <tr class="details">
              <td>               
                Zakat Fitrah Uang                 
              </td>
              <td>                     
                Rp. {{number_format($transaksi->uang_fitrah,0,'',',')}}                  
              </td>
            </tr>
          @endisset

          @isset($transaksi->fidyah)
            <tr class="details">
              <td>               
                Fidyah                 
              </td>
              <td>                     
                Rp. {{number_format($transaksi->fidyah,0,'',',')}}                
              </td>
            </tr>
          @endisset

          @isset($transaksi->zakat_maal)
            <tr class="details">
              <td>               
                Zakat Maal            
              </td>
              <td>                     
                Rp. {{number_format($transaksi->zakat_maal,0,'',',')}}                  
              </td>
            </tr>
          @endisset

          @isset($transaksi->infaq)
            <tr class="details">
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
          @endif
         </table>
         <p align="center"><strong>Terima Kasih Telah Mempercayakan Kami</strong></p>
      </div>
      </hr> 	
      <div></hr></div>
      <div class="invoice-box">
      <h1 align="center">PRISMA</h1>
      <p align="center">Jl. Al-Mustaqim, RT.1, Mampang Prpt., Kota Jakarta Selatan<br> 
        Daerah Khusus Ibukota Jakarta 12790<br>  
        {{--  Phone: +91 8128527865<br>    --}}
        Email: remajaprisma@gmail.com<br> 
        {{--  Website:<a href="www.muskaandentalcare.webs.com">www.muskaandentalcare.webs.com</a><br>  --}}
      </p>
      <div align="center">
        <a href="https://www.facebook.com/prismamampang"> 				
          <img src="https://cdn0.iconfinder.com/data/icons/free-social-media-set/24/facebook-128.png" align="middle" style="width:10%; max-width:50px;"> 			
        </a> 			
        <a href="https://www.instagram.com/prismaupdate/"> 				
          <img src="https://cdn0.iconfinder.com/data/icons/free-social-media-set/24/instagram-128.png" align="middle" style="width:10%; max-width:50px;" > 			
        </a> 	 			
        <a href="https://www.youtube.com/c/prismamampang"> 				
          <img src="https://cdn0.iconfinder.com/data/icons/free-social-media-set/24/youtube2-128.png" align="middle" style="width:10%; max-width:50px;" > 			
        </a> 
      </div>
      <div align="center"> 		
        <a href="https://www.facebook.com/prismamampang"> PRISMA MAMPANG.</a> 	
      </div>
   </body>
</html>