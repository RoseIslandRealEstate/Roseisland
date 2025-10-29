 <li class="dd-item dd3-item" data-id="{{ $item->id }}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content">
        <label class="fancy-checkbox mb-0">
            <input type="checkbox" class="update_status" data-url="{{ URL::to('to-do-lists/update-status/'.$item->id) }}" name="status" {{ $item->status==1?'checked':'' }}>
            <span>{{ $item->text }} 
                <span class="badge badge-warning">{{ $item->date }}</span>
            </span>
        </label>
    </div>
</li>