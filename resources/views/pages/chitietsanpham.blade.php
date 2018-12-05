@extends('master')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="trangchu">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					@if($thongtin->promotion_price != 0)
					<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
					@endif
					<div class="col-sm-4">
						<img src="source/image/product/{{$thongtin->image}}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"><h2>{{$thongtin->name}}</h2></p>
							<p class="single-item-price">
												@if($thongtin->promotion_price == 0)
												<span class="flash-sale">{{number_format($thongtin->unit_price)}} VNĐ</span>
												
												@else
												<span class="flash-del">{{number_format($thongtin->unit_price)}} VNĐ</span>
												<span class="flash-sale">{{number_format($thongtin->promotion_price)}} VNĐ</span>
												@endif
												
							</p>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{$thongtin->description}}</p>
						</div>
						<div class="space20">&nbsp;</div>

						<p>Số lượng:</p>
						<div class="single-item-options">
							
							<select class="wc-select" name="color">
								<option>Số lượng</option>
								
							</select>
							<a class="add-to-cart" href="add-to-cart/{{$thongtin->id}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô tả</a></li>
							
					</ul>

					<div class="panel" id="tab-description">
						<p>{{$thongtin->description}}</p>
					</div>
					
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản phẩm liên quan</h4>

					<div class="row">
						@foreach($sanphamtt as $tt)
						<div class="col-sm-4">
							<div class="single-item">
								@if($tt->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
								<div class="single-item-header">
									<a href="chi-tiet-san-pham/{{$tt->id}}"><img src="source/image/product/{{$tt->image}}" height="200" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$tt->name}}</p>
									<p class="single-item-price">
										@if($tt->promotion_price == 0)
												<span class="flash-sale">{{number_format($tt->unit_price)}} VNĐ</span>
												
												@else
												<span class="flash-del">{{number_format($tt->unit_price)}} VNĐ</span>
												<span class="flash-sale">{{number_format($tt->promotion_price)}} VNĐ</span>
												@endif
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="add-to-cart/{{$tt->id}}"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">{{$sanphamtt->links()}}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> 
@endsection