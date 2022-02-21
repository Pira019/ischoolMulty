<?php

namespace App\Http\Controllers\DossierEtudiant;

use App\Http\Requests\Student\SearchStudentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEtudiantRequest;
use App\Models\Etudiants;
use App\Repositories\EtudiantRepository;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $etudiantRepository;

    protected $nbrPerPage = 4;
    protected  $title;


    public function __construct(EtudiantRepository $etudiantRepository)
    {
        $this->middleware('auth');
        $this->etudiantRepository = $etudiantRepository;
        $this->title ="Dossier des étudiants";


    }




    public function index()
    {
        $students = Etudiants::paginate(5);
        $links = $students->render();


        return view('profile.edit',
            ['title' => $this->title],
            compact('students','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function search(SearchStudentRequest $searchStudent)
    {

       return $this->etudiantRepository->searchByFilter($searchStudent->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtudiantRequest $request)
    {
         $this->etudiantRepository ->store($request->all());

		return redirect('home')->withOk("L'utilisateur a été créé.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}