<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('frontend.common.meta')

<body>
    <!-- Pre loader -->
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="l-s-2 blink">LOADING</div>
        </div>
    </div>

    <div id="app" class="paper-loading">

        <div class="btn-fixed-top-left">
            <a href="documentations.html" class="btn-fab  btn-primary shadow1">
                <i class="icon icon-clipboard-list"></i>
            </a>
        </div>

        <div class="promotionsBar green responsive">
            <img src="{!! asset('resources/views/frontend/assets/img/dummy/promo-banner.png') !!}" alt="">
            <a href="#" class="gtco-nav-toggle gtco-nav-white active closePromotions"><i></i></a>
        </div>

        <div class="header-top hide-for-small-down">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-7">
                        <ul class="top-nav">
                            <li><a href="#">Buyer Protection</a></li>
                            <li class="parent"><a href="#">Help</a>
                                <ul>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Open a Ticket</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Download Mobile App</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <ul class="top-nav text-right">
                            <li><a href="#"><i class="icon icon-exchange"></i>Compare list</a></li>
                            <li><a href="#"><i class="icon icon-heart"></i> Wishlist</a></li>
                            <li><a href="#"><i class="icon icon-user"></i>Login</a></li>
                            <li><a href="#"><i class="icon icon-lock"></i>Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--top header-->
        @include('frontend.common.menu')

        @yield('content')

        @include('frontend.common.footer')

        <!-- Login modal -->
        @include('frontend.common.modalLogin')

        <!-- SignUp modal -->
        @include('frontend.common.modalSignup')

</div>
<!--End Page page_wrrapper -->
@include('frontend.common.scripts')

<script src="//unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>

</body>
</html>