@extends('layouts.admin')
@section('content')
    @can('user_create')
        <div style="margin-bottom: 10px;" class="row">

        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Liste des soins
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Reservation
                        </th>
                        <th>
                            Client
                        </th>
                        <th>
                            Cout
                        </th>
                        <th>
                            Employé
                        </th>
                        <th>
                            Statut paiement
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($services as $service)
                        <tr data-entry-id="{{ $service->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $service->id ?? '' }}
                            </td>
                            <td>
                                {{ $service->appointment->id ?? '' }}
                            </td>

                            <td>
                                {{ $service->appointment->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $service->price ?? '' }}
                            </td>
                            <td>
                                {{ $service->appointment->employee->name ?? '' }}
                            </td>
                            <td>
                                <span class="badge badge-info">{{ $service->appointment->employee->name ?? '' }}</span>
                            </td>

                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.services.show', $service->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.cares.edit', $service->id) }}">
                                        Encaisser le paiement
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('user_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.users.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
