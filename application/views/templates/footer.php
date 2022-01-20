</body>
<script>
    function deleteImage(id) {
        var result = confirm("Are you sure to delete?");
        if (result) {
            $.post("<?php echo base_url('manage_gallery/deleteImage'); ?>", {
                id: id
            }, function(resp) {
                if (resp == 'ok') {
                    $('#imgb_' + id).remove();
                    alert('The image has been removed from the gallery');
                } else {
                    alert('Some problem occurred, please try again.');
                }
            });
        }
    }
</script>

<footer class="text-muted">
    <div class="container">
        <p class="float-center">
        </p>
        <p>Album Gallery &copy; By: Sinergi Inti Solusi</p>
    </div>
</footer>

</html>