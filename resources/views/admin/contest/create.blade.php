@include('admin.inc.head')


        @include('admin.inc.nav')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">


            

<center>


                    <form method="POST"  enctype="multipart/form-data" action="{{ route('Contest Store') }}">
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
                                <input type="text" name="contest_name" class="form-control" id="floatingInput" placeholder="contest name" required>
                                <label for="floatingInput">Contest Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email"  name="contact_email" class="form-control" id="floatingInput" placeholder="email address" required>
                                <label for="floatingInput">Contact Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="phone"  name="contact_num" class="form-control" id="floatingInput" placeholder="phone" required>
                                <label for="floatingInput">Contact Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"  name="contest_type"  id="floatingSelect" aria-label="Floating label select example" required>
                                <option selected="">Open this select type</option>
                                <option value="Free">Free</option>
                                    <option value="Paid">Paid</option>
                                </select>
                                <label for="floatingSelect">Contest Type</label>
                            </div>
                            <div class="mb-3">
                            <label for="formFile" class="form-label">Start Date</label>
                            <input type="date"  name="start_date" class="form-control bg-dark" id="birthday" required>
                            </div>
                            <div class="mb-3">
                            <label for="formFile" class="form-label" style="align:left">End Date</label>
                            <input type="date"  name="end_date" class="form-control bg-dark" id="birthday" required>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"  name="vote_price" class="form-control" id="floatingPassword" placeholder="Vote Price">
                                <label for="floatingPassword">Vote Price</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Contest Thumbnail</label>
                                <input class="form-control bg-dark"  name="contest_thumb" type="file" id="formFile" required>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control"  name="contest_decription" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Contest Description</label>
                            </div><br>
                            <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                        </div>
                        
                    </div>

</form>



</center>


                    </div>


        @include('admin.inc.footer')