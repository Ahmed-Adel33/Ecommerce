
@include('user.header')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <h4>Best Offer</h4>
        <h2>New Arrivals On Sale</h2>
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <h4>Flash Deals</h4>
        <h2>Get your best products</h2>
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <h4>Last Minute</h4>
        <h2>Grab last minute deals</h2>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Products</h2>
          <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          {{-- <form action="" method="GET">
            <input type="text" name="search" required/>
            <button type="submit">Search</button>
        </form> --}}
        </div>
      </div>
<div style="width: 100%;height: auto;display: flex;">
      @foreach ($product as $value )
      <div style="width: 100%; height: 100vh; background-color: rgb(217, 217, 234);margin: auto;padding: 20px">
        <form method="POST" action="{{ url("addCart/$value->id") }}">
            @csrf
            <div style="width: 100%;height:auto;background-color: rgb(219, 207, 207); padding: 10px">
                <div style="width: 100%; height: auto; padding: 10px">
             <a href="#"><img  src="{{ str_replace(public_path().'',"",$value->img) }}" alt="" style ="width:100%" /></a>
                </div>
                <div style="width: 100%;height: auto;background-color: rgb(183, 183, 176);padding: 20px;margin: auto">
                    <a href="{{ url("review/$value->id") }}"><h2 style="font-weight: bold; margin-bottom: 5px">{{ $value->title }}</h2></a>

                  <h4 style="font-weight: bold;margin-bottom: 5px">price: {{ $value->price }}</h4>

                   <h5 style="font-weight: bold;">Brand: {{ $value->desc }}</h5>

                    <ul class="stars" style="display: flex">
                      <li><i class="fa fa-star" style="color: yellow"></i></li>
                      <li><i class="fa fa-star" style="color: yellow"></i></li>
                      <li><i class="fa fa-star" style="color: yellow"></i></li>
                      <li><i class="fa fa-star" style="color: yellow"></i></li>
                      <li><i class="fa fa-star" style="color: yellow"></i></li>
                    </ul>
                    <span style="font-weight: bold;">Reviews (24)</span>

                  </div>
<div style="width: 100%;height: auto;background-color: rgb(159, 181, 159);margin: auto;padding: 15px">
  <label style="font-weight: bold;">Quantity</label>  <input min="1" max="4" name="quantity" style="width: 100px;height: 30px;" type="number" name="quantity" value="1">
</div>
<div style="width: 100%;height: auto; background-color: gray;padding: 15px;margin: auto"><button type="submit" name="addCart" class="btn btn-danger active">Add To Cart</button></div>



            </div>

        </form>
      </div>
      @endforeach
</div>
{!! $product->links() !!}



<div class="best-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>About Sixteen Clothing</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="left-content">
          <h4>Looking for the best products?</h4>
          <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
          <ul class="featured-list">
            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
            <li><a href="#">Consectetur an adipisicing elit</a></li>
            <li><a href="#">It aquecorporis nulla aspernatur</a></li>
            <li><a href="#">Corporis, omnis doloremque</a></li>
            <li><a href="#">Non cum id reprehenderit</a></li>
          </ul>
          <a href="about.html" class="filled-button">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="right-image">
          <img src="assets/images/feature-image.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</div>


<div class="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inner-content">
          <div class="row">
            <div class="col-md-8">
              <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
            </div>
            <div class="col-md-4">
              <a href="#" class="filled-button">Purchase Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@include('user.footer')
