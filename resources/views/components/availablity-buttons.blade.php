@foreach ($data as $item)
<label>
    <input
        {{ $item['is_primary'] == true ? 'checked' : '' }}
        class=" radio-input" type="radio"
        name="schedules" onclick="toggleActive(this)"
        value="{{$item['id']}}"
        >
    <span
        class="radio-tile {{ $item['is_primary'] == true ? 'active' : '' }}">
        <span
            class="radio-label">{{ $item['schedule_name'] }}</span>
    </span>
</label>
@endforeach