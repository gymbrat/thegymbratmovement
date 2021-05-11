<?php
ob_start();
// include header.php file
include ('header.php');
?>

<div class="parallax"></div>

 <script>
function myFunction(e) {
  var copyText = e.text;
  document.addEventListener('copy', function(event) {
    event.clipboardData.setData('text/plain', copyText);
    event.preventDefault();
    document.removeEventListener('copy', handler, true);
  }, true);
  document.execCommand('copy');
  alert("Copied: " + copyText);
}
 </script>
<div class="container codes my-5" >
    <h3>Codes & Social Media</h3>
    <!-- Table #1  -->
    <?php foreach($code as $thisCode){?>
        <div class="container card my-5">
            <div class="row ">
                <div class="col-sm-4 text-center">
                    <?=  $thisCode['brand'] ?>
                </div>
                <div class="col-sm-4 text-center my-3 my-sm-0">
                    <a href="<?=  $thisCode['link'] ?>" target="_blank"><?=  $thisCode['link'] ?></a>
                </div>
                <div class="col-sm-4 text-center mt-3">
                    <a href="javascript:void(0)" onclick="myFunction(code<?=  $thisCode['id'] ?>)" id="code<?=  $thisCode['id'] ?>" class="btn btn-gradient" ><?=  $thisCode['code'] ?> <i class="fas fa-copy"></i></a>
                </div>
            </div>
        </div>
    <?php }?>
    <!-- Table #1  -->
</div>

<?php 
include('footer.php')
 ?>

