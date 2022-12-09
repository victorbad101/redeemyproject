<?php
declare(strict_types=1);

namespace App\Modules\Redeemy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class VinylController extends Controller
{
    public function index(): View
    {
        return View('vinyl.index');
    }
}