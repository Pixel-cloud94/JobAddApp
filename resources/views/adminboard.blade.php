
@extends('layoutboard')
@section('title', 'Admin Dashboard')
@section('content')
        <!-- Offcanvas -->     
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">AdminDashboard</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="text-center mb-5">
             Welcome, {{$first_name}}
            </div>  
                <div class="text-center mb-5">
                    <img src="{{ asset('storage/images/'.$image) }}" alt="User Image" class="rounded-circle img-fluid" style="max-width:   50%;">
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
                            <a class="nav-link" href="#">Edit Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Edit Profile</a>
                        </li>
                    </ul>            
        </div>
        </div>
        <!-- Main Content Area -->
        <div class="col-md-8 col-lg-8 col-sm-12"style="float: none; margin:   0 auto;">
        <form action="{{ route('users.deleteSelectedUser') }}" method="POST">
                    @csrf
                    @method('DELETE')
               <h2>Users</h2>
               <div class="input-group mb-3">
                 <input type="search" class="form-control" id="usersSearch" placeholder="Search users" aria-label="Search users" onkeyup="searchTable('usersSearch', 'usersTable')">
               </div>              
                 <div id="usersTable"style="max-height:   300px; overflow-y: auto;">                               
                    <table class="table table-hover">                        
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($users as $user)
                                <tr data-user='{"id":"{{ $user->id }}", "first_name":"{{ $user->first_name }}", "last_name":"{{ $user->last_name }}", "username":"{{ $user->username }}", "email":"{{ $user->email }}", "isAdmin":"{{ $user->isAdmin }}"}'>
                                    <td>
                                        <input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}">
                                    </td>
                                    <td>
                                        @if($user->image)
                                            <img src="{{ asset('storage/images/'.$user->image) }}" alt="User Image" class="rounded-circle" style="width:   50px; height:   50px;">
                                        @else
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" class="rounded-circle" alt="User Image" style="width:   50px; height:   50px;">
                                        @endif
                                    </td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                    <div class="mt-3">
                        <button type="submit" id="deleteUsersButton" class="btn btn-dark">Delete Selected Users</button>
                        <button type="button" id="updateUsersButton" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updateUserModal">
                            Edit Selected User
                        </button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addUserModal">
                         Add User
                        </button>
                    </div>  
            </form>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">First Name</span>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Last Name</span>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Username</span>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Email</span>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Password</span>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Image</span>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Is Admin</span>
                            <select class="form-select" name="isAdmin">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="hidden" name="from_admin" value="1">
                            <button type="submit" class="btn btn-dark">Save changes</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
                 <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('updateusersPost.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user_id" id="userId">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">First Name</span>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Last Name</span>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Username</span>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email</span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Image</span>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Is Admin</span>
                                        <select class="form-select" id="isAdmin" name="isAdmin">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Update User</button>
                                    </div>
                                </form>
                            </div>                   
                </div>
            </div>
            </div>
            <form action="{{ route('jobs.deleteSelectedJob') }}" method="POST">
                    @csrf
                    @method('DELETE')
               <h2>Jobs</h2>
                <div class="input-group mb-3">
                    <input type="search" class="form-control" id="jobsSearch" placeholder="Search jobs" aria-label="Search jobs" onkeyup="searchTable('jobsSearch', 'jobsTable')">
                </div>             
                 <div id="jobsTable"style="max-height:   300px; overflow-y: auto;">                               
                    <table class="table table-hover rounded">                        
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Company</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($jobs as $job)
                            <tr data-job='{"id":"{{ $job->id }}", "name":"{{ $job->name }}", "company":"{{ $job->company->name }}", "category":"{{ $job->category->name }}"}'>
                                <td>
                                <input type="checkbox" class="job-checkbox" name="jobs[]" value="{{ $job->id }}">
                                </td>
                                    </td>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->name }}</td>
                                    <td>{{ $job->company->name }}</td>
                                    <td>{{ $job->category->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
                    <div class="mt-3">
                        <button type="submit" id="deleteJobsButton" class="btn btn-dark">Delete Selected Jobs</button>
                        <button type="button" id="updateSelectedJobButton" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updateJobModal">
                         Edit Selected Job
                        </button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addJobModal">
                            Add Job
                        </button>
                    </div>
                </form>
                <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Your form for adding a job goes here -->
                                <form action="{{ route('addjobs.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Add form fields here -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Title</span>
                                        <input type="text" class="form-control" name="name" placeholder="Title">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Company</span>
                                        <select class="form-control" name="company_id">
                                            <option selected>Select Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Category</span>
                                        <select class="form-control" name="category_id">
                                            <option selected>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateJobModal" tabindex="-1" aria-labelledby="updateJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateJobModalLabel">Update Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('updatejobs.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="job_id" id="id">
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Title</span>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Title" required>
                                    </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Company</span>
                                            <select class="form-control" name="company_id">
                                                <option selected>Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Category</span>
                                            <select class="form-control" name="category_id">
                                                <option selected>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Update Job</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection




<script>
        function searchTable(inputId, tableId) {
        var input, filter, table, tr, td, i, j;
        input = document.getElementById(inputId);
        filter = input.value.toUpperCase();
        table = document.getElementById(tableId);
        tr = table.getElementsByTagName("tr");

        for (i =  0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j =  0; j < td.length; j++) {
            let tdata = td[j];
            if (tdata) {
                if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                break;
                } else {
                tr[i].style.display = "none";
                }
            }
            }
        }
        }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
document.getElementById('updateSelectedJobButton').addEventListener('click', function() {
    
    var selectedJobs = document.querySelectorAll('.job-checkbox:checked');

    
    if (selectedJobs.length ===  0) {
        alert('Please select a job to update.');
        return;
    }

    
    if (selectedJobs.length >  1) {
        alert('You can only update one job at a time.');
        return;
    }

    
    var selectedJob = selectedJobs[0].closest('tr').dataset.job;

    
    var jobDetails = JSON.parse(selectedJob);

    
    document.getElementById('id').value = jobDetails.id;
    document.getElementById('name').value = jobDetails.name;
    
    
    var companySelect = document.querySelector('select[name="company"]');
    var categorySelect = document.querySelector('select[name="category"]');
    companySelect.value = jobDetails.company;
    categorySelect.value = jobDetails.category;

    
    var myModal = new bootstrap.Modal(document.getElementById('updateJobModal'));
    myModal.show();
});
});

</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('updateUsersButton').addEventListener('click', function() {
        
        var selectedUsers = document.querySelectorAll('.user-checkbox:checked');

        if (selectedUsers.length ===  0) {
            alert('Please select a user to update.');
            return;
        }

        if (selectedUsers.length >  1) {
            alert('You can only update one user at a time.');
            return;
        }

        var selectedUser = selectedUsers[0].closest('tr').dataset.user;

        var userDetails = JSON.parse(selectedUser);

        document.getElementById('userId').value = userDetails.id;
        document.getElementById('first_name').value = userDetails.first_name;
        document.getElementById('last_name').value = userDetails.last_name;
        document.getElementById('username').value = userDetails.username;
        document.getElementById('email').value = userDetails.email;
        document.getElementById('isAdmin').value = userDetails.isAdmin;
        

        var updateUserModal = new bootstrap.Modal(document.getElementById('updateUserModal'));
        updateUserModal.show();
    });
});


</script>