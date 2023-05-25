<script>
    function generateData() {
        $.ajax({
            url: "/app/includes/generate-data.php",
            type: "POST",
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
</script>
