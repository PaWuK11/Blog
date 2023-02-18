<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <section class="content" style="padding-top: 20px">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">
                                    User List
                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper"
                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="dataTables_scroll">
                                            <div class="dataTables_scrollHead"
                                                 style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                <div class="dataTables_scrollHeadInner"
                                                     style="box-sizing: content-box; width: 1573px; padding-right: 0px;">
                                                    <table
                                                        class="table table-striped table-hover datatable datatable-User dataTable no-footer"
                                                        role="grid" style="margin-left: 0px; width: 1573px;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" style="width: 88.8594px;"
                                                                aria-sort="descending"
                                                                aria-label="ID: activate to sort column ascending">
                                                                ID
                                                            </th>
                                                            <th tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" style="width: 158.781px;"
                                                                aria-label="Name: activate to sort column ascending">
                                                                Name
                                                            </th>
                                                            <th tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" style="width: 150.781px;"
                                                                aria-label="Email: activate to sort column ascending">
                                                                Email
                                                            </th>
                                                            <th tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" style="width: 150.781px;"
                                                                aria-label="Email verified at: activate to sort column ascending">
                                                                Email verified at
                                                            </th>
                                                            <th tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" style="width: 150.781px;"
                                                                aria-label="Is Author">
                                                                Is Author
                                                            </th>

                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 350.5px;" aria-label="&amp;nbsp;">
                                                                &nbsp;
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="dataTables_scrollBody"
                                                 style="position: relative; overflow: auto; width: 100%;">
                                                <table
                                                    class="table table-striped table-hover datatable datatable-User dataTable no-footer"
                                                    id="DataTables_Table_0" role="grid"
                                                    aria-describedby="DataTables_Table_0_info" style="width: 1576px;">
                                                    <thead>
                                                    <tr role="row" style="height: 0px;">
                                                        <th width="10" class="select-checkbox sorting_disabled"
                                                            rowspan="1" colspan="1"
                                                            style="width: 9.96875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-label="">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                            </div>
                                                        </th>
                                                        <th class="sorting_desc" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            style="width: 88.8594px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-sort="descending"
                                                            aria-label="ID: activate to sort column ascending">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                                ID
                                                            </div>
                                                        </th>
                                                        <th class="sorting" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            style="width: 80px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-label="Name: activate to sort column ascending">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                                Name
                                                            </div>
                                                        </th>
                                                        <th class="sorting" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            style="width: 282.641px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-label="Email: activate to sort column ascending">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                                Email
                                                            </div>
                                                        </th>
                                                        <th class="sorting" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            style="width: 336.469px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-label="Email verified at: activate to sort column ascending">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                                Email verified at
                                                            </div>
                                                        </th>
                                                        <th class="sorting" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            style="width: 50.641px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-label="Is_Author: activate to sort column ascending">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                                Is_Author
                                                            </div>
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 350.5px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;"
                                                            aria-label="&amp;nbsp;">
                                                            <div class="dataTables_sizing"
                                                                 style="height: 0px; overflow: hidden;">
                                                                &nbsp;
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr data-entry-id="1" role="row" class="odd">
                                                        @foreach($usersToApprove as $user)
                                                            @if(!$user->declined)
                                                                @if($user->email_verified_at)
                                                                    <form action="{{ route('approve.store') }}"
                                                                          method="post">
                                                                        @csrf
                                                                        <td style="width: 40em;">
                                                                            {{ $user->id }}
                                                                            <input type="hidden" name="id"
                                                                                   value="{{ $user->id }}">
                                                                        </td>
                                                                        <td style="width: 70em;">
                                                                            {{ $user->name }}
                                                                        </td>
                                                                        <td style="width: 50em;">
                                                                            {{ $user->email }}
                                                                        </td>
                                                                        <td style="width: 400px;">
                                                                            {{ $user->email_verified_at }}
                                                                        </td>
                                                                        <td style="width: 10em;">
                                                                            <label for="is_author"> is_author</label>
                                                                            <input type="checkbox" name="is_author"
                                                                                   id="is_author">
                                                                        </td>
                                                                        @if($user->is_admin)
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-info">Admin</span>
                                                                            </td>
                                                                        @endif
                                                                        <td>
                                                                            <button class="btn btn-xs btn-info">Submit
                                                                            </button>
                                                                        </td>
                                                                    </form>

                                                                    <form action="{{ route('approve.store') }}"
                                                                          method="post" >
                                                                        @csrf
                                                                        <td>
                                                                            <input type="hidden" name="declined" value="1">
                                                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                                                            <button class="btn btn-xs btn-danger" >Decline
                                                                            </button>
                                                                        </td>
                                                                    </form>
                                                    </tr>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="actions"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
