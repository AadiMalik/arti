@extends('layouts.app')
@section('content')
@section('style')
    <style>
        .main-head {
	background: #0D1440;
	box-shadow: 0px 1px 10px -6px rgba(0, 0, 0, .15);
	padding: 1rem;
	margin-bottom: 0;
	margin-top: 5rem;
	color: #fff;
	font-weight: 500;
	text-transform: uppercase;
	border-radius: 4px;
	font-size: 16px;
}

.pricing-table {
	background: #fff;
	box-shadow: 0px 1px 10px 0px rgba(0, 0, 0, .15);
	padding: 2rem;
	border-radius: 4px;
	transition: .3s;
}

.pricing-table:hover {
	box-shadow: 0px 1px 10px 4px rgba(0, 0, 0, .15);
}

.pricing-table .pricing-label {
	border-radius: 2px;
	padding: .25rem .5rem;
	margin-bottom: 1rem;
	display: inline-block;
	font-size: 12px;
	font-weight: 500;
}

.pricing-table h2 {
	color: #3b3b3b;
	font-size: 24px;
	font-weight: 500;
}

.pricing-table h5 {
	color: #B3B3B3;
	font-size: 14px;
	font-weight: 400;
}

.pricing-table .pricing-features {
	margin-top: 2rem;
}

.pricing-table .pricing-features .feature {
	font-size: 14px;
	margin: .5rem 0;
	color: #B3B3B3;
}

.pricing-table .pricing-features .feature span {
	display: inline-block;
	float: right;
	color: #3b3b3b;
	font-weight: 500;
}

.pricing-table 	.price-tag {
	margin-top: 2rem;
	text-align: center;
	font-weight: 500;
}

.pricing-table .price-tag .symbol {
	font-size: 24px;
}

.pricing-table .price-tag .amount {
	letter-spacing: -2px;
	font-size: 64px;
}

.pricing-table .price-tag .after {
	color: #3b3b3b;
	font-weight: 500;
}

.pricing-table .price-button {
	display: block;
	color: #fff;
	margin-top: 2rem;
	padding: .75rem;
	border-radius: 2px;
	text-align: center;
	font-weight: 500;
	transition: .3s;
}

.pricing-table .price-button:hover {
	text-decoration: none;
}

.purple .pricing-label {
	background: #cad2ff;
	color: #627afe;
}

.purple .price-tag {
	color: #627afe;
}

.purple .price-button {
	background: #627afe;
}

.purple .price-button:hover {
	background: #546dfe;
}

.turquoise .pricing-label {
	background: #b9edee;
	color: #44cdd2;
}

.turquoise .price-tag {
	color: #44cdd2;
}

.turquoise .price-button {
	background: #44cdd2;
}

.turquoise .price-button:hover {
	background: #2dbcc4;
}

.red .pricing-label {
	background: #ffc4c4;
	color: #ff5e5e;
}

.red .price-tag {
	color: #ff5e5e;
}

.red .price-button {
	background: #ff5e5e;
}

.red .price-button:hover {
	background: #f23c3c;
}
    </style>
@endsection
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Price Table</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="demo">
    <div class="container">
        <div class="row">
           <!-- Purple Table -->
           <div class="col-md-4">
              <div class="pricing-table purple">
                 <!-- Table Head -->
                 <div class="pricing-label">Fixed Price</div>
                 <h2>BasicPack 2020</h2>
                 <h5>Made for starters</h5>
                 <!-- Features -->
                 <div class="pricing-features">
                    <div class="feature">Bandwith<span>50 GB</span></div>
                    <div class="feature">Add-On Domains<span>10</span></div>
                    <div class="feature">SSD Storage<span>250 GB</span></div>
                    <div class="feature">Mail Adresses<span>25</span></div>
                    <div class="feature">Support<span>Only Mail</span></div>
                 </div>
                 <!-- Price -->
                 <div class="price-tag">
                    <span class="symbol">$</span>
                    <span class="amount">7.99</span>
                    <span class="after">/month</span>
                 </div>
                 <!-- Button -->
                 <a class="price-button" href="#">Get Started</a>
              </div>
           </div>
           <!-- Turquoise Table -->
           <div class="col-md-4">
              <div class="pricing-table turquoise">
                 <!-- Table Head -->
                 <div class="pricing-label">Fixed Price</div>
                 <h2>ExtendedPack 2020</h2>
                 <h5>Made for experienced users</h5>
                 <!-- Features -->
                 <div class="pricing-features">
                    <div class="feature">Bandwith<span>150 GB</span></div>
                    <div class="feature">Add-On Domains<span>25</span></div>
                    <div class="feature">SSD Storage<span>500 GB</span></div>
                    <div class="feature">Mail Adresses<span>50</span></div>
                    <div class="feature">Support<span>Mail/Phone</span></div>
                 </div>
                 <!-- Price -->
                 <div class="price-tag">
                    <span class="symbol">$</span>
                    <span class="amount">9.99</span>
                    <span class="after">/month</span>
                 </div>
                 <!-- Button -->
                 <a class="price-button" href="#">Get Started</a>
              </div>
           </div>
           <!-- Red Table -->
           <div class="col-md-4">
              <div class="pricing-table red">
                 <!-- Table Head -->
                 <div class="pricing-label">Fixed Price</div>
                 <h2>ProsPack 2020</h2>
                 <h5>Made for professionals/agencies</h5>
                 <!-- Features -->
                 <div class="pricing-features">
                    <div class="feature">Bandwith<span>250 GB</span></div>
                    <div class="feature">Add-On Domains<span>50</span></div>
                    <div class="feature">SSD Storage<span>1 TB</span></div>
                    <div class="feature">Mail Adresses<span>75</span></div>
                    <div class="feature">Support<span>7/24</span></div>
                 </div>
                 <!-- Price -->
                 <div class="price-tag">
                    <span class="symbol">$</span>
                    <span class="amount">12.99</span>
                    <span class="after">/month</span>
                 </div>
                 <!-- Button -->
                 <a class="price-button" href="#">Get Started</a>
              </div>
           </div>
        </div>
     </div>
</div>
@endsection
