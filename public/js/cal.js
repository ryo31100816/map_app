cal(distance);

function cal(distance){
    const km = Math.floor(distance / 1000);
    const cost = 50;
    $('#distance').html(km + 'km');
    $('#cost').html(cost + '円');
    $('#total').html((km * cost) + '円');
}