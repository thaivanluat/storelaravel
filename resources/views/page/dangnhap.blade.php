@extends('master')
@section('content')


@if(Auth::check())
	<div class="inner-header">
			<div class="container">
				<div class="pull-left">
					<!-- <h6 class="inner-title">Thông tin tài khoản</h6> -->
				</div>
				<div class="pull-right">
					<div class="beta-breadcrumb">
						<a href="index.html">Home</a> / <span>Thông tin tài khoản</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
	</div>
	<div class="container">
		<div id="content">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Thông tin tài khoản</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email :{{Auth::user()->email}}</label>
							<p></p>
						</div>
						<div class="form-block">
							<label for="email">Tên:{{Auth::user()->full_name}}</label>
							<p></p>
						</div>
						<div class="form-block">
							<label for="email">Địa chỉ:{{Auth::user()->address}}</label>
							<p></p>
						</div>
						<div class="form-block">
							<label for="email">Số điện thoại:{{Auth::user()->phone}}</label>
							<p></p>
						</div>						
					</div>
					<div class="col-sm-3"></div>
				</div>			
		</div> <!-- #content -->
	</div> <!-- .container -->
@else
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div class="container">
		<div id="content">
			
			<form action="{{route('login')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}" >
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('flag'))
						<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng nhập </button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endif


@endsection