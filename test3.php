<?php
    
    $myArray = array (
                      0 => array (
                                  0 => 'United States',
                                  1 => '700 Trapp Hill Road',
                                  2 => 'Stowe, Vermont',
                                  3 => 'http://neweddingvenues.com/images/image.png',
                                  4 => '350,000',
                                  5 => 'http://neweddingvenues.com/listing/vermont-venue/'
                                  )
                      );
    ?>
<script type="text/javascript">
var jsArray = <?php echo json_encode($myArray); ?>;
alert (jsArray[0][3]);
</script>