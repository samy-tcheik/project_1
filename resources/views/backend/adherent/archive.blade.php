@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))



@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Adherents Management <small class="text-muted"> adherents archive</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">

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
                                    <td>{{$adh->statu->desi}}</td>
                                    <td>{{$adh->juridic->designation}}</td>
                                    <td>{{$adh->activity->designation}}</td>
                                    <td>{{$adh->type}}</td>
                                    <td><div class="btn-group" role="group" aria-label="Basic example">
                                            <a href='{{route("admin.adherent.restore" ,['id'  =>  $adh->id])}}'type="button" class="btn-lg btn-warning  icon-reload" data-toggle="tooltip"  title="restore adherent"></a>

                                        </div></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->

            <div class="col-sm-10 d-flex justify-content-center">

                {{ $adherents->links() }}
            </div>
        </div><!--card-body-->
    </div><!--card-->
@endsection
