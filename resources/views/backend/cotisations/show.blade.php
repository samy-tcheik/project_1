@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Cotisation d'adherent <span class="badge badge-primary">{{$cotisation->adhs->name}}</span>
                        <small class="text-muted">Cotisation view</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('labels.backend.access.users.tabs.titles.overview')</a>
                        </li>
                    </ul>

                    <div class="tab-content bg-gray-100">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">

                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Montant</th>
                                            <td> <div class="font-lg badge badge-warning">{{$cotisation->tarif->montant}}</div></td>
                                        </tr>
                                        <tr>
                                            <th>Date de debut</th>
                                            <td> <div class="font-lg badge badge-secondary">{{$cotisation->debut_date}}</div></td>
                                        </tr>
                                        <tr>
                                            <th>Date de paiment</th>
                                            <td><div class="font-lg badge badge-secondary">{{$cotisation->paiment_date}}</div></td>
                                        </tr>
                                        <tr>
                                            <th>mode de paiment</th>
                                            <td><div class="font-lg badge badge-success">{{$cotisation->modePay->paiment_mode}}</div></td>
                                        </tr>
                                        <tr>
                                            <th>Date ventilation</th>
                                            <td><div class="font-lg badge badge-secondary">{{$cotisation->ventilation_date}}</div></td>
                                        </tr>
                                        <tr>
                                            <th>Numéro de chèque</th>
                                            <td><div class="font-lg badge badge-info">{{$cotisation->num_cheque}}</div></td>
                                        </tr>
                                        <tr>
                                            <th>date de chèque ou virement</th>
                                            <td><div class="font-lg badge badge-secondary">{{$cotisation->cheque_virement_date}}</div></td>
                                        </tr>

                                        <tr>
                                            <th>observation</th>
                                            <td><textarea name="" id="" cols="90" rows="3" disabled>{{$cotisation->observation}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>BQ </th>
                                            <td><div class="font-lg badge badge-info">{{$cotisation->BQ}}</div></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--table-responsive


                    </div> tab  -->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">

                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection
