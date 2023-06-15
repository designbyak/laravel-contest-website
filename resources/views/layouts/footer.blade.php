
   
    <!-- footer-28 block -->
    <footer class="footer-28 py-5">
        <div class="container py-lg-3">
            <center>
        <div class="main-social-footer-28">
                        <ul class="social-icons">
                            <li class="facebook">
                                <a href="#link" title="Facebook">
                                    <span class="fa fa-facebook" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="#link" title="Twitter">
                                    <span class="fa fa-twitter" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="dribbble">
                                <a href="#link" title="Dribbble">
                                    <span class="fa fa-dribbble" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li class="google">
                                <a href="#link" title="Google">
                                    <span class="fa fa-google" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
</center>
            <div class="midd-footer-28 align-center py-4 mt-5">
                <p class="copy-footer-28 text-center"> &copy; {{ now()->year }} Yehiz World Entertainment. All Rights Reserved. Design by <a href="https://instagram.com/iamcertifiedak"
            target="_blank">
            Certified Ak</a></p>
            </div>
        </div>


        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            &#10548;
        </button>
        
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
        <!-- //footer-28 block -->
    </footer>
    <!-- all js scripts and files here -->

    <script src="assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

    <script src="assets/js/jquery-3.3.1.min.js"></script><!-- default jQuery -->
    <script src="assets/js/owl.carousel.js"></script>
    <!-- script for tesimonials carousel slider -->
    <script>
        $(document).ready(function () {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false,
                        loop: false
                    }
                }
            })
        })
    </script>
    <!-- //script for tesimonials carousel slider -->
    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->
    <!-- jQuery-Photo-filter-lightbox-portfolio-plugin -->
    <script src="{{ url('assets/js/jquery-1.7.2.js')}}"></script>
    <script src="{{ url('assets/js/jquery.quicksand.js')}}"></script>
    <script src="{{ url('assets/js/script.js')}}"></script>
    <script src="{{ url('assets/js/jquery.prettyPhoto.js')}}"></script>
    <!-- //jQuery-Photo-filter-lightbox-portfolio-plugin -->
    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>