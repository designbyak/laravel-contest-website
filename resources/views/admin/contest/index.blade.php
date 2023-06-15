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
  
                        <div class="row">
                            @foreach ($contest as $contests)
                            <div class="col-md-6 col-xl-2" style="padding: 1px;">
                                <!-- Simple card -->
                                <div class="card"  style="padding: 1px">
                                    <img class="card-img-top " height="100px" src="{{ url('public/Image/'.$contests->contest_thumb) }}" alt="{{$contests->contest_name}}">
                                    <div class="card-body" style="padding: 2px">
                                    <a href="contest/{{$contests->id}}"><p class="card-title" style="padding: 5px">{{ Str::limit($contests->contest_name, 15) }}</p></a>
                                            <a href="contest/delete/{{$contests->id}}" class="btn btn-danger" style="padding-left: 10px;" onclick="return confirm('Are you sure you want to delete')">Delete</a>
                                            <a href="contest/edit/{{$contests->id}}" class="btn btn-success" style="padding-left: 10px;">Edit</a>
                                        
                                    </div>
                                </div>
        
                            </div><!-- end col -->
                            @endforeach

                            {{$contest->links()}}
                                 
</div>

</div>

</div>

@include('admin.inc.footer')