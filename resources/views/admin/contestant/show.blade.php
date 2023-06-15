@include('admin.inc.head')
<style>
* {
    margin: 0;
    padding: 0
}

body {
    background-color: #000
}

.card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</style>

        @include('admin.inc.nav')
            <!-- Sale & Revenue Start -->
 
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
    <div class="card p-4 bg-secondary"> <div class=" image d-flex flex-column justify-content-center align-items-center"> 
        <button class="btn btn-secondary"> <img src="{{ url('public/contestants/'.$contestant->contestant_image) }}" height="100" width="100" /></button> 
        <span class="name mt-3">{{$contestant->contestant_name}}</span>
        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
            <span class="follow">CANDIDATE NUMBER</span></div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
            <span class="idd1">{{$contestant_num}}</span> <span><i class="fa fa-copy"></i></span> </div> 
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                <span class="follow">{{$contest->contest_name}}</span> </div> 
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                <span class="name">{{$contestant->vote_count}}</span>&nbsp;Vote(s)</div> 
                <div class=" d-flex mt-2"> <button class="btn1 btn-dark"> <a href="/admin/contestant/edit/{{$contestant->id}}">Edit Contestant</a></button> </div> 
                <div class="mt-3 text-white"> <span>{{$contestant->about_contestant}}</span> </div>
                  <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                    <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> 
                    <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div> 
                    <div class=" px-2 rounded mt-4 date "> <span class="join">{{$contestant->created_at}}</span> </div> </div> </div>
</div>

                    </div>




        @include('admin.inc.footer')