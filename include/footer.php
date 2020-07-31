<style>
.footerStyles{
    background-color:#343a40; 
    color:white; 
    margin-top:1px; 
    padding:1em 5em;
}

@media only screen and (max-width:500px) and (min-width:100px) {
    .footerStyles{
        padding:1em 1em;
    }
    footer ul{
        margin-right: 60px;
    }
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"> </script> -->
<hr style="background-color:#343a40; margin-bottom:0px;"/>
<footer class="footerStyles">  
    <!-- <br/> -->
    <!-- <p>Copyright &copy; 2020</p> -->
    <hr style="background-color:white; width:100%; margin-bottom:0px;"/>
    <div class="col-12 row " style="margin-top:2em; width:auto;" >
        <div class="col-sm-4">
         <h5>More</h5>
        <ul class="footer-list ">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">FAQS</a></li>
            <li><a href="#">Contact US</a></li>
        </ul>
        </div>
        <div class="col-sm-4">
        <h5>Popular</h5>
        <ul class="footer-list " >
            <li><a href="#">JavaScript</a></li>
            <li><a href="#">PHP</a></li>
            <li><a href="#">MySQL</a></li>
            <li><a href="#">Python</a></li>
        </ul>
        </div>
        <div class="col-sm-4">
        <h5>Office Address</h5>
        <address>
            Polo View,
            Third Floor,<br/>
            Lalchowk Srinagar,<br/>
            190001 
        </address> 
        </div>
    </div>
        
    <p id="cpyrit"> Copyright © 2020</p>
               <!-- <a id="backtotop" style="color:white;" href="#" title="Go back to Top"><center><i class="fa fa-arrow-alt-circle-up fa-2x"></i></a> -->
</footer>

<?php 
    mysqli_close($conn);
?>
</body>
<script>
$(window).bind("resize", function () {
    if ($(this).width() < 500) {
        if($('div').hasClass('col-sm-4')){
            $('div').removeClass('col-sm-4');
        }  
    } 
}).trigger('resize');

</script>
</html>
