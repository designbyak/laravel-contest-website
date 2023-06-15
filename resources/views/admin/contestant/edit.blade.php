@include('admin.inc.head')


        @include('admin.inc.nav')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">


            

<center>


                    <form method="POST"  enctype="multipart/form-data" action="{{ url('admin/contestant/update/'.$contestant->id) }}">
                                @csrf
                                @method('PUT')
                                
        <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Contest Upload</h6>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="form-floating mb-3">
                                <input type="text" name="contestant_name" class="form-control" id="floatingInput" value="{{$contestant->contestant_name}}">
                                <label for="floatingInput">Contestant Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"  name="contest"  id="floatingSelect" aria-label="Floating label select example">
                                <option selected="" value="{{$contestant->contest}}">{{$contest_add->contest_name}}</option>
                                @foreach ($contest as $contests)
                                    <option value="{{$contests->id}}">{{$contests->contest_name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Contest</label>
                                </div>
                            <div class="form-floating mb-3">
                                <input type="text"  name="slug" class="form-control" id="floatingInput" value="{{$contestant->slug}}">
                                <label for="floatingInput">Contest Slug</label>
                            </div>
                            <div class="mb-3">
                            <img src="{{ url('public/contestants/'.$contestant->contestant_image) }}" width="50px" height="100px" alt="image" class="img-fluid avatar-md rounded-circle"><br>
                                <label for="formFile" class="form-label">Contest Thumbnail</label>
                                <input class="form-control bg-dark"  name="contestant_image" type="file" id="formFile">
                            </div><div class="form-floating">
                                <textarea class="form-control"  name="about_contestant" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;">{{$contestant->about_contestant}}</textarea>
                                <label for="floatingTextarea">About Contestant</label>
                            </div><br>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                        
                    </div>

</form>



</center>


                    </div>


        @include('admin.inc.footer')