
@extends('layoutboard')
@section('title', 'User Dashboard')
@section('content')                
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">UserDashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-5">
             Welcome, {{$first_name}}
            </div> 
                <div class="text-center mb-5">
                    @if($image)
                    <img src="{{ asset('storage/images/'.$image) }}" class="rounded-circle img-fluid" alt="User Image" style="max-width:  50%;">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" class="rounded-circle img-fluid" alt="User Image" style="max-width:  50%;">
                    @endif
                </div>
                    <ul class="navbar-nav text-center">
                    <li class="nav-item">
                            <a class="nav-link" href="#uploadImageForm" data-bs-toggle="collapse">Upload Profile Picture</a>
                            <form action="{{ route('users.uploadImage', $id) }}" method="POST" enctype="multipart/form-data" class="collapse" id="uploadImageForm">
                                @csrf
                                <input type="file" name="image" class="mb-2">
                                <input type="submit" value="Upload" class="mb-2">
                            </form>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Job Offers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Edit Profile</a>
                        </li>
                    </ul>            
        </div>
        </div>
        <!-- Main Content Area -->
        <div class="col-md-8 col-lg-8 col-sm-12"style="float: none; margin:  0 auto;">
            <!-- Jobs Table -->
            <div id="jobsTable">
                <h2>Jobs</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ $job->name }}</td>
                                <td>{{ $job->company->name }}</td>
                                <td>{{ $job->category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

      


@endsection