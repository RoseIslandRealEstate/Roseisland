<table class="table mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Task</th>
            <th>Agent</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allData as $data)
        <tr  class="edit_loader_tr" data-id="{{ $data->id }}"> 
           @include('admin.to_do_lists.tr_unit')
        </tr>
        @endforeach
        <tr class="edit_loader_tr" data-id="{{ $data->id }}">
            <td colspan="5" class="text-center">
                <div class="d-flex justify-content-center ajax_pagination">
                    {{ $allData->appends($_GET)->links() }}
                </div>
            </td>
        </tr>

    </tbody>
</table>