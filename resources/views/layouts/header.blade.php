<div class="contaier">
    <div class="row ">
        <div class="col-md-4 title">
            <a href={{ route('member.list') }}>{{ $title }}</a>
        </div>
        <div class="row col-md-7 justify-content-around align-items-center">
                <p>ユーザー： {{ Auth::user()->name }}</p>
                <p>最終ログイン： {{ Auth::user()->last_login_at }}</p>
        </div>
    </div>
</div>