@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Adherents Management <small class="text-muted"> active adherents</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.adherent.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.users.table.name')</th>
                            <th>file</th>
                            <th>@lang('labels.backend.access.users.tabs.content.overview.status')</th>
                            <th>juridic form</th>
                            <th>activity</th>
                            <th>type</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($adherents as $adh)
                                <tr>
                                <td>{{$adh->name}}</td>
                                <td>{{$adh->dossier}}</td>
                                <td>
                                     {{$adh->statu->designation}}
                                </td>
                                <td>
                                     {{$adh->juridic->designation}}
                                </td>
                                <td>
                                     {{$adh->activity->designation}}
                                </td>
                                <td>
                                    {{html()->select('type' ,config('type') ,$adh->type)->attribute('disabled')->class('form-control')}}

                                </td>
                                <td><div class="btn-group" role="group" aria-label="Basic example">
                                        <a href='{{route("admin.adherents.show" ,$adh)}}'type="button" class="btn-lg btn-primary  icon-eye" data-toggle="tooltip"  title="{{__('buttons.general.crud.view')}}"></a>
                                        <a href='{{route("admin.adherents.edit" ,$adh)}}' class="btn-lg btn-secondary icon-pencil" data-toggle="tooltip"  title="{{__('buttons.general.crud.edit')}}"></a>
                                        <button type="button" class="btn-lg btn-danger icon-close" data-toggle="modal" data-target="#confirm" data-id="{{$adh->id}}" data-name="{{$adh->name}}" title="{{__('buttons.general.crud.delete')}}" ></button>
                                    </div></td>
                                </tr>
                            @endforeach
                            <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body h5">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form  id="deleteForm" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                @csrf

                                                <button id="delete" class="btn btn-danger">Confirm delete</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->

        <div class="row">
            <div class="col-7">
                <div class="float-left">

                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">

                </div>
            </div><!--col-->
        </div><!--row-->
          <div class="col-sm-10 d-flex justify-content-center">
              {{ $adherents->links() }}
          </div>

    </div><!--card-body-->
</div><!--card-->

@endsection

@push('myscript')
    <script>

        $("#confirm").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body').text('do you really want to delete '  + name )
            modal.find('#deleteForm').attr('action' ,'/admin/adherents/' + id )

        })
    </script>


    @endpush
