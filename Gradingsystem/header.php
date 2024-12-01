
        <!--Load Swal-->
        <?php if (isset($success)) { ?>
        <!--This code for injecting success alert-->
        <script>
            setTimeout(function() {
                    Swal.fire("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>
    <?php } ?>
    <?php if (isset($err)) { ?>
        <!--This code for injecting error alert-->
        <script>
            setTimeout(function() {
                Swal.fire("Failed", "<?php echo $err; ?>", "error");
                },
                100);
        </script>
    <?php } ?>
    <?php if (isset($info)) { ?>
        <!--This code for injecting info alert-->
        <script>
            setTimeout(function() {
                Swal.fire("Success", "<?php echo $info; ?>", "info");
                },
                100);
        </script>
    <?php } ?>
    <script>
