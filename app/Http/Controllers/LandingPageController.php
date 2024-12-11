<?php
// app/Http/Controllers/LandingPageController.php
namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\About;
use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Project;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data home content dari database
        $homes = Home::All(); // Atau bisa gunakan paginate jika ada banyak data
        $abouts = About::All();
        $skills = Skill::All();
        $certificates = Certificate::All();
        $projects = Project::all();

        // Kirim data ke view
        return view('landingpage', compact('homes', 'abouts', 'skills', 'certificates', 'projects'));
    }
}
