@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Adherents Management
                        <small class="text-muted">adherent view</small>
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

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">

                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-hover">


                                        <tr>
                                            <th>@lang('labels.frontend.user.profile.name')</th>
                                            <td>{{$adherent->name}}</td>
                                        </tr>

                                        <tr>
                                            <th>dossier</th>
                                            <td>{{$adherent->dossier}}</td>
                                        </tr>
                                        <tr>
                                            <th>juridic form</th>
                                            <td>{{$adherent->juridic->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>statu</th>
                                            <td>{{$adherent->statu->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>regime année civile</th>
                                            <td>{{$adherent->regime_annee_civile}}</td>
                                        </tr>
                                        <tr>
                                            <th>date d'adhesion</th>
                                            <td>{{$adherent->adhesion_date}}</td>
                                        </tr>

                                        <tr>
                                            <th>description</th>
                                            <td><textarea name="" id="" cols="90" rows="3" disabled>{{$adherent->description}}</textarea></td>
                                        </tr>
                                        <tr>
                                            <th>Telephone 1  </th>
                                            <td>{{$adherent->tel1}}</td>
                                        </tr>

                                        <tr>
                                            <th>Telephone 2 </th>
                                            <td>{{$adherent->tel2}}</td>
                                        </tr>
                                        <tr>
                                            <th>fax 1  </th>
                                            <td>{{$adherent->fax1}}</td>
                                        </tr>
                                        <tr>
                                            <th>fax 2 </th>
                                            <td>{{$adherent->fax2}}</td>
                                        </tr>
                                        <tr>
                                            <th>mobile </th>
                                            <td>{{$adherent->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <th>site web </th>
                                            <td>{{$adherent->site_web}}</td>
                                        </tr>
                                        <tr>
                                            <th>boite postal </th>
                                            <td>{{$adherent->boite_postal}}</td>
                                        </tr>

                                        <tr>
                                            <th>adress</th>
                                            <td><textarea name="" id="" cols="90" rows="3" disabled>{{$adherent->adress}}</textarea></td>
                                        </tr>

                                        <tr>
                                            <th>region </th>
                                            <td>{{$adherent->region->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>city </th>
                                            <td>{{$adherent->city->designation}}</td>
                                        </tr>

                                        <tr>
                                            <th>country </th>
                                            <td>{{$adherent->country->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>code postal </th>
                                            <td>{{$adherent->code_postal}}</td>
                                        </tr>
                                        <tr>
                                            <th>sector </th>
                                            <td>{{$adherent->sector->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>activity </th>
                                            <td>{{$adherent->activity->designation}}</td>
                                        </tr>
                                        <tr>
                                            <th>code nae </th>
                                            <td>{{$adherent->code_nae}}</td>
                                        </tr>

                                        <tr>
                                            <th>rc </th>
                                            <td>{{$adherent->rc}}</td>
                                        </tr>
                                        <tr>
                                            <th>effectif </th>
                                            <td>{{$adherent->effectif}}</td>
                                        </tr>
                                        <tr>
                                            <th>currency_ca</th>
                                            <td>{{$adherent->currency_ca}}</td>
                                        </tr>
                                        <tr>
                                            <th>cs </th>
                                            <td>{{$adherent->cs}}</td>
                                        </tr>
                                        <tr>
                                            <th>currency_cs</th>
                                            <td>{{$adherent->currency_cs}}</td>
                                        </tr>
                                        <tr>
                                            <th>type </th>
                                            <td>{{$adherent->type}}</td>
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
