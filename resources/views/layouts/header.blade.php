<div class="contaier">
    <div class="row justify-content-between">
        <div class="col-md-4 title">
            <a href={{ route('member.list') }}>{{ $title }}</a>
        </div>
        <div class="col-md-4">
            <div class="row text-center text-md-right">
                <p>ユーザー： {{ Auth::user()->name }}</p>
                <p>最終ログイン： {{ Auth::user()->last_login_at }}</p>
            </div>
        </div>
    </div>
</div>