initialize();

$('#search').click(function(){
    location_search();
});

// 初期表示をDBから取得したデータで設定・・・引数はルーティングデータ
// 住所を入力してクリックしたらその住所でジオコーディングする・・・引数はフォームのアドレス
// 座標でもジオコーディングできるようにするか？