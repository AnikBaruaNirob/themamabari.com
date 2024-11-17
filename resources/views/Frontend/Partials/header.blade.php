
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('view.cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{session()->has('basket') ? count(session()->get('basket')) : 0}}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{Route('Home')}}">Home</a></li>
                <li><a href="{{route('frontend.products')}}">All Products</a></li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@themamabari.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@themamabari.com</li>
                                <li>Free Shipping for all Order of 4000 BDT</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                          
                        @guest('customerGuard')
    <!-- Person icon with Login -->
    <a href="{{route('customer.login')}}" class="" data-toggle="modal" data-target="#loginModal">
    <i class="fa fa-user"></i>&nbsp;Login
    </a>

    <!-- Person icon with Register -->
    <a href="" class="" data-toggle="modal" data-target="#exampleModal">
    &nbsp &nbsp <i class="fa fa-user"></i>&nbsp;Register
    </a>
@endguest


            @auth('customerGuard')
            
              <!-- Button trigger modal -->
              <span>
    <a href="{{route('customer.profile')}}" style="color: black;">
        {{ auth('customerGuard')->user()->Fullname }}
    </a>
    
</span>
                       

              <!-- Button trigger modal -->
              &nbsp &nbsp
               <a href="{{route('Frontend.logout')}}" class="" > Logout
              </a>
            
            @endauth
               
             </div>
                    </div>
                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar As a New Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('customer.registration')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div>
            <label for="">Enter your First Name:</label>
            <input required type="text" name="customer_firstname" placeholder="Enter your First Name" class="form-control">
          </div>

          <div>
            <label for="">Enter your Last Name:</label>
            <input required type="text" name="customer_lastname" placeholder="Enter your Last Name" class="form-control">
          </div>

          <div>
            <label for="">Enter your email:</label>
            <input required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>


          <div>
            <label for="">Retype your password:</label>
            <input required type="password" name="password_confirmation" placeholder="Retype your password" class="form-control">
          </div>

          <div>
            <label for="">Enter your Mobile Number:</label>
            <input required type="text" name="mobile_number" placeholder="Enter your Mobile number" class="form-control">
          </div>
          <div>
            <label for="">Upload Your Profile Picture :</label>
            <input required type="file" name="image" class="form-control">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Now</button>
        </div>
      </form>


    </div>
  </div>
</div>


<!-- login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Customer Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('customer.login')}}" method="post">
        @csrf
        <div class="modal-body">


          <div>
            <label for="">Enter your email:</label>
            <input required type="email" name="email" placeholder="Enter your email" class="form-control">
          </div>

          <div>
            <label for="">Enter your password:</label>
            <input required type="password" name="password" placeholder="Enter your password" class="form-control">
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Now</button>
        </div>
      </form>


    </div>
  </div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{Route('Home')}}"><img src="img/logo.png" height="50px" width="500px"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{Route('Home')}}">Home</a></li>
                            <li><a href="{{route('frontend.products')}}">All Products</a> </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{route('view.cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{session()->has('basket') ? count(session()->get('basket')) : 0}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
         <!-- Hero Section Begin -->
   <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach($categories as $cat)
                            <li><a href="#">{{$cat->name}}</a></li>
                           @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}">
                                <!-- <div class="hero__search__categories">
                                All Categories
                                    
                                @foreach ($categories as $cat)


                              <li><a href="">{{$cat->name}}</a></li>

                               @endforeach
                                   
                                    <span class="arrow_carrot-down"></span>
                                </div> -->
                                <input name="Search" type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5> 0195220070</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    </header>