<!DOCTYPE html>

<head>
	<title>DashBoard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css" />
	<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('backend/css/morris.css')}}" type="text/css" />
	<!-- calendar -->
	<link rel="stylesheet" href="{{asset('backend/css/monthly.css')}}">
	<!-- //calendar -->
	<!-- //font-awesome icons -->
	<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>
	<script src="{{asset('backend/js/raphael-min.js')}}"></script>
	<script src="{{asset('backend/js/morris.js')}}"></script>


	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body>
	<section style="color: #000;" id="container">
		<!--header start-->
		<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="brand">
				<a style="color: #000;" href="#" class="logo">
					Admin
				</a>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>
			</div>
			<!--logo end-->

			<div class="top-nav clearfix">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<li>

						<input style="background: #BDBDBD url(backend/image/search-icon.png) no-repeat 10px 8px" type="text" class="form-control search" placeholder=" Search">
					</li>
					<!-- user login dropdown start-->
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<img alt="" src="{{asset('backend/image/iconAdmin.jpg')}}">
							<span class="username">
								@if(session('admin_name'))
								{{session('admin_name')}}
								@endif

							</span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<li><a href="#"><i class=" fa fa-suitcase"></i>{{__('Profile')}}</a></li>
							<li><a href="#"><i class="fa fa-cog"></i>{{__('C??i ?????t')}}</a></li>
							<li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> {{__('????ng xu???t')}}</a></li>
						</ul>
					</li>
					<!-- user login dropdown end -->

				</ul>
				<!--search & user info end-->
			</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse">
				<!-- sidebar menu start-->
				<div style="overflow: hidden;outline: none;background: #F6CECE;" class= " leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion">
						<li>
							<a class="active" href="{{URL::to('/dashboard')}}">
								<i class="fa fa-dashboard"></i>
								<span>{{__('T???ng quan')}}</span>
							</a>
						</li>

						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>{{__('????n h??ng')}}</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/manage-order')}}">{{__('Qu???n l?? ????n h??ng')}}</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>Danh m???c s???n ph???m</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/add-category-product')}}">{{__('Th??m s???n ph???m')}}</a></li>
								<li><a href="{{URL::to('/all-category-product')}}">{{__('Li???t k?? danh m???c s???n ph???m')}}</a></li>

							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>M?? gi???m gi??</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/insert-coupon')}}">Th??m m?? gi???m gi??</a></li>
								<li><a href="{{URL::to('/list-coupon')}}">Li???t k?? m?? gi???m gi??</a></li>
							</ul>
						</li>

						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>{{__('V???n chuy???n')}}</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/delivery')}}">{{__('Qu???n l?? v???n chuy???n')}}</a></li>
							</ul>

						</li>

						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>{{__('Th????ng hi???u s???n ph???m')}}</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/add-brand-product')}}">{{__('Th??m th????ng hi???u s???n ph???m')}}</a></li>
								<li><a href="{{URL::to('/all-brand-product')}}">{{__('Li???t k?? th????ng hi???u s???n ph???m')}}</a></li>

							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>{{__('S???n ph???m')}}</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/add-product')}}">{{__('Th??m s???n ph???m')}}</a></li>
								<li><a href="{{URL::to('/all-product')}}">{{__('Li???t k?? s???n ph???m')}}</a></li>

							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>{{__('Kh??ch h??ng')}}</span>
							</a>
							<ul class="sub">
								<li><a href="all-customer">{{__('Danh s??ch kh??ch h??ng')}}</a></li>
							</ul>
						</li>

					</ul>
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				@yield('admin_content')
			</section>
			<footer style="margin-top: 470px;margin-left: 20px;">
				<div id="text-2" class="large-6 columns widget left widget_text">
					<h3 class="widget-title">{{__('Gi???i thi???u')}}</h3>
					<div class="tx-div small"></div>
					<div class="textwidget">
						<p>Shop Shoes - Gi??y th??? thao</p>
						<p>?????a ch???: 54/12 B??nh Q?????i B, B??nh Chu???n, Thu???n An,B??nh D????ng</p>
						<p>Hotline : 0394796183</p>
					</div>
					<div class="wthree-copyright">
						<p>{{__('?? 2020. Thi???t k??? b???i')}} <a href="https://www.facebook.com/Luot28122017/">L?????t Chu </a></p>
					</div>
				</div>
			</footer><!-- FOOTER 1 -->


			<!-- FOOTER 2 -->
		</section>
		<!--main content end-->
	</section>
	<script src="{{asset('backend/js/jquery.form-validator.min.js')}}"></script>
	<script src="{{asset('backend/js/bootstrap.js')}}"></script>
	<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('backend/js/scripts.js')}}"></script>
	<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
	 <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script> 
	<!-- <script type="text/javascript"> -->
		$(document).ready(function(){

        chart60daysorder();

        var chart = new Morris.Bar({
             
              element: 'chart',
              //option chart
              lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3', '#766B56'],
                parseTime: false,
                hideHover: 'auto',
                xkey: 'period',
                ykeys: ['order','sales','profit','quantity'],
                labels: ['????n h??ng','doanh s???','l???i nhu???n','s??? l?????ng']
            
            });


       
        function chart60daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},
                
                success:function(data)
                    {
                        chart.setData(data);
                    }   
            });
        }
 
    $('.dashboard-filter').change(function(){
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();
        // alert(dashboard_value);
        $.ajax({
            url:"{{url('/dashboard-filter')}}",
            method:"POST",
            dataType:"JSON",
            data:{dashboard_value:dashboard_value,_token:_token},
            
            success:function(data)
                {
                    chart.setData(data);
                }   
            });

    });

    $('#btn-dashboard-filter').click(function(){
       
        var _token = $('input[name="_token"]').val();

        var from_date = $('#datepicker3').val();
        var to_date = $('#datepicker4').val();

         $.ajax({
            url:"{{url('/filter-by-date')}}",
            method:"POST",
            dataType:"JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},
            
            success:function(data)
                {
                    chart.setData(data);
                }   
        });

    });

});
    
</script>



	<script type="text/javascript">
		$(function() {
			$("#start_coupon").datepicker({
				prevText: "Th??ng tr?????c",
				nextText: "Th??ng sau",
				dateFormat: "yy/mm/dd",
				dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
				duration: "slow"
			});
			$("#end_coupon").datepicker({
				prevText: "Th??ng tr?????c",
				nextText: "Th??ng sau",
				dateFormat: "yy/mm/dd",
				dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
				duration: "slow"
			});
		});
	</script>
	<!-- date coupon -->
	<script type="text/javascript">
		$(function() {
			$("#datepicker").datepicker({
				prevText: "Th??ng tr?????c",
				nextText: "Th??ng sau",
				dateFormat: "dd-mm-yy",
				dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
				duration: "slow"
			});
			$("#datepicker2").datepicker({
				prevText: "Th??ng tr?????c",
				nextText: "Th??ng sau",
				dateFormat: "dd-mm-yy",
				dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
				duration: "slow"
			});
		});
	</script>
	<script type="text/javascript">
		$(function() {
			$("#datepicker3").datepicker({
				prevText: "Th??ng tr?????c",
				nextText: "Th??ng sau",
				dateFormat: "yy-mm-dd",
				dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
				duration: "slow"
			});
			$("#datepicker4").datepicker({
				prevText: "Th??ng tr?????c",
				nextText: "Th??ng sau",
				dateFormat: "yy-mm-dd",
				dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
				duration: "slow"
			});
		});
	</script>
	<!-- end date coupon -->
	<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

         //lay ra so luong
         quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        
        j = 0;
        for(i=0;i<order_product_id.length;i++){
             //so luong khach dat
             var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('S??? l?????ng b??n trong kho kh??ng ?????');
                }
                $('.color_qty_'+ order_product_id[i]).css('background','#000');
            }
        }
        if(j==0){
            $.ajax({
                url : '{{url('/update-order-qty')}}',
                    method: 'POST',
                    data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                    success:function(data){
                        alert('Thay ?????i t??nh tr???ng ????n h??ng th??nh c??ng');
                        location.reload();
                    }
        });     
        }

       
    });
</script>
	<script type="text/javascript">
		$('.update_quantity_order').click(function() {
			var order_product_id = $(this).data('product_id');
			var order_qty = $('.order_qty_' + order_product_id).val();
			var order_code = $('.order_code').val();
			var _token = $('input[name="_token"]').val();
			// alert(order_product_id);
			// alert(order_qty);
			// alert(order_code);
			$.ajax({
				url: '{{url('/update-qty')}}',

				method: 'POST',

				data: {
					_token: _token,
					order_product_id: order_product_id,
					order_qty: order_qty,
					order_code: order_code
				},
				// dataType:"JSON",
				success: function(data) {

					alert('C???p nh???t s??? l?????ng th??nh c??ng');

					location.reload();




				}
			});

		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {

			fetch_delivery();

			function fetch_delivery() {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: '{{url('/select-feeship')}}',
					method: 'POST',
					data: {
						_token: _token
					},
					success: function(data) {
						$('#load_delivery').html(data);
					}
				});
			}
			$(document).on('blur', '.fee_feeship_edit', function() {

				var feeship_id = $(this).data('feeship_id');
				var fee_value = $(this).text();
				var _token = $('input[name="_token"]').val();
				// alert(feeship_id);
				// alert(fee_value);
				$.ajax({
					url: '{{url('/update-delivery')}}',
					method: 'POST',
					data: {
						feeship_id: feeship_id,
						fee_value: fee_value,
						_token: _token
					},
					success: function(data) {
						fetch_delivery();
					}
				});

			});
			$('.add_delivery').click(function() {

				var city = $('.city').val();
				var province = $('.province').val();
				var wards = $('.wards').val();
				var fee_ship = $('.fee_ship').val();
				var _token = $('input[name="_token"]').val();
				// alert(city);
				// alert(province);
				// alert(wards);
				// alert(fee_ship);
				$.ajax({
					url: '{{url('/insert-delivery')}}',
					method: 'POST',
					data: {
						city: city,
						province: province,
						_token: _token,
						wards: wards,
						fee_ship: fee_ship
					},
					success: function(data) {
						fetch_delivery();
					}
				});


			});
			$('.choose').on('change', function() {
				var action = $(this).attr('id');
				var ma_id = $(this).val();
				var _token = $('input[name="_token"]').val();
				var result = '';
				// alert(action);
				//  alert(matp);
				//   alert(_token);

				if (action == 'city') {
					result = 'province';
				} else {
					result = 'wards';
				}
				$.ajax({
					url: '{{url('/select-delivery')}}',
					method: 'POST',
					data: {
						action: action,
						ma_id: ma_id,
						_token: _token
					},
					success: function(data) {
						$('#' + result).html(data);
					}
				});
			});
		})
	</script>
	<script type="text/javascript">
		$.validate({

		});
	</script>
	<script>
		$(document).ready(function() {
			//BOX BUTTON SHOW AND CLOSE
			jQuery('.small-graph-box').hover(function() {
				jQuery(this).find('.box-button').fadeIn('fast');
			}, function() {
				jQuery(this).find('.box-button').fadeOut('fast');
			});
			jQuery('.small-graph-box .box-close').click(function() {
				jQuery(this).closest('.small-graph-box').fadeOut(200);
				return false;
			});

			//CHARTS
			function gd(year, day, month) {
				return new Date(year, month - 1, day).getTime();
			}

			graphArea2 = Morris.Area({
				element: 'hero-area',
				padding: 10,
				behaveLikeLine: true,
				gridEnabled: false,
				gridLineColor: '#dddddd',
				axes: true,
				resize: true,
				smooth: true,
				pointSize: 0,
				lineWidth: 0,
				fillOpacity: 0.85,
				data: [{
						period: '2015 Q1',
						iphone: 2668,
						ipad: null,
						itouch: 2649
					},
					{
						period: '2015 Q2',
						iphone: 15780,
						ipad: 13799,
						itouch: 12051
					},
					{
						period: '2015 Q3',
						iphone: 12920,
						ipad: 10975,
						itouch: 9910
					},
					{
						period: '2015 Q4',
						iphone: 8770,
						ipad: 6600,
						itouch: 6695
					},
					{
						period: '2016 Q1',
						iphone: 10820,
						ipad: 10924,
						itouch: 12300
					},
					{
						period: '2016 Q2',
						iphone: 9680,
						ipad: 9010,
						itouch: 7891
					},
					{
						period: '2016 Q3',
						iphone: 4830,
						ipad: 3805,
						itouch: 1598
					},
					{
						period: '2016 Q4',
						iphone: 15083,
						ipad: 8977,
						itouch: 5185
					},
					{
						period: '2017 Q1',
						iphone: 10697,
						ipad: 4470,
						itouch: 2038
					},

				],
				lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
				xkey: 'period',
				redraw: true,
				ykeys: ['iphone', 'ipad', 'itouch'],
				labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
				pointSize: 2,
				hideHover: 'auto',
				resize: true
			});


		});
	</script>
	<!-- calendar -->
	<!-- <script type="text/javascript" src="asset{{('backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load(function() {

			$('#mycalendar').monthly({
				mode: 'event',

			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

			switch (window.location.protocol) {
				case 'http:':
				case 'https:':
					// running on a server, should be good.
					break;
				case 'file:':
					alert('Just a heads-up, events will not work when run locally.');
			}

		});
	</script> -->
	<!-- //calendar -->
</body>

</html>