<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh số bán hàng từ ngày {{date('d-m-Y', strtotime($from_date))}} đến ngày {{date('d-m-Y', strtotime($to_date))}}</title>
    <link rel="icon" type="image/png" href="{{URL::to('public/admin/images/pdf-icon.jpg')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<!-- <button onclick="window.print();" class="noPrint">Print</button> -->
    <div class="container" style="font-size:22px;">
        <div class="row" style="margin-top: 40px;">
            <div class="col-sm-2">
                <img src="/template/images/icons/image-logo-icon.png" alt="LOGO" style="margin-top: 15px; margin-right: 20px" width="150" height="auto">
            </div>
            <div class="col-sm-10">
                <b>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ SPORTWEARSHOP</b>
                <p>Tầng 5, Saigon Center, Quận 1, Thành Phố Hồ Chí Minh</p>
            </div>
        </div>
        <hr style="margin:20px 0px 40px 0px">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-12" style="text-align: center;">
                <b style="font-size: 26px;">THỐNG KÊ VÀ PHÂN TÍCH DOANH SỐ BÁN HÀNG</b><br>
                <i>(Từ ngày {{date('d-m-Y', strtotime($from_date))}} đến ngày {{date('d-m-Y', strtotime($to_date))}})</i>
            </div>
            <div class="col-md-12" style="text-align: right;">
                <p style="margin:30px 0px">Thời gian thống kê: {{date('H:i d-m-Y')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">I. Số liệu thống kê</b></p>
                <input type="hidden" id="tu-ngay" value="{{$from_date}}">
                <input type="hidden" id="den-ngay" value="{{$to_date}}">
                <table class="table table-bordered" style="text-align:center">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ngày bán hàng</th>
                        <th scope="col">Bán hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; $total_sales = 0;
                         $max_sales = 0; $max_sales_date = ''; $max_profit_date  = ''; 
                        $first_statistic_row = $statistic_info->first();
                        foreach($first_statistic_row as $key => $item){
                            $min_sales = $first_statistic_row->sum;
                        }
                         $min_sales_date = ''; 
                         ?>
                        @foreach($statistic_info as $key => $item)
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>{{number_format($item->sum, 0, " ", ".").' ₫'}}</td>
                            {{-- <td>{{number_format($item->Profit, 0, " ", ".").' ₫'}}</td> --}}
                        </tr>
                        <?php $stt = $stt + 1; $total_sales += $item->sum;?>
                        <?php 
                            if($max_sales < $item->sum)
                            {
                                $max_sales = $item->sum;
                                $max_sales_date = $item->created_at;
                            }
                            if($min_sales > $item->sum)
                            {
                                $min_sales = $item->sum;
                                $min_sales_date = $item->created_at;
                            }
                        ?>
                        @endforeach
                        <tr>
                            <td colspan="2"><b>TỔNG CỘNG</b></td>
                            <td>{{number_format($total_sales, 0, " ", ".").' ₫'}}</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">II. Biểu đồ thống kê doanh số</b></p>
                <form>
                    @csrf
                    <div id="bieuDoDoanhThu" style="max-width:85%"></div>
                </form>
                <small>Chú thích: 
                    <div style="display:inline-block;background-color:#0B62A4; height:10px; width:10px;margin-left: 20px;"></div> : Bán hàng
                    {{-- <div style="display:inline-block;background-color:#7A92A3; height:10px; width:10px;margin-left: 20px;"></div>  : Doanh thu --}}
                </small >
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">III. Phân tích thống kê</b></p>
                <p>Từ ngày {{date('d-m-Y', strtotime($from_date))}} đến ngày {{date('d-m-Y', strtotime($to_date))}}:</p>
                <div style="margin-left:40px">
                    <p>- Ngày bán hàng có giá trị lớn nhất: {{date('d-m-Y', strtotime($max_sales_date))}} ({{number_format($max_sales, 0, " ", ".").' ₫'}})</p>
                    <p>- Ngày bán hàng có giá trị nhỏ nhất: {{date('d-m-Y', strtotime($min_sales_date))}} ({{number_format($min_sales, 0, " ", ".").' ₫'}})</p>
                    <p>- Giá trị bán hàng trung bình mỗi ngày: {{number_format(round($total_sales/count($statistic_info), 0), 0, " ", ".").' ₫'}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="text-align: right;">
            </div>
            <div class="col-md-4" style="text-align: center;">
                <p style="margin:20px 0px 80px 0px">
                    <b style="font-size: 24px;">Người lập thống kê</b><br>
                    <i>(Kí, đóng dấu và ghi rõ họ tên)</i>
                </p>
                <p>{{Session::get('name')}}</p>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12" style="text-align: center;">
                <hr>
                <b>SportwearShop - "Tất cả vì khách hàng"</b>
                <hr>
            </div>
        </div>
    </div>
    <script type= "text/javascript">       
     </script>
    <script>
        $(document).ready(function(){
            var chart = new Morris.Bar({
                element: 'bieuDoDoanhThu',
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                pointFillColors:['#ffffff'],
                pointStrokeColors:['black'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                parseTime: false,
                xkey: 'period',
                ykeys:['sales'],
                behaveLikeLine: true,
                labels: ['Doanh thu']
            });
            load_chart();
            setTimeout(function() { window.print();}, 500);
            function load_chart(){
                var from_date = $('#tu-ngay').val();
                var to_date = $('#den-ngay').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/admin/filter-by-date')}}",
                    method: "POST",
                    dataType:"JSON",
                    data:{from_date:from_date, to_date:to_date ,_token:_token},

                    success:function(data){
                    chart.setData(data);
                    }
                })
            }
        });
        
    </script>
</body>
</html>