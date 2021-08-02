<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (class_exists(TelescopeApplicationServiceProvider::class)) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(Elastic::class, function ($app) {
            $client = ClientBuilder::create()
                ->build();
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $client = ClientBuilder::create()->setHosts(['elasticsearch:9200'])->build();
        
        if(!$client->indices()->exists(['index' => 'noticias_2'])){
            $client->indices()->create(['index'=> 'noticias_2']);
        }
    }
}
