<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\Document\SaveDocumentRqt;
use App\Interfaces\Etudiant\IDocumentRepository;
use App\Interfaces\Etudiant\IEtudiantRepository;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    private $repoEtudiant;
    private  $documentRep;
    private $retournMsg;

    public function __construct(IEtudiantRepository $etudiantRepository, IDocumentRepository $IDocumentRepository)
    {


        $this->middleware('auth');
        $this->middleware(['role:etudiant|parent']);

        session(['photoIcone' => $etudiantRepository->getProfil()]);

        $this->repoEtudiant = $etudiantRepository;
        $this->documentRep = $IDocumentRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  view('profile.document.index',[
         'title' => 'Document',
          'documents_rqt' =>   $this->documentRep->getDocumentByUser()
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return  view('profile.document.index',[
            'title' => 'Document',
            'create' => true,
             'documents' => $this->documentRep->getAllDocuments(),
            'documents_rqt' =>   $this->documentRep->getDocumentByUser()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveDocumentRqt $request)
    {
        $this->retournMsg = "Demande validée. Merci";

        if ( $this->documentRep->save(array_filter($request->all())) == false )  {

                $this->retournMsg = "La demande est en cours";

        } ;


        return back()->with(
            [
            'status' => $this->retournMsg
        ]);





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
