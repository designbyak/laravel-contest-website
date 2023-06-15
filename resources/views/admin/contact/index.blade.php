@include('admin.inc.head')


        @include('admin.inc.nav')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 p-3 bg-secondary rounded mx-0">
    
   <!-- end page title -->
   @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                            <!-- end col -->        @if(count($contact) == null)
                                                    <div class="card-body">
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <p>No Contacts Yet</p>>
                                                        </div>
                                                    </div><!-- end card-body -->
                              

                                                    @else
                                                    
                                                    <div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Contact Messages</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                                @foreach ($contact as $contacts)
                                <tr>
                                        <th scope="row">{{$contacts->id}}</th>
                                        <td>{{$contacts->full_name}}</td>
                                        <td>{{$contacts->email}}</td>
                                        <td>{{$contacts->subject}}</td>
                                        <td>{{$contacts->phone}}</td>
                                        <td>{{$contacts->message}}</td>
                                        <td>{{$contacts->created_at->diffForHumans();}}</td>
                                        <td><button type="button" class="btn btn-danger rounded-pill m-2"><a href="contact/delete/{{$contacts->id}}" onclick="return confirm('Are you sure you want to delete')" style="color:white;">Delete</a></button></td>
                                    </tr>
                                    @endforeach
                                                         
                                    </tbody>
            </table>
        </div>
    </div>
</div>
                                                
                                @endif
                               
                    </div>
                    {{$contact->links()}}
                    </div>

        @include('admin.inc.footer')