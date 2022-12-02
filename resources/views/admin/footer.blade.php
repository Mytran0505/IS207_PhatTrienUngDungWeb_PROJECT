<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>
<script src="/template/admin/js/main.js"></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
  $(document).ready(function() {
    chart30daysorder();

    var chart = new Morris.Bar({
      // ID of the element in which to draw the chart.
      element: 'myfirstchart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      lineColors: ['#819C79', '#fc8710'],

      pointFillColors: ['#ffffff'],
      pointStrokeColors: ['black'],
      fillOpacity: 0.3,
      hideHover: 'auto',
      parseTime: false,

      // The name of the data record attribute that contains x-values.
      xkey: 'period',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['sales'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['Doanh thu']
    });

    function chart30daysorder(){
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{url('/admin/days-order')}}",
        method: "POST",
        dataType:"JSON",
        data:{_token:_token},

        success:function(data){
          chart.setData(data);
        }
      })
    }


    $("#datepicker").datepicker({dateFormat:"yy-mm-dd"});

    $("#datepicker2").datepicker({dateFormat:"yy-mm-dd"});

    $("#btn-dashboard-filter").click(function(){
        var _token = $('input[name="_token"]').val();
        var from_date =  $('#datepicker').val();
        var to_date = $('#datepicker2').val();
        $.ajax({
            url:"{{url('/admin/filter-by-date')}}",
            method: "POST",
            dataType:"JSON",
            data:{from_date:from_date, to_date:to_date, _token:_token},

            success:function(data){
                chart.setData(data);
            }
        })
    });
})
</script>

<script>
  $(function () {
    var colorDanger = "#FF1744";
    Morris.Donut({
      element: 'donut',
      resize: true,
      colors: [
        '#e9c46a',
        '#6a994e',
        '#4DD0E1',
      ],
      //labelColor:"#cccccc", // text color
      //backgroundColor: '#333333', // border color
      data: [
        {label:"Đơn hàng", value:{{ $order_count }}},
        {label:"Sản phẩm", value:{{ $product_count }}},
        {label:"Khách hàng", value:{{ $customer_count }}}
      ]
    });
  });
  
</script>

@yield('footer')