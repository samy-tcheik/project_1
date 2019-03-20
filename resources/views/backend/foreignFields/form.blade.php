<div class="card">
    <h4 class="card-header text-uppercase">{{$table}}</h4>
    <div class="card-body">

        <form class="row" action="{{route("admin.foreign.store")}}" method="post">
               <h5 class="col">Nouveau</h5>
               <div class="col-6">
                   @csrf
                   {{html()->input('hidden','table' , $table)}}
                   {{html()->input('text','designation')->id('designation')->class('form-control')->placeholder('Nouveaux')}}
               </div>
            {{html()->input('submit' )->value('nouveaux')->class('btn btn-primary col')}}
        </form> {{--creating-row--}}
        <hr>
        <div class="row">
            <h5 class="col">list</h5>
            <div class="col-6">{{html()->select('id' , $data)->class('form-control')->id($table)}}
            </div>



            <a class="btn btn-danger col" data-toggle="modal" data-target="#confirm" data-table="{{$table}}"   href="">supprimer</a>
        </div> {{--deleting-Row--}}
        <hr>
        <form class="row" id="{{$table}}Form" method="post">
            <h5 class="col">Renommer</h5>
            <div class="col-6">
                @csrf
                {{html()->input('hidden','_method' ,'PUT')}}
                {{html()->input('hidden','table',$table)}}
                {{html()->input('text','designation')->id($table.'Input')->class('form-control')->placeholder('renommer la champ')}}
            </div>
            {{html()->input('submit' )->value('Renommer')->class('btn btn-success col')}}
        </form>{{--renaming-Row--}}
    </div> {{--card-body--}}
</div> {{--card--}}



