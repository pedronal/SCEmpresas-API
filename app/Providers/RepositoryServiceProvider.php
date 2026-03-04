<?php

namespace App\Providers;

use App\Domain\Repositorios\EmpreendimentosRepositorio;
use app\Infra\Persistencia\Mysql\DAO\EmpreendimentosDAO;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EmpreendimentosRepositorio::class, EmpreendimentosDAO::class);
    }

    public function boot(): void
    {
    }
}
