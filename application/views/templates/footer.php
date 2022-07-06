<script type="text/javascript">
    $(.cancelx).ready(function() {
        swal({
            title: "Are you sure!",
            text: "Do you really want to remove user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Yaa! User successfully deleted!", {
                    icon: "success",
                });
            } else {
                swal("User not deleted your user is safe!", {
                    icon: "error",
                });
            }
        });
    });
</script>

</body>

</html>