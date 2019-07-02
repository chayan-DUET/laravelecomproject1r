<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="sarkerripa95@gmail.com">

<?php $count =0; ?>
@foreach($contents as $content)
<?php $count++; ?>

<input type="hidden" name="item_name_{{$count}}" value="{{($content->name)}}">
<input type="hidden" name="item_number_{{$count}}" value="{{($content->id)}}">
<input type="hidden" name="quentity_{{$count}}" value="{{($content->qty)}}">
<input type="hidden" name="amount_{{$count}}" value="{{($content->price)}}">
<input type="hidden" name="shipping_{{$count}}" value="0.30">
<input type="hidden" name="cancel_return" id="cancel_return" value="http://localhost/ecomers/laravelecomproject1r/pament"/>

@endforeach
<!--<a id="paypalLink" href="/classic/setexpresscheckout">
  <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png"/>
</a>
<input type="submit" value="PayPal"> -->
<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" id="paypal-button" style="width: 200px" value="PayPal">
</form>

<script>
paypal.Button.render({
 style: {
 size: 'responsive'
 }
});
</script>