	
    @extends('layouts.main')

    @section('content')
		
       <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				 
                <!-- row -->
                  
             <div class="row">
                @if(session('status'))
                          <div class="alert alert-success col-12" rol="alert" id="CanceldText" style="display:flex; justify-content: space-between;">
                              {{session('status')}}
                              <button class="btn-close me-auto btn btn-danger" onclick="CancelFunction()" id="CancelAlert" type="button" data-bs-dismiss="alert"> X </button>
                          </div>
                        
                          @elseif(session('error'))
                          <div class="alert alert-danger text-center" rol="alert">
                              {{session('error')}}
                          </div>
                          @endif
                          </div>


                <div class="row">
                   
					<div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 mb-2">
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"> Create Role </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Roles </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                              
                                                <th><strong>Name</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong> Action </strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)                                                
                                            <tr>
                                                
                                                <td><strong>{{$user->name}}</strong></td>
                                                <td><strong>{{$user->email}}</strong></td>
                                                <td>
													<div class="d-flex">
                                                        <a href="{{ route('admin.user.show', $user->id) }}"  class="btn btn-primary shadow btn-sm me-1">Roles</a>
                                                        <a href=""  class="btn btn-primary shadow btn-sm me-1">Permissions</a>

                                                        <form class="me-5" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are You Sure')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger shadow btn-sm ">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    
												</td>
                                            </tr>
                                            @endforeach
											  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					 
                  
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection