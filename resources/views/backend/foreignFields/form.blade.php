<div class="card">
    <h4 class="card-header text-uppercase">Table <span class="badge badge-info">{{$table}}</span>
       <div class="float-right">
           <form  action="{{route("admin.foreign.store")}}" method="post">
            <div class="input-group">
            <div class="input-group-prepend">
                    {{html()->input('submit' )->value('nouveaux')->class('btn btn-success')}}
            </div>
                {{html()->input('text','designation')->placeholder('Nouveaux')}}
                {{html()->input('hidden','table' , $table)}}
                @csrf
            </div>
           </form>
       </div>

    </h4>

    <div class="card-body">

        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Désignation</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
@foreach($data as $col)
        <tr>
            <td>{{$col->id}}</td>
            <td>{{$col->designation}}</td>
            <td>
                <a class="btn btn-warning" data-toggle="modal" data-target="#rename" data-id="{{$col->id}}" data-field="{{$col->designation}}" href="">Renommer</a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-id="{{$col->id}}"   href="">supprimer</a>
            </td>
        </tr>
@endforeach
            </tbody>
        </table>

    </div> {{--card-body--}}
</div> {{--card--}}



