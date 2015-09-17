@extends('templates.main')

@section('content')
			<h2>Your cart</h2>
		
			<div class="cart">
				<div>
					<span><h4>Product</h4></span><span><h4>Price</h4></span><span><h4>Quantity</h4></span><span><h4>Subtotal</h4></span>
				</div>
				
				@foreach(Cart::contents() as $item)
				<div>
					<span>{{$item->name}}</span>
					<span>{{$item->price}}</span>
					<span>{{$item->quantity}}</span>
					<span>{{$item->price * $item->quantity}}</span>
				</div>
				@endforeach

				<div>
					<span></span><span></span><span><h4>Total</h4></span><span><h4>{{Cart::total()}}</h4></span>
				</div>
			</div>

			<form method="POST" action="">
				<input type="submit" value="Checkout">
			</form>
@stop	

