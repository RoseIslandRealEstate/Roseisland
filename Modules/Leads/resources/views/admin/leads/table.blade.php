 <table class="table mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Lead </th>
            <th>Client</th>
            <th>Project / Agent / Comapaign  </th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allData as $data)
        <tr  class="edit_loader_tr" data-id="{{ $data->id }}"> 
            @include('admin.leads.tr_unit')
        </tr>
        @endforeach
        <tr>
            <td colspan="6" class="text-center">
                <div class="d-flex justify-content-center ajax_pagination">
                    {{ $allData->appends($_GET)->links() }}
                </div>
            </td>
        </tr>

    </tbody>
</table>