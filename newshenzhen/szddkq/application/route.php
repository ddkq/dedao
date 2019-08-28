<?php
use think\Route;
Route::rule('list/:id','protal/lists/index');
Route::rule('page/:name','protal/page/index');
Route::rule('department/:id','department/department/index');
Route::rule('zt/:name','zt/zt/index');
Route::rule('article/:id','protal/article/index');
Route::rule('swt','protal/page/swt');