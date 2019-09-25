<?php

Route::resource('/foreign' , 'FieldsController')->only( 'index','store' ,'update', 'destroy');

