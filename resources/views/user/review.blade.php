

    @include('user.header')


    <div style="">

      <nav class="navbar navbar-expand-lg" style="background-color: black" >
        <div class="container" >
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                          <a class="nav-link" href="{{ url('showCart') }}"><i class="fa fa-shopping-cart"></i></a>
                      </li>
                    <x-app-layout>

                    </x-app-layout>
                    @else
                      <li> <a href="{{ route('login') }}" class="nav-link">Log in</a> </li>

                        @if (Route::has('register'))
                           <li> <a href="{{ route('register') }}" class="nav-link">Register</a> </li>
                        @endif
                    @endauth
                </div>
            @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>

</div>


<div style="width: 100%;height: 100vh; padding:20px">
    <div style="width: 100%; padding:20px; height: auto; background-color: rgb(229, 229, 216);  display: flex; justify-content: center; align-items: center;">
    <div style="width: 25%; height: auto;padding:20px; background-color: rgb(209, 201, 201); display: flex; justify-content: start ; ">
        <div class="card" style="width: 20rem; height: auto; border: solid whte; padding:10px; background-color: #c3b6b6" >
            <img style="width: 80%;margin: auto; border-radius: 10px"   class="card-img-top" src="{{ str_replace(public_path().'',"",$product->img) }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="font-weight: bold; font-size: 24px"></h5>
              <p style="font-weight: bold; font-size: 20px" class="card-text"></p>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus sed ad aliquid earum tempore officia id, doloremque inventore minima cupiditate et, animi necessitatibus nisi assumenda, ipsum sint quisquam. Esse, ex.</p>
              <a href="{{ url('/redirect') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
    </div>
    <div style="width: 35%; height: auto;  display: flex; justify-content: center;padding: 20px ; margin-left: 5px; margin-right: 5px;  background-color: rgb(206, 206, 213);">
        <div class="stars" style="width:100%; height: auto; background-color: rgb(212, 205, 205);padding: 20px">
            <form method="POST" action="{{ url("review/$product->id") }}">
                @csrf
                <div style="width: 100%; height: auto; background-color: #c9c5d0;padding: 20px">
            <h1 style="font-size: 24px; font-weight: bold;margin-bottom: 10px">Comment</h1>
           <textarea style="width: 100%; height: 100px; border-radius:10px" name="comment" placeholder="Comment"> </textarea>
        </div>
        <div style="width: 100%; height:auto;">
                <input class="star star-5" value="1" id="star-5" type="radio" name="star"/>

                <label class="star star-5"  for="star-5"></label>

                <input class="star star-4" value="2"  id="star-4" type="radio" name="star"/>

                <label class="star star-4"   for="star-4"></label>

                <input class="star star-3" value="3"  id="star-3" type="radio" name="star"/>

                <label class="star star-3"   for="star-3"></label>

                <input class="star star-2" value="4"  id="star-2" type="radio" name="star"/>

                <label class="star star-2"   for="star-2"></label>

                <input class="star star-1" value="5"  id="star-1" type="radio" name="star"/>

                <label class="star star-1"   for="star-1"></label>

    </div>
    <div style="margin: 20px">
        <button class="btn btn-success active">Submit</button>
    </div>

              </form>
        </div>

    </div>

</div>
<div style="width: 600px; height: auto;background-color:red; margin: auto ">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner" style="background-color: rgb(211, 220, 211);padding: 15px">


            @foreach($review as $key => $slider)
            <div style="" class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <p style="font-size: 18px; font-weight:bold ;color: black;">{{ $slider->comment }}</p>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


@include('user.footer')
