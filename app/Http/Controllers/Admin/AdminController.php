<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return 'method "index"';
    }

    public function create()
    {
        return 'method "create"';
    }

    public function store()
    {
        return 'method "store"';
    }

    public function show($id)
    {
        return "method show + {$id}";
    }

    public function edit($id)
    {
        return "method edit {$id}";
    }

    public function update($id)
    {
        return "method update {$id}";
    }

    public function destroy($id)
    {
        return "method destroy {$id}";
    }


}
