	
    @extends('layouts.main')

    @section('content')
		
      <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
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
                <!-- row -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">  Name: {{ $user->name }}  Email: {{ $user->email }} </h4>
                            </div>
                            <div class="card-body">
                           
                            <div class="p-4">
                                <div>
                                    <h3> Roles  </h3>
                                </div>
                                <div>
                                    @if($user->roles)
                                        
                                        @foreach($user->roles as $user_roles)
                                        <form class="me-5" action="{{ route('admin.user.roles.remove', [$user->id, $user_roles->id]) }}" method="POST" onsubmit="return confirm('Are You Sure')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-md  mb-3">
                                                {{ $user_roles->name }}
                                            </button>
                                        </form>
                                        @endforeach
                                
                                 
                                    @endif
                                </div>
                                <form method="POST" action="{{ route('admin.users.role',$user->id)}}">
                                    @csrf
                                    <div class="mb-3">
                                        <select class="form-control" name="role">
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"> {{ $role->name }} </option>
                                            @endforeach
                                        </select>
                                

                                    </div>
                                
                                    <div>
                                        <button type="submit" class="btn btn-success"> Assign </button>
                                    </div>
                                </form>






                                
                        <div class="mt-5">
                            <div>
                                <h3>  Permission </h3>
                            </div>
                            <div>
                                @if($user->permissions)
                                    
                                    @foreach($user->permissions as $permission)
                                    <form class="me-5" action="{{ route('admin.users.permissions.invoke', [$user->id, $permission->id]) }}" method="POST" onsubmit="return confirm('Are You Sure')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-md  mb-3">
                                            {{ $permission->name }}
                                        </button>
                                    </form>
                                    @endforeach
                            
                             
                                @endif
                            </div>
                            <form method="POST" action="{{ route('admin.users.permissions',$user->id)}}">
                                @csrf
                                <div class="mb-3">
                                    <select class="form-control" name="permission">
                                        @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}" @if($user->hasPermissionTo($permission->name)) selected @endif> {{ $permission->name }} </option>
                                        @endforeach
                                    </select>
                            

                                </div>
                            
                                <div>
                                    <button type="submit" class="btn btn-success"> Assign </button>
                                </div>
                            </form>



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