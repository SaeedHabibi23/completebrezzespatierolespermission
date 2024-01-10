	
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
                                <h4 class="card-title">Role Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <input type="text" name="name" value="{{ $role->name }}" class="form-control input-default " placeholder="input-default">
                                        </div>
                                    
                                        <div>
                                            <input type="submit" class="btn btn-success" vlaue="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="p-4">
                                <div>
                                    <h3> Role Permission </h3>
                                </div>
                                <div>
                                    @if($role->permissions)
                                        
                                        @foreach($role->permissions as $permission)
                                        <form class="me-5" action="{{ route('admin.roles.permissions.invoke', [$role->id, $permission->id]) }}" method="POST" onsubmit="return confirm('Are You Sure')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-md  mb-3">
                                                {{ $permission->name }}
                                            </button>
                                        </form>
                                        @endforeach
                                
                                 
                                    @endif
                                </div>
                                <form method="POST" action="{{ route('admin.roles.permissions',$role->id)}}">
                                    @csrf
                                    <div class="mb-3">
                                        <select class="form-control" name="permission">
                                            @foreach ($Permissions as $permission)
                                            <option value="{{ $permission->name }}" @if($role->hasPermissionTo($permission->name)) selected @endif> {{ $permission->name }} </option>
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