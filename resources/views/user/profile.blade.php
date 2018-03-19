@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>User Profile</h1>
			<hr>
			<h2>My Orderes</h2>
			@foreach($orders as $order)
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="list-group">
							@foreach($order->cart->items as $item)
								<?php $user = DB::table('products')->where('title',$item['item']['title'] )->first();?>
								<li class="list-group-item">
									<span class="badge">Rs.{{ $item['price'] }}</span>
									<div class="row">
										<div class="col-xs-6 col-md-3">
											<a href="#" class="thumbnail">
												<img src="<?php echo $user->imagePath ?>" alt="<?php echo $user->title ?>">
											</a>
										</div>
										<div class="row" style="margin-top: 9%;font-family: 'Adobe Ming Std L'; font-size: 170%;">{{ $item['item']['title'] }} | {{ $item['qty'] }} units</div>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="footer" style="margin-left: 3%;margin-bottom: 1%"><i>On <i class="fa fa-calendar" aria-hidden="true"></i>  {{ $order['created_at']->format('d.m.Y') }}</i></div>
					<div class="panel-footer">
						<strong>Total Price: Rs.{{ $order->cart->totalPrice }}</strong>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection