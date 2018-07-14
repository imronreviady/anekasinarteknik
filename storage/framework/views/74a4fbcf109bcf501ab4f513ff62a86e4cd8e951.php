<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<?php echo $__env->make('frontend.common.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
            <img src="<?php echo asset('resources/views/frontend/assets/img/dummy/promo-banner.png'); ?>" alt="">
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
        <?php echo $__env->make('frontend.common.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('frontend.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Login modal -->
        <?php echo $__env->make('frontend.common.modalLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- SignUp modal -->
        <?php echo $__env->make('frontend.common.modalSignup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>
<!--End Page page_wrrapper -->
<?php echo $__env->make('frontend.common.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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