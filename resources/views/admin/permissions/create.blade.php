	
    @extends('layouts.main')

    @section('content')
		
      <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				 
                <!-- row -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Style</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('admin.permission.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control input-default " placeholder="input-default">
                                        </div>
                                    
                                        <div>
                                            <input type="submit" class="btn btn-success" vlaue="create">
                                        </div>
                                    </form>
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