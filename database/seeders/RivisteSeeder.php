<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Riviste;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RivisteSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run()
    {
        Riviste::create([
            'nome' => 'Horror',
            'nazione' => 'Italia',
        ]);
        
        Riviste::create([
            'nome' => 'Marvel Comics',
            'nazione' => 'US',
        ]);

        Article::create([
            'title' => 'LA TUA CANZONE',
            'subtitle' => 'COEZ',
            'article_description' => 'Coez è il miglor CantaAutore Italiano di sempre. La sua musica è un mix di rock, pop e folk. Ecco una delle sue canzoni più famose "La tua canzone"',
            'comic_number' => '1',
            'comic_year' => '2019',
            'author_id' => 7,
            'category_id' => 8,
            //ORA INSERIAMO L'IMMAGINE presente sul nostro pc
            'image' => 'images/1717065933.jpg',
        ]);

        Article::create([
            'title' => 'QVC9',
            'subtitle' => 'QVC9 FA PAURA',
            'article_description' => 'Gemitaiz in arte "DAVIDE DE LUCA" è un rapper italiano. Ecco una dei sui MIXTAPE più famosi "QVC9"',
            'comic_number' => '2',
            'comic_year' => '2020',
            'author_id' => 7,
            'category_id' => 8,
            //ORA INSERIAMO L'IMMAGINE presente sul nostro pc
            'image' => 'images/1716902647.jpg',
        ]);
        

        Article::create([
            'title' => 'DC Comics',
            'subtitle' => 'US',
            'article_description' => 'DC Comics è una casa editrice di fumetti statunitense fondata nel 1934 da Malcolm Wheeler-Nicholson. La società è conosciuta per aver pubblicato fumetti come Superman, Batman, Wonder Woman e molti altri.',
            'comic_number' => '3',
            'comic_year' => '1934',
            'author_id' => 7,
            'category_id' => 8,
            //ORA INSERIAMO L'IMMAGINE presente sul nostro pc
            'image' => 'profile_images/1717072840.jpg',
        ]);
        
        // Aggiungi altre riviste come necessario...
    }
}
