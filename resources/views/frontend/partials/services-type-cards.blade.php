<div class="grid">
    @foreach ($data as $key=>$item)
        <label class="card-2" for="service{{$key}}">
            <input @if(isset($edit['service_category'])) @if($item['code']==$edit['service_category']) checked @endif @else @if($key==0) checked @endif @endif  data-code="{{$item['code']}}" data-id="{{$item['id']}}" id="service{{$key}}" value="{{$item['code']}}" name="service_category" class="serviceModal radio" type="radio" />
            <span class="plan-details">
                <span><strong>{{$item['title']}}</strong></span>
                <span style="font-size: 12px;">{{$item['description']}}</span>
            </span>
        </label>
    @endforeach   
</div>
