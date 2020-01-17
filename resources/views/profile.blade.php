@extends('layout')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>Профиль пользователя</h3></div>
        
        <div class="card-body">          
            
            <form action="/editprofile" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}  
                <div class="row">			
				    <!--
                    <div class="col-md-8"> 
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="">                                                                      
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" name="email" id="exampleFormControlInput1" value="">                            
                        </div>
                    -->
                   
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Аватар</label>
                            <input type="file" class="form-control" id="image" name="image" id="exampleFormControlInput1">						
                        </div>
                    </div>
					@foreach($imageInView as $image)
                    <div class="col-md-4">                        
                            <img src="{{$image->img}}" alt="" class="img-fluid">                        
                            <a href="/show/{{$image->id}}" class="btn btn-success">Show</a>
                            <a href="/edit/{{$image->id}}" class="btn btn-warning">Edit</a>   
                            <a href="/delete/{{$image->id}}" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
                    </div>
                    @endforeach
						
                    <div class="col-md-12">
                        <button class="btn btn-warning">Edit profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header"><h3>Безопасность</h3></div>

        <div class="card-body">           

            <form action="/change_password" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Current password</label>
                            <input type="password" name="current_password" class="form-control" id="exampleFormControlInput1">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">New password</label>
                            <input type="password" name="new_password" class="form-control" id="exampleFormControlInput1">                
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                        </div>

                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection