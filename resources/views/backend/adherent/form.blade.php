<div class="form-group row">

    <label for="name" class="col-sm-2 col-form-label">adhesion date</label>
    <div class="col-sm-10">
        {{html()->input('date' , 'adhesion_date')->class('form-control')}}
    </div>
</div><!-- date adh +  -->
<div class="form-group row">

    <label for="name" class="col-sm-2 col-form-label">name</label>
    <div class="col-sm-10">
        {{ html()->text('name')->class('form-control')->placeholder('name') }}
    </div>
</div><!-- nom+  -->
<div class="form-group row">
    <label for="dossier" class="col-sm-2 col-form-label">dossier</label>
    <div class="col-sm-10">
        {{html()->text('dossier')->class('form-control')->placeholder('dossier')}}
    </div>
</div><!-- dossier+ -->
<div class="form-group row">
    <label for="juridic" class="col-sm-2">juridic form</label>
    {{html()->select('juridic_form_id' ,$juridics  )->class('form-control col-sm-10  custom-select')}}

</div><!-- form_jr+ -->
<div class="form-group row">
    <label for="statu" class="col-sm-2">statu</label>
    {{html()->select('statu_id' ,$status  )->class('form-control col-sm-10  custom-select')}}

</div><!-- statu+_ -->
<div class="form-group row">
    <label for="switch" class="col-sm-2">regime  année civile</label>
    <label class="switch switch-label switch-primary" id="switch" >
        {{ html()->checkbox('regime_annee_civile' )->class('switch-input')  }}
        <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
    </label>
</div><!-- regime anné civile+ -->
<div class="form-group row">
    <label for="desc" class="col-sm-2">description</label>
{{html()->textarea('description')->class('form-control col-sm-10')}}



</div>{{--description+--}}
<hr>
{{--companyIinfo--}}
<h5 class="card-title">Company info</h5>
<hr>
<div class="form-group row">
    <label for="tel1" class="col-sm-2 col-form-label">telephone 1</label>
    <div class="col-sm-10">
        {{html()->text('tel1')->class('form-control')}}
    </div>
</div><!-- telephon1 +-->
<div class="form-group row">
    <label for="tel2" class="col-sm-2 col-form-label">telephone 2</label>
    <div class="col-sm-10">
        {{html()->text('tel2')->class('form-control')}}
    </div>
</div><!-- telephon2 +-->
<div class="form-group row">
    <label for="fax1" class="col-sm-2 col-form-label">fax 1</label>
    <div class="col-sm-10">

        {{html()->text('fax1')->class('form-control')->placeholder('fax 1 ')}}
    </div>
</div><!-- fax 1+ -->
<div class="form-group row">
    <label for="fax2" class="col-sm-2 col-form-label">fax 2</label>
    <div class="col-sm-10">
        {{html()->text('fax2')->class('form-control')->placeholder('fax 2  ')}}
    </div>
</div><!-- fax 2+ -->
<div class="form-group row">
    <label for="mobile" class="col-sm-2 col-form-label">mobile</label>
    <div class="col-sm-10">

        {{html()->text('mobile')->class('form-control')->placeholder('mobile ')}}
    </div>
</div><!-- mobile+ -->
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-10">

        {{html()->input('email' ,'email')->class('form-control')->placeholder('email ici ')}}
    </div>
</div><!-- email+ -->
<div class="form-group row">
    <label for="web" class="col-sm-2 col-form-label">site web</label>
    <div class="col-sm-10">

        {{html()->text('site_web' )->class('form-control')->placeholder('site web ')}}
    </div>
</div><!--web+-->
<div class="form-group row">
    <label for="postal" class="col-sm-2 col-form-label">boite  postal</label>
    <div class="col-sm-10">
        {{html()->text('boite_postal')->class('form-control')->placeholder('boite postal')}}
    </div>
</div><!--boite postal+-->
<div class="form-group row">
    <label for="adress" class="col-sm-2">adress</label>

    {{html()->textarea('adress')->class('form-control col-sm-10')->placeholder('address')}}


</div>{{--adress+--}}
<div class="form-group row">
    <label for="statu" class="col-sm-2">region</label>

    {{html()->select('region_id' ,$regions  )->class('form-control col-sm-10  custom-select')}}
</div>{{--region+--}}
<div class="form-group row">
    <label for="city" class="col-sm-2">city</label>
    {{html()->select('city_id' ,$cities  )->class('form-control col-sm-10  custom-select')}}
</div>{{--city+--}}
<div class="form-group row">
    <label for="country" class="col-sm-2">country</label>

    {{html()->select('country_id' ,$countries  )->class('form-control col-sm-10  custom-select')}}
</div>{{--country+--}}
<div class="form-group row">
    <label for="codep" class="col-sm-2 col-form-label">code postal</label>
    <div class="col-sm-10">
        {{html()->text('code_postal')->class('form-control')->placeholder('code postal')}}
    </div>
</div><!-- code postal+ -->

<hr>
{{--activityInfo--}}
<h5 class="card-title">Activity info</h5>
<hr>
<div class="form-group row">
    <label for="statu" class="col-sm-2">sector</label>

    {{html()->select('sector_id' ,$sectors  )->class('form-control col-sm-10  custom-select')}}
</div>{{--sector+--}}
<div class="form-group row">
    <label for="statu" class="col-sm-2">activity</label>
    {{html()->select('activity_id' ,$activity  )->class('form-control col-sm-10  custom-select')}}
</div>{{--activity+--}}
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">code nae</label>
    <div class="col-sm-10">

        {{html()->text('code_nae')->class('form-control')->placeholder('code nae')}}

    </div>
</div>{{--code-nae+--}}
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">rc</label>
    <div class="col-sm-10">

        {{html()->text('rc')->class('form-control')->placeholder('rc')}}

    </div>
</div>{{--rc--}}
<div class="form-group row">
    <label for="effectif" class="col-sm-2 col-form-label">effectif</label>
    <div class="col-sm-10">

        {{html()->text('effectif')->class('form-control')->placeholder('effectif')}}
    </div>
</div>{{--effectif--}}
<hr>

<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">ca</label>
    <div class="col-sm-10">

        {{html()->text('ca')->class('form-control')->placeholder('ca')}}
    </div>
</div>{{--ca--}}
<div class="form-group row">
    <label for="city" class="col-sm-2">currency  ca</label>
    <select name="currency_ca" class="form-control col-sm-10 custom-select" id="city">
        <option value="dzd">dzd</option>
        <option value="euro">euro</option>
    </select>
</div>{{--currency_ca--}}
<div class="form-group row">
    <label for="code" class="col-sm-2 col-form-label">cs</label>
    <div class="col-sm-10">

        {{html()->text('cs')->class('form-control')->placeholder('cs')}}
    </div>
</div>{{--cs--}}
<div class="form-group row">
    <label for="city" class="col-sm-2">currency cs</label>
    <select name="currency_cs" class="form-control col-sm-10 custom-select" id="city">
        <option value="dzd">dzd</option>
        <option value="euro">euro</option>
    </select>
</div>{{--currency_cs--}}
<div class="form-group row">
    <label for="city" class="col-sm-2">type</label>
    <select name="type" class="form-control col-sm-10 custom-select" id="city">
        <option value="actif">actif</option>
        <option value="algerien">algerien</option>
        <option value="etranger">etranger</option>
    </select>
</div>{{--type--}}