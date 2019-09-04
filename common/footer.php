<!-- Bootstrap core JavaScript -->

<script src="<?php echo base_url("js/bootstrap.js") ?>"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url("js/jquery.easing.js") ?>"></script>
<script src="<?php echo base_url("js/jquery.magnific-popup.js") ?>"></script>

<!-- Contact Form JavaScript -->
<script src="<?php echo base_url("js/jqBootstrapValidation.js") ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAfBunnBvsSbHiFYyKz8qEQIwIFUZtPVE&callback=initMap"
async defer></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('js/datatables.js') ?>"></script>
<script src="<?= base_url('js/sb-admin.min.js') ?>"></script>


<script src="<?= base_url('js/horsey.js') ?>"></script>
<script src="<?= base_url('js/bootbox.js') ?>"></script>

<script src="<?= base_url('js/jquery.tabletojson.js') ?>"></script>


<script src="<?= base_url('js/print.min.js') ?>"></script>

<script src="<?= base_url('js/jquery.barfiller.js') ?>"></script>
<script src="<?= base_url('js/horsey.js') ?>"></script>
<script src="<?= base_url('js/Mask.js') ?>"></script>
<script src="<?= base_url('js/ewsRatingStars.jquery.js') ?>" ></script>
<script src="<?= base_url('js/validator.js') ?>" ></script>

  <script src="<?= base_url('js/bootsrapvalidate.js') ?>" integrity="sha384-YmuBsjGRLbP6xIXehXIvB6ftbTViDPXx/goUnD/B7EZ8qDE5JVVuBN+Zws8lzmh7" crossorigin="anonymous"></script>

<script>


    jQuery.fn.ForceNumericOnly =
            function ()
            {
                return this.each(function ()
                {
                    $(this).keydown(function (e)
                    {
                        var key = e.charCode || e.keyCode || 0;
                        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                        // home, end, period, and numpad decimal
                        return (
                                key == 8 ||
                                key == 9 ||
                                key == 13 ||
                                key == 46 ||
                                key == 110 ||
                                key == 190 ||
                                (key >= 35 && key <= 40) ||
                                (key >= 48 && key <= 57) ||
                                (key >= 96 && key <= 105));
                    });
                });
            };

</script>
<!-- Custom scripts for this page-->




</body>

</html>