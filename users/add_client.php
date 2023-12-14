<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your HTML Form -->
<form id="addBtn">
    <div class="mb-3 row">
        <div class="col-md-12">
            <input type="text" name="name" id="addUserField" placeholder="الاسم" class="form-control" style="text-align:center;">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-md-12">
            <input type="text" name="name" id="b" placeholder="الهاتف" class="form-control" style="text-align:center;">
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Add Client</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Listen for form submission
        $('#addBtn').on('submit', function(e) {
            e.preventDefault();
            var username = $('#addUserField').val();
            var b = $('#b').val();

            if (username != '') {
                $.ajax({
                    url: "add_client.php?id=<?php echo $idadm; ?>",
                    type: "post",
                    data: {
                        username: username,
                        b: b
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            // Reload the data table
                            var mytable = $('#example').DataTable();
                            mytable.draw();

                            // Hide the modal
                            $('#addUserModal').modal('hide');
                            location.reload(true);

                            // Display success message
                            $("#successMsg").html('<div class="alert alert-success" role="alert" style="text-align:center;"> Data was added successfully</div>').fadeIn();

                            setTimeout(function() {
                                $('#successMsg').fadeOut('fast');
                            }, 2000);
                        } else {
                            alert('Failed');
                        }
                    }
                });
            } else {
                alert('All information must be filled out');
            }
        });
    });
</script>
