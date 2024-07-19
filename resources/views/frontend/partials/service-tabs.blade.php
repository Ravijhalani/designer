<div class="custom-tabs" id="tabs">

    @foreach ($service as $key => $item)
        <input id="tab{{++$key}}" type="radio" name="custom-tabs"  />
    @endforeach

    <ul class="nav">
        <input id="toggleTabsSelect" type="checkbox" />
        <label for="toggleTabsSelect"></label>
        @foreach ($service as $key1 => $item1)
        <li class="tab-nav">
            <button title="{{ $item1['title'] }}" child-focus="child-focus">
                <label for="tab{{++$key1}}">{{ $item1['title'] }}</label>
            </button>
        </li>
        @endforeach
    </ul>
</div>
