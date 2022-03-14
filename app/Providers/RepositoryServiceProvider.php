<?php

namespace App\Providers;

use App\Interfaces\Etudiant\IDocumentRepository;
use App\Interfaces\Etudiant\IEtudiantRepository;
use App\Repositories\Etudiants\DocumentRepository;
use App\Repositories\Etudiants\EtudiantsRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(IEtudiantRepository::class,EtudiantsRepo::class);
       $this->app->bind(IDocumentRepository::class,DocumentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
