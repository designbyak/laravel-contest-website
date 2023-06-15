@include('admin.inc.head')


        @include('admin.inc.nav')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">


            

<center>


                    <form method="POST"  enctype="multipart/form-data" action="{{ route('Contestant Store') }}">
                                @csrf

        <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Contest Upload</h6>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="form-floating mb-3">
                                <input type="text" name="contestant_name" class="form-control" id="floatingInput" placeholder="contest name"  required>
                                <label for="floatingInput">Contestant Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"  name="contest"  id="floatingSelect" aria-label="Floating label select example">
                                @foreach ($contest as $contests)
                                    <option value="{{$contests->id}}">{{$contests->contest_name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Contest</label>
                                </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Contest Thumbnail</label>
                                <input class="form-control bg-dark"  name="contestant_image" type="file" id="formFile">
                            </div><div class="form-floating">
                                <textarea class="form-control"  name="about_contestant" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">About Contestant</label>
                            </div><br>
                            <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                        </div>
                        
                    </div>

</form>



</center>


                    </div>


        @include('admin.inc.footer')