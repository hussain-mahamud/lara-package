<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.all.min.js"></script>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Blog Post System</h1>
                <form class="form-row" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">Details</label>
                        <textarea name="content" row="10" class="form-control" required id="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title"></label>
                        <button type="button" class="btn btn-primary form-control" onclick="storePost()">Submit</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
<script>
    function storePost(){
        let title=$('#title').val();
        let content=$('#content').val();
        if(title=='' || content==''){
            Swal.fire({
                // icon: 'warning',
                title: 'Oops...',
                text: 'Please fill all the fields!'
            })
            return false;
        }
        $.ajax({
            url:"{{route('post.store')}}",
            method:"POST",
            data:{
                title:title,
                content:content,
                _token:"{{csrf_token()}}"
            },
            success:function(data){
                console.log(data)
                if (data.success == false) {
                    // Display SweetAlert2 error message for validation errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please fix the following errors:',
                        html: Object.values(data.errors).join('<br>')
                    });
                } else {
                    // Display SweetAlert2 success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message
                    });
                }
            }
        })
    }
</script>