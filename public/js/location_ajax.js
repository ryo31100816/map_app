$(function(){

  $('#list_search').click(function(event){
      event.preventDefault();
      let word = $('#list_word').val();
      console.log(word);
      let $button = $('#list_search');
      $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '/api/location/ajax',  //Routingのurl
          type: 'POST', //送信方法
          dataType: 'json',
          data: {'word': word},
          timeout: 10000,
          //重複送信を避けるためにボタンを無効化
          beforeSend: function(xhr, settings) {
              $button.attr('disabled', true);
          },
          //完了後ボタンを押せるように
          complete: function(xhr, textStatus) {
              $button.attr('disabled', false);
          }
      })// Ajax通信が成功した時
      .done( function(result, textStatus, jqXHR) {
          console.log('通信成功');
          console.log(result);
          $('select#location_list option').remove();
          result.forEach(function(item, index) {
            var element = document.createElement('option');
            element.value= item.id;
            element.innerHTML = item.name;
            console.log(element);
            $('#location_list').append(element);
        });
      })
      // Ajax通信が失敗した時
      .fail(function(jqXHR, textStatus, errorThrown){
          console.log('通信失敗');
          console.log("jqXHR          : " + jqXHR.status); 
          console.log("textStatus     : " + textStatus);
          console.log("errorThrown    : " + errorThrown.message);
      })
  });
 
});