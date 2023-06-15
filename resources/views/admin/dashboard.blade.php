@include('admin.inc.head')


        @include('admin.inc.nav')



            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Contest</p>
                                <h6 class="mb-0">{{$contest}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Contestant</p>
                                <h6 class="mb-0">{{$contestant}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Votes</p>
                                <h6 class="mb-0">{{$totalvotes}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">₦{{$totalamount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


               <!-- Sale & Revenue Start -->
               <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 p-3 bg-secondary rounded mx-0">
    
   <!-- end page title -->
   @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                            <!-- end col -->        @if(count($earning) == null)
                                                    <div class="card-body">
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <p>No Payment Yet</p>>
                                                        </div>
                                                    </div><!-- end card-body -->
                              

                                                    @else
                                                    
                                                    <div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Payment Votes</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Votes</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                                @foreach ($earning as $earnings)
                                <tr>
                                        <th scope="row">{{$earnings->id}}</th>
                                        <td>{{$earnings->full_name}}</td>
                                        <td>{{$earnings->email}}</td>
                                        <td>₦{{$earnings->amount}}</td>
                                        <td>{{$earnings->numVotes}}</td>
                                        <td>{{$earnings->created_at->diffForHumans();}}</td>
                                        <td><button type="button" class="btn btn-danger rounded-pill m-2"><a href="earnings/delete/{{$earnings->id}}" onclick="return confirm('Are you sure you want to delete')" style="color:white;">Delete</a></button></td>
                                    </tr>
                                    @endforeach
                                                         
                                    </tbody>
            </table>
        </div>
    </div>
</div>
                                                
                                @endif
                               
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



            <!-- Sale & Revenue End -->
            @include('admin.inc.footer')