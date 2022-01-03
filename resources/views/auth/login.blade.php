<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-6 offset-sm-3 mt-5 p-2">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form action="{{url('/login')}}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name= "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                
                <button type="submit" class="form-control btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        
        </div>
        </div>
    </div>
    
</body>
</html>