
        <!--JS Files-->
        <script  src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
        <script src="https://vithalreddy.github.io/editable-html-table-js/bootstable.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.jss"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.foundation.min.j"></script>
        <script>

            // ---------Responsive-navbar-active-animation-----------
            function test(){
                var tabsNewAnim = $('#navbarSupportedContent');
                var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
                var activeItemNewAnim = tabsNewAnim.find('.active');
                var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
                var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
                var itemPosNewAnimTop = activeItemNewAnim.position();
                var itemPosNewAnimLeft = activeItemNewAnim.position();
                $(".hori-selector").css({
                    "top":itemPosNewAnimTop.top + "px", 
                    "left":itemPosNewAnimLeft.left + "px",
                    "height": activeWidthNewAnimHeight + "px",
                    "width": activeWidthNewAnimWidth + "px"
                });
                $("#navbarSupportedContent").on("click","li",function(e){
                    $('#navbarSupportedContent ul li').removeClass("active");
                    $(this).addClass('active');
                    var activeWidthNewAnimHeight = $(this).innerHeight();
                    var activeWidthNewAnimWidth = $(this).innerWidth();
                    var itemPosNewAnimTop = $(this).position();
                    var itemPosNewAnimLeft = $(this).position();
                    $(".hori-selector").css({
                    "top":itemPosNewAnimTop.top + "px", 
                    "left":itemPosNewAnimLeft.left + "px",
                    "height": activeWidthNewAnimHeight + "px",
                    "width": activeWidthNewAnimWidth + "px"
                    });
                });
            }
            $(document).ready(function() {
                setTimeout(function(){  }, 3000);
                test();
                $('#example').DataTable();
            } );
        </script>
            </div>
        </section>
    </div>
</body>