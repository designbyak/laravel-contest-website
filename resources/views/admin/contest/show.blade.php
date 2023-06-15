@include('admin.inc.head')


        @include('admin.inc.nav')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 p-3 bg-secondary rounded mx-0">
            <!-- end page title -->
            
            <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Contest</h6>
                            <div class="bg-secondary card d-block">
                                    <div class="bg-secondary card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h3 class="">{{$contest->contest_name}} <img src="{{ url('public/Image/'.$contest->contest_thumb) }}" width="50px" height="100px" alt="image" class="img-fluid avatar-md rounded-circle"></h3>
                                            
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="dripicons-dots-3"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="/admin/contest/edit/{{$contest->id}}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                                    <!-- item-->
                                                    <a href="/admin/contest/delete/{{$contest->id}}" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                            <!-- project title-->
                                        </div>
                                        <div class="badge bg-secondary text-light mb-3">Ongoing</div>

                                        <h5>Contest Overview:</h5>

                                        <p class="text-muted mb-2">
                                            {{$contest->contest_decription}}
                                        </p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Start Date</h5>
                                                    <p>{{$contest->start_date}} </small></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>End Date</h5>
                                                    <p>{{$contest->end_date}} </small></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-4">
                                                    <h5>Vote Price</h5>
                                                    <p>₦{{$contest->vote_price}}</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div> <!-- end card-body-->
                                    
                                </div>
</div></div>


                    </div>


        @include('admin.inc.footer')