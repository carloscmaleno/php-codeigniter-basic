<?php
 /**
  * File: footer.php
  *
  * PHP version 5
  *
  * @category File
  * @package  php-codeigniter-base
  * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
  * @date     26/08/15 10:54
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */
?>    

            </div>
        </main>    
        <!-- MAIN CONTENT -->
        
        <!-- FOOTER -->
        <footer class="main_footer">

        </footer>


        <?php
        foreach ($js_files as $js) {
            if (stripos($js, "http") !== false) {
                echo '<script type="text/javascript" src="'.$js.'"></script>';

            } else {
                echo '<script type="text/javascript" src="'.getTemplateJsUrl($js).'"></script>';
            }
        }
        ?>
        <script type="text/javascript">
            var siteurl = '<?php echo site_url()?>';
            var isConnected = <?php echo ($is_logged? 'true' : 'false'); ?>;
            var redirect = '<?php echo $redirect; ?>';
            var ajaxUrl = '<?php echo site_url('ajax')?>';
        </script>

       

    </body>
</html>
