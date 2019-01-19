<?php

Route::get('/{any}', 'PlaygroundController@index')->where('any', '.*');