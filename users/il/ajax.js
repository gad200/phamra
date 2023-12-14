$(document).on('submit','#userForm',function(e){
        e.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "wilayasave.php",
        data:$(this).serialize(),
        success: function(data){
      $('#exampleModal').modal('hide');
             
        $('#msg').html(data);
        $('#userForm').find('input').val('');


    }});
});