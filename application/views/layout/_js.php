<!-- jQuery -->
<script src="<?php echo base_url('assets'); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/popper.min.js"></script>
<!-- Bootstrap 4.3 -->
<script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/toastr.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/config_toast.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/all.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/adminlte.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/responsive.bootstrap4.min.js"></script>
<script
    src="https://www.paypal.com/sdk/js?client-id=AcQQUkZFtQZc5C-7KoUTE229g5vCMME05NhJlWsqhFLatqcNw6bJzn22dlPPnvX944sueW1-MkZJyC6f&currency=USD&vault=true"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>
<script src="<?php echo base_url('assets'); ?>/js/config.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/sum.js"></script>

<script type="text/javascript">
        $(document).ready(function() {

            <?php foreach ($listActiveLink as $activeid) {
                echo "$('#" . $activeid . "').addClass('active');";
            }
            ?>
                
        });
    </script>