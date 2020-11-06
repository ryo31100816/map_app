<div class="contaier">
    <div class="row ">
        <div class="col-md-6 title">
            <a href={{ route('member.list') }}>{{ $title }}</a>
        </div>
        <div class="row col-md-5 justify-content-around align-items-center">
            <div><a href={{ route('home') }} class="btn btn-primary">Home</a></div>
            <p>ユーザー： {{ Auth::user()->name }}</p>
            <p>最終ログイン： {{ Auth::user()->last_login_at }}</p>
        </div>
    </div>
</div>