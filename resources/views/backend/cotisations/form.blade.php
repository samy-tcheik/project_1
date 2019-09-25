
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-6">
                <div id="adhInput">
                <label class="font-lg" for="company">adherent</label>
                    {{html()->input('text')->class("form-control font-lg")
                    ->id("search")->placeholder("Enter your company name")}}
                    {{html()->input('hidden',"adherents_id")->attribute('required')}}
                </div>
            </div>
            <div class="form-group col-6">
              <label class="font-lg" for="paimentMode">mode de paiment</label>
                {{html()->select('paiment_mode_id' ,$paiment_mode  )->class('form-control')->attribute("required")}}
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label class="font-lg" for="company">montant</label>
                {{html()->select('montants_id' ,$montants  )->class('form-control')->attribute("required")}}

            </div>
            <div class="form-group col-6">
                <label class="font-lg" >Numéro de chèque</label>
                {{html()->input('text','num_cheque')->class("form-control")->placeholder("Numéro de chèque")}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label class="font-lg" for="dateDebut">date début</label>
                {{html()->input('date','debut_date')->class("form-control")}}
            </div>
            <div class="form-group col-6">
                <label class="font-lg" for="virementDate">date de chèque ou virement</label>
                {{html()->input('date','cheque_virement_date')->class("form-control")}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label class="font-lg" for="dateDebut">date paiment</label>
                {{html()->input('date','paiment_date')->class("form-control")}}
            </div>
            <div class="form-group col-6">
                <label class="font-lg" for="virementDate">BQ</label>
                {{html()->input('text',"BQ")->class("form-control")}}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label class="font-lg" for="">date ventilation</label>
                {{html()->input('date','ventilation_date')->class("form-control")}}
            </div>
            <div class="form-group col-6">
                <label class="font-lg" for="virementDate">Observation</label>
                {{html()->textarea('observation')->class("form-control")}}
            </div>
        </div>
    </div>
    @CSRF
